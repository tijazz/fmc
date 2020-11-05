<?php
session_start();    
error_reporting(0);
$error="";
$msg="";
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
    header('location:index.php');
}
else{
    
    ?>

<!DOCTYPE html>
<html>
<?php
    require_once "public/config/header.php";
    ?>
<link rel="stylesheet" href="public/css/investmentdash.css">
<link rel="stylesheet" href="public/css/finmgtdash.css">

<body>

    <div id="wrapper">
        <?php
            require_once "public/config/left-sidebar.php";
            ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row">

                <?php
                    require_once "public/config/topbar.php";
                    ?>
                <div class="row-eq-height row info-wrapper">
                    <h1 style="margin-left:1.2rem;">Financial Management Dashboard</h1>
                    <div class="col-lg-12 real">

                        <div class="col-lg-9 col-md-12  left-details">
                            <div class="group">
                                <!-- Upcoming payments -->
                                <div class="activity-log shadow">
                                    <div class="headers">
                                        <h3 style="margin-left:1rem;">Upcoming Payments</h3>
                                    </div>
                                    <ul>
                                        <li> <span>Sola Adeyemo</span> <span>&#8358;20,000.00</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Sola Adeyemo</span> <span>&#8358;20,000.00</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Sola Adeyemo</span> <span>&#8358;20,000.00</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Sola Adeyemo</span> <span>&#8358;20,000.00</span> <span>27th
                                                Aug.</span> </li>

                                    </ul>
                                    <a href="income.php" class="rdr">More <span></span></a>
                                </div>
                                <div style="flex-direction:column;background:transparent;">
                                    <div class="balance_and_expenses shadow farm-details"
                                        style="background-color: #55616D;">
                                        <h3><i class="fa fa-money" style="color:#35ddbb;margin-right:1rem;"></i>Current
                                            Balance</h3>
                                        <ul>
                                            <div style="margin-left:2rem;">
                                                <h1>80,000 ROI</h1>
                                            </div>
                                        </ul>
                                    </div>

                                    <div class="balance_and_expenses shadow farm-details"
                                        style="background-color: #55616D;margin-top:2rem;">
                                        <div class="total_header">
                                            <h3>Total Expenses</h3>
                                            <small>Since 21st November,2021</small>
                                        </div>
                                        <ul>
                                            <div style="display:flex;align-items:center;">
                                                <span><img src="public/images/decline.png" alt=""></span>
                                                <span class="neg-text" style="margin-left:1rem;">
                                                    <h2>600,000.00</h2>
                                                </span>
                                            </div>
                                        </ul>
                                        <div class="total_header">
                                            <span>Last expense -- Pen painting (&#8358;400,000)</span>
                                            <a style='color:#fff' href='expenditure.php'><span class="flex-center">More <div class="my_arrow"></div></span></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="perf-summary shadow">
                                <h3>Sales</h3>
                                <div class="items">


                                    <div class="performance farm-details ">
                                        <ul>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                            <li><span>27th Aug, 2020</span>
                                                <div></div><span>&#8358;40,000.00</span>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="chart">
                                        <canvas id="myChart" height="300" width="300">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 right-details fluid">
                            <!-- Payment History chart -->
                            <div class="summary payment-history">
                                <!-- <canvas id="paymentBarChart" height="300" width="300">
                                    </canvas> -->
                            </div>
                            <!-- end chart -->

                            <!-- details of payment history -->
                            <div class="ongoing_inv payment-details">
                                <div class="header">
                                    <h4>Details</h4>
                                </div>
                                <ul class="list-investments">
                                    <li>
                                        <div>
                                            <h4 style="margin-bottom:0;">Adeola Investments</h4>
                                            <span style="font-size: 1rem;">Paid 12th Jan,2020</span>
                                        </div>
                                        <div class="progress_made">
                                            <div class="arrows">
                                                &#8358;30,000.00
                                            </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4 style="margin-bottom:0;">Adeola Investments</h4>
                                            <span style="font-size: 1rem;">Paid 12th Jan,2020</span>
                                        </div>
                                        <div class="progress_made">
                                            <div class="arrows">
                                                &#8358;30,000.00
                                            </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4 style="margin-bottom:0;">Adeola Investments</h4>
                                            <span style="font-size: 1rem;">Paid 12th Jan,2020</span>
                                        </div>
                                        <div class="progress_made">
                                            <div class="arrows">
                                                &#8358;30,000.00
                                            </div>
                                    </li>

                                </ul>
                            </div>
                            <!-- end payment history -->

                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>
    <style>
        #page-wrapper>div:nth-child(3)>div>div>div.panel-body>div>div>div>a:hover {
            color: #fff;
        }

        .activity-log ul li {
            padding-left: 1rem;
            justify-items: stretch;
        }
    </style>
    <?php
                require_once "public/config/footer.php";
                ?>
    <script>
        let progresses = document.querySelectorAll('.insider');
        for (var i = 0; i < progresses.length; i++) {
            var myWidth = progresses[i].parentElement.parentElement.querySelector('span').innerText;
            progresses[i].style.width = myWidth;
        }

    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
    <script>

        var ctx = document.getElementById('myChart').getContext('2d');
        var ctx2 = document.getElementById('paymentBarChart').getContext('2d');
        

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['Losses', 'Savings'],
                datasets: [{
                    label: 'Investment Management',
                    backgroundColor: ['rgb(255, 59, 59)', 'rgb(49, 255, 214)'],
                    borderColor: ['rgb(255, 59, 59)', 'rgb(49, 255, 214)'],
                    data: [25000, 45000]
                }]
            },

            // Configuration options go here
            options: {
                animation: {
                    animateScale: false,
                    duration: 3000,
                    easing: 'linear'
                },
                //     layout: {
                // padding: {
                //     left: 100,
                //     right: 0,
                //     top: 0,
                //     bottom: 0,
                // }},
                legend: {
                    position: 'bottom',
                    display: false,
                    labels: ['Losses', 'Savings']
                }
            }
        });

        // BAR CHART
        var myChart = new Chart(ctx2, {
             type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Payment History',
                    data: [50000, 2000, 30000, 25000, 10000, 2000,4000,23000,10000,11000,2000,10000],
                    backgroundColor: [
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                    'rgb(49, 255, 214)',
                       
                      
                    ],
              
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor:'#fff',
                        }
                    }],
                    xAxes:[{
                        ticks:{
                            fontColor:'#fff',
                        }
                    }]
                },
                legend:{
                    labels:{
                        fontColor:'#fff',
                    }
                }
            }
        });

    </script>

    <script src="public/js/invdash.js"></script>



</body>


</html>

<?php } ?>