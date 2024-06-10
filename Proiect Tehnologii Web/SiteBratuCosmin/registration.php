<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
                <li><a style="color:black;" href="vreausamaantrenez.html">VREAU SĂ MĂ ANTRENEZ!</a></li>
                <li><a style="color:black;" href="contact.html">CONTACT</a></li>
                

            </ul>
            </div>
            <i style="color:black;"class="fa fa-bars"onclick="arataMeniul()"></i>
        </nav>
       
        
      

   </section>



    <div class="container">
        <?php
        if(isset($_POST["submit"]))
        { $fullName = $_POST["fullname"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $passwordRepeat = $_POST["repeat_password"];
         $passwordHash = password_hash($password,PASSWORD_DEFAULT);

         

          $errors = array();
          if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat) )
          {
            array_push($errors,"Nu ai completat tot");
          }
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Nu ai completat email-ul!");

          }
          if(strlen($password)<8)
          {
            array_push($errors,"Parola trebuia sa aiba minim 8 caractere!");
          }
          if($password!==$passwordRepeat)
          {
            array_push($errors,"Parola nu se potriveste!");
          }
          
          require_once "database.php";
          $sql = "SELECT * FROM users WHERE email = '$email'";
          $result = mysqli_query($conn, $sql);
          $rowCount = mysqli_num_rows($result);
          if($rowCount>0)
          {array_push($errors,"Exista un cont cu acest email!");

          }
          
          if(count($errors)>0)
             foreach($errors as $error)
             {echo "<div class='alert alert-danger'>$error</div>";

             } else {
                require_once "database.php";
                $sql = "INSERT INTO users(full_name,email,password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt= mysqli_stmt_prepare($stmt,$sql);
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"sss",$fullName,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-succes'>You are registered successfully.</div>";
                } else{die("Something went wrong");

                }

             }

        }
        ?>


        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            
            <div class="form-group">
                <input type="email"class="form-control" name="email" placeholder="Email:">
            </div>

            <div class="form-group">
                <input type="password"class="form-control" name="password" placeholder="Password:">
            </div>

            <div class="form-group">
                <input type="text"class="form-control"name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit"class="btn btn-primary"value="Register" name="submit">
            </div>

        </form>
        <div><p>Esti inregistrat?</p> <a href="login.php">Logheaza-te aici!</a></div>
    </div>
</body>
</html>