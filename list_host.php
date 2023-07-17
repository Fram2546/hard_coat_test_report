<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM users WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=list_host.php");
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BS5</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php include("menu_host.php"); ?> 
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-6">
      <section class="content">
      <div class="container-fluid">

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" required class="form-control" name="firstname">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="col-form-label">Last Name:</label>
                    <input type="text" required class="form-control" name="lastname">
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label">email:</label>
                    <input type="email" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">password:</label>
                    <input type="text" required class="form-control" name="password">
                </div>
                <div class="form-group">
        <label for="urole">ระดับผู้ใช้งาน <i class='bx bxs-user-pin'></i></label>
        <select name="urole" class="form-control" required>
          <option value="">--เลือกระดับผู้ใช้งาน--</option>
          <option value="host">host</option>
          <option value="admin">admin</option>
          <option value="user">user</option>
          <option value="qp">qp</option>
        </select>
      </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
    
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูลสมาชิก</h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_host.php" class="form-group my-3" method="POST">
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

        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                        <th scope="col" style="width: 0%;">ID</th>
                        <th scope="col" style="width: 20%;">ชื่อ</th>
                        <th scope="col" style="width: 20%;">นามสกุล</th>
                        <th scope="col" style="width: 20%;">Email</th>
                        <th scope="col" style="width: 15%;">ระดับ</th>
                        <th scope="col" style="width: 15%;">เวลาสมัคร</th>
            
                </tr>
            </thead>
            <tbody  align="center" >
                <?php 
                    $stmt = $conn->query("SELECT * FROM users");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($users as $user)  {  
                ?>
                    <tr>
                        <th scope="id"><?php echo $user['id']; ?></th>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['urole']; ?></td>
                        <td><?php echo $user['created_at']; ?></td>
                        
                        
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
             <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add User</button>
            </div> 
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
</section>
    </main>
  </div>
   
</body>
</html>
