<?php
if(isset($_GET['act'])){
	if($_GET['act']== 'excel'){
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=export.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
        
		<meta charset="utf-8">
		<title>devbanban</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
               <?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_tracking");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
			
        <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info"align="center">
  
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 50%;">Tracking code</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">TAPE TEST</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">STEEL WOOL</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">BOILING WATER</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
         
      </tr>
    </thead>
    <tbody align="center">
       <?php foreach ($result as $row_rm) { ?>  
      <tr>
    
        <td>
         <?php echo $row_rm ['tk_name']; ?>
        </td>

        <td>         
          <a class="btn btn-success btn-flat btn-sm" href="tape_input.php">
          TAPE TEST
          </a>
        </td>    

        <td>         
          <a class="btn btn-info btn-flat btn-sm" href="steel_input.php">
          STEEL WOOL
          </a>
        </td>    

        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="boiling_input.php">
          BOILING WATER
          </a>
        </td>  
        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="tracking_del.php?act=dle&tk_id=<?php echo $row_rm['tk_id']; ?>"
          onclick = "return confirm('ยืนยันการลบข้อมูล ! ');">
           ลบ
          </a>
        </td>  
     


         <?php } ?>  
      </tr>
    </tbody>
  </table>
	</body>
</html>