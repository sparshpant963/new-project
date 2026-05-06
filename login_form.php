<?php
session_start();
@include 'config.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['Name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['Password']);
$cpass = md5($_POST['Cpassword']);
$user_type = $_POST['user_type'];

$select = "SELECT * FROM user_form WHERE email='$email' && password = '$pass' ";

$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result) > 0){
   $row = mysqli_fetch_array($result);
   if($row['user_type']== 'admin'){
    $_SESSION['admin_name']= $row['name'];
    header('location:admin_page.php'); 
   }
   else if($row['user_type']== 'user'){
    $_SESSION['user_name']= $row['name'];
    $_SESSION['email']=$row['email'];
    header('location:user_page.php'); 
   }
}
else{
    $error[] = 'incorrect e-mail or password!';
}

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!--CSS STYLESHEET-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container form">
        <form action="" method="post">
            <h3 class = "label">LOGIN NOW</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="email" required placeholder="Enter Your E-Mail Address" autocomplete="off">
            <input type="password" name="Password" required placeholder="Enter Your Password">
            <input type="submit"name="submit" value="Login" class="form-btn">
            <p>Don't have an Account? <a href="register_form.php">Register now</a></p>
        </form>
    </div>
</body>
</html>