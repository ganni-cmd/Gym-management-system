<?php
   session_start();
   require("connect.php");

   ?>
    <html>

    <head>
        <title>Manage Users | Arnold Gym</title>
        <link rel="icon" href="images/ArnoldGym.jpg">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/w3.css" rel="stylesheet">
        <link href="fonts/Montserrat-Regular.otf" rel="stylesheet">
        <link href="css/fontawesome-all.min.css" rel="stylesheet">
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Montserrat", sans-serif
            }
            
            .w3-row-padding img {
                margin-bottom: 12px
            }
            
            .w3-sidebar {
                width: 120px;
                background: #222;
            }
            
            #main {
                margin-left: 120px
            }
            .footer {
                position: fixed;
                 left: 0;
                 bottom: 0;
                 height: 20%;
                 width: 100%;
        </style>
    </head>

    <body class="w3-black">
        <nav class="w3-sidebar w3-bar-block w3-small w3-center">
            <img style="width:100%" src="images/ArnoldGym.jpg">
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_home.php">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_attendance.php">
                <i class="fa fa-calendar-check w3-xxlarge"></i>
                <p>ATTENDANCE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
                <i class="fa fa-users w3-xxlarge"></i>
                <p>MANAGE
                    <br>MEMBERS</p>
            </a>
           
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
                <i class="fa fa-sign-out-alt w3-xxlarge"></i>
                <p>LOG OUT</p>
            </a>
        </nav>
        <div class="w3-padding-large" id="main">
            <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
                <h1 class="w3-jumbo"><strong>Manage Members</strong></h1>
            </header>
            <table class="w3-table w3-border w3-responsive" style='font-family: sans-serif;'>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthdate</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th> </th>
                    <th> </th>
                </tr>
                <?php
                         

               $query = "SELECT *
                       FROM member ORDER BY member_id DESC";
               $ret = mysqli_query($conn, $query);

               while($row = mysqli_fetch_assoc($ret)){

                   $id = $row["member_id"];
                   $fname = $row["member_fname"];
                   $lname = $row["member_lname"];
                   $bdate = $row["member_bdate"];
                   $age = $row["member_age"];
                   $sex = $row["member_sex"];
                   $address = $row["member_address"];
                   $email = $row["member_email"];

                    echo "<tr><td>". $id . "</td><td>". $fname. "</td><td>" . $lname. "</td><td>". $bdate. "</td><td>". $age. "</td><td>". $sex. "</td><td>". $address. "</td><td>" . $email. "</td><td><button class='w3-button w3-black' onclick=\"document.getElementById('".$email.$id. "').style.display='block'\"></button></td><td><button class='w3-button w3-dark-grey' onclick=\"document.getElementById('". $id. "').style.display='block'\"><span class='fa fa-edit'></span> Edit</button></td></tr>";

                   echo '<div id="'. $id. '" class="w3-modal">
                       <div class="w3-modal-content w3-animate-right w3-card-4">
                         <header class="w3-container w3-black"> 
                           <span onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" 
                           class="w3-button w3-display-topright">&times;</span>
                           <h2>Edit Account | <strong>'. $fname. ' '. $lname. '</strong></h2>
                         </header>
                         <div class="w3-container w3-white">
                         <form method="POST" onsubmit="return check();">
                           <input class="w3-input w3-border w3-margin-bottom" type="hidden" value="'.$id.'" name="id" required>
                           <p><strong>First name:</strong></p>
                           <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$fname.'" name="fname" required>
                           <p><strong>Last name:</strong></p>
                           <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$lname.'" name="lname" required>
                           <p><strong>Birth date:</strong></p>
                           <input class="w3-input w3-border w3-margin-bottom" type="date" value="'.$bdate.'" name="bdate" required>
                           <strong style=\'margin-right: 25px\'>Sex:</strong>
                           <input class="w3-margin-bottom w3-left-align"type="radio" name="sex" value="Male" '.(($sex=="Male")?"checked":"").'> Male
                             <input class="w3-margin-bottom "type="radio" value="Female" name="sex" '.(($sex=="Female")?"checked":"").' style=\'margin-left: 25px\'> Female
                           <p><strong>Address:</strong></p>
                           <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$address.'" name="address" required>
                           <p><strong>Email:</strong></p>
                           <input class="w3-input w3-border w3-margin-bottom" type="email" value="'.$email.'" name="email" required>
                           <div class="w3-center">

                           <button class="w3-button w3-black w3-section w3-padding" type="submit" name="update" ><strong>Update Account</strong></button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>';

                  
                   }
               

               if(isset($_POST['update'])){

               $id = mysqli_real_escape_string($conn, $_POST['id']);
               $fname = mysqli_real_escape_string($conn, $_POST['fname']);
               $lname = mysqli_real_escape_string($conn, $_POST['lname']);
               $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
               $sex = mysqli_real_escape_string($conn, $_POST['sex']);
               $address = mysqli_real_escape_string($conn, $_POST['address']);
               $email = mysqli_real_escape_string($conn, $_POST['email']);

               $today = date("Y-m-d");
               $diff = date_diff(date_create($bdate), date_create($today));
               $age = $diff->format('%y');

               $sql = "UPDATE `member` SET `member_fname`='{$fname}',`member_lname`='{$lname}',`member_bdate`='{$bdate}',`member_age`='{$age}',`member_sex`='{$sex}',`member_address`='{$address}',`member_email`='{$email}' WHERE member_id = '{$id}'";

               $query = mysqli_query($conn,$sql);
               echo("<meta http-equiv='refresh' content='0'>");

               }

               ?>
               
           
            <footer class="w3-center footer"> Copyright © 2021 The Arnold Gym. All rights reserved.</footer>
        </div>
        <div id="logout" class="w3-modal w3-center">
            <div class="w3-modal-content w3-animate-top" style="max-width:600px">
                <div class="w3-center">
                    <br>
                    <span onclick="document.getElementById('logout').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" style='color:black'>&times;</span>
                </div>
                <div class="w3-container" style="color:black">
                    <h2>Are you sure you want to logout?</h2>
                    <form method="POST" action="logout.php">
                        <button class="w3-button w3-black w3-section w3-padding" name='delete'>Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        function check() {
            return confirm("Are you sure?");
        }
    </script>

    </html>