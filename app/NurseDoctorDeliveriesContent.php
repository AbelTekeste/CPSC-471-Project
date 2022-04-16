<?php
session_start();
include("connection.php");
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Prescription Deliveries</h1>
      </div>
      
      <div class="table-responsive">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Patient ID</th>
              <th scope="col">Prescription ID</th>
              <th scope="col">Pharmacy ID</th>
              <th scope="col">Pick-Up Time</th>
              <th scope="col">Delivery Time</th>
            </tr>
          <tbody>

          <?php
              $sql ="SELECT * FROM deliver INNER JOIN pickup on deliver.PrescriptionID = pickup.PrescriptionID";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[PatientID] </td>
                    <td>$rs[PrescriptionID] </td>
                    <td>$rs[PharmacyID] </td>
                    <td>$rs[PickupTime] </td>
                    <td>$rs[DeliveryTime] </td>
                  ";
              }
              ?>
          </tbody>
          
        </table>
      </div>
    </main>