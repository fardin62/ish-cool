<?php
include("config.php");

if(isset($_COOKIE['lin'])){
  echo "<a href='logout.php'>Logout</a>";
  echo "<br>";
  $pass = $_COOKIE['lin'];
  $sql = "SELECT * FROM users WHERE password = '$pass'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $desig = $row['desig'];
  $name = $row['Name'];

  if ($desig == "stud") {
    echo "Hello $name, wait exam will start not-shortly:)";
  }

}
else {
  echo "Please <a href='signin.php'>login</a> first";
}
?>
<?php
if ($row['desig'] == 'stud') {
echo <<<EOL
<!DOCTYPE html>
<html>
<script>
function updateTime(){
    var currentTime = new Date()
    var hours = currentTime.getHours()
    var minutes = currentTime.getMinutes()
    var seconds = currentTime.getSeconds()
    if (minutes < 10){
        minutes = "0" + minutes
    }
    if (seconds < 10){
      seconds = "0" + seconds
    }
    var t_str = hours + ":" + minutes + ":" + seconds;
    document.getElementById('time_span').innerHTML = t_str;
    if (minutes < 60){
      document.getElementById('myDIV').innerHTML = "Time starts now <br> <a href='quiz.php'>Link</a>";
    }
    else {
      document.getElementById('myDIV').innerHTML = "Exam time over";
    }
  }
setInterval(updateTime, 1000);
</script>
<body>
<h2>Current time <span id='time_span'></span></h2>
<h1>Hello $name,</h1>

<p>Your exam will start at 1:10 for 30 minutes(1:40) GMT+6</p>
<p>You'll get question paper just in time</p>
<p>Have a nice day😊</p>
</body>
</html>
EOL;
}
else {
  echo "Maybe exams are only for students😂";
}
?>
<script>function hide(){
var x = document.getElementById("myDIV");
if (x.style.display === "none"){
  x.style.display = "block";
}
}
</script>
<div id="myDIV">
</div>
</html>
