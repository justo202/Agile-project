(function() {
    // document.getElementById('file_upload_box').addEventListener("");
    let drop_box = document.getElementById('file_upload_box')

    drop_box.addEventListener('dragenter', handlerFunction, false)
    drop_box.addEventListener('dragleave', handlerFunction, false)
    drop_box.addEventListener('dragover', handlerFunction, false)
    drop_box.addEventListener('drop', handlerFunction, false)

}());
// document.getElementById('')


function tag_button() {
  var text = document.getElementById("transcript");
  var tagged = text.value.substr(text.selectionStart, text.selectionEnd - text.selectionStart);

  if (tagged =="") {
    document.getElementById('error_msg').style.visibility = 'visible';
  } else {
    document.getElementById('name_theme_box').style.visibility = 'visible';
    let selected = tagged;
    if (selected !== "") {
    	let transcript_text = document.getElementById("transcript").innerHTML;
    	let re = new RegExp(selected,"g"); // search for all instances
  		let newText = transcript_text.replace(re, `<mark>${selected}</mark>`);
  		document.getElementById("transcript").innerHTML = newText;
    }
  }


}
function browse() {

}
function make_transcript() {
  document.getElementById('transcript_box').style.visibility = 'visible';
}
function save_theme_name() {

}

function save_to_server() {

}

function save_and_export() {

}

function exit() {

}
