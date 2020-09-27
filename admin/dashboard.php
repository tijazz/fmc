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

                            <div class="risk_management-fm">
                                <div class="title-fm">Organizations</div>
                                <div class="svg-holder">
                                    <div class="no_of_users spinner">
                                        <div class="full_info">
                                            Last signup:<br /><br />
                                            <i class="fa fa-user"></i> <?php
                                                                        $sql = "SELECT * FROM `organization` ORDER BY sign_up_date DESC";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                        echo $results[0]['organization'] . " joined " . date("d-M-Y", strtotime($results[0]['sign_up_date']));
                                                                        // date("Y-m-d h:i:sa", $results[0]['sign_up_date']);
                                                                        ?>
                                        </div>
                                        <div class="sub_text">
                                            <span>
                                                <?php
                                                $sql = "SELECT * FROM `organization`";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->rowCount(PDO::FETCH_ASSOC);
                                                echo ($results);
                                                ?>
                                                <span>
                                                    organizations
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="organization.php" id="proceed">View</a>
                            </div>

                            <div class="supply-chn-mgt-fm">
                                <div class="title-fm">Investors</div>
                                <div class="svg-holder">
                                    <div class="investors spinner">
                                        <div class="full_info">
                                            Last signup:<br /><br />
                                            <i class="fa fa-user"></i> <?php
                                                                        $sql = "SELECT * FROM `member` ORDER BY date_added DESC";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                        $cnt = 1;
                                                                        echo $results[0]['fullname'] . " joined " . date("d-M-Y", strtotime($results[0]['date_added']));
                                                                        // date("Y-m-d h:i:sa", $results[0]['sign_up_date']);
                                                                        ?>
                                        </div>
                                        <div class="sub_text">
                                            <span>
                                                <?php
                                                $sql = "SELECT * FROM `member`";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->rowCount(PDO::FETCH_ASSOC);
                                                echo ($results);
                                                ?>
                                                <span>
                                                    Investors
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="investor.php" id="proceed">View</a>
                            </div>

                            <div class="inventory-mgt-fm">
                                <div class="title-fm">Employees</div>
                                <div class="svg-holder">
                                    <div class="employees spinner">
                                        <div class="full_info">
                                            Last signup:<br /><br />
                                            <i class="fa fa-user"></i> <?php
                                                                        $sql = "SELECT * FROM `employee` ORDER BY sign_up_date DESC";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                        $cnt = 1;
                                                                        echo $results[0]['name'] . " joined " . date("d-M-Y", strtotime($results[0]['sign_up_date']));
                                                                        // date("Y-m-d h:i:sa", $results[0]['sign_up_date']);
                                                                        ?>
                                        </div>
                                        <div class="sub_text">
                                            <span>
                                                <?php
                                                $sql = "SELECT * FROM `employee`";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->rowCount(PDO::FETCH_ASSOC);
                                                echo ($results);
                                                ?>
                                                <span>
                                                    Employees
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <a href="employe.php.php" id="proceed">View</a>
                                </div>
                            </div>


                            <div class="fin-mgt-fm">
                                <div class="title-fm">Investments and Savings</div>
                                <div class="pie">
                                    <canvas id="myChart" style="height:400px;">
                                    </canvas>
                                </div>
                                <h2>Savings: 45,000 UIC</h2>
                                <h2 class="losses">Losses: 25,000 UIC</h2>
                            </div>

                            <div style="display:flex;align-items:center;justify-content: center;">
                                <img src="public/images/favicon.png" alt="Dufma Logo">
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
                labels: ['Investments', 'Savings'],
                datasets: [{
                    label: 'Total Investments and Savings',
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
                    easing: 'linear',
                },
                maintainAspectRatio: false

            }
        });
    </script>
    <style>
        th.sorting::after {
            height: 3px;
            width: 5px;
            background: red !important;
        }

        .spinner {
            height: 120px;
            width: 120px;
            border-radius: 50%;
            border: 10px solid rgb(14, 96, 110);
            position: relative;
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }



        .spinner:hover {
            transform: scale(1.2);
        }

        @keyframes spin {
            0% {}

            50% {
                transform: rotate(1080deg) scale(1.2)
            }

            100% {
                transform: rotate(0) scale(1)
            }
        }

        .spinner>.sub_text {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            border: 4px solid rgb(35, 214, 110);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            text-align: center;
        }

        .spinner>.sub_text>span>span {
            display: block;
            font-size: 0.9rem;
            text-align: center;
        }

        .investors {
            border: 10px solid rgb(224, 110, 17);
        }

        .investors>.sub_text {
            border: 4px solid rgb(255, 131, 29);
        }

        .full_info {
            position: absolute;
            top: -30px;
            background: rgb(30, 31, 31);
            padding: 1.2rem 1rem;
            color: #fff;
            /* width: 100%; */
            border-radius: 10px;
            opacity: 0;
            pointer-events: none;
            transition: 0.5s ease;
        }

        .spinner:hover .full_info {
            opacity: 1;
            top: -80px;
        }
    </style>

    </html>

<?php } ?>