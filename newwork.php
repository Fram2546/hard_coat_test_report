<?php 
                        include('db.php');
                        $query="EXEC S_Dashboard @Phase = '2' ";
                        // $params = array(
                        //     array($strFIL, SQLSRV_PARAM_IN));
                        $stmt = sqlsrv_query($conn,$query);
                        while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC) )
                        {      
     
                          echo "<tr>"; 
                          echo "<td>".date_format($row["PlanDate"],"Y-m-d")."</td>";
                            //CLN
                            if ($row["PerCLN"]  == "100%"){
                            echo "<td style='color:green'>".$row["PerCLN"]."</td>";
                             }
                             else if ($row["PerCLN"]  <= "99%"){
                            echo "<td>".$row["PerCLN"]."</td>";
                             }
                             //ASS
                             if ($row["PerASS"]  == "100%"){
                                echo "<td style='color:green'>".$row["PerASS"]."</td>";
                                 }
                                else if ($row["PerASS"]  <= "99%"){
                                echo "<td>".$row["PerASS"]."</td>";
                                  }
                             //FIL
                             if ($row["PerFIL"] == "100%"){
                                 echo "<td style='color:green'>".$row["PerFIL"]."</td>";
                             }
                              else if($row["PerFIL"] <= "99%"){
                                 echo "<td>".$row["PerFIL"]."</td>";
                             }
                             //OV
                             if ($row["PerOVN"] == "100%"){
                                 echo "<td style='color:green'>".$row["PerOVN"]."</td>";
                             }
                             else if($row["PerOVN"] <= "99%"){
                                 echo "<td>".$row["PerOVN"]."</td>";
                             }
                             //DEM
                             if ($row["PerDEM"] == "100%"){
                                echo "<td style='color:green'>".$row["PerDEM"]."</td>";
                            }
                            else if($row["PerDEM"] <= "99%"){
                                echo "<td>".$row["PerDEM"]."</td>";
                            }
                            //EDG
                             if ($row["PerEDG"] == "100%"){
                                echo "<td style='color:green'>".$row["PerEDG"]."</td>";
                            }
                            else if($row["PerEDG"] <= "99%"){
                                echo "<td>".$row["PerEDG"]."</td>";
                            }
                            //QCN
                            if ($row["PerQCN"] == "100%"){
                                echo "<td style='color:green'>".$row["PerQCN"]."</td>";
                            }
                            else if($row["PerQCN"] <= "99%"){
                                echo "<td>".$row["PerQCN"]."</td>";
                            }
                            echo "<td>".$row["RemainPS"]."</td>";
                          echo "</tr>";
                        }
                        ?>