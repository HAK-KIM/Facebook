
var loadFile = function(event) {
    var image = document.getElementById('img-post');
    image.src = URL.createObjectURL(event.target.files[0]);
};

var loadProfile = function(event) {
    var image = document.getElementById('img-profile');
    image.src = URL.createObjectURL(event.target.files[0]);
    let submit = document.getElementById("submit-profile");
    submit.style.display = 'block';
};