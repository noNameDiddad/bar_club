let timerId;
let i = 0;

function getData() {

}

function startEmulation() {
    timerId = setInterval(step, 100);
    let play = document.getElementById('play_btn');
    let pause = document.getElementById('pause_btn');

    play.style.display = 'none';
    pause.style.display = 'block';

}

function stopEmulation() {
    setTimeout(() => { clearInterval(timerId);}, 100);
    let play = document.getElementById('play_btn');
    let pause = document.getElementById('pause_btn');

    play.style.display = 'block';
    pause.style.display = 'none';
}

function step() {
    i++;
    let text = document.getElementById('bar');
    if (i == 40){
        i = 0;
        text.innerHTML += "<br>";
    }
    else {
        text.innerHTML += "a";
    }


}
