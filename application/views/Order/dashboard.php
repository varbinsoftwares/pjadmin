<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');

function truncate($str, $len) {
    $tail = max(0, $len - 10);
    $trunk = substr($str, 0, $tail);
    $trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len - $tail))));
    return $trunk;
}
?>
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />

<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->



<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard <small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->

        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-pencil-square"></i></div>
                <div class="stats-info">
                    <h4>Total Orders</h4>
                    <p><?php echo $total_order; ?></p>	
                </div>
                <!--                <div class="stats-link">
                                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                                </div>-->
            </div>
        </div>
        <!-- end col-3 -->
          <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-usd"></i></div>
                <div class="stats-info">
                    <h4>Total Amount</h4>
                    <p><?php echo $total_amount; ?></p>	
                </div>
                <!--                <div class="stats-link">
                                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                                </div>-->
            </div>
        </div>
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>Registered User</h4>
                    <p><?php echo $total_users; ?></p>	
                </div>
                <!--                <div class="stats-link">
                                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                                </div>-->
            </div>
        </div>
        <!-- end col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL VISITORS</h4>
                    <p><?php echo $total_visitor*3; ?></p>	
                </div>
                <!--                <div class="stats-link">
                                    <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                                </div>-->
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">

                    <h4 class="panel-title">Order Analytics (Last 30 Days)</h4>
                </div>
                <div class="panel-body">
                    <div id="interactive-chart2" class="height-sm"></div>
                </div>
            </div>
        </div>

        <div class="col-md-8">


            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">

                    <h4 class="panel-title">Order Data (Last 30 Days)</h4>
                </div>
                <div class="panel-body">
                    <div class="height-sm" data-scrollbar="true">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 20px">S. NO.</th>
                                    <th style="width:200px">Order Information</th>
                                    <th style="width:200px">Customer Information</th>

                                    <th>Status</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($orderslist)) {
                                    $count = 1;
                                    foreach ($orderslist as $key => $value) {
                                        ?>
                                        <tr style="border-bottom: 1px solid #000;">
                                            <td>
                                                <?php echo $count; ?>
                                            </td>
                                            <td>
                                                <table class="small_table">
                                                    <tr>
                                                        <td>

                                                            <b>#<?php echo $value->order_no; ?></b>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td>Amount: {{<?php echo $value->total_price; ?>|currency:" "}}</td>
                                                    </tr>

                                                </table>

                                            </td>

                                            <td>

                                                <b> <?php echo $value->name; ?></b>
                                                <table class="small_table">
                                                    <tr>

                                                        <td class="overtext"> <a href="#" title="<?php echo $value->email; ?>"><?php echo $value->email; ?></a></td>
                                                    </tr>
                                                    <tr>

                                                        <td> <?php echo $value->contact_no; ?></td>
                                                    </tr>
                                                    <tr>

                                                        <td> <?php echo $value->zipcode; ?>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>



                                            <td>
                                                <?php
                                                echo $value->payment_mode;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $value->status_datetime;
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url("order/orderdetails/" . $value->order_key); ?>" class="btn btn-primary btn-sm" style="    margin-top: 20%;"> <i class="fa fa-arrow-circle-right"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                } else {
                                    ?>
                                <h4><i class="fa fa-warning"></i> No order found</h4>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- begin col-4 -->

            <div class="col-md-6">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="index-4">
                    <div class="panel-heading">
                        <h4 class="panel-title">New Registered Users <span class="pull-right label label-success"><?php echo $total_users; ?> users</span></h4>
                    </div>
                    <ul class="registered-users-list clearfix">
                        <?php
                        foreach ($latestusers as $ukey => $uvalue) {
                            ?>
                            <li>
                                <a href="javascript:;">
                                    <img src = '<?php echo base_url(); ?>assets/emoji/user.png' alt = ""  style = " width:60px;  height: 60px;background-size: cover;float: left;" />

                                </a>
                                <h4 class="username text-ellipsis" style="float: left;width: -webkit-fill-available;">
                                    <?php echo $uvalue['first_name']; ?> <?php echo $uvalue['last_name']; ?>

                                </h4>
                            </li>
                            <?php
                        }
                        ?>



                    </ul>
                    <div class="panel-footer text-center">
                        <a href="<?php echo site_url("UserManager/usersReport"); ?>" class="text-inverse">View All</a>
                    </div>
                </div>
                <!-- end panel -->
            </div>

        </div>
        <!-- end col-8 -->
             <!-- begin col-4 -->
        <div class="col-md-4">
            <div class="panel panel-inverse" data-sortable-id="index-6">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Payment Details</h4>
                </div>
                <div class="panel-body p-t-0">
                    <table class="table table-valign-middle m-b-0">
                        <thead>
                            <tr>	
                                <th>Payment Mode</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($paymentdata as $key => $value) {
                                ?>
                                <tr>
                                    <td><label class="label label-danger"><?php echo $value['payment_mode']; ?></label></td>
                                    <td><?php echo $value['count']; ?> 
                                        <?php
                                        if ($key == 0) {
                                            ?>
                                            <span class="text-success"><i class="fa fa-arrow-up"></i></span>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel panel-inverse" data-sortable-id="index-9">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">World Visitors</h4>
                </div>
                <div class="panel-body p-0">
                    <div id="world-map" class="height-sm width-full"></div>
                </div>
            </div>

            <div class="panel panel-inverse" data-sortable-id="index-8">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Todo List</h4>
                </div>
                <div class="panel-body p-0">
                    <ul class="todolist">

                        <?php
                        foreach ($systemlog as $klog => $vlog) {
                            ?>   
                            <li>
                                <a href="javascript:;" class="todolist-container" data-click="todolist">
                                    <div class="todolist-input"><i class="fa fa-square-o"></i></div>
                                    <div class="todolist-title"><?php echo $vlog['log_detail']; ?> (<?php echo $vlog['log_datetime']; ?>)</div>
                                </a>
                            </li> 
                            <?php
                        }
                        ?>




                    </ul>
                </div>
            </div>


        </div>
        <!-- end col-4 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->





<?php
$this->load->view('layout/footer');
?>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard-v2.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
$(document).ready(function () {

    Dashboard.init();
    DashboardV2.init();
});
</script>
<script>
    $(function () {
<?php
$checklogin = $this->session->flashdata('checklogin');
if (isset($checklogin['show'])) {
    ?>
            $.gritter.add({
                title: "<?php echo $checklogin['title']; ?>",
                text: "<?php echo $checklogin['text']; ?>",
                image: '<?php echo base_url(); ?>assets/emoji/<?php echo $checklogin['icon']; ?>',
                            sticky: true,
                            time: '',
                            class_name: 'my-sticky-class '
                        });
    <?php
}
?>
                })


                var handleInteractiveChart = function () {
                    "use strict";
                    function showTooltip(x, y, contents) {
                        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css({
                            top: y - 45,
                            left: x - 55
                        }).appendTo("body").fadeIn(200);
                    }
                    if ($('#interactive-chart2').length !== 0) {

                        var data1 = [
<?php
$listoforderbooking = [];
$count1 = 1;
foreach ($order_booking_date_list as $key => $value) {
    $orddata = $value['order'];
    echo "[$count1, $orddata],";
    array_push($listoforderbooking, $orddata);
    $count1++;
}
?>
                        ];
                        var data2 = [
<?php
$count2 = 1;
foreach ($order_booking_date_list as $key => $value) {
    $bkdata = $value['booking'];
    echo "[$count2, $bkdata],";
    array_push($listoforderbooking, $bkdata);
    $count2++;
}
?>
                        ];
                        var xLabel = [

<?php
$count3 = 1;
foreach ($order_booking_date_list as $key => $value) {
    $orgdata = date("dS M Y", strtotime($key));
    $orgdata2 = date("d", strtotime($key));
    if ($count3 % 3 == 0) {
        echo "[$count3, '$orgdata'],";
    } else {
        echo "[$count3, '$orgdata2'],";
    }
    $count3++;
}

$maxdatagraph = max($listoforderbooking) * 2;
?>
                        ];
                        $.plot($("#interactive-chart2"), [
                            {
                                data: data1,
                                label: "Orders",
                                color: blue,
                                lines: {show: true, fill: false, lineWidth: 2},
                                points: {show: true, radius: 3, fillColor: '#fff'},
                                shadowSize: 0
                            },
                        ],
                                {
                                    xaxis: {ticks: xLabel, tickDecimals: 1, tickColor: '#ddd'},
                                    yaxis: {ticks: 10, tickColor: '#ddd', min: 0, max: <?php echo $maxdatagraph; ?>},
                                    grid: {
                                        hoverable: true,
                                        clickable: true,
                                        tickColor: "#ddd",
                                        borderWidth: 1,
                                        backgroundColor: '#fff',
                                        borderColor: '#ddd'
                                    },
                                    legend: {
                                        labelBoxBorderColor: '#ddd',
                                        margin: 10,
                                        noColumns: 1,
                                        show: true
                                    }
                                }
                        );
                        var previousPoint = null;
                        $("#interactive-chart2").bind("plothover", function (event, pos, item) {
                            $("#x").text(pos.x.toFixed(2));
                            $("#y").text(pos.y.toFixed(2));
                            if (item) {
                                if (previousPoint !== item.dataIndex) {
                                    previousPoint = item.dataIndex;
                                    $("#tooltip").remove();
                                    var y = item.datapoint[1].toFixed(2);

                                    var content = item.series.label + " " + y;
                                    showTooltip(item.pageX, item.pageY, content);
                                }
                            } else {
                                $("#tooltip").remove();
                                previousPoint = null;
                            }
                            event.preventDefault();
                        });
                    }
                };
                handleInteractiveChart();




</script>