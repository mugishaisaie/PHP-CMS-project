<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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
        nav ul{
            display: flex;
            justify-content: space-between
        }
        nav ul li {
            list-style: none;
            font-weight: bold;
            text-transform: capitalize
        }
        nav ul li a {
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: capitalize;
            color: #fff;
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
     
        
    </style>

</head>
<body>

<div class="container">
    <form action="" method="post">
        <h3>Signup here</h3>
        <p>Welcome to BEAUTY WAREHOUSE Fill The Form To Create Account</p>
        <div class="form">
            <label for="">Username:</label>
            <input type="text" name="username" required>
        </div>
        <div class="form">
            <label for="">Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="signup">Signup</button>
        <p>If you Have Arleady Account <a href="login.php">Login</a></p>

        <?php
        include 'connection.php';
          if(isset($_POST['signup'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $signup= mysqli_query($conn,"INSERT INTO `users`(`username`, `password`) VALUES ('$username','$password')");
            if($signup){
                echo"<script>alert('Wow Account Created SuccessFully')</script>";
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>

    </form>
</div>
    
</body>
</html>