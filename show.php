<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
</head>
<style>
</style>
<body>
<?php
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "EXEC S_QA_Test_HC_QRCode";

$connectionInfo = array(
    "Database"=>$dbName,
    "UID"=>$userName,
    "PWD"=>$userPassword,
    "MultipleActiveResultSets"=>true);

$connect = sqlsrv_connect( $serverName, $connectionInfo);

if($connect === FALSE)
{
    die( print_r( sqlsrv_errors(), true));
}
$stmt   = "select * from Student std inner join Faculty fac on std.Fac_id = fac.fac_id";


//where std.Fac_id = fac.fac_id and std.Std_id = std.Std_id


$query  = sqlsrv_query($connect,$stmt);
?>
<div class="container">
    <div class="row">
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
            <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">PSNo</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">BatchGenQC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Date</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Machine</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">HC Oven</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Round</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">LensType</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Material</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">MonomerHC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">CoatTime</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Phase</th>

            <tr>
            </thead>
            <?php
            while ($result = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC))
            {
                ?>
                <tbody>
                <tr>
                    <th><?PHP echo $result["Std_id"]; ?></th>
                    
                    <td><?php echo $result['PSNo']; ?></td>
                        <td><?php echo $result['BatchGenQC']; ?></td>
                        <td><?php echo date_format($result["HCDate"],"Y-m-d"); ?> </td>
                        <td><?php echo $result['HCMachine']; ?></td>
                        <td><?php echo $result['HCOven']; ?></td>
                        <td><?php echo $result['HCOvenRound']; ?></td>
                        <td><?php echo $result['LensType']; ?></td>
                        <td><?php echo $result['Material']; ?></td>
                        <td><?php echo $result['MonomerHC']; ?></td>
                        <td><?php echo $result['CoatTime']; ?></td>
                        <td><?php echo $result['Phase']; ?></td>

                </tr>
                </tbody>
                <?PHP
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>