let ids = [];
fetch('ids.json')
    .then(response => response.json())
    .then(data => {
        ids = data;
        // console.log(ids); // نمایش آرایه در کنسول برای بررسی
    })
    .catch(error => {
        console.error('Error fetching or parsing the JSON:', error);
    });
function hiden(){
    document.getElementById('record').hidden = true;
    document.getElementById('pause').hidden = false;
}
function show(){
    document.getElementById('pause').hidden = true;
    document.getElementById('record').hidden = false;
}
let i = 0;
function task_shower() {
    console.log(ids.length);
    console.log(i);
    if (i < ids.length) {
        document.getElementById('head['+ i +']').hidden = true;
        document.getElementById('br['+ i +']').hidden = true;
        document.getElementById('task['+ i +']').hidden = true;
        i++;
        if (i < ids.length){
            document.getElementById('head['+ i +']').hidden = false;
            document.getElementById('br['+ i +']').hidden = false;
            document.getElementById('task['+ i +']').hidden = false;
        }else{
            document.getElementById('end').hidden = false;
            document.getElementById('record').disabled = true;
        }
    }
}
// Pause and play the video, and change the button text
function myPlayFunction() {
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
}
function show_faq_desc1(){
    if (document.getElementById("FAQ_Desc1").hidden === true) {
        document.getElementById("FAQ_Desc1").hidden = false;
        document.getElementById("FAQ_Desc1").classList.add("delay");
        document.getElementById("drawer1").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc1").hidden = true;
        document.getElementById("drawer1").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc1").classList.add("delay");
    }
}
function show_faq_desc2() {
    if (document.getElementById("FAQ_Desc2").hidden === true) {
        document.getElementById("FAQ_Desc2").hidden = false;
        document.getElementById("FAQ_Desc2").classList.add("delay");
        document.getElementById("drawer2").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc2").hidden = true;
        document.getElementById("drawer2").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc2").classList.add("delay");
    }
}
function show_faq_desc3() {
    if (document.getElementById("FAQ_Desc3").hidden === true) {
        document.getElementById("FAQ_Desc3").hidden = false;
        document.getElementById("FAQ_Desc3").classList.add("delay");
        document.getElementById("drawer3").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc3").hidden = true;
        document.getElementById("drawer3").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc3").classList.add("delay");
    }
}
function show_faq_desc4() {
    if (document.getElementById("FAQ_Desc4").hidden === true) {
        document.getElementById("FAQ_Desc4").hidden = false;
        document.getElementById("FAQ_Desc4").classList.add("delay");
        document.getElementById("drawer4").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc4").hidden = true;
        document.getElementById("drawer4").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc4").classList.add("delay");
    }
}
function show_faq_desc5() {
    if (document.getElementById("FAQ_Desc5").hidden === true) {
        document.getElementById("FAQ_Desc5").hidden = false;
        document.getElementById("FAQ_Desc5").classList.add("delay");
        document.getElementById("drawer5").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc5").hidden = true;
        document.getElementById("drawer5").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc5").classList.add("delay");
    }
}
function show_faq_desc6() {
    if (document.getElementById("FAQ_Desc6").hidden === true) {
        document.getElementById("FAQ_Desc6").hidden = false;
        document.getElementById("FAQ_Desc6").classList.add("delay");
        document.getElementById("drawer6").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc6").hidden = true;
        document.getElementById("drawer6").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc6").classList.add("delay");
    }
}
function show_faq_desc7() {
    if (document.getElementById("FAQ_Desc7").hidden === true) {
        document.getElementById("FAQ_Desc7").hidden = false;
        document.getElementById("FAQ_Desc7").classList.add("delay");
        document.getElementById("drawer7").classList.add("drawer_bg");

    }else {
        document.getElementById("FAQ_Desc7").hidden = true;
        document.getElementById("drawer7").classList.remove("drawer_bg");
        document.getElementById("FAQ_Desc7").classList.add("delay");
    }
}
