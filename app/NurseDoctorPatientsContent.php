<?php
session_start();
include("connection.php");
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Patient List</h1>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Patient ID</th>
              <th scope="col">Patient Name</th>
              <th scope="col">Address</th>
              <th scope="col">Contact</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql ="SELECT * FROM patient INNER JOIN takes_care_of ON patient.PatientID = takes_care_of.PatientID WHERE SSN = $_SESSION[SSN]";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[PatientID] </td>
                    <td>$rs[Name] </td>
                    <td>$rs[Contact] </td>
                    <td>$rs[Address] </td>
                  ";
              }
              ?>
                </tbody>
        </table>
      </div>
      <input type="button" value="Add/Delete" onclick="location='NurseDoctorPatientAD.php'" />

    </main>