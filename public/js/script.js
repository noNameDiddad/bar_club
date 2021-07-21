let timerId;
let i = 0;
let music_i = 0;
let tracks = [];
let persons = [];

function openStart() {
    console.log(tracks);
    console.log(persons);

    let play = document.getElementById('play_btn');
    play.style.display = 'block';

    let face_control = document.getElementById('face_control');
    for (let j = 0; j <= persons.length; j++) {
        face_control.innerHTML += "<p>" + persons[j].first_name + " " + persons[j].last_name + "<br></p>";
        // face_control.innerHTML += "<p>" + persons[j].first_name + " " + persons[j].last_name + "<br>" + "Любимый трек: " + persons[j].music + "<br></p>";
    }
}

function startEmulation() {
    timerId = setInterval(step, 100);
    let play = document.getElementById('play_btn');
    let pause = document.getElementById('pause_btn');
    let exit = document.getElementById('exit');

    exit.style.display = 'none';
    play.style.display = 'none';
    pause.style.display = 'block';

}

function stopEmulation() {
    setTimeout(() => {
        clearInterval(timerId);
    }, 100);
    let play = document.getElementById('play_btn');
    let pause = document.getElementById('pause_btn');

    exit.style.display = 'block';
    play.style.display = 'block';
    pause.style.display = 'none';
}

function step() {
    i++;
    let music = document.getElementById('music');
    let bar = document.getElementById('bar');
    let dance = document.getElementById('dance');
    if (i == 40) {
        changeMusic(music);
        changePosition(bar, dance);
    }
}


function changeMusic(music) {
    music.innerHTML = tracks[music_i].track;
    i = 0;
    music_i++;
    if (music_i === tracks.length) {
        music_i = 0;
    }
}
function changePosition(bar, dance) {
    let face_control = document.getElementById('face_control');
    face_control.innerHTML = "";
    dance.innerHTML = "";
    bar.innerHTML = "";
    for (let j = 0; j <= persons.length; j++) {
        if (persons[j].music === tracks[music_i].track)
        {
            dance.innerHTML += "<p>" + persons[j].first_name + " " + persons[j].last_name + "<br></p>";
        }
        else
        {
            bar.innerHTML += "<p>" + persons[j].first_name + " " + persons[j].last_name + "<br></p>";
        }
    }
}
