<?php

@include 'config.php';

if(isset($_POST['submit']))
{
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);

    $select = "SELECT * FROM register where username = '$username' && password = '$password'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'user already exist!';
    }
    else
    {
        
        $insert = "INSERT INTO register(name,username,password,city,address,email,mobile_no) VALUES('$name','$username','$password','$city','$address','$email','$mobile_no')";
        mysqli_query($conn, $insert);
        header('location:user_login.php');
        
    };
};

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>YI</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/favicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body>
   <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                          
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                       

                        <div class="collapse navbar-collapse" id="navbarsExample04">


                        <?php
                        session_start();
                        
                        if(!isset($_SESSION['user_id']))
                        {
                        ?>
                           
                              
                              
                              <li class="nav-item">
                              <div class="dropdown">
                                 <button class="dropbtn">Login</button>
                                    <div class="dropdown-content">
                                       <a href="admin_login.php">Admin Login</a>
                                       <a href="user_login.php">User login</a>
                                    </div>
                              </div>
                              </li>
                                 
                           </ul>
                           <?php } 
                           else 
                           {
                              ?>
                              
                              <li class="nav-item">
                                     <button><a href="user_logout.php">Logout</a></button>
                              </li>
                              <?php
                           }
                           ?>






                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
    </header>




      <!--end header -->
    <div class="form-container">

    <form action="" method="post">
        <h3>Register now</h3>
        
        <?php 
        if(isset($error))
        {
            foreach($error as $error)
            {

                echo '<span class="error-msg">'.$error.'</span>';

            };
        };
        ?>

        
        <input type="text" name="name" autocomplete="off" required placeholder="Enter Your Name">
        <input type="text" name="username" autocomplete="off" required placeholder="Enter Your User Name">
        <input type="password" name="password" required placeholder="Enter Your Password">
        <input type="text" name="city" autocomplete="off" required placeholder="Enter Your City">
        
        <textarea name="address" id="" cols="43" rows="5" required placeholder="Enter Your Address"></textarea>
        <input type="email" name="email" autocomplete="off" required placeholder="Enter Your Email">
        <input type="password" name="mobile_no"  autocomplete="off" required placeholder="Enter Your Mobile no.">
        
        <input type="submit" name="submit" value="Register" class="form-btn">
        <p>already have an account? <a href="user_login.php">login now</a></p>
    </form>

    </div>
    <!--footer-->
    <?php
        
        @include "";
        
        
        ?>
   </body>
</html>
