<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `deliver` WHERE `PrescriptionID` = `$PrescriptionID1`" ;
    $sqlq2 = "SELECT * FROM `pickup` WHERE `PrescriptionID` = `$PrescriptionID1`" ;
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row or $row2)
	 {  
        echo "<script>alert('Record Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq1 = "INSERT INTO `deliver`(`EmployeeSSN`, `PatientID`, `PrescriptionID`, `DeliveryTime`) VALUES ('$_SESSION[SSN]','$PatientID1','$PrescriptionID1','$Delivery1')";
        $sqlq2 = "INSERT INTO `pickup`(`EmployeeSSN`, `PharmacyID`, `PrescriptionID`, `PickupTime`) VALUES ('$_SESSION[SSN]','$PharmacyID1','$PrescriptionID1','$PickUp1')";
        if (!mysqli_query($con, $sqlq1) or !mysqli_query($con, $sqlq2)) {
            echo "<script>alert('Error in adding.')</script>";
        }
        else{
            echo "<script>alert('Record added successfully')</script>";
        }
          
	 }
 
 }
 if(isset($Edit))
 {
    $sqlq1 = "SELECT * FROM `deliver` WHERE `PrescriptionID` = `$PrescriptionID2` AND `EmployeeSSN`=`$_SESSION[SSN]`" ;
    $sqlq2 = "SELECT * FROM `pickup` WHERE `PrescriptionID` = `$PrescriptionID2` AND `EmployeeSSN`=`$_SESSION[SSN]" ;
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row1 and $row2)
	 {  
        $sqlq3 = "UPDATE `deliver` SET `PatientID`=`$PatientID2`,`DeliveryTime`=`$Delivery2` WHERE `PrescriptionID` = `$PrescriptionID2` AND `EmployeeSSN`=`$_SESSION[SSN]";
        $sqlq4 = "UPDATE `pickup` SET `PharmacyID`=`$PharmacyID2`,`PickupTime`=`$PickUp2` WHERE `PrescriptionID` = `$PrescriptionID2` AND `EmployeeSSN`=`$_SESSION[SSN]";
        if ($con->query($sqlq3) === TRUE and $con->query($sqlq4) === TRUE) {
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

 if(isset($Delete))
 {
    $sqlq1 = "SELECT * FROM `deliver` WHERE `PrescriptionID` = '$PrescriptionID3' AND `EmployeeSSN`='$_SESSION[SSN]'" ;
    $sqlq2 = "SELECT * FROM `pickup` WHERE `PrescriptionID` = '$PrescriptionID3' AND `EmployeeSSN`='$_SESSION[SSN]'" ;
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
    echo "<script>alert('got here')</script>";
	 if($row1 and $row2)
	 {  
        $sqlq2 = "DELETE FROM `pickup` WHERE `PrescriptionID` = '$PrecriptionID3' AND `EmployeeSSN`='$_SESSION[SSN]'";
        $sqlq3 = "DELETE FROM `deliver` WHERE `PrescriptionID` = '$PrecriptionID3' AND `EmployeeSSN`='$_SESSION[SSN]'";
        if ($con->query($sqlq3) === TRUE and $con->query($sqlq4) === TRUE) {
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
        <h1>Add Delivery Information</h1>
        <div>
            <label for="PrescriptionID">Prescription ID:</label>
            <input type="number" id="PrescriptionID1" name="PrescriptionID1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="PateintID">Patient ID:</label>
            <input type="number" name="PatientID1" id="PatientID1" class="form-control" required autofocus>
        </div>

        <div>
            <label for="PharmacyID">Pharmacy ID:</label>
            <input type="number" id="PharmacyID1" name="PharmacyID1" class="form-control" required autofocus >
        </div>
        <div>
            <label for="PickUp">Pick-up time:</label>
            <input type="datetime-local" id="PickUp1" name="PickUp1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Delivery">Delivery time:</label>
            <input type="datetime-local" id="Delivery1" name="Delivery1" class="form-control" required autofocus>
        </div>
        <button name="Add" type="submit">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
    <h1>Edit Delivery Information</h1>
    <div>
            <label for="PrescriptionID">Prescription ID:</label>
            <input type="number" id="PrescriptionID2" name="PrescriptionID2" class="form-control" required autofocus >
        </div>
        <div>
            <label for="PateintID">Pateint ID:</label>
            <input type="number" name="PatientID2" id="PatientID2" class="form-control" >
        </div>

        <div>
            <label for="PharmacyID">Pharmacy ID:</label>
            <input type="number" id="PharmacyID2" name="PharmacyID2" class="form-control" >
        </div>
        <div>
            <label for="PickUp">Pick-up time:</label>
            <input type="datetime-local" id="PickUp2" name="PickUp2" class="form-control">
        </div>
        <div>
            <label for="Delivery">Delivery time:</label>
            <input type="datetime-local" id="Delivery2" name="Delivery2" class="form-control">
        </div>
        <button name="edit" type="submit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
    <h1>Delete Delivery Information</h1>
        <div>
            <label for="SSN">Prescription ID:</label>
            <input type="number" id="PrescriptionID3" name="PrescriptionID3" class="form-control" required autofocus>
        </div>
        <button name="delete" type="submit">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>