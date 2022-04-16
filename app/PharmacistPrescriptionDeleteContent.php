<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `medicine` WHERE `DrugID` = `$DrugID`" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row)
	 {  
        echo "<script>alert('Employee or Username Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq = "INSERT INTO `medicine`(`DrugID`, `Name`, `Price`, `Expiration`) VALUES (`$DrugID`,`$name2`,`$Price1`,`$Expiration1`)";
        if (!mysqli_query($con, $sqlq)) {
            echo "<script>alert('Error in editing.')</script>";
        }
        else{
            echo "<script>alert('Record added successfully')</script>";
        }
          
	 }
 
 }


 if(isset($Delete))
 {
    $sqlq1 = "SELECT * FROM `prescription` WHERE `PrescriptionID`='$prescription3'" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "DELETE FROM `prescription` WHERE `PrescriptionID`='$prescription3'";
        if ($con->query($sqlq) === TRUE) {
            echo "<script>alert('Record deleted successfully')</script>";
          } else {
            echo "<script>alert('Error in deletion.')</script>";
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

    <form method="post"  >
    <h1>Delete Prescription</h1>
        <div>
            <label for="PrescriptionID">Prescription ID</label></label></label>
            <input type="text" id="PrescriptionID3" name="PrescriptionID3" class="form-control" required autofocus>
        </div>
      
        <button name="delete" type="Delete">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>