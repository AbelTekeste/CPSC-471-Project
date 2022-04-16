<?php
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
              <th scope="col">Name</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
              <th scope="col">Username</th>
            </tr>
            <tbody>
            <?php
              $sql ="SELECT * FROM patient";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[PatientID] </td>
                    <td>$rs[Name] </td>
                    <td>$rs[Contact] </td>
                    <td>$rs[Address] </td>
                    <td>$rs[username] </td>
                  ";
              }
              ?>
                </tbody>
        </table>
        <input type="button" value="Add/Edit/Delete" onclick="location='AdminPatientAED.php'" />

      </div>
    </main>