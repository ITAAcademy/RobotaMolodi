function showDiv(id){
	var closeAll = false;
	if(document.getElementById(id).style.display == "block")
        closeAll = true;
    document.getElementById('send_URL').style.display = "none";
	document.getElementById('send_file').style.display = "none";
    document.getElementById('send_resume').style.display = "none";
    if(!closeAll)
        document.getElementById(id).style.display = "block";
}

function getFileName () {
			var file = document.getElementById ('uploaded-file').value;
			file = file.replace(/\\/g, "/").split('/').pop();
			document.getElementById ('file-name').innerHTML = file;
		}