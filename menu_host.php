<!DOCTYPE html>
<html lang="en">
<?php $menu = "menu_index";?>
<head>
<?php include("head.php"); ?> 
</head>

  <body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Hard Coat Test Report</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="btn btn-toggle align-items-center rounded collapsed" aria-current="page" href="host.php"><span data-feather="home"></span> Home </a> </li>
          <li class="nav-item"><a class="nav-link" href="option_host.php"> <span data-feather="file" class="align-text-bottom"></span> Option Detail  </a></li>
          <li class="nav-item"><a class="nav-link" href="option_Level_host.php"> <span data-feather="file" class="align-text-bottom"></span> Option Detail Level </a></li>
          <li class="nav-item"><a class="nav-link" href="list_host.php"> <span data-feather="file" class="align-text-bottom"></span>  ACCOUNT </a></li>
      </div> 
    
        <li class="mb-3">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false"><span data-feather="plus-circle" class="align-text-bottom"></span> Data </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li class="nav-item"><a class="nav-link" href="data_host.php"> <span data-feather="plus-circle" class="align-text-bottom"></span> Data Tracking </a></li>
          <li class="nav-item"><a class="nav-link" href="data_tape.php"> <span data-feather="plus-circle" class="align-text-bottom"></span> Data Tape Test </a></li>
          <li class="nav-item"><a class="nav-link" href="data_steel.php"> <span data-feather="plus-circle" class="align-text-bottom"></span> Data Steel Wool </a></li>
          <li class="nav-item"><a class="nav-link" href="data_boling1.php"> <span data-feather="plus-circle" class="align-text-bottom"></span> Data Boling Wate </a></li>
          <li class="nav-item"><a class="nav-link" href="data_tint1.php"> <span data-feather="plus-circle" class="align-text-bottom"></span> Data Tint </a></li>
          
            </ul>
            </div>
        </li>
        </ul>
       

      <h6 class="sidebar-heading justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
    </nav>
</div>






<?php include("foot.php"); ?> 
  </body>
</html>































