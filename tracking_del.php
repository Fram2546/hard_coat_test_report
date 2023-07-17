<?php 
if(isset($_GET['tk_id'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$tk_id = $_GET['tk_id'];
$stmt = $conn->prepare('DELETE FROM tbl_tracking WHERE tk_id=:tk_id');
$stmt->bindParam(':tk_id', $tk_id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>