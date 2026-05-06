<?php
session_start();
@include 'config.php';
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
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

    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="bar">
        <div class="sidebar">
            <div class="profile">
                <img src="img/new5.png" alt="">
                <h1>Arogya</h1>
                <h2>Patient Dashboard</h2>
            </div>
            <div class="sidemenu">
                <ul class="bottommenu">
                    <a href="login.php"><li><ion-icon name="log-out-outline" class="icond"></ion-icon>Logout</li></a>
                </ul>

            </div>
        </div>

        <div class="mainbar">
            <div class="topmain">
                <div class="mainh">
                    <h1>All Appointments</h1>
                </div>
            </div>
            <section class="myAppointment">
            <div class="appointment-table">
                <form action="cancel_admin.php" method="post">
                <table>
                    <tr>
                      <th>Patient Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Disease</th>
                      <th>Date and Time</th>
                      <th>Cancel</th>
                      <th>Reports</th>
                      
                    </tr>
                    <?php
                                // $email = $_SESSION['email'];
                                $str2 = "select * from patient"; 
                                $result = mysqli_query($conn, $str2);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                  
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
       

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>                                                    
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
        


</body>
</html>