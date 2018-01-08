
window.onload = countdown;
function countdown() {
    var now = new Date();
    var eventDate = new Date(2018, 3, 23);
    var currentTime = now.getTime();
    var eventTime = eventDate.getTime();
    var remTime = eventTime - currentTime;

    var s = Math.floor(remTime / 1000);
    var m = Math.floor(s / 60);
    var h = Math.floor(m / 60);
    var d = Math.floor(h / 24);

    h %= 24;
    m %= 60;
    s %= 60;

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

	document.getElementsByClassName("days")[0].textContent = d;
	document.getElementsByClassName("days")[0].innerText = d;
	document.getElementsByClassName("hours")[0].textContent = h;
	document.getElementsByClassName("minutes")[0].textContent = m;
	document.getElementsByClassName("seconds")[0].textContent = s;


    document.getElementsByClassName("days")[1].textContent = d;
    document.getElementsByClassName("days")[1].innerText = d;
    document.getElementsByClassName("hours")[1].textContent = h;
    document.getElementsByClassName("minutes")[1].textContent = m;


    setTimeout(countdown, 1000);
}
