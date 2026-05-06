<?php
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
    $error[] = 'user already exist!';
}
else{
    if($pass!=$cpass){
        $error[] = 'Incorrect Password!';
    }else{
        $insert = "INSERT INTO user_form(name, email,password,user_type)VALUES('$name','$email','$pass','$user_type')";
        mysqli_query($conn, $insert);
        header('location:login_form.php');
    }
}
$email = "example@example.com";

if (!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $email)) {
    echo "Invalid email format";
} else {
    echo "Valid email format";
}


};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <!--CSS STYLESHEET-->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container form">
        <form action="" method="post">
            <h3 class = "label">REGISTER NOW</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="Name" required placeholder="Enter Your Name"autocomplete="off">
            <input type="text" name="email" required placeholder="Enter Your E-Mail"autocomplete="off">
            <input type="password" name="Password" required placeholder="Enter Your Password">
            <input type="password" name="Cpassword" required placeholder="Confirm Your Password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit"name="submit" value="Register Now" class="form-btn">
            <p>Already have an Account? <a href="login_form.php">Login</a></p>
        </form>
    </div>
</body>
</html>