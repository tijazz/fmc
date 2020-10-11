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
            <link rel="stylesheet" href="public/css/m_and_e.css">

            <div id="page-wrapper" class=" dashbard-1">
                <div class="row">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row  white-bg dashboard-header">

                    <div class="col-sm-12 col-lg-12">
                        <h2 class="FMS-title" style="text-transform: capitalize"><?php echo $_SESSION['name'] ?> Investment Management</h2>


                        <div class="row">

                            <div class="col-lg-12">
                                <div class="me_container">
                                    <div class="returns">
                                        <div class="header">
                                            <h2>Dashboard</h2>
                                        </div>
                                        <div class="details">
                                            <div class="grid3">
                                                <div class="average average_1">
                                                    <h5 class="me_title">
                                                        <img src='public/images/icons8-futures-50.png' />
                                                        <span>Average Yield</span>
                                                    </h5>
                                                    <div class="value">&#8358;45,000.00</div>
                                                </div>
                                                <div class="average average_2">
                                                    <h5 class='me_title'>
                                                        <img src="public/images/icons8-accounting-50.png" alt="">
                                                        <span>
                                                            ROI
                                                        </span>
                                                    </h5>
                                                    <div class="value">450%</div>
                                                </div>
                                                <div class="average average_3">
                                                    <h5 class='me_title'>
                                                        <img src="public/images/icons8-coin-in-hand-50.png" alt="">
                                                        <span>Equity</span>
                                                    </h5>
                                                    <div class="value">
                                                        2.5X
                                                    </div>
                                                </div>
                                                <div class="portfolio">
                                                    <h5 class='me_title'>
                                                        <span>Portfolio</span>
                                                    </h5>
                                                    <div class="cirle_container">
                                                        <div class="circle">
                                                            <h2>400
                                                                <span>
                                                                    ROI
                                                                </span></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="current_value">
                                                    <h5 class='me_title'>
                                                        <span>Current Value</span>
                                                    </h5>
                                                    <div class="cirle_container">
                                                        <div class="circle">
                                                            <h2>
                                                                &#8358;20,000
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="total_earnings">
                                                    <h5 class='me_title'>
                                                        <span>Total Earnings</span>
                                                    </h5>
                                                    <div class="cirle_container">
                                                        <div class="circle">
                                                            <h2>
                                                                450
                                                                <span>ROI</span>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid2">
                                                <div class="rental_yields">
                                                    <h5 class='me_title'>
                                                        <img src="public/images/icons8-neutral-trading-50.png" alt="">
                                                        <span>Total Earnings</span>
                                                    </h5>
                                                    <h1>&#8358;20,000.00</h1>
                                                </div>
                                                <div class="invested_locations">
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
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="header">
                                            <img src="public/images/icons8-futures-50.png" alt="">
                                            <h2>My Investments</h2>
                                        </div>
                                        <div class="search-employee">
                                            <div class="search_employee">
                                                <input type="text" name="search_employee" id="" placeholder="Search Employees"
                                                    onkeyup="searchEmployees()">
                                            <?php echo "<?xml version='1.0' encoding='UTF-8'?>";?>
                
                                                <!-- Generator: Adobe Illustrator 17.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
                                                    enable-background="new 0 0 50 50" xml:space="preserve">
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
                                            <div class="eval">
                                                <div class="eval_img">
                                                    <img src="public/images/Webp.net-compress-image.jpg" alt="">
                                                </div>
                                                <div class="eval_dets">
                                                    <div>
                                                        <h3>Fayehun Agro Investments</h3>
                                                        <span>1500 ROI</span>
                                                        <span>Started: 27th Aug 2018</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="eval">
                                                <div class="eval_img">
                                                    <img src="public/images/Webp.net-compress-image.jpg" alt="">
                                                </div>
                                                <div class="eval_dets">
                                                    <div>
                                                        <h3>Dustin Investments</h3>
                                                        <span>20 ROI</span>
                                                        <span>Started: 20th Aug 2018</span>
                                                    </div>
                                                </div>
                                            </div>
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
                }
                else {
                    emp.parentElement.parentElement.style.display = 'none'
                }
            })
        }
    
    </script>
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>
