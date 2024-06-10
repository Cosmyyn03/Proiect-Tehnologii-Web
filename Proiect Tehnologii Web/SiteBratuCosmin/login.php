<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<section class="header-login">
        <nav>
        <div class="logo">
        <a href="index.html">Fitness.ro</a>
      </div>
           <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="ascundeMeniul()"></i>
            <ul>
                <li><a style="color:black;" href="index.html">ACASĂ</a></li>
                <li><a style="color:black;" href="Descopera-ne.html">DESCOPERĂ-NE</a></li>
                <li><a style="color:black;" href="vreausadevinstudent.html">VREAU SĂ MĂ ANTRENEZ!</a></li>
                <li><a style="color:black;" href="contact.html">CONTACT</a></li>
                

            </ul>
            </div>
            <i style="color:black;"class="fa fa-bars"onclick="arataMeniul()"></i>
        </nav>
       
        
      

   </section>
   

    <div class="container">
<?php
session_start();

  

if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($user)
    {if(password_verify($password, $user["password"]))
        {
            header("Location: index.html");$_SESSION['logged_in'] = true;
            
        }else{echo"<div class='alert alert-danger'>Parola nu este corecta</div>";}

    } else{echo"<div class='alert alert-danger'>Nu exista un cont cu acest Email</div>";}
}


?>


    <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        

        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
        

    </form>
    <div><p>Nu esti inregistrat?</p> <a href="registration.php">Inregistreaza-te aici!</a></div>
    </div>

    
    
</body>
</html>