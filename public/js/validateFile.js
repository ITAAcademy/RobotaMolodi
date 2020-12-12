function ValidateSize(file) {
    // Converting MB to bytes
    var FileSize = file.files[0].size / 1024 / 1024; // in MB

    // Checking file size in MB
    if (FileSize > 30) {
        document.getElementById('sizeExeption').style.display = "block";
        document.getElementById('buttonHide').style.display = "none";
    } else if (FileSize < 30) {
        document.getElementById('sizeExeption').style.display = "none";
        document.getElementById('buttonHide').style.display = "block";
    }
}