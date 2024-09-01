<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
     <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100vh;
            font-family: sans-serif;
            margin: 0 auto;
            background-color: #edd8f2;
        }
        nav{
            width: 100%;
            height: 4rem;
            background-color: #4a4ac0;
            
        }
       a{
        font-size: 1.4rem;
       }

        p{
            margin: .4rem 1rem;
            font-size: 1.3rem;
            text-transform: capitalize
        }

        form{
            width: 70vw;
            margin: 1rem 14rem;
        }
        input{
            padding: .4rem 1rem;
            margin: 1rem;
            border: none;
            border-radius: 7px;
        }

        h2{
            text-align: center;
            text-transform: capitalize;
            font-size: 1.3rem;
            margin: 1rem;
        }
        button{
            padding: 9px 18px;
            font-size: 1.4rem;
            font-weight: bold;
            color: #fff;
            background-color: #4a4ac0;
            border: none;
            border-radius: 9px;
            margin: 2rem;
            cursor: pointer;
        }
    strong{
        color: red;
        position: absolute;
        top: 120px;
        right: 20rem;

    }
        
    </style>
</head>
<body>

<div class="container">
    <form action="" method="post">
        <h3>Login here</h3>
        <p> Fill The Form To Browse Beauty WAREHOUSE </p>
        <div class="form">
            <label for="">Username:</label>
            <input type="text" name="username">
        </div>
        <div class="form">
            <label for="">Password:</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="login">Login</button>
        <p>If you Don't Have Account <a href="signup.php">Signup</a></p>

        <?php
        include 'connection.php';
          if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $login= mysqli_query($conn,"SELECT *fROM  `users` WHERE`username`='$username' AND `password`='$password'");

            IF(mysqli_num_rows($login)>0){
                $fetch= mysqli_fetch_assoc($login);
                session_start();
                $_SESSION['username']= $fetch['username'];
                echo"<script>alert('Welcome Login SuccessFully')</script>";
                header("location:products/product.php");
            }else{
                echo"<strong>Invalid UserName or Password</strong>";
            }
            

          }
                ?>

    </form>
</div>
    
</body>
</html>