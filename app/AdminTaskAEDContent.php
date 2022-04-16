<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM `tasks` WHERE `TaskID`=`$TaskID1`" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        echo "<script>alert('Record Exists Already')</script>";
        
	 }
	 else
	 {
        $sqlq = "INSERT INTO `tasks`(`TaskID`, `EmployeeSSN`, `PatientID`, `Date`, `Type`) VALUES (`$TaskID1`,`$ssn1`,`$PatientID1`,`$Type1`,'[value-5]')";
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
    $sqlq1 = "SELECT * FROM `tasks` WHERE `TaskID`=`$TaskID2`" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "UPDATE `tasks` SET `EmployeeSSN`=`$ssn2`,`PatientID`=`$PatientID2`,`Date`=`$Date2`,`Type`=`$Type2` WHERE `TaskID`=`$TaskID2`";
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
    $sqlq1 = "SELECT * FROM `tasks` WHERE `TaskID`=`$TaskID3`" ;
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $sqlq = "DELETE FROM `tasks` WHERE `TaskID`=`$TaskID3`";
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
        <h1>Add Task</h1>
        <div>
            <label for="TaskID">Task ID:</label>
            <input type="number" name="TaskID1" id="TaskID1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="SSN">Employee SSN:</label>
            <input type="number" id="ssn1" name="ssn1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="PatientID" >Patient ID</label>
            <input type="number" id="PatientID1" name="PatientID1" class="form-control"required autofocus >
        </div>
        <div>
            <label for="Date">Date:</label>
            <input type="Date" id="Date1" name="Date1" class="form-control"required autofocus >
        </div>
        <div>
            <label for="Type">Type:</label>
            <input type="text" id="Type1" name="Type1" class="form-control"required autofocus>
        </div>
        <button name="Add" type="submit">Add</button>
    </form>

    <form method="post"  >
        <h1>Edit Task</h1>
        <div>
            <label for="TaskID">Task ID:</label>
            <input type="number" name="TaskID2" id="TaskID2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="SSN">Employee SSN:</label>
            <input type="number" id="ssn2" name="ssn2" class="form-control" required autofocus>
        </div>
        <div>
            <label for="PatientID" >Patient ID</label>
            <input type="number" id="PatientID2" name="PatientID2" class="form-control"required autofocus >
        </div>
        <div>
            <label for="Date">Date:</label>
            <input type="Date" id="Date2" name="Date2" class="form-control"required autofocus >
        </div>
        <div>
            <label for="Type">Type:</label>
            <input type="text" id="Type2" name="Type2" class="form-control"required autofocus>
        </div>
        <button name="edit" type="submit">Edit</button>
    </form>

    <form method="post"  >
        <h1>Delete Employee</h1>
        <div>
            <label for="TaskID">Task ID:</label>
            <input type="number" name="TaskID3" id="TaskID3" class="form-control" required autofocus>
        </div>
        <button name="delete" type="submit">Delete</button>
    </form>
 
</main>
</body>
</html>