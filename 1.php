<html>
<head>
<title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$BatchGenQC = null;

	if(isset($_POST["txtKeyword"]))
	{
		$BatchGenQC = $_POST["txtKeyword"];
	}
?>
<form name="Search" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $BatchGenQC;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>



<?php
$serverName = "10.3.1.20";
$connectionInfo = array( "Database"=>"AggregatePlanning", "UID"=>"sa", "PWD"=>"p@ssw0rd" );
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM  EXEC S_QA_Test_HC_QRCode  WHERE Name LIKE '%".$BatchGenQC."%' ";
$params = array(1, "some data");

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>
<table width="600" border="1">
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
  </tr>
<?php
while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
    
?>
  <tr>
  <td><?php echo $row['PSNo']; ?></td>
                        <td><?php echo $row['BatchGenQC']; ?></td>
                        <td><?php echo date_format($row["HCDate"],"Y-m-d"); ?> </td>
                        <td><?php echo $row['HCMachine']; ?></td>
                        <td><?php echo $row['HCOven']; ?></td>
                        <td><?php echo $row['HCOvenRound']; ?></td>
                        <td><?php echo $row['LensType']; ?></td>
                        <td><?php echo $row['Material']; ?></td>
                        <td><?php echo $row['MonomerHC']; ?></td>
                        <td><?php echo $row['CoatTime']; ?></td>
                        <td><?php echo $row['Phase']; ?></td>
  </tr>
<?php
}
?>
</table>
<?php
sqlsrv_close($conn);
?>
</body>
</html>