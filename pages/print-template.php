<?php
include '../modules/profile-edit.php';
include '../modules/db_connect.php';

// Take additional information separately
$empid = $_POST['employee-id'];
$readQuery = "SELECT additional_info FROM employee WHERE employee_id=$empid";
$res = mysqli_query($con,$readQuery);
$data = mysqli_fetch_assoc($res);

$empName = $_POST['employee-name'];
$empEmail = $_POST['email-address'];
$empPhone = $_POST['phone-number'];
$empDob = $_POST['date-of-birth'];
$empGen = $_POST['gender-list'];
$empDiv = $_POST['division-list'];
$imgDir = $_POST['current-photo'];
$additionalInfo = $data['additional_info'];

$img = explode('../',$imgDir);
if(count($img) > 2) {
  $imgDir = "../".$img[2];
}
else {
  $imgDir = "../".$img[1];
}

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/css/print-template.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <section class="panel panel-default">
        <div class="panel-body">
          <article class="panel-body">
            <figure class="text-center">
              <?php echo "<img src='$imgDir' class='img-thumbnail img-circle img-responsive'>";?>
            </figure>
          </article>
          <br>
          <article>
            <h4>
            <strong>Personal Information</strong>
            </h4>
            <hr>
            <dl class="dl-horizontal">
              <dt>Name:</dt>
              <dd><?php echo "$empName"; ?></dd>  
              <dt>Date of Birth:</dt>
              <dd><?php echo $empDob; ?></dd>
              <dt>Gender:</dt>
              <dd><?php echo $empGen; ?></dd>
              <dt>Phone Number:</dt>
              <dd><?php echo $empPhone; ?></dd>
              <dt>Email Address:</dt>
              <dd><?php echo $empEmail;?></dd>
              <dt>Division:</dt>
              <dd><?php echo $empDiv; ?></dd>
              <dt>Employee ID:</dt>
              <dd><?php echo $empid; ?></dd>
            </dl>
          </article>
          <article>
            <h4>
            <strong>Additional Information</strong>
            </h4>
            <hr>
            <dl class="dl-horizontal">
             
              <dl><?php echo $additionalInfo;?></dl>
            </dl>
        
          </article>
        </div>
      </section>
    </div>
  </div>
</div>
<script>
  window.print();
</script>
