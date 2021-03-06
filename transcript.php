<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Make Transcript</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="make_transcript.css">
  </head>
  <!-- on="page_reset()" -->
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#343a40">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		<a class="navbar-brand" href="EthicsForm.html">Ethics Form</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
			<a class="navbar-brand" href="transcript.php">Transcript</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="logout.php">Log out</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>	
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="make_transcript_body">
      <div class="main_transcript_box">
        <div id="make_transcript_box">
          <div id="file_upload_box" onclick="browse()">
            <h3><span id="browse_for_file" onclick="browse()">Browse</span> for or Drag Media File (mp4 or mp3) Here if you want to view your video side by side</h3>
          </div>
          <button onclick="close_video_uploader()">Close Video Uploader</button>
        </div>
        <div id="transcript_box">
          <div class="transcript_options">
		  
			<!-- Load transcript --> 
			
			<?php
			 
			 function Read()
			 {
			 //once load is clicked
			 if(isset($_POST['load']))
			 {
				$test = $_FILES['loadfile'];
				//file properities - name
				$file = $_FILES['loadfile']['name'];
				//file properities - error handeling
				$fileError = $_FILES['loadfile']['error'];
				//file properities - type
				$fileType = $_FILES['loadfile']['type'];
				//file properities - tmp location
				$fileTmp = $_FILES['loadfile']['tmp_name'];
	
				//seperate '.' from txt and file name 
				$extension = explode('.', $file);
				//convert the txt to lowercase if needed
				$lowerExt = strtolower(end($extension));
	
				$allowedExts = array('txt', 'text/plain');
				
				//if file is a text then read
				if (in_array($lowerExt, $allowedExts))
				{
					if ($fileError === 0)
					{
							$fileRead = fopen($fileTmp, "r") or die("Unable to open file, please try again!");
							//read line by line unto end of the file
							while(!feof($fileRead))
							{
								$text = fgets($fileRead);
								print $text . "\n";
							}		
							fclose($fileRead);
			
						//header("Location: transcript_gen_test.html?loadsuccessful");
					}
					else
					{
						echo "Sorry there was an issue reading from file.";
					}
				}
				else
				{	
					echo "Invalid file type, please ensure its a txt file.";
				}
			 }
			 }
			?>
			
			 <form class="transcript" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype ="multipart/form-data">
			 <input type ="file" name ="loadfile"/>
			 <input id="load_input_button" type ="submit" name="load" value="Load"/>
			 </form>
			 

			<button id="open_vid_uploader" onclick="open_uploader()">Open Video Uploader</button>
            <button id="create_transcript" onclick="c_n_transcript()">Create New Transcript</button>
          </div>
            <textarea id="transcript" name="transcript" rows="14"><?php Read(); ?></textarea>
        
          <div class="">
            <button onclick="tag_button()">Tag/ Make Theme</button>
			<button id="save_transcript" onclick="save_options()" type="submit">Save Transcript</button>
            <br>
            <h5 id="error_msg">No selection was made in transcript. Try again</h5>
			<h5 id="save_error_msg">Nothing was made in transcript to save. Try again</h5>
			</div>
			<div id="name_theme_box">
              <h4>Name tag/theme:</h4><input type="text" id="theme_name" placeholder="Type Theme Name Here">
              <br>
              <h5 id="name_error_msg">No name written in input area. Try again</h5>
              <!-- <input type="submit" name="" value=""> -->
              <button id="save_theme_name" onclick="save_theme_name()">Save Theme Name</button>
              <!-- <div id="theme_label">
                <button id="attach_note">Attach Note to theme</button>
                <button id="proceed">Proceed without notes</button>
                <br>
                <textarea id="theme_notes_t_area" name="theme_notes" rows="10"></textarea>
              </div> -->
            </div>
          </div>
        </div>
        <!-- <br> -->
        <div id="save_transcript_options">
          <h1 id="s_t_options">Save Transcript Options</h1>
          <button onclick="save_and_export()">Save Transcript and Export</button>
		  <button onclick="exit()">Don't Save</button>
        </div>
		<br>
		<br>
		<br>
        <!-- <br> -->
		   <div class="available_themes">
          <h1 id="available_ts">Tag Memo</h1>
          <div id="available_tags">
            <h4 style="text-align: center;">Currently no tags made</h4>
          </div>
        </div>
        <!-- <br> -->

      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="make_transcript.js" charset="utf-8"></script>
  </body>
</html>