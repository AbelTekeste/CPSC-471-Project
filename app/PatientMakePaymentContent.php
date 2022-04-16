<?php
session_start();
include("connection.php");
error_reporting(1);
extract($_POST);
 
 if(isset($Edit))
 {
    $sqlq1 = "SELECT * FROM `pays_bills` WHERE `PatientID` = $_SESSION[PatientID] AND `BillID` = $BillID";
	$que1=mysqli_query($con, $sqlq1);
	$row1= mysqli_fetch_array($que1);
	 if($row1)
	 {  
        $newBill = $row1["Amount"] - $payment;
        $sqlq = "UPDATE `pays_bills` SET`Amount` = `$newBill` WHERE `PatientID` = `$_SESSION[PatientID]` AND `BillID` = `$BillID`";
        $que=mysqli_query($con, $sqlq);
        if (mysqli_affected_rows($con) > 0) {
            echo "<script>alert('Record edited successfully')</script>";
          } else {
            echo "<script>alert('Error in editing.')</script>";
          }
        }
	 else
	 {
        echo "<script>alert('Record does not exist.')</script>";
	 }}

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
        <h1>Make Payment</h1>
        <div>
            <label for="BillID">Bill ID:</label>
            <input type="number" id="BillID" name="BillID" class="form-control"  required autofocus >
        </div>
        <div>
            <label for="Payment">How much would you like to pay?</label>
            <input type="number" id="Payment" name="Payment" class="form-control"  required autofocus>
        </div>
        <button name="Edit" type="submit">Pay</button>
        <br>
        <button name="reset" type="reset">Reset</button>
    </form>


</main>
</body>
</html>