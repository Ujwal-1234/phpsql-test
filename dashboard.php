<?php
    require 'dbh.php';
    session_start();
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        ACME INTERIORS INTERN RECRUIT TEST
    </header>
    <body>
        <div class='menubarclass'>
            <?php
		    if (isset($_SESSION['userid'])) {
                $user=$_SESSION['userid'];
			    echo '<div class="menbar1" method="GET">
                    <button type="submit" name="display" onclick = display()>DISPLAY</button>
                    <button type="submit" name="edit" onclick = edit()>EDIT</button>
                    <form action="action.php"><button type="submit" style="color:black;border:solid 1px black;" name="logout">LOGOUT</button></form>
                    </div>';
		    }else{
                echo '<p>PLEASE LOGIN FROM LOGIN PAGE</p>';
            }
            if(isset($_GET['status'])){
                if($_GET['status'] == 'submitted'){
                    echo '<p style="color: green;">records updated successfully</p>';
                }
            }
            ?>
        </div>
        <div class='datacontent' id = 'iddisplay'>STUDENTS DETAILS
        <?php
        $sql = "SELECT * FROM `students` WHERE `st_name` = '$user'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<p>Student id : <a>" . $row["st_id"]."</a></p>
                    <p>Student Name : <a>" . $row["st_name"]. "</a></p>
                    <p>student Department : <a>" . $row["st_dept"]. "</a></p>
                    <p>student batch : <a>".$row["st_batch"]."</a></p>
                    <p>student semester : <a>".$row["st_sem"]."</a></p>
                    <p>student email : <a>".$row["st_email"]."</a></p>";
                  }
                } else {
                      echo "0 results";
                }
        ?></div>
        <form class='editcontent' action = 'update.php' id = 'idedit' method="POST">EDIT DETAILS
            <?php
            $sql = "SELECT * FROM `students` WHERE `st_name` = '$user'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $stdid = $row["st_id"];
                $stname = $row["st_name"];
                $stdpt = $row["st_dept"];
                $stbatch = $row["st_batch"];
                $stsem = $row["st_sem"];
                $stmail = $row["st_email"];
                echo "<p>Registration no. : <a>".$stdid."</a></p>
                <p>Student Name : <a><input type='text' name='stname' value ='$stname' ></a></p>
                <p>student Department : <a><input type='text' name='stdpt' value ='$stdpt' ></a></p>
                <p>student batch : <a><input type='text' name = 'stbatch' value ='$stbatch' ></a></p>
                <p>student semester : <a><input type='text' name='stsem' value ='$stsem' ></a></p>
                <p>student email : <a><input type='text' name='stmail' value ='$stmail' ></a></p>";
              }
              echo '<button type="submit" name ="update">UPDATE</button>';
            }
             else {
                  echo "0 results";
            }     
            ?>
        </form>
    </body>
    <footer> Intern Test By Ujwal Kumar M</footer>
    <script>
        setTimeout(function(){document.getElementById('iderror').innerHTML='';},4000);
        function display(){
            document.getElementById('idedit').style.display='none';
            document.getElementById('iddisplay').style.display='block';
        }
        function edit(){
            document.getElementById('iddisplay').style.display='none';
            document.getElementById('idedit').style.display='block';    
        }
    </script>
</html>