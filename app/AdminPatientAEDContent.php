<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `patient` WHERE `PatientID` = `$PatientID1`" ;
    $sqlq2 = "SELECT * FROM `patient` WHERE username = $username2" ;
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row or $row2)
	 {  
        echo "<script>alert('Employee or Username Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq = "INSERT INTO `patient`(`PatientID`, `Name`, `Contact`, `Address`, `username`) VALUES (`$PatientID1`,`$name1`,`$contact1`,`$address1`,`$username1`)";
        if (!mysqli_query($con, $sqlq)) {
            echo "<script>alert('Error in editing.')</script>";
        }
        else{
            echo "<script>alert('Record added successfully')</script>";
        }
          
	 }
 
 }
 if(isset($Edit))
 {
    $sqlq1 = "SELECT * FROM `patient` WHERE `PatientID` = `$PatientID2`";
    $sqlq2 = "SELECT * FROM `patient` WHERE `username` = `$username2` AND `PatientID` != `$PatientID2`";
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row1)
	 {  
        $sqlq = "UPDATE `patient` SET `Name`=`$name2`,`Contact`=`$contact2`,`Address`=`$address2`,`username`=`$username2` WHERE `PatientID` = `$PatientID2`";
        if ($con->query($sqlq) === TRUE) {
            echo "<script>alert('Record edited successfully')</script>";
          } else {
            echo "<script>alert('Error in editing.')</script>";
          }
        }
    elseif($row2){
        echo "<script>alert('username already exists, pick a new one')</script>";
    }
	 else
	 {
        echo "<script>alert('Employee does not exist.')</script>";
	 }
 
 }

 if(isset($Delete))
 {
    $sqlq1 = "SELECT * FROM `patient` WHERE `PatientID` = `$PatientID3`" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "DELETE FROM `patient` WHERE `PatientID` = `$PatientID3`";
        if ($con->query($sqlq) === TRUE) {
            echo "<script>alert('Record deleted successfully')</script>";
          } else {
            echo "<script>alert('Error in deletion.')</script>";
          }
        }	 
	 else
	 {
        echo "<script>alert('Employee does not exist.')</script>";
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

    <form method="post"  >
        <h1>Add Pateint</h1>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID1" name="PatientID1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="name1" id="name1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Contact">Contact number:</label>
            <input type="text" id="contact1" name="contact1" class="form-control" required autofocus >
        </div>
        <div>
            <label for="Address">Address:</label>
            <input type="text" id="address1" name="address1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Username">Username:</label>
            <input type="text" id="username1" name="username1" class="form-control" required autofocus>
        </div>
        <button name="Add" type="Add">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="put"  >
        <h1>Edit Pateint</h1>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID2" name="PatientID2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Name">Name:</label>
            <input type="text"name="name2" id="name2" class="form-control">
        </div>
        <div>
            <label for="Contact">Contact number:</label>
            <input type="text" id="contact2" name="contact2" class="form-control" >
        </div>
        <div>
            <label for="Address">Address:</label>
            <input type="text" id="address2" name="address2" class="form-control" >
        </div>
        <div>
            <label for="Username">Username:</label>
            <input type="text" id="username2" name="username2" class="form-control" >
        </div>
        <button name="edit" type="Edit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="delete"  >
        <h1>Delete Patient</h1>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID3" name="PatientID3" class="form-control" required autofocus>
        </div>
        <button name="delete" type="Delete">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>