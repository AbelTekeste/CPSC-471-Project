<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 
 if(isset($Edit))
 {
    $sqlq1 = "SELECT * FROM `driver` WHERE `SSN` = `$_SESSION[SSN]`";
    $sqlq2 = "SELECT * FROM `employee` WHERE `SSN` = `$_SESSION[SSN]`";
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row1 and $row2)
	 {  
        $sqlq1 = "UPDATE `employee` SET `Contact`=`$contact`,`Address`=`$address` WHERE `SSN`=`$_SESSION[SSN]`";
        $sqlq1 = "UPDATE `driver` SET `LicenceNumber`=`$license`,`VehicleID`=`$vehicleID` WHERE `SSN`=`$_SESSION[SSN]` ";

        if ($con->query($sqlq) === TRUE) {
            echo "<script>alert('Record edited successfully')</script>";
          } else {
            echo "<script>alert('Error in editing.')</script>";
          }
        }
	 else
	 {
        echo "<script>alert('Record does not exist.')</script>";
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

    <form method="put"  >
        <h1>Edit Personal Information</h1>
        <div>
            <label for="Address">Address:</label>
            <input type="text" id="address" name="address" class="form-control"  required autofocus >
        </div>
        <div>
            <label for="Contact">Contact number:</label>
            <input type="text" id="contact" name="contact" class="form-control"  required autofocus>
        </div>
        <div>
            <label for="license">Licence Number:</label>
            <input type="text" id="license" name="license" class="form-control"  required autofocus>
        </div>
        <div>
            <label for="vehicleID">Vehicle ID:</label>
            <input type="text" id="vehicleID" name="vehicleID" class="form-control"  required autofocus>
        </div>
        <button name="edit" type="Edit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>


</main>
</body>
</html>