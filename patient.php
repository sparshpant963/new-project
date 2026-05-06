<?php
session_start();
@include 'config.php';
if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['name']);
$mno = mysqli_real_escape_string($conn, $_POST['mno']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$disease = mysqli_real_escape_string($conn, $_POST['disease']);
$doctor_name = $_POST['doctor_name'];

        $insert = "INSERT INTO patient(name,mno,email,date,disease,doctor_name) VALUES('$name','$mno','$email','$date','$disease','$doctor_name')";
        mysqli_query($conn, $insert);
         header('location:confirm.php');
    
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Appointment Form</title>
    <link rel="stylesheet" href="css/form.css" />
  </head>
  <body>
    <main>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Book Appointment</h3>
        <input class="field" type="text" name="name" id="fullName" placeholder="Enter Full Name"autocomplete="off" required/>
        <input class="field" type="tel" name="mno" id="mobileNumber" placeholder="Enter Mobile Number"autocomplete="off" required/>
        <input  class="field" type="email" name="email" id="" placeholder="Enter Email Address" autocomplete="off"/>
        <input class="field" type="datetime-local" name="date" id="date" placeholder="Appointment Date"autocomplete="off" required/>
        <div class="About Disease">
          <input  class="field" type="text" name="symptoms" id="" required placeholder="Enter Symptoms"autocomplete="off" />
          <select name="doctor_name">
          <option>Dr Z S Meharwal(MBBS,MS)</option>
      <option>Dr YK Mishra(MBBS,MS)</option>
      <option>Dr. Ramesh Sarin(Women Specialist)</option>
      <option>Dr. Krishna S Iyer(MBBS,MS,MCh)</option>
            </select>
        </div>
        <br>
        <br>
        <input class="submit" type="submit" name="submit" value="Book Appointment">
      </form>
    </main>
  </body>
</html>