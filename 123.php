
<!DOCTYPE html>
<html>

<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
td{
    font-weight: bold;
}
</style>
<body>
    <!-- refresh F5 bra bra -->
      <div class="container-fluid">
      
    <nav class="mb-4">

      <!-- Sidebar Toggle (Topbar) -->


      <!-- Topbar Search -->

      <!-- Topbar Navbar -->


    </nav>
    <div class="row">
      <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 20px;">
                  Phase</div>
                <div class="h2 mb-0 font-weight-bold text-gray-800" >7</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    

 

      <!-- Daily -->
      <div class="col-xl-5 col-md-3 mb-4">
        <div class="card border-left-info shadow h-100 ">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">

                <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 20px;">Yield NC Daily
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                      <!-- Daily -->
                  <style>#test1{color : red;}</style> <div id='test1' class='h2 mb-0 mr-3 font-weight-bold '>92%</div> </div>   <div class='col'>  <div class='progress progress-sm mr-2'> <div class='progress-bar bg-info' role='progressbar' style='width:92%'  aria-valuenow='92%'aria-valuemin='0' aria-valuemax='100'> </div>                     <!-- Daily -->

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Weekly -->
      <div class="col-xl-5 col-md-6 mb-4">
        <div class="card shadow h-100 " style="border-left-color: #2471A3  ;border-left-width: 4px; ">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold  text-uppercase mb-1" style="font-size: 20px;color:#2471A3;">Yield NC Weekly
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                  <style>#test2{color : red;}</style> <div id='test2'class='h2 mb-0 mr-3 font-weight-bold '>89%</div> </div>   <div class='col'>  <div class='progress progress-sm mr-2'> <div class='progress-bar ' role='progressbar' style='width:89%;background-color:#2471A3;'  aria-valuenow='92%'aria-valuemin='0' aria-valuemax='100'> </div>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Table here -->
  <div class="container-fluid">
    <!-- Table here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Phase 7 (OS)</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" style="color:#515A5A;border-collapse:collapse;border: 1px solid black;table-layout: fixed;width: 100%" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Plan Date</th>
                <th>AS</th>
                <th>FIL</th>
                <th>CL</th>
                <th>DM</th>
                <th>ED</th>
                <th>QCN</th>
                <th>Remain PSNo</th>
              </tr>
            </thead>
          
            <tbody>
              
              <tr><td>2023-06-15</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:green'>99%</td><td>1</td></tr><tr><td>2023-06-16</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td></td></tr><tr><td>2023-06-17</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td></td></tr><tr><td>2023-06-19</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td></td></tr><tr><td>2023-06-20</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>48%</td><td>157</td></tr><tr><td>2023-06-21</td><td style='color:red'>0%</td><td style='color:green'>100%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>0%</td><td style='color:red'>2%</td><td>299</td></tr><tr><td style='background-color:#D4E6F1;'>2023-06-22</td><td style='background-color:#D4E6F1;'>0%</td><td style='background-color:#D4E6F1;'>4%</td><td style='background-color:#D4E6F1;'>0%</td><td style='background-color:#D4E6F1;'>0%</td><td style='background-color:#D4E6F1;'>0%</td><td style='background-color:#D4E6F1;'>0%</td><td style='background-color:#D4E6F1;'>306</td></tr>                <!-- <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td>
                <td>Null</td> -->
              </tr>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
