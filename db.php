<?php 
                    $servername = "10.3.1.20";
                    $connectioninfo=array("Database"=>"AggregatePlanning","UID"=>"sa","PWD"=>"p@ssw0rd","MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
                    $conn=sqlsrv_connect($servername,$connectioninfo);
                    if ($conn)
                    {
                    echo "";
                    }
                    else{
                        echo "Fail";
                        die(print_r(sqlsrv_errors(),true));
                    }

                    $query= "EXEC S_QA_Test_HC_QRCode '66042011A85'";
                    $stmt = sqlsrv_query($conn,$query);
                    $row = sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC) 
                    
                ?>