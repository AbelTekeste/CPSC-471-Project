<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);


 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `takes_care_of` WHERE `SSN` = $_SESSION[SSN]" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row )
	 {  
        echo "<script>alert('Record Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq = "INSERT INTO `takes_care_of`(`SSN`, `PatientID`) VALUES ('$_SESSION[SSN]','$PatientID1')";
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
    $sqlq1 = "SELECT * FROM `takes_care_of` WHERE `SSN` = $_SESSION[SSN]" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "DELETE FROM `takes_care_of` WHERE `SSN` = `$_SESSION[SSN]` AND `PatientID` = `$PatientID3`";
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
        <h1>Add Patient</h1>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID1" name="PatientID1" class="form-control" required autofocus>
        </div>
        <button name="Add" type="Add">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
        <h1>Delete Patient</h1>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID3" name="PatientID3" class="form-control" required autofocus>
        </div>
        <button name="Delete" type="submit">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>