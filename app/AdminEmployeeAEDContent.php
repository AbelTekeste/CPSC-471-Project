<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 if(isset($Add))
 {
    $sqlq1 = "SELECT * FROM employee WHERE SSN = $ssn1" ;
    $sqlq2 = "SELECT * FROM employee WHERE username = $username1" ;
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
        $sqlq = "INSERT INTO `employee`(`SSN`, `Name`,`DOB`, `Contact`, `Address`, `username`) VALUES ('$ssn1', '$name1','$dob1', '$contact1', '$address1', '$username1')";
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
    $sqlq2 = "SELECT * FROM employee WHERE username = $username2 AND SSN != $ssn2" ;
	$que1=mysqli_query($con, $sqlq1);
    $que2=mysqli_query($con, $sqlq2);
	$row1= mysqli_fetch_array($que1);
    $row2= mysqli_fetch_array($que2);
	 if($row1)
	 {  
        $sqlq = "UPDATE `employee` SET `Name`='$name2',`DOB`='$dob2',`Contact`='$contact2',`Address`='$address2',`username`='$username2' WHERE `SSN` = '$ssn2'";
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
        <h1>Add Employee</h1>
        <div>
            <label for="SSN">Employee SSN:</label>
            <input type="number" id="ssn1" name="ssn1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="Name">Name:</label>
            <input type="text" name="name1" id="name1" class="form-control" required autofocus>
        </div>
        <div>
            <label for="DOB">Date of Birth:</label>
            <input type="date" id="dob1" name="dob1" class="form-control" required autofocus>
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
        <button name="Add" type="submit">Add</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
        <h1>Edit Employee</h1>
        <div>
            <label for="SSN">Employee SSN:</label>
            <input type="number" id="ssn2" name="ssn2" class="form-control" >
        </div>
        <div>
            <label for="Name">Name:</label>
            <input type="text"name="name2" id="name2" class="form-control">
        </div>
        <div>
            <label for="DOB">Date of Birth:</label>
            <input type="Date" id="dob2" name="dob2" class="form-control" >
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
        <button name="Edit" type="submit">Edit</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>

    <form method="post"  >
        <h1>Delete Employee</h1>
        <div>
            <label for="SSN">Employee SSN:</label>
            <input type="number" id="ssn3" name="ssn3" class="form-control" required autofocus>
        </div>
        <button name="Delete" type="submit">Delete</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>
 
</main>
</body>
</html>