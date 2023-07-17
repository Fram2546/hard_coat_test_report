<html>
<head>
    <title>ThaiCreate.Com PHP & SQL Server (sqlsrv)</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$servername = "10.3.1.20";
$connectioninfo=array("Database"=>"AggregatePlanning","UID"=>"sa","PWD"=>"p@ssw0rd","MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
$conn=sqlsrv_connect($servername,$connectioninfo);

if($conn)
{
    echo "ผ่าน";
}
else
{
    die( print_r( sqlsrv_errors(), true));
}

sqlsrv_close($conn);
?>
</body>
</html>