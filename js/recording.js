let recorder;
let audioStream;
let count = 0;
document.getElementById('record').addEventListener('click', async () => {
    audioStream = await navigator.mediaDevices.getUserMedia({ audio: true });

    recorder = RecordRTC(audioStream, {
        type: 'audio',
        mimeType: 'audio/mp3',
        recorderType: StereoAudioRecorder,
        desiredSampRate: 44100,
        audioBitsPerSecond: 320000  // 320 kbps
    });

    recorder.startRecording();
    // document.getElementById('startButton').disabled = true;
    // document.getElementById('stopButton').disabled = false;
});

document.getElementById('pause').addEventListener('click', () => {
    count++;
    recorder.stopRecording(() => {
        const blob = recorder.getBlob();

        const formData = new FormData();
        formData.append('audio', blob, 'id_'+count+'_recorded_audio_44100.mp3');

        fetch('upload.php', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(data => {
            console.log(data);
        }).catch(error => {
            console.error(error);
        });

        audioStream.getTracks().forEach(track => track.stop());
    });

    // document.getElementById('startButton').disabled = false;
    // document.getElementById('stopButton').disabled = true;
});