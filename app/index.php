<?php
session_start();
include("connection.php");
error_reporting(1);
 extract($_POST);
 if(isset($signIn))
 {
	#echo $user,$pass;
    $sqlq = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
	$que=mysqli_query($con, $sqlq);

	 $row= mysqli_fetch_array($que);
     
	 if($row)
	 {  
         $username = "username";
		$_SESSION['role']=$row["role"];
        $_SESSION["username"] = $row["username"];
        if($row['role']!="")
        {
            if ($row['role'] == "Doctor" || $_row['role'] == "Nurse"){
                echo "<script>window.location='NurseDoctorDash.php'</script>";
            }
            elseif ($row['role'] == "Patient"){
                echo "<script>window.location='PatientDash.php'</script>";
            }
            elseif ($row['role'] == "Pharmacist"){
                echo "<script>window.location='PharmacistDash.php'</script>";
            }
            elseif ($row['role'] == "Admin"){
                echo "<script>window.location='AdminDash.php'</script>";
            }
            elseif ($row['role'] == "Driver"){
                echo "<script>window.location='DriverDash.php'</script>";
            }
        }
		//include('alist.php');
	 }
	 else
	 {
        
	  $err="<span class='glyphicon glyphicon-exclamation-sign' style='color:red'></span> <font color='red'>Invalid admin Login</font>";
	 }
 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
</head>
<body>
<main>
    <form method="post">
        <h1>Log in</h1>
        <div>
            <label for="username">Username:</label>
            <input type="username" id="inputusername" name="user" class="form-control" required autofocus>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="pass" id="inputPassword" class="form-control" required>
        </div>
        <button name="signIn" type="submit">Sign in</button>
    </form>
</main>
</body>
</html>