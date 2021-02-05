(function() {
    // document.getElementById('file_upload_box').addEventListener("");
    // let drop_box = document.getElementById('file_upload_box');
    //
    // drop_box.addEventListener('dragenter', handlerFunction, false);
    // drop_box.addEventListener('dragleave', handlerFunction, false);
    // drop_box.addEventListener('dragover', handlerFunction, false);
    // drop_box.addEventListener('drop', handlerFunction, false);

}());
// document.getElementById('')

var tags = [{
  tag_index: 0,
  tag_name: null,
  tag_content: null
}];
//adds the new tag
function addTag(tag_index,tag_name,tag_content,tagArray) {
  var tag={tag_index,tag_name,tag_content};
  tagArray.push(tag);
}
//removes all the stored tags except for the default
function removeTags(tagArray) {
  while (tagArray.length!=1) {
    tagArray.pop();
  }
}
//gets the most recent tag
function currentTag(tagArray) {
  var current=tagArray.length;
  return current-1;
}
// resets the page to it's default state
function page_reset() {
  document.getElementById("transcript").value="";
  document.getElementById('name_theme_box').style.visibility = 'hidden';
  document.getElementById('save_error_msg').style.display = 'none';
  document.getElementById('error_msg').style.display = 'none';
  document.getElementById('name_error_msg').style.display = 'none';
  document.getElementById('save_transcript_options').style.visibility = 'hidden';
  removeTags(tags);
  document.getElementById("available_tags").innerHTML='<h4 style="text-align: center;">Currently no tags made</h4>';
}
// for browsing through the computer for files
function browse() {

}
// closes the video uploader
function close_video_uploader() {
  document.getElementById('open_vid_uploader').style.display = 'initial';
  document.getElementById('make_transcript_box').style.display = 'none';
  document.getElementById('transcript_box').style.width = '100%';
}
// responsible for the tagging of selected quotes from the transcript
function tag_button() {
  var text = document.getElementById("transcript");
  var tagged = text.value.substr(text.selectionStart, text.selectionEnd - text.selectionStart);

  if (tagged =="") {
    document.getElementById('error_msg').style.display = 'initial';
    document.getElementById('save_error_msg').style.display = 'none';
  } else {
    document.getElementById('error_msg').style.display = 'none';
    document.getElementById('save_error_msg').style.display = 'none';
    document.getElementById('name_error_msg').style.display = 'none';
    var tag_name="";
    addTag(currentTag(tags)+1,tag_name,tagged,tags);
    // save_theme_name(tagged);
    document.getElementById('name_theme_box').style.visibility = 'visible';
  }
}
// associates a name/tag to a specific theme
function save_theme_name() {

  // document.getElementById('name_theme_box').style.visibility = 'visible';
  // var tag_selection=tagged;
  // document.getElementById("save_theme_name").addEventListener("click",function () {
    var t_name= document.getElementById("theme_name");
    var tag_name=t_name.value;
    // var tag_selection=tagged;
    if (tag_name=="") {
      document.getElementById('name_error_msg').style.display = 'initial';
    } else {
      document.getElementById('name_error_msg').style.display = 'none';

      // addTag(currentTag(tags)+1,tag_name,tag_selection,tags);
      tags[currentTag(tags)].tag_name=tag_name;
      let selected = tags[currentTag(tags)].tag_content;
      let transcript_text = document.getElementById("transcript").value;
      let re = new RegExp(selected,"g"); // search for all instances
      let newText = transcript_text.replace(re, `[${selected}][${tags[currentTag(tags)].tag_index}]`);
      document.getElementById("transcript").value = newText;

      if (currentTag(tags)==0) {
        t_name.value="";
      } else {
        var available_tags=0;
        while (available_tags<currentTag(tags)) {
          available_tags++;
          var index,name,content;
          if (available_tags==1) {
            index=tags[available_tags].tag_index;
            name=tags[available_tags].tag_name;
            content=tags[available_tags].tag_content;
            document.getElementById("available_tags").innerHTML='<div id="tags"> <span id="tag_index_header">Tag Index</span> <span id="tag_name_header"> Tag Name</span><span id="tag_content_header">Tag Content </span>   </div>';
            document.getElementById("available_tags").innerHTML+='<div id="tags"> <span id="tag_index">'+index+'</span> <span id="tag_name">'+ name+'</span><span id="tag_content">' +content+' </span>   </div>';
          } else {
            index=tags[available_tags].tag_index;
            name=tags[available_tags].tag_name;
            content=tags[available_tags].tag_content;
            document.getElementById("available_tags").innerHTML+='<div id="tags"> <span id="tag_index">'+index+'</span> <span id="tag_name">'+ name+'</span><span id="tag_content">' +content+' </span>   </div>';
          }
        }
        t_name.value="";
        document.getElementById('name_theme_box').style.visibility = 'hidden';
      }

    }

  // },false);

}
// displays the save options for the users
function save_options() {
  var transcript_to_be_saved=document.getElementById("transcript").value;
  if (transcript_to_be_saved=="") {
    document.getElementById('save_error_msg').style.display = 'initial';
    document.getElementById('error_msg').style.display = 'none';
  } else {
    document.getElementById('save_error_msg').style.display = 'none';
    document.getElementById('error_msg').style.display = 'none';
    document.getElementById('save_transcript_options').style.visibility = 'visible';
  }

}
// creates new transcript
function c_n_transcript() {
  page_reset();
}
// the save and export option
// responsible for exporting the transcript
function save_and_export() {

}
// opens the video uploader
function open_uploader() {
  document.getElementById('open_vid_uploader').style.display = 'none';
  document.getElementById('make_transcript_box').style.display = 'initial';
  document.getElementById('transcript_box').style.width = '45%';
}
// resets the page to it's default state
function exit() {
  page_reset();
}
