function pop() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';

    setTimeout(function () {
        document.getElementById('popup').classList.add('visible');
    }, 10);

}

function closePopup() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('popup').classList.remove('visible');

    setTimeout(function () {
        document.getElementById('popup').style.display = 'none';
    }, 500);
}

