<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = "SELECT * FROM admin where username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$select);

    $row = mysqli_num_rows($result);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        if($row['username'] == $username && $row['password'] == $password)
        {
            $_SESSION['admin_id']=$row['id'];
            header('location:add_products.php');
        }
        
        
    }
    else
    {
        $error[]='incorrect username or password';
        
    }
    
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
                       
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     
                              
                              <li class="nav-item">
                              <div class="dropdown">
                                 <button class="dropbtn active">Login</button>
                                    <div class="dropdown-content">
                                       <a href="admin_login.php">Admin Login</a>
                                       <a href="user_login.php">User login</a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
    </header>
      <div class="form-container">  
      <form action="" method="POST">
            <h3>Admin Login</h3>
            <?php 
            if(isset($error))
            {
                foreach($error as $error)
                {

                    echo '<span class="error-msg">'.$error.'</span>';

                };
            };
            ?>
            <input type="text" name="username" autocomplete="off" required placeholder="Enter Username">
            <br>
            <input type="password" name="password" required placeholder="Enter Password">
            <br>
            <input type="submit" value="login" name="submit" class="form-btn">
            
        </form>    
        </div>
        <!-- footer -->
        <?php
        
        @include "footer.php";
        
        
        ?>
   </body>
</html>
