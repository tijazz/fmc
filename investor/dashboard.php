<?php
session_start();

error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>

    <!DOCTYPE html>
    <html>


    <?php
    require_once "public/config/header.php";
    ?>

    <body>
        <div id="wrapper">
            <?php
            require_once "public/config/left-sidebar.php";
            ?>

            <div id="page-wrapper" class=" dashbard-1">
                <div class="row">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row  white-bg dashboard-header">

                    <div class="col-sm-12 col-lg-12">
                        <h2 class="FMS-title">Farm Management Services</h2>


                        <div class="holder">

                            


                            <div class="fin-mgt-fm">
                                <div class="title-fm">Financial Management</div>
                                <div class="pie">
                                    <canvas id="myChart">
                                    </canvas>
                                </div>
                                <h2>Savings: 45,000 UIC</h2>
                                <h2 class="losses">Losses: 25,000 UIC</h2>
                            </div>

                            <div class="grouped">
                                
                                <div class="investments">
                                    <div class="title-fm-spec">Investment Management</div>
                                    <div class="svg-holder line-up">
                                        <div class="trans">
                                            <div class="green"><i class="fa fa-arrow-up fa-2x"></i></div>
                                            <span>
                                                <h3>500UIC</h3>
                                            </span>
                                        </div>
                                        <div class="trans">
                                            <div class="red"><i class="fa fa-arrow-down fa-2x"></i></div>
                                            <span>
                                                <h3>50UIC</h3>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>









                        </div>

                    </div>


                </div>

            </div>
            <?php
            require_once "public/config/footer.php";
            ?>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['Losses', 'Savings'],
                datasets: [{
                    label: 'Financial Management',
                    backgroundColor: ['rgb(195, 34, 69)', '#2ff5dc'],
                    borderColor: ['rgb(228, 29, 72)', '#1b6859'],
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

            }
        });
    </script>
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>