<?php
session_start();
include("connection.php");
?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Patient Information</h1>
      </div>
      
      <h2>User Details</h2>
      <table class="table table-condensed table-bordered neutralize">     
        <tbody>
        <?php
              $sql ="SELECT * FROM patient WHERE patient.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                $_SESSION["PatientID"] = $rs['PatientID'];
                  echo "            <tr>
                  <td><b>Patient ID: $rs[PatientID]</td>
              </tr>
              <tr>
                  <td><b>Name: $rs[Name]</td>
              </tr>
              <tr>
                  <td><b>Address: $rs[Address]</td>
              </tr>
              <tr>
                  <td><b>Contact: $rs[Contact]</td>
              </tr>
                  ";
              }
            ?>
        </tbody>
        </table>
        <input type="button" value="Edit" onclick="location='PatientProfileEdit.php'" />
      
        <h2>Covid Status</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Test ID#</th>
              <th scope="col">Covid Type</th>
              <th scope="col">Quarantine Start Date</th>
              <th scope="col">Quarantine End Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql ="SELECT * FROM has_covid INNER JOIN patient ON has_covid.PatientID = patient.PatientID WHERE patient.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[TestID] </td>
                    <td>$rs[Type] </td>
                    <td>$rs[QuarantineStart] </td>
                    <td>$rs[QuarantineEnd] </td>
                  ";
              }
              ?>
                </tbody>
        </table>

        <h2>Bill Payments</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Bill ID#</th>
              <th scope="col">Bill Amount($)</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql ="SELECT * FROM pays_bills INNER JOIN patient ON pays_bills.PatientID = patient.PatientID WHERE patient.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[BillID] </td>
                    <td>$rs[Amount] </td>
                  ";
              }
              ?>
                </tbody>
          <tbody>
            
          </tbody>
        </table>
        <input type="button" value="Make Payment" onclick="location='PatientMakePayment.php'" />
      
        <h2>Appointments</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Employee ID#</th>
              <th scope="col">Reason</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql ="SELECT * FROM tasks INNER JOIN patient ON tasks.PatientID = patient.PatientID WHERE patient.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[EmployeeSSN] </td>
                    <td>$rs[Type] </td>
                    <td>$rs[Date] </td>
                  ";
              }
              ?>
                </tbody>
        </table>
        
    </main>