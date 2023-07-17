<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tracking WHERE BatchGenQC = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=data_host.php");
        }
        
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hard Coat Test Report</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'config/db.php';
    $stmt = $conn->prepare(" SELECT* FROM tracking ");
    $stmt->execute();
    $trackings = $stmt->fetchAll();
?>
<?php include("menu_host.php"); ?>  
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <section class="content">
      <div class="container-fluid">

    
      <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Steel Wool </h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_data_host.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-9">
          <input type="text" placeholder="กรอกชื่อที่ต้องการค้น" class="form-control" name="emp_data" required>
        </div>
        <div class="col-3">
          <input type="submit" value="search" class="btn btn-info">
        </div>
      </div>
    </form>
     </div>
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <table class="table" align="center">
            <thead>
                <tr>
                <th scope="col" style="width: 20%;">BatchGenQC</th>
                <th scope="col" style="width: 20%;">roundsteel</th>
                <th scope="col" style="width: 20%;">Level</th>
                <th scope="col" style="width: 20%;">resultsteel</th>
                <th scope="col" style="width: 20%;">testersteel</th>
                              
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM tracking");
                    $stmt->execute();
                    $trackings = $stmt->fetchAll();

                    if (!$trackings) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($trackings as $tracking)  {  
                ?>
                    <tr>
                    <th scope="row"><?php echo $tracking['BatchGenQC']; ?></th>
                        <td><?php echo $tracking['roundsteel']; ?></td>
                        <td><?php echo $tracking['steel']; ?></td>
                        <td><?php echo $tracking['resultsteel']; ?></td>
                        <td><?php echo $tracking['testersteel']; ?></td>
                       
                    
                       
                        </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
</section>
</main>
</div>
</body>
</html>

