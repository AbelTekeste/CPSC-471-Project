<?php
include("connection.php");
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employees</h1>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Emplopyee SSN</th>
              <th scope="col">Name</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Contact</th>
              <th scope="col">Address</th>
              <th scope="col">Role</th>
            </tr>
            <tbody>
            <?php
              $sql ="SELECT * FROM employee INNER JOIN users on employee.username = users.username";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                  echo "<tr>
                    <td>$rs[SSN] </td>
                    <td>$rs[Name] </td>
                    <td>$rs[DOB] </td>
                    <td>$rs[Contact] </td>
                    <td>$rs[Address] </td>
                    <td>$rs[role] </td>
                  ";
              }
              ?>
                </tbody>
          </tbody>
        </table>
      <input type="button" value="Add/Edit/Delete" onclick="location='AdminEmployeeAED.php'" />
      </div>
    </main>