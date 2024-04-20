<?php
include("dbConnect.php");


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
 
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="card-header">
                <div class="col-md-12">
                  <h2 align="center"><b>CKPCET D2D STUDENT INQUIRY DETAILS</b></h2>
                </div>
            </div> 
          </div>  
        </div>
      </div>
    </div>  
  </div>
  <a href= "welcome.php" class="btn btn-primary">Go Back</a>
      <div class="card-mt-4">
        <div class="card-body">
          <table id="table" class=" table table-bordered table-striped text-center">
            <thead>
              <tr class="bg-dark text-white">
                <th>Sr.No</th>
                <th>Registration no</th>
                <th>FULL NAME</th>
                <th>MOTHER NAME</th>
                <th>GENDER</th>
                <th>UNIVERSITY</th>
                <th>CATEGORY</th>
                <th>DOB</th>
                <th>COURSE</th>
                <th>Diploma Enroll No</th>
                <th>PASSING YEAR</th>
                <th>CGPA</th>
                <th>AADHAR NO</th>
                <th>Student Mobile No</th>
                <th>Parents Mobile No</th>
                <th>Email</th>
                <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <?php
                
                  $query = "SELECT  * FROM dipstudent";
                  $query_run= mysqli_query($con,$query);
                  if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $items){
                      ?>
                      <tr>
                        <td><?= $items['studid'];?></td>
                        <td><?= $items['regno'];?></td>
                        <td><?= $items['surname']." ".$items['name']." ".$items['fname'];?></td>
                        <td><?= $items['mname'];?></td>
                        <td><?= $items['gender'];?></td>
                        <td><?= $items['university'];?></td>
                        <td><?= $items['category'];?></td>
                        <td><?= date('d/m/o',strtotime($items['dob']));?></td>
                        <td><?= $items['course'];?></td>
                        <td><?= $items['enrolno'];?></td>
                        <td><?= $items['dipyear'];?></td>
                        <td><?= $items['cgpa'];?></td>
                        <td><?= $items['aadhar'];?></td>
                        <td><?= $items['smobno'];?></td>
                        <td><?= $items['pmobno'];?></td>
                        <td><?= $items['email'];?></td>
                        <td><a href= "diplomaPDF.php?id=<?php echo $items['regno'] ?>" class="btn btn-primary">Print</td>
                      </tr>
                      <?php
                    }
                  }
                  else{
                    ?>
                    <tr>
                      <td colspan="1">No Record Found</td>
                    </tr>
                    <?php
                  }
                
              ?>
            </tbody>
          </table>

        </div>

      </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('table').DataTable({
      ordering:false
    });
  })
</script>
</body>

</html>