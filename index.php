<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <header>
        ACME INTERIORS INTERN RECRUIT TEST
    </header>
    <body>
        <div class="body">
            <div class='errors' id ='iderror'>
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfield'){
                        echo'<p>Fill All The Login Details</p>';
                    }
                    elseif($_GET['error'] == 'Invalidpass'){
                        echo '<p>Enter The Correct Password</p>';
                    }elseif($_GET['error']=='error1' || $_GET['error']=='error2'){
                        echo '<p>Unwanted error contact your service provider</p>';
                    }elseif($_GET['error'] == 'usernotavailable'){
                        echo '<p>Enter Valid Username</p>';
                    }else{
                        echo'<p>Unwanted error contact_service provider</p>';
                    }
                }
                ?>
            </div>
            <form class="formclass" action="login.php" method="POST">
                <p><label><B>USER LOGIN</B></label></p>
                <div class="iinform">
                        <p><br>
                        <label style="font-size: 20px;">USER ID :</label>
                        <input type="text" id="idpos" name="logid">
                    </p>
                    <br><br>
                    <p>
                        <label style="font-size: 20px;">PASSWORD : </label>                            
                        <input type="password" id="idpos" name="logpass">
                    </p><br><br>
                    <button type="submit" id="Sidlogin" name="clicklog">LOGIN</button>
                    <br><br>
               </div>
            </form>
        </div>
    </body>
    <footer> Intern Test By Ujwal Kumar M</footer>
    <script>
        setTimeout(function(){document.getElementById('iderror').innerHTML='';},4000);
    </script>
</html>