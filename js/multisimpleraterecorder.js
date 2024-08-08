let recorder1, recorder2;
let audioStream1, audioStream2;
let count  = 0;
document.getElementById('record').addEventListener('click', async () => {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

    // AudioContext with 20000 Hz sample rate
    const audioContext1 = new (window.AudioContext || window.webkitAudioContext)({ sampleRate: 20000 });
    const source1 = audioContext1.createMediaStreamSource(stream);
    const destination1 = audioContext1.createMediaStreamDestination();
    source1.connect(destination1);

    audioStream1 = destination1.stream;
    recorder1 = RecordRTC(audioStream1, {
        type: 'audio',
        mimeType: 'audio/wav',
        recorderType: StereoAudioRecorder,
        desiredSampRate: 20000,
        audioBitsPerSecond: 320000  // 320 kbps
    });

    // AudioContext with 44100 Hz sample rate
    const audioContext2 = new (window.AudioContext || window.webkitAudioContext)({ sampleRate: 44100 });
    const source2 = audioContext2.createMediaStreamSource(stream);
    const destination2 = audioContext2.createMediaStreamDestination();
    source2.connect(destination2);

    audioStream2 = destination2.stream;
    recorder2 = RecordRTC(audioStream2, {
        type: 'audio',
        mimeType: 'audio/wav',
        recorderType: StereoAudioRecorder,
        desiredSampRate: 44100,
        audioBitsPerSecond: 320000  // 320 kbps
    });

    recorder1.startRecording();
    recorder2.startRecording();

    // document.getElementById('startButton').disabled = true;
    // document.getElementById('stopButton').disabled = false;
});

document.getElementById('pause').addEventListener('click', () => {
    count++;
    recorder1.stopRecording(() => {
        const blob1 = recorder1.getBlob();

        const formData1 = new FormData();
        formData1.append('audio', blob1, 'id_'+count+'_recorded_audio_20000.wav');

        fetch('upload.php', {
            method: 'POST',
            body: formData1
        }).then(response => response.text()).then(data => {
            console.log(data);
        }).catch(error => {
            console.error(error);
        });

        audioStream1.getTracks().forEach(track => track.stop());
    });

    recorder2.stopRecording(() => {
        const blob2 = recorder2.getBlob();

        const formData2 = new FormData();
        formData2.append('audio', blob2, 'id_'+count+'_recorded_audio_44100.wav');

        fetch('upload.php', {
            method: 'POST',
            body: formData2
        }).then(response => response.text()).then(data => {
            console.log(data);
        }).catch(error => {
            console.error(error);
        });

        audioStream2.getTracks().forEach(track => track.stop());
    });

    // document.getElementById('startButton').disabled = false;
    // document.getElementById('stopButton').disabled = true;
});