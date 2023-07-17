<!DOCTYPE html>
<html lang="en">
<?php $menu = "steel";?>
<head>
<?php include("head.php"); ?> 
</head>

  <body>
  
 <?php include("menu_index.php"); ?> 

    <<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        

      <section class="content">
          <div class="card card-info">
    
          <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">บันทึกผลการทดสอบ STEEL WOOL</h3>
  </div>
  <div class="card-body">
    <form action="steel_input_db.php" method="POST" enctype="multipart/form-data">
    
    <div class="row">
      <div class="col-sm-4">
          <div class="form-group">
           <h5>รอบ</h5>
            <select name="roundsteel" class="form-control" required>
              <option value="">-เลือกรอบ-</option>
              <?php
              include 'config/db.php';
              $stmt = $conn->prepare("SELECT* FROM round");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <option value="<?= $row['round'];?>"><?= $row['round'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>

      <div class="col-sm-4">
              <div class="form-group">
              <h6>LEVEL</h6>
                <select name="steel" class="form-control" required>
                  <option value="">-เลือกผล LEVEL-</option>
                  <?php
                  include 'config/db.php';
                  $stmt = $conn->prepare("SELECT* FROM steel");
                  $stmt->execute();
                  $result = $stmt->fetchAll();
                  foreach($result as $row) {
                  ?>
                  <option value="<?= $row['steel'];?>"><?= $row['steel'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
   </div>

    <div class="row" >
      <div class="col-sm-4">
          <div class="form-group">
           <h6>ผลการทดสอบ</h6>
            <select name="resultsteel" class="form-control" required>
              <option value="">-เลือกผลทดสอบ-</option>
              <?php
              include 'config/db.php';
              $stmt = $conn->prepare("SELECT* FROM result");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <option value="<?= $row['result'];?>"><?= $row['result'];?></option>
              <?php } ?>
            </select>
          </div>
      </div>
      <div class="col-sm-4">
          <div class="form-group">
           <h6>ผู้ทดสอบ</h6>
            <select name="testersteel" class="form-control"required>
              <option value="">-ผู้ทดสอบ-</option>
              <?php
              include 'config/db.php';
              $stmt = $conn->prepare("SELECT* FROM tester");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <option value="<?= $row['tester'];?>"><?= $row['tester'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
     </div> 

<h2>

</h2>
      <div class="row" align="left">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="index.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>

    </form>
  </div>
</div>
          
        </div>
      </section>

      </div>

      

    </main>
  </div>
</div>

<?php include("foot.php"); ?> 
  </body>
</html>





