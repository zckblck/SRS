<?php
if (isset($year)) {
    // code...
?>
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $date = date('m-d-Y');
                        if (isset($member) && isset($month)) {
                            // code...
                            $title = $member." ".$month." ".$year;
                            $print = "report-".$year."-".$month." ".$member;

                        }elseif (isset($month) && empty($member)) {
                            // code...
                            if (!empty($site)) {
                                // code...
                                $title = $site." ".$month." ".$year." Report";
                                $print = "report-".$year."-".$month."-".$site;
                            }else{
                                $title = $month." ".$year." Report";
                                $print = "report-".$year."-".$month;
                            }

                        }else{
                            $title = $year." Report";
                            $print = "report-".$year;
                        }

                        echo "<h4><i class='fa fa-pie-chart' aria-hidden='true'></i> ".$title."</h4>";

                        ?>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <a href="generated report/<?php echo $print; ?>.xlsx" class="btn btn-primary">Generate Report</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <div class="row pt-3">
                    <?php

                    if (empty($member) && isset($month)) {
                        
                        include 'function/report/generate.monthly.php';
                    ?>



                    <div class="col-md-12 mb-5">
                        <table class="table table-bordered mb-3 text-center">
                            <thead>
                                <th></th>
                                <th class="text-center">New Request</th>
                                <th class="text-center">Assigned</th>
                                <th class="text-center">Work in Progress</th>
                                <th class="text-center">Completed</th>
                                <th class="text-center">Count</th>
                                <th class="text-center">Complete Percentage</th>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td><b>CSR</b></td>
                                    <td><?php echo $monthly_csr_report_Support_nr + $monthly_csr_report_Purchase_nr; ?></td>
                                    <td><?php echo $monthly_csr_report_Support_assigned + $monthly_csr_report_Purchase_assigned; ?></td>
                                    <td><?php echo $monthly_csr_report_Support_wip + $monthly_csr_report_Purchase_wip; ?></td>
                                    <td><?php echo $monthly_csr_completed; ?></td>
                                    <td><?php echo $monthly_csr_total; ?></td>
                                    <td class="font-weight-bold"><?php echo $monthly_csr_percentage ; ?>%</td>
                                </tr>
                                <tr class="">
                                    <td><b>CPR</b></td>
                                    <td><?php echo $monthly_cpr_report_Support_nr; ?></td>
                                    <td><?php echo $monthly_cpr_report_Support_assigned; ?></td>
                                    <td><?php echo $monthly_cpr_report_Support_wip; ?></td>
                                    <td><?php echo $monthly_cpr_report_Support_Completed; ?></td>
                                    <td><?php echo $monthly_cpr_report_Support_Completed + $monthly_cpr_report_Support_Delay; ?></td>
                                    <td class="font-weight-bold"><?php echo $monthly_cpr_percentage; ?>%</td>
                                </tr>
                                <tr class="">
                                    <td><b>DRR</b></td>
                                    <td><?php echo $monthly_drr_report_Support_nr; ?></td>
                                    <td><?php echo $monthly_drr_report_Support_assigned; ?></td>
                                    <td><?php echo $monthly_drr_report_Support_wip; ?></td>
                                    <td><?php echo $monthly_drr_report_Support_Completed; ?></td>
                                    <td><?php echo $monthly_drr_report_Support_Completed + $monthly_drr_report_Support_Delay; ?></td>
                                    <td class="font-weight-bold"><?php echo $monthly_drr_percentage; ?>%</td>
                                </tr>
                                <tr class="">
                                    <td><b>QA</b></td>
                                    <td> N/A </td>
                                    <td> N/A </td>
                                    <td> N/A </td>
                                    <td><?php echo $monthly_qa_report_Support_Completed; ?></td>
                                    <td><?php echo $monthly_qa_report_Support_Completed + $monthly_qa_report_Support_Delay; ?></td>
                                    <td class="font-weight-bold"><?php echo $monthly_qa_percentage; ?>%</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    

                    

                    <div class="col-md-12">
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th colspan="6" align="center">Members with Request and Status count info</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Assigned</th>
                                    <th>Work in Progress</th>
                                    <th>Done</th>
                                    <th>Closed</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total  =   array();
                                foreach ($monthly_members_info as $key => $value) {
                                    // code...
                                    ?>

                                    <tr>
                                        <td><a href="report.php?month=<?php echo $month; ?>&year=<?php echo $year?>&member=<?php echo $value[0]; ?>&get_report="><?php echo $value[0]; ?></a></td>
                                        <td><?php echo $value[1]; ?></td>
                                        <td><?php echo $value[2]; ?></td>
                                        <td><?php echo $value[3]; ?></td>
                                        <td><?php echo $value[4]; ?></td>
                                        <td><?php echo $value[5]; ?></td>
                                    </tr>
                                    <?php
                                    $total[] = $value[5];
                                }
                                echo "<tr><td colspan='5' align='center'><b>Total Request</b></td><td><b>".array_sum($total)."</b></td></tr>";
                                ?>
                            </tbody>
                        </table>

                        
                    </div>
                    <?php

                
                        
                }elseif (isset($month) && isset($member)) {


                    require_once 'function/tables.php';

                }else{


                    require_once 'function/report/generate.yearly.php';

                    ?>
                    <table class="table table-bordered mb-3">
                        <thead>
                            <?php
                            $months_count = COUNT($months);
                            echo "<tr>";
                            echo "<th></th>";
                            for ($m=0; $m < $months_count; $m++) {
                                // code...

                                //echo "<tr>";
                                //for ($b=0; $b < $data_count; $b++) {
                                    // code...
                                    echo "<th>".$months[$m]."</th>";
                                //}
                                //echo "</tr>";
                            }
                            echo "</tr>"

                            ?>
                        </thead>
                        <tbody>
                            <?php
                                $dates_count = count($dates_info);

                                echo "<tr>";
                                echo "<td>Ahead of Time</td>";
                                for ($a=0; $a < $dates_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$dates_info[$a][0]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>On Time</td>";
                                for ($a=0; $a < $dates_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$dates_info[$a][1]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Delay</td>";
                                for ($a=0; $a < $dates_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$dates_info[$a][2]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Total Request</td>";
                                for ($a=0; $a < $dates_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$dates_info[$a][3]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Average Response Time</td>";
                                for ($a=0; $a < $dates_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$dates_info[$a][4]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                //echo $dates_info[1][0];
                            ?>

                            <?php
                            $months_count = COUNT($months);
                            echo "<tr>";
                            echo "<td ></td>";
                            echo "<td colspan=".$months_count."></td>";
                            echo "</tr>"

                            ?>

                            <?php
                                $statuses_count = count($statuses_info);

                                echo "<tr>";
                                echo "<td>New Request</td>";
                                for ($a=0; $a < $statuses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$statuses_info[$a][0]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Assigned</td>";
                                for ($a=0; $a < $statuses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$statuses_info[$a][1]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Work in Progress</td>";
                                for ($a=0; $a < $statuses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$statuses_info[$a][2]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Done</td>";
                                for ($a=0; $a < $statuses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$statuses_info[$a][3]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>Closed</td>";
                                for ($a=0; $a < $statuses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$statuses_info[$a][4]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                //echo $dates_info[1][0];
                            ?>

                            <?php
                            $months_count = COUNT($months);
                            echo "<tr>";
                            echo "<td ></td>";
                            echo "<td colspan=".$months_count."></td>";
                            echo "</tr>"

                            ?>

                            <?php
                                $prcsses_count = count($prcsses_info);

                                echo "<tr>";
                                echo "<td>CSR </td>";
                                for ($a=0; $a < $prcsses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$prcsses_info[$a][0]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>CPR </td>";
                                for ($a=0; $a < $prcsses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$prcsses_info[$a][1]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>DRR </td>";
                                for ($a=0; $a < $prcsses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$prcsses_info[$a][2]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>QA </td>";
                                for ($a=0; $a < $prcsses_count; $a++) {
                                    // code...

                                    //echo "<tr>";
                                    //for ($b=0; $b < $data_count; $b++) {
                                        // code...
                                        echo "<td>".$prcsses_info[$a][3]."</td>";
                                    //}
                                    //echo "</tr>";
                                }
                                echo "</tr>";

                                //echo $dates_info[1][0];
                            ?>
                        </tbody>
                    </table>

                    <table class="table table-bordered mb-3">
                        <thead>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>


                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>
</div>


<?php
}elseif (isset($member)) {
    // code...
?>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h4><i class="fa fa-pie-chart" aria-hidden="true"></i> <?php echo $member; ?> </h4>
                    </div>
                    <div class="col-md-3 col-sm-2">
                        <h4><i class="" aria-hidden="true"></i> <?php echo $yearStats; ?> </h4>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- <button type="submit" class="btn btn-primary" name="generate_report">Generate Report</button> -->
                    </div>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-bordered mb-3">
                    <thead>
                        <?php
                            $status_list    = array('New Request', 'Assigned', 'Work in Progress', 'Done', 'Endorse to Checker', 'Closed', 'Cancelled');
                            //print_r($status_list);
                            foreach ($status_list as $key => $val) {
                                // code...
                                echo "<th>".$val."</th>";
                            }
                        ?>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                foreach ($status_list as $key => $value) {
                                    // code...
                                    echo "<td>".$stats[$value]."</td>";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <?php

                    require_once 'function/tables.php';

                     ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>
</div>

<?php
}

?>
