<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Arogya | patient | My Appointment</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/queries.css">
        <style>
            body{
                background-color: #F5F7FA;
            }
        </style>
    </head>
    <body>
        <!-- nav bar-->
        <header class="navbar">
            <div class="logo">
            <a href="user_page.php"><h2>AROGYA</h2></a>
            </div>
            <div class="navmanu">
                <ul>
                <a href="">Hello <span>  <?php echo $_SESSION['user_name']?></span></a>
                    <a href="user_page.php"><li><ion-icon name="" class="iconp"></ion-icon>HOME</li></a>
                    <a href="login_form.php"><li><ion-icon name="log-out-outline" class="iconp"></ion-icon>LOGOUT</li></a>
                </ul>
            </div>
        </header>
        <section class="myAppointment">

            <h1>My Appointments <span id="demo"></span></h1>
            <div class="appointment-table">
                <form action="cancel.php" method="post">
                <table>
                    <tr>
                      <th>Doctor's Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Disease</th>
                      <th>Date and Time</th>
                      <th>Cancel</th>
                      <th>Reports</th>
                      
                    </tr>
                    <?php
                                $email = $_SESSION['email'];
                                $str2 = "select * from patient where email = '$email'"; 
                                $result = mysqli_query($conn, $str2);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        // $_SESSION['book_id'] = $row['book_id'];
                                        echo "<tbody>
                                        
                                        <tr>" .
                                            "<td>" . $row['doctor_name'] . "</td>" .
                                            "<td>" . $row['mno'] . "</td>" .
                                            "<td>" . $row['email'] . "</td>" .
                                            "<td>" . $row['disease'] . "</td>" .
                                            "<td>" . $row['date'] . "</td>" .
                                            "<td>     <input type='submit' name='submit' value='cancel'></td>
                                            <td><a href='preport.html'><ion-icon name='eye' class='view-icon'></ion-icon></a></td>".
                                            " </tr>
                                    </tbody>";
                                    
                                    } 
                                }
                                
                                ?>
                   
                </table>
                </form>

            </div>
        
        </section>
       

    
        

        <!-- footer -->

        <footer class="footer">
            <div class="footcontent">
                <div class="footcon">
                    

                <div class="footcon">
                    
                    <ul>
                        <li class="foothead">Social</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Linkeden</li>
                        <li>Youtube</li>
                        <li>Github</li>
                    </ul>
                </div>
            </div>
            <div class="footbottom">
                <h1>Arogya</h1>
                <p>Copyright © 2023, Arogya All rights reserved.</p>
            </div>
        </footer>


        <!-- javascript -->
       

        <script>
            function myFunction() {
              var txt;
              if (confirm("Delete Appointment!")) {
                alert("Appointment Deleted");
              } else {
                txt = "";
              }
              document.getElementById("demo").innerHTML = txt;
            }
        </script>



        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

    </body>
</html>