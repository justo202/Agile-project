<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Questionaire</title>
  </head>
  <body>
    <?php
    include 'db.php';


    echo "yes";
    $sql = "SELECT * FROM `questions` WHERE `Questionnaire_Name` = 'test'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          echo "Questionaire starts now: ";
          echo "<br>";
    
            while($row = mysqli_fetch_array($result)){

                    echo $row['Question'];
                    echo "<br><br>";

            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    }
    mysqli_close($link);
    ?>
  </body>
</html>
