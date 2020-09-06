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

                <div class="row info-wrapper">

                    <div class="col-lg-12">

                        <div class="col-lg-9 col-md-12 col-sm-12 left-details">
                            <div class="group">
                                <div class="activity-log shadow">
                                    <div class="headers">
                                        <h3 style="margin-left:1rem;">Activity Log</h3>
                                    </div>
                                    <ul>
                                        <li> <span>Added Solar Panels</span> <span>Sola Adeyemo</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Added Solar Panels</span> <span>Sola Adeyemo</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Added Solar Panels</span> <span>Sola Adeyemo</span> <span>27th
                                                Aug.</span> </li>
                                        <li> <span>Added Solar Panels</span> <span>Sola Adeyemo</span> <span>27th
                                                Aug.</span> </li>
                                    </ul>
                                    <a href="#" class="rdr">More <span></span></a>
                                </div>
                                <div class="farm-details shadow">
                                    <div class="headers">
                                        <h3>Farm Details</h3>
                                    </div>
                                    <ul>
                                        <li><span>Irrigation</span>
                                            <div></div><span class="green-check">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Generator: Adobe Illustrator 23.0.5, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #FFFFFF;
                                                            stroke: #FFFFFF;
                                                            stroke-width: 2;
                                                            stroke-miterlimit: 10;
                                                        }
                                                    </style>
                                                    <path class="st0"
                                                        d="M40.3,14.6L21,33.9l-9.3-9.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l10,10c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 l20-20c0.4-0.4,0.4-1,0-1.4S40.7,14.2,40.3,14.6z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li><span>Pesticides</span>
                                            <div></div><span class="red-check">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Generator: Adobe Illustrator 23.0.5, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 352 512" style="enable-background:new 0 0 352 512;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #FFFFFF;
                                                            stroke: #FFFFFF;
                                                            stroke-width: 2;
                                                            stroke-miterlimit: 10;
                                                        }
                                                    </style>
                                                    <path class="st0"
                                                        d="M242.7,256l100.1-100.1c12.3-12.3,12.3-32.2,0-44.5l-22.2-22.2c-12.3-12.3-32.2-12.3-44.5,0L176,189.3 L75.9,89.2c-12.3-12.3-32.2-12.3-44.5,0L9.2,111.4c-12.3,12.3-12.3,32.2,0,44.5L109.3,256L9.2,356.1c-12.3,12.3-12.3,32.2,0,44.5 l22.2,22.2c12.3,12.3,32.2,12.3,44.5,0L176,322.7l100.1,100.1c12.3,12.3,32.2,12.3,44.5,0l22.2-22.2c12.3-12.3,12.3-32.2,0-44.5 L242.7,256z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li><span>Weeding</span>
                                            <div></div><span class="green-check">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Generator: Adobe Illustrator 23.0.5, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #FFFFFF;
                                                            stroke: #FFFFFF;
                                                            stroke-width: 2;
                                                            stroke-miterlimit: 10;
                                                        }
                                                    </style>
                                                    <path class="st0"
                                                        d="M40.3,14.6L21,33.9l-9.3-9.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l10,10c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 l20-20c0.4-0.4,0.4-1,0-1.4S40.7,14.2,40.3,14.6z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li><span>Harvesting</span>
                                            <div></div><span class="red-check">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Generator: Adobe Illustrator 23.0.5, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 352 512" style="enable-background:new 0 0 352 512;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #FFFFFF;
                                                            stroke: #FFFFFF;
                                                            stroke-width: 2;
                                                            stroke-miterlimit: 10;
                                                        }
                                                    </style>
                                                    <path class="st0"
                                                        d="M242.7,256l100.1-100.1c12.3-12.3,12.3-32.2,0-44.5l-22.2-22.2c-12.3-12.3-32.2-12.3-44.5,0L176,189.3 L75.9,89.2c-12.3-12.3-32.2-12.3-44.5,0L9.2,111.4c-12.3,12.3-12.3,32.2,0,44.5L109.3,256L9.2,356.1c-12.3,12.3-12.3,32.2,0,44.5 l22.2,22.2c12.3,12.3,32.2,12.3,44.5,0L176,322.7l100.1,100.1c12.3,12.3,32.2,12.3,44.5,0l22.2-22.2c12.3-12.3,12.3-32.2,0-44.5 L242.7,256z" />
                                                </svg>
                                            </span>
                                        </li>
                                        <li><span>Feyi</span>
                                            <div></div><span class="green-check">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <!-- Generator: Adobe Illustrator 23.0.5, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;"
                                                    xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: #FFFFFF;
                                                            stroke: #FFFFFF;
                                                            stroke-width: 2;
                                                            stroke-miterlimit: 10;
                                                        }
                                                    </style>
                                                    <path class="st0"
                                                        d="M40.3,14.6L21,33.9l-9.3-9.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l10,10c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 l20-20c0.4-0.4,0.4-1,0-1.4S40.7,14.2,40.3,14.6z" />
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="perf-summary shadow">
                                <h3>Performance Summary</h3>
                                <div class="items">
                                    <div class="chart">

                                    </div>

                                    <div class="performance">

                                        <div class="perf">
                                            <div class="title text-white">Adeola Investments</div>
                                            <div class="perf-details">
                                                <div class="loader">
                                                    <div class="insider neg"></div>
                                                </div>
                                                <span>60%</span>
                                            </div>
                                        </div>


                                        <div class="perf">
                                            <div class="title text-white">Adeola Investments</div>
                                            <div class="perf-details">
                                                <div class="loader">
                                                    <div class="insider pos"></div>
                                                </div>
                                                <span>90%</span>
                                            </div>


                                            <div class="perf">
                                                <div class="title text-white">Adeola Investments</div>
                                                <div class="perf-details">
                                                    <div class="loader">
                                                        <div class="insider pos"></div>
                                                    </div>
                                                    <span>30%</span>
                                                </div>
                                            </div>


                                            <div class="perf">
                                                <div class="title text-white">Adeola Investments</div>
                                                <div class="perf-details">
                                                    <div class="loader">
                                                        <div class="insider neg"></div>
                                                    </div>
                                                    <span>20%</span>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 right-details">
                            <h1>right</h1>
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
    </style>
    <script>
        let progresses = document.querySelectorAll('.insider');
        for (var i = 0; i < progresses.length; i++) {
            var myWidth = progresses[i].parentElement.parentElement.querySelector('span').innerText;
            progresses[i].style.width = myWidth;
        }

    </script>
    <?php
                require_once "public/config/footer.php";
                ?>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>