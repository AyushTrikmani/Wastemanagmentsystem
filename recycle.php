<?php

@include 'config.php';

if(isset($_POST['submit']))
{
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $community = mysqli_real_escape_string($conn, $_POST['community']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $select = "SELECT * FROM disposal where name = '$name'";

    $result = mysqli_query($conn, $select);

    {
        
        $insert = "INSERT INTO disposal(name,contact,community,type,,address,) VALUES('$name','$contact','$community','$type','$address')";
        mysqli_query($conn, $insert);
        header('location:user_login.php');
        
    };
};

?>


<!DOCTYPE html>
<head>
  <title>
    Waste managment system
        </title>
</head>
<body>
   <header>
    Recycle waste!
   </header>
   <div class="form-container">  
    <form action="" method="POST">
      
      Name<input type="text" name="name" autocomplete="off" required placeholder="Enter your name">
      <br>
      Contact<input type="text" name="contact" required placeholder="Enter your contact">
      <br>
 
    <label for="dropdown">Select a community:</label>
    <select id="community" name="community">
        <option value="apple">Household</option>
        <option value="banana">Industry</option>
        <option value="cherry">Market</option>
        <option value="orange">Office</option>
       
    </select> </br>
    <label for="dropdown">Select type of waste</label>
    <select id="type" name="type">
        <option value="apple">Glass</option>
        <option value="banana">Paper</option>
        <option value="cherry">Plastic</option>
        <option value="orange">Organic</option>
       
    </select> </br>
   
     Address <input type="text" name="address" required placeholder="Enter your Address">
      <br>

        

      <br>
      
      <input type="submit" value="Submit" name="submit"  class="form-btn">
  
      
  </form>    
  </div>
  </body>

</html>