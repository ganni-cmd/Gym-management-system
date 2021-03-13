<?php
   session_start();
   require("connect.php");

   $catch = $_SESSION['email'];

   $query = "SELECT * from member WHERE member_email='$catch'";
   $ret = mysqli_query($conn, $query);

   while($row = mysqli_fetch_assoc($ret)){
       $gymid = $row['member_id'];
       $fname = $row['member_fname'];
       $lname = $row['member_lname'];
       $bdate = $row['member_bdate'];
       $age = $row['member_age'];
       $sex = $row['member_sex'];
       $address = $row['member_address'];
       $email = $row['member_email'];
   }
   ?>
    <html>

    <head>
        <title>Profile | The Arnold Gym</title>
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
        </style>
    </head>

    <body class="w3-black">
        <nav class="w3-sidebar w3-bar-block w3-small w3-center">
            <img style="width:100%" src="images/ArnoldGym.jpg">
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="home.php">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="user.php">
                <i class="fa fa-user w3-xxlarge"></i>
                <p>PROFILE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="program.php">
                <i class="fa fa-th-list w3-xxlarge"></i>
                <p>PROGRAMS</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="contact.php">
                <i class="fa fa-envelope w3-xxlarge"></i>
                <p>CONTACT</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
                <i class="fa fa-sign-out-alt w3-xxlarge"></i>
                <p>LOG OUT</p>
            </a>
        </nav>
        <div class="w3-padding-large" id="main">
            <div class="w3-row-padding">
                <div class="w3-margin-bottom">
                    <ul class="w3-ul w3-white w3-center">
                        <li class="w3-black w3-large">
                            <h1 class="w3-jumbo"><?php echo($fname." ".$lname) ?></h1>
                        </li>
                        <li class="w3-padding-16"><strong>Gym ID Number: </strong>
                            <?php echo($gymid) ?>
                        </li>

                        <li>
                            <b>Personal Information</b>
                            <table class="w3-table w3-striped w3-border" style="color:black">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthdate</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo($fname) ?>
                                    </td>
                                    <td>
                                        <?php echo($lname) ?>
                                    </td>
                                    <td>
                                        <?php echo($bdate) ?>
                                    </td>
                                    <td>
                                        <?php echo($age) ?>
                                    </td>
                                    <td>
                                        <?php echo($sex) ?>
                                    </td>
                                    <td>
                                        <?php echo($address) ?>
                                    </td>
                                    <td>
                                        <?php echo($email) ?>
                                    </td>
                                </tr>
                            </table>
                        </li>
                       
                        <li class="w3-black w3-padding-24">
                            To pay your <strong>membership fee</strong> or <strong>monthly fee</strong>, please approach the staff at the gym to get membership by choosing a package and payment.
                        </li>
                    </ul>
                </div>
            </div>
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/dark-unica.js"></script>
    </html>