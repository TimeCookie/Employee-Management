var photoInput = document.getElementById('employee-photo-input');
var imgPreview = document.getElementById('placeholder-image');

function triggerClick() {
    photoInput.click();
}

function previewImage(e) { 
    if(e.files[0]) {
        var fr = new FileReader();
        
        fr.onload = function(e) {
            imgPreview.setAttribute('src',e.target.result);
        } 
        
        fr.readAsDataURL(e.files[0]);
    }
}