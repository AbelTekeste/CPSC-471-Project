<?php
session_start();
include("connection.php");
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Information</h1>
      </div>
      
      <h2>User Details</h2>
      <table class="table table-condensed table-bordered neutralize">     
        <tbody>
        <?php
        if ($_SESSION["role"] == "Doctor"){
              $sql ="SELECT * FROM employee JOIN doctor ON employee.SSN = doctor.SSN WHERE employee.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                $_SESSION["SSN"] = $rs["SSN"];
                  echo "            <tr>
                  <td><b>SSN: $rs[SSN]</td>
              </tr>
              <tr>
                  <td><b>Name: $rs[Name]</td>
              </tr>
              <tr>
                  <td><b>Birthday: $rs[DOB]</td>
              </tr>
              <tr>
                  <td><b>Address: $rs[Address]</td>
              </tr>
              <tr>
                  <td><b>Contact: $rs[Contact]</td>
              </tr>
              <tr>
                  <td><b>Branch Number: $rs[BranchNumber]</td>
              </tr>
              <tr>
              <td><b>Specialization: $rs[Specialization]</td>
          </tr>
                  ";
              }}
        else{
            $sql ="SELECT * FROM employee JOIN nurse ON employee.SSN = nurse.SSN WHERE employee.username = '$_SESSION[username]'";
              $qsql = mysqli_query($con,$sql);
              while($rs = mysqli_fetch_array($qsql))
              {
                $_SESSION["SSN"] = $rs["SSN"];
                  echo "            <tr>
                  <td><b>SSN: $rs[SSN]</td>
              </tr>
              <tr>
                  <td><b>Name: $rs[Name]</td>
              </tr>
              <tr>
                  <td><b>Birthday: $rs[DOB]</td>
              </tr>
              <tr>
                  <td><b>Address: $rs[Address]</td>
              </tr>
              <tr>
                  <td><b>Contact: $rs[Contact]</td>
              </tr>
              <tr>
              <td><b>Branch Number: $rs[BranchNumber]</td>
            </tr>
                  ";
              }
        }
            ?>
        </tbody>
        </table>
        <input type="button" value="Edit" onclick="location='NurseDoctorProfileEdit.php'" />
      
       
        
    </main>