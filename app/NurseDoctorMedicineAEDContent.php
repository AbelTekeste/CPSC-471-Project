<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `prescription` WHERE `PrescriptionID`='$prescription1'" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row)
	 {  
        echo "<script>alert('Record Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq = "INSERT INTO `prescription`(`PrescriptionID`, `PatientID`, `DrugID`, `Bill`, `dosage`) VALUES ('$prescription1','$PatientID1','$DrugID1','$Price1','$dosage1')";
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
    $sqlq1 = "SELECT * FROM `prescription` WHERE `PrescriptionID`='$prescription2'" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "UPDATE `prescription` SET `PatientID`='$PatientID2',`DrugID`='$DrugID2',`Bill`='$Price2',`dosage`='$dosage1' WHERE `PrescriptionID`='$prescription2'";
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
        <h1>Add Drug</h1>
        <div>
            <label for="prescription">Prescription ID:</label>
            <input type="number" name="prescription1" id="prescription1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID1" name="PatientID1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="ID">Drug ID:</label></label>
            <input type="number" id="DrugID1" name="DrugID1" class="form-control" required autofocus>
        </div>

        <div>
            <label for="Price">Price:</label>
            <input type="text" id="Price1" name="Price1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="dosage">Dosage:</label>
            <input type="text" id="dosage1" name="dosage1" class="form-control" required autofocus >
        </div>
        <button name="Add" type="Add">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
    <h1>Edit Drug</h1>
    <div>
            <label for="prescription">Prescription ID:</label>
            <input type="number" name="prescription2" id="prescription2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="PatientID">Patient ID:</label>
            <input type="text" id="PatientID2" name="PatientID2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="ID">Drug ID:</label></label>
            <input type="number" id="DrugID2" name="DrugID2" class="form-control" required autofocus>
        </div>

        <div>
            <label for="Price">Price:</label>
            <input type="text" id="Price2" name="Price2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="dosage">Dosage:</label>
            <input type="text" id="dosage2" name="dosage2" class="form-control" required autofocus >
        </div>

        <button name="edit" type="Edit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="dost"  >
    <h1>Delete Drug</h1>
        <div>
            <label for="prescription">Prescription ID:</label>
            <input type="number" name="prescription3" id="prescription3" class="form-control" required autofocus>
        </div>
      
        <button name="delete" type="Delete">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>