<tr>
                                            <td colspan="   ">Các dịch vụ đi kèm:</td>
                                            <?php
                                            $sql2 = 'SELECT a.service_id,service_name,price from services a join contract_service b on a.service_id= b.service_id where b.contract_no=' . $que["contract_code"];
                                            $service = Yii::$app->db->createCommand($sql2)->queryAll();
                                            ?>
                                            <td colspan="2" >

                                                <?php
                                                if (count($service) > 0)
                                                    foreach ($service as $ser) {
                                                        echo "<div class='col-md-6'> TEN: " . $ser["service_name"] . "</div>";
                                                        echo "<div class='col-md-6'> Gia: " . $ser["price"] . " Đồng</div>";
//                                                        echo "    gia:  ";
//                                                        echo $ser["price"];
//                                                        echo ' Đồng';
                                                        echo "<br>";
                                                        $gia += $ser["price"];
                                                    }
                                                ?>
                                            </td>
                                        </tr>