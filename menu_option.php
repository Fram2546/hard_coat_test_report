<!DOCTYPE html>
<html lang="en">
<?php $menu = "index";?>
<head>
<?php include("head.php"); ?> 
</head>

  <body>
  

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="btn btn-toggle align-items-center rounded collapsed" aria-current="page" href="index.php"><span data-feather="home"></span> Home</a> </li>
         
        
        <li class="mb-2">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false"><span data-feather="layers"></span> Option Detail</button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li class="nav-item"><a class="nav-link" href="round.php"><span data-feather="bar-chart-2"></span>Round </a> </li>
          <li class="nav-item"><a class="nav-link" href="result.php"><span data-feather="bar-chart-2"></span>Result </a> </li>
          <li class="nav-item"><a class="nav-link" href="tester.php"><span data-feather="bar-chart-2"></span>Tester </a> </li>
          <li class="nav-item"><a class="nav-link" href="abruptly.php"><span data-feather="bar-chart-2"></span>Abruptly </a> </li>
          <li class="nav-item"><a class="nav-link" href="abruptly_ll.php"><span data-feather="bar-chart-2"></span>Abruptly_ll </a> </li>
          <li class="nav-item"><a class="nav-link" href="break.php"><span data-feather="bar-chart-2"></span>Break </a> </li>
          <li class="nav-item"><a class="nav-link" href="break_ll.php"><span data-feather="bar-chart-2"></span>Break_ll </a> </li>
          <li class="nav-item"><a class="nav-link" href="cc.php"><span data-feather="bar-chart-2"></span>CC </a> </li>
          <li class="nav-item"><a class="nav-link" href="cx.php"><span data-feather="bar-chart-2"></span>CX </a> </li>
          
            </ul>
            </div>
        </li>

      <h6 class="sidebar-heading justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
    </nav>

<?php include("foot.php"); ?> 
  </body>
</html>
