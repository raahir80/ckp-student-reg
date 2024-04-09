<?php
include("dbConnect.php");


$fetchData = mysqli_query($con, "select * from student");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <div class="card-header">
              
                <div class="col-md-5">
                  <h4>STUDENT DETAILS</h4>
                  <form action="" method ="GET">
                    <div class="input group mb-1">
                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="search data"/>
                        <button class="btn btn-primary">Search</button>
                    </div>
                  </form>
                </div>
              
            </div> 
          </div>  
        </div>
      </div>
    </div>
  </div>
      <div class="card-mt-4">
        <div class="card-body">
          <table class=" table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Registration no</th>
                <th>Full Name</th>
                <th>Mother Name</th>
                <th>GENDER</th>
                <th>BOARD</th>
                <th>CATEGORY</th>
                <th>DOB</th>
                <th>COURSE</th>
                <th>HSC Seat No</th>
                <th>Passing Year</th>
                <th>GUJCET App No</th>
                <th>GUJCET Seat No</th>
                <th>Student Mobile No</th>
                <th>Parents Mobile No</th>
                <th>Email</th>
                <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <?php
                if(isset($_GET['search']))
                {
                  $data = $_GET['search'];
                  $query = "SELECT  * FROM student WHERE CONCAT(regno,surname,name,fname,mname) LIKE '%$data%' ";
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
                        <td><?= $items['board'];?></td>
                        <td><?= $items['category'];?></td>
                        <td><?= date('d/m/o',strtotime($items['dob']));?></td>
                        <td><?= $items['course'];?></td>
                        <td><?= $items['hseatno'];?></td>
                        <td><?= $items['hpassing'];?></td>
                        <td><?= $items['gujappno'];?></td>
                        <td><?= $items['gujseatno'];?></td>
                        <td><?= $items['smobno'];?></td>
                        <td><?= $items['pmobno'];?></td>
                        <td><?= $items['email'];?></td>
                        <td><a href= "generatePDF.php?id=<?php echo $items['regno'] ?>" class="btn btn-primary">Print</td>
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
                }
              ?>
            </tbody>
          </table>

        </div>

      </div>
  </div>
</div>
</body>
</html>