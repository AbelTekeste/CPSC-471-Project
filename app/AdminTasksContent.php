<?php
include("connection.php");
?>
   
    </main>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tasks List</h1>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Task ID:</th>
              <th scope="col">Employee SSN:</th>
              <th scope="col">Patient ID:</th>
              <th scope="col">Date:</th>
              <th scope="col">Task Type:</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql ="SELECT * FROM tasks";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[TaskID] </td>
                    <td>$rs[EmployeeSSN] </td>
                    <td>$rs[PatientID] </td>
                    <td>$rs[Date] </td>
                    <td>$rs[Type] </td>
                  ";
              }
              ?>
          </tbody>
          
        </table>
      </div>
      <input type="button" value="Add/Edit/Delete" onclick="location='AdminTaskAED.php'" />
    </main>