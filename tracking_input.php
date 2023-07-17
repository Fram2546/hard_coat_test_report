<?php
      if(isset($_GET['tk_id'])){
      include 'condb.php';
      $stmt = $conn->prepare("SELECT* FROM tbl_tracking WHERE tk_id=?");
      $stmt->execute([$_GET['tk_id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
        if($stmt->rowCount() < 1){
            header('Location: index.php');
            exit();
         }
      }//isset
      ?>
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">แก้ไขชื่อผู้ทดสอบ</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="tracking_edit_db.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>เพิ่มข้อมูล Tracking</label>
                        <input type="text" name="tk_name" value="<?= $row['tk_name'];?>"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>เพิ่มข้อมูล Tracking</label>
                        <input type="text" name="tk_name" value="<?= $row['tk_name'];?>"  class="form-control">
                      </div>
                    </div>
                    
        
                  </div>
                  <h5>
                    
                  </h5>
                  <div class="row" align="left"> 
                    <div class="col-sm-6">
                    <input type="Hidden" name="tk_id" value="<?= $row['tk_id'];?>">
                         <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                         <a href="index.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>    
                  </div>              
                </form>
              </div>
              <!-- /.card-body -->
            </div> 


         