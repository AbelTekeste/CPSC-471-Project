<?php
session_start();
include("connection.php");
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Medicine List</h1>
      </div>
      
        <h2> Prescription Info</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Prescription ID</th>
              <th scope="col">Drug ID</th>
              <th scope="col">Dosage</th>
              <th scope="col">Bill Total</th>
            </tr>
            <?php
              $sql ="SELECT * FROM prescription INNER JOIN patient on patient.PatientID = prescription.PatientID WHERE patient.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[PrescriptionID] </td>
                    <td>$rs[DrugID] </td>
                    <td>$rs[dosage] </td>
                    <td>$rs[Bill] </td>
                  ";
              }
              ?>
          </tbody>
        </table>

      </div>

      </div>
    </main>