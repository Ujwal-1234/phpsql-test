<html>
<head>
  <title>
    connection
    </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attmgsystem";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (\Exception $e) {
  echo "error";
}

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "<div id='idstatus' style='color:green;'>connected succesfully</div>";

?>
<script>
setTimeout(function(){document.getElementById('idstatus').innerHTML='';},2000);
</script>
</body>
</html>
