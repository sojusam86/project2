<?php
    $insert=false;
    if(isset($_POST['name'])){
       
    $server = "localhost";
    $username="root";
    $password="";
    $con = mysqli_connect($server,$username,$password);
    if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo"sucess connecting to the db";
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email =$_POST['email'];
    $phone =$_POST['phone']; 
    $desc =$_POST['desc']; 
    $sql= "INSERT INTO  `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', 'current_timestamp()'); ";
    //echo $sql;
    if($con->query($sql) == true){
        $insert=true;
        //echo"sucessfully inserted";

    }
    else{
        echo"ERROR:$sql<br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>welcome to travel</title>
    
</head>
<body>
    <img class="bg"src="bg.jpg" alt="bgimage">
<div class="container">
    <h1>Welcome to Travel form</h1>
    <p> Enter the details and submit the form 
        to confirm the participation in the trip</p>
        <?php 
          if ($insert == true){
          echo "<p class='substring'>Thanks for submitting this form to confirm </p>";
        }
          ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other information here">
            </textarea> 
            <button class="btn">Submit</button>
            
        </form>
        
</div>
    <script src="index.js"></script>
</body>
</html>