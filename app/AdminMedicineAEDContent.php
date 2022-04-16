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
 if(isset($Edit))
 {
    $sqlq1 = "SELECT * FROM employee WHERE SSN = $ssn2" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "UPDATE `medicine` SET `DrugID`=`$DrugID`,`Name`='[value-2]',`Price`='[value-3]',`Expiration`='[value-4]' WHERE `DrugID` = `$DrugID2`";
        if ($con->query($sqlq) === TRUE) {
            echo "<script>alert('Record edited successfully')</script>";
          } else {
            echo "<script>alert('Error in editing.')</script>";
          }
        }
	 else
	 {
        echo "<script>alert('Employee does not exist.')</script>";
	 }
 
 }

 if(isset($Delete))
 {
    $sqlq1 = "SELECT * FROM employee WHERE SSN = $ssn3" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "DELETE FROM `employee` WHERE `SSN` = $ssn3";
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
        <h1>Add Drug</h1>
        <div>
            <label for="DrugID">Drug ID:</label></label>
            <input type="text" id="DrugID1" name="DrugID1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name1" id="name1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Price">Price:</label>
            <input type="text" id="Price1" name="Price1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Expiration">Expiration Date:</label>
            <input type="date" id="Expiration1" name="Expiration1" class="form-control" required autofocus >
        </div>
        <button name="Add" type="Add">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
    <h1>Edit Drug</h1>
        <div>
            <label for="DrugID">Drug ID:</label></label>
            <input type="text" id="DrugID2" name="DrugID2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name2" id="name2" class="form-control" >
        </div>
        <div>
            <label for="Price">Price:</label>
            <input type="text" id="Price2" name="Price2" class="form-control" >
        </div>
        <div>
            <label for="Expiration">Expiration Date:</label>
            <input type="date" id="Expiration2" name="Expiration2" class="form-control" >
        </div>
        <button name="edit" type="Edit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="dost"  >
    <h1>Delete Drug</h1>
        <div>
            <label for="DrugID">Drug ID:</label></label>
            <input type="text" id="DrugID3" name="DrugID3" class="form-control" required autofocus>
        </div>
      
        <button name="delete" type="Delete">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>