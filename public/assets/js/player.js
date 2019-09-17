let audio = document.querySelector('#audio'),
	play = document.querySelector('#play'),
	pause = document.querySelector('#pause'),
	rewind = document.querySelector('#rewind'),
	mute = document.querySelector('#mute'),
	v1 = document.querySelector('#v1'),
	v2 = document.querySelector('#v2'),
	volumeBar = document.querySelector('#volume-bar'),
	currentTimeEl = document.querySelector('#currentTime'),
	durationEl = document.querySelector('#duration'),
	playing = false,
	muted = false,
	volume = 1;

document.querySelector('.player__play').addEventListener('click', () => {
	if (playing) {
		playing = false
		play.style.display = "block"
		pause.style.display = "none"
		rewind.style.display = "none"
		audio.pause()
	}
	else if (!playing) {
		playing = true
		play.style.display = "none"
		pause.style.display = "block"
		rewind.style.display = "none"
		audio.play()
	}
})

audio.addEventListener('ended', () => {
	playing = false
	play.style.display = "none"
	pause.style.display = "none"
	rewind.style.display = "block"
})

document.querySelector('.volume').addEventListener('click', () => {
	if (muted) {
		muted = false
		audio.muted = false
		changeVolume()
	}
	else {
		muted = true
		v1.style.display = "none"
		v2.style.display = "none"
		audio.muted = true
	}
})

function changeVolume() {
	if (muted) {
		muted = false
		audio.muted = false
	}
	volume = volumeBar.value
	audio.volume = volume
	if (volume > .5) {
		v1.style.display = "block"
		v2.style.display = "block"
	}
	else if (volume < .5 && volume > .1) {
		v1.style.display = "block"
		v2.style.display = "none"
	}
	else {
		v1.style.display = "none"
		v2.style.display = "none"
	}
}

function getTime(duration) {
	duration = Math.floor(duration, 0.6);
	let gh = [(dM = Math.floor(duration / 60) % 60), (dS = duration % 60)];
	if (dM > 60 && dS >= 60) {
		gh = [
			(dH = Math.floor(Math.floor(duration / 60) / 60) % 60),
			(dM = Math.floor(duration / 60) % 60),
			(dS = duration % 60)
		];
	}
	for (i in gh) {
		gh[i] < 10 ? gh[i] = "0" + gh[i] : gh[i] = "" + gh[i]
	}
	return gh.join(':');
}

function updateTimer(currentTime) {
	let currTime = getTime(currentTime);
	currentTimeEl.innerHTML = currTime;
}

audio.addEventListener('canplay', () =>	durationEl.innerHTML = getTime(audio.duration))
audio.addEventListener('timeupdate', () => updateTimer(audio.currentTime))

if (audio.readyState > 3) durationEl.innerHTML = getTime(audio.duration)