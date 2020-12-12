<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from product WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
    }



?>

    <!DOCTYPE html>
    <html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring and Evaluation</title>

    <?php
    require_once "public/config/header.php";
    ?>

    <body>

        <div id="wrapper">
            <?php
            require_once "public/config/left-sidebar.php";
            ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row border-bottom">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Monitoring & Evaluation</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="me_container">
                            <div class="returns">
                                <div class="header">
                                    <h2>Monitoring</h2>
                                </div>
                                <div class="details">
                                    <div class="grid3">
                                        <div class="average average_1">
                                            <h5 class="me_title">
                                                <img src='public/images/icons8-futures-50.png' />
                                                <span>Pens</span>
                                            </h5>
                                            <?php $sql = "SELECT count(*) from monthlyreport WHERE org_id = (:org_id) AND type = 'pen'";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $pen = $query->fetchColumn();              ?>
                                            <div class="value"><?= $pen ?? 0 ?></div>
                                        </div>
                                        <div class="average average_2">
                                            <h5 class='me_title'>
                                                <img src="public/images/icons8-accounting-50.png" alt="">
                                                <span>
                                                    Fields
                                                </span>
                                            </h5>
                                            <?php $sql = "SELECT count(*) from monthlyreport WHERE org_id = (:org_id) AND type = 'field'";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $field = $query->fetchColumn();              ?>
                                            <div class="value"><?= $field ?? 0 ?></div>
                                        </div>
                                        <div class="average average_3">
                                            <h5 class='me_title'>
                                                <img src="public/images/icons8-coin-in-hand-50.png" alt="">
                                                <span>All Employees</span>
                                            </h5>
                                            <?php $sql = "SELECT count(*) from employee WHERE org_id = (:org_id)";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $employee = $query->fetchColumn();              ?>
                                            <div class="value"><?= $employee ?></div>
                                        </div>
                                        <div class="portfolio">
                                            <h5 class='me_title'>
                                                <span>Facilities</span>
                                            </h5>
                                            <div class="cirle_container">
                                                <div class="circle">
                                                    <h2><?php $sql = "SELECT count(*) from monthlyreport WHERE org_id = (:org_id) AND type = 'facility'";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $facility = $query->fetchColumn();
                                            echo $facility          ?>
                                            
                                                        <span>
                                                            Facilities
                                                        </span></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="current_value">
                                            <h5 class='me_title'>
                                                <span>Schedules</span>
                                            </h5>
                                            <div class="cirle_container">
                                                <div class="circle">
                                                    <h2>
                                                        40
                                                        <span>unattented tasks</span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="total_earnings">
                                            <h5 class='me_title'>
                                                <span>Weather</span>
                                            </h5>
                                            <div class="cirle_container">
                                                <div class="circle">
                                                    <h2>
                                                        40
                                                        <sup>o</sup>
                                                        <span>Celcius</span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid2">
                                        <div class="rental_yields">
                                            <h5 class='me_title'>
                                                <img src="public/images/icons8-neutral-trading-50.png" alt="">
                                                <span>Total Workers</span>
                                            </h5>
                                            <?php $sql = "SELECT count(*) from worker WHERE org_id = (:org_id)";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                            $query->execute();
                                            $worker = $query->fetchColumn();              ?>
                                            <h1><?= $worker?></h1>
                                        </div>
                                        <!-- <div class="invested_locations">
                                            <h5 class='me_title'>
                                                <img src="public/images/icons8-pos-terminal-50.png" alt="">
                                                <span>Recent Investments</span>
                                            </h5>
                                            <div class="investments">
                                                <div class="investment">
                                                    <span class="name">IDP</span>
                                                    <div class="lo">
                                                        <div></div>
                                                    </div>
                                                    <span class="perc">40%</span>
                                                </div>
                                                <div class="investment">
                                                    <span class="name">IFL</span>
                                                    <div class="lo">
                                                        <div></div>
                                                    </div>
                                                    <span class="perc">55%</span>
                                                </div>
                                                <div class="investment">
                                                    <span class="name">IDP</span>
                                                    <div class="lo">
                                                        <div></div>
                                                    </div>
                                                    <span class="perc">35%</span>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                            <div class="right">
                                <div class="header">
                                    <img src="public/images/icons8-conference-50.png" alt="">
                                    <h2>Evaluation</h2>
                                </div>
                                <div class="search-employee">
                                    <div class="search_employee">
                                        <input type="text" name="search_employee" id="" placeholder="Search Employees" onkeyup="searchEmployees()">
                                        <?= '<?xml version="1.0" encoding="utf-8"?>' ?>

                                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                            <path d="M20.745,32.62c2.883,0,5.606-1.022,7.773-2.881L39.052,40.3c0.195,0.196,0.452,0.294,0.708,0.294
                    c0.255,0,0.511-0.097,0.706-0.292c0.391-0.39,0.392-1.023,0.002-1.414L29.925,28.319c3.947-4.714,3.717-11.773-0.705-16.205
                    c-2.264-2.27-5.274-3.52-8.476-3.52s-6.212,1.25-8.476,3.52c-4.671,4.683-4.671,12.304,0,16.987
                    C14.533,31.37,17.543,32.62,20.745,32.62z M13.685,13.526c1.886-1.891,4.393-2.932,7.06-2.932s5.174,1.041,7.06,2.932
                    c3.895,3.905,3.895,10.258,0,14.163c-1.886,1.891-4.393,2.932-7.06,2.932s-5.174-1.041-7.06-2.932
                    C9.791,23.784,9.791,17.431,13.685,13.526z" />
                                        </svg>

                                    </div>
                                </div>
                                <div class="grid2-evaluation">
                                    <?php
                                    $sql = "SELECT id, user_id, org_id, name, image, department, table_name, sign_up_date FROM employee WHERE org_id = :org_id
                                        UNION
                                        SELECT id, user_id, org_id, name, image, department, table_name, sign_up_date FROM worker WHERE org_id = :org_id";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam('org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                    $query->execute();
                                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result as $result) {
                                    ?>


                                        <div class="eval">
                                            <div class="eval_img">
                                                <img src="../images/<?= $result->image ? $result->image : 'user.png' ?>" alt="">
                                            </div>
                                            <div class="eval_dets">
                                                <div>
                                                    <h3>Name: <?= $result->name ?></h3>
                                                    <span>Department: <?= !$result->department ? $result->table_name : $result->department ?></span>
                                                    <span>Started: <?= $result->sign_up_date ?> <a href="#">Details>>>></a></span>
                                                </div>
                                            </div>
                                        </div>


                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>




                    </div>

                    <!---
                <div class="col-lg-4">
                        <?php
                        //    require_once "public/config/right-sidebar.php";
                        ?>

                            </div>
                                                    -->
                </div>

            </div>


        </div>

        </div>

        <?php
        require_once "public/config/footer.php";
        ?>

    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    <!-- for investment progress -->
    <script>
        let investments = document.querySelectorAll('.investment');
        let searchE = document.querySelector('.search_employee input')
        let Employees = document.querySelectorAll('.eval_dets > div')
        let evals = document.querySelectorAll('.eval')



        window.addEventListener('DOMContentLoaded', () => {
            for (let i = 0; i < investments.length; i++) {
                perc = investments[i].querySelector('.perc').innerText;
                loaderperc = investments[i].querySelector('.lo')
                loader = perc.split('%')[0]
                loaderNum = Number(loader)
                var insider = loaderperc.querySelector('div')
                insider.style.width = perc;

                if (loaderNum > 50) {
                    insider.classList.add('green_me')
                } else {
                    insider.classList.add('red_me')
                }
            }
            evals.forEach(eval => {
                eval.classList.add('eval-up')
            })
        })

        function searchEmployees() {
            let employee = searchE.value.toUpperCase();
            Employees.forEach(emp => {
                text = emp.textContent || emp.innerText
                if (text.toUpperCase().indexOf(employee) > -1) {
                    emp.parentElement.parentElement.style.display = 'block'
                } else {
                    emp.parentElement.parentElement.style.display = 'none'
                }
            })
        }
    </script>

    </html>

<?php } ?>