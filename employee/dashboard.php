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
                        <h2 class="FMS-title"><?php echo ($_SESSION["org"]); ?> Management Services</h2>


                        <div class="holder">

                            <div class="risk_management-fm">
                                <div class="title-fm">Risk Management</div>
                                <div class="svg-holder">

                                    <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 512.046 512.046" height="512px" viewBox="0 0 512.046 512.046" width="512px" class="hovered-paths">
                                        <g>
                                            <g>
                                                <path d="m395.32 181.387-108.619 23.753 53.109-185.98c4.614-16.164-16.999-26.519-26.69-12.752l-211.861 301c-7.966 11.318 2.418 26.507 15.852 23.199l96.784-23.826-52.936 186.158c-4.561 16.04 16.673 26.263 26.478 13.036l223.139-301c8.234-11.11-1.749-26.54-15.256-23.588zm-183.016 240.666 37.509-131.909c3.137-11.029-6.813-21.425-18.013-18.668l-82.937 20.417 137.752-195.708-35.653 124.852c-3.103 10.866 6.521 21.205 17.628 18.772l94.064-20.57z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#1AB394" />
                                                <path d="m385.636 422.043-35.999-.6 19.12-37.603c3.755-7.385.813-16.415-6.572-20.169-7.386-3.756-16.415-.813-20.17 6.572l-30 59c-6.103 11.965 1.884 19.807 13.387 21.801l35.914.599-19.345 38.691c-3.705 7.41-.702 16.419 6.708 20.125 7.424 3.712 16.426.687 20.124-6.708l30-60c4.927-9.858-2.203-21.546-13.167-21.708z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#1AB394" />
                                                <path d="m152.094 1.625c-7.41-3.704-16.42-.701-20.125 6.708l-30 60c-4.879 9.759 2.079 21.708 13.504 21.708h35.642l-19.146 38.292c-3.705 7.41-.701 16.419 6.708 20.125 7.424 3.712 16.427.687 20.125-6.708l30-60c4.991-9.983-2.35-21.708-13.417-21.708h-35.729l19.146-38.292c3.705-7.41.701-16.42-6.708-20.125z" data-original="#000000" class="hovered-path active-path" data-old_color="#000000" fill="#1AB394" />
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <a href="na.php" id="proceed">View</a>
                            </div>

                            <div class="supply-chn-mgt-fm">
                                <div class="title-fm">Supply-chain Management</div>
                                <div class="svg-holder">
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <polyline style="fill:#FDB62F;" points="459.932,394.847 512,394.847 512,299.39 433.898,177.898 338.441,177.898 338.441,394.847 
		373.153,394.847 	" />
                                            <polyline style="fill:#FDB62F;" points="78.102,394.847 8.678,394.847 8.678,117.153 338.441,117.153 338.441,394.847 
		164.881,394.847 	" />
                                        </g>
                                        <g>
                                            <rect x="8.678" y="351.458" style="fill:#F46B27;" width="52.068" height="17.356" />
                                            <rect x="182.237" y="351.458" style="fill:#F46B27;" width="156.203" height="17.356" />
                                        </g>
                                        <rect x="477.288" y="351.458" style="fill:#DBDBDB;" width="34.712" height="17.356" />
                                        <rect x="34.712" y="143.186" style="fill:#F46B27;" width="303.729" height="17.356" />
                                        <g>
                                            <circle style="fill:#126099;" cx="121.492" cy="394.847" r="43.39" />
                                            <circle style="fill:#126099;" cx="416.542" cy="394.847" r="43.39" />
                                        </g>
                                        <g>
                                            <rect x="112.814" y="386.169" style="fill:#DBDBDB;" width="17.356" height="17.356" />
                                            <rect x="407.864" y="386.169" style="fill:#DBDBDB;" width="17.356" height="17.356" />
                                            <rect x="34.712" y="73.763" style="fill:#DBDBDB;" width="121.492" height="17.356" />
                                            <rect y="73.763" style="fill:#DBDBDB;" width="17.356" height="17.356" />
                                        </g>
                                        <polygon style="fill:#87CED9;" points="456.201,212.61 373.153,212.61 373.153,290.712 506.446,290.712 " />
                                        <rect x="338.441" y="177.898" style="fill:#FFA83D;" width="17.356" height="216.949" />
                                        <path style="fill:#6CBBC7;" d="M506.446,290.712l-47.121-73.329c-23.161,27.483-52.762,48.796-86.172,62.047v11.281H506.446z" />
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>

                                </div>
                                <a href="na.php" id="proceed">View</a>
                            </div>

                            <div class="inventory-mgt-fm">
                                <div class="title-fm">Inventory</div>
                                <div class="svg-holder">
                                    <svg id="Layer_5" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="m29 10h-24c0-4.42 3.58-8 8-8h8c4.42 0 8 3.58 8 8z" fill="#ff826e" />
                                                </g>
                                                <g>
                                                    <path d="m31 12v1c0 .55-.45 1-1 1h-3-14-8-1c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1h1 24 1c.55 0 1 .45 1 1z" fill="#fc6e51" />
                                                </g>
                                                <g>
                                                    <path d="m13 26v4l-1.51-.57c-3.9-1.46-6.49-5.19-6.49-9.36v-6.07h8v4h-.67c-.92 0-1.75.37-2.35.98-.61.6-.98 1.43-.98 2.35 0 1.05.49 2.04 1.33 2.67z" fill="#b27946" />
                                                </g>
                                                <g>
                                                    <path d="m18 52v6h-6.4c-5.3 0-9.6-4.3-9.6-9.6 0-3.36 1.13-6.52 3.07-9.06 1.56-2.05 3.66-3.7 6.11-4.72l.82 7.38 4-4 4 4 .86-7.75.19.02c5.65.76 10.22 4.62 12.07 9.73h-9.12c-1.1 0-2 .9-2 2v4h-.76c-.79 0-1.56.32-2.12.88z" fill="#b4dd7f" />
                                                </g>
                                                <g>
                                                    <path d="m19 34 1.86.25-.86 7.75-4-4z" fill="#a0d468" />
                                                </g>
                                                <g>
                                                    <path d="m13 34 3 4-4 4-.82-7.38c.59-.24 1.19-.45 1.82-.62z" fill="#a0d468" />
                                                </g>
                                                <g>
                                                    <path d="m38 52v8c0 1.1-.9 2-2 2h-12c-1.1 0-2-.9-2-2v-2h1c1.66 0 3-1.34 3-3v-2c0-1.66-1.34-3-3-3h-1v-4c0-1.1.9-2 2-2h9.12 2.88c1.1 0 2 .9 2 2z" fill="#e6e9ed" />
                                                </g>
                                                <g>
                                                    <path d="m28.65 19.48c.23.34.35.74.35 1.14 0 .85-.48 1.62-1.23 2l-.77.38v3c0 2.21-1.79 4-4 4h-4v3 1l-3 4-3-4v-4-4l-2.67-2c-.84-.63-1.33-1.62-1.33-2.67 0-.92.37-1.75.98-2.35.6-.61 1.43-.98 2.35-.98h.67v-4h14v3z" fill="#f0d0b4" />
                                                </g>
                                                <g>
                                                    <path d="m26 53v2c0 1.66-1.34 3-3 3h-1-4v-6l1.12-1.12c.56-.56 1.33-.88 2.12-.88h.76 1c1.66 0 3 1.34 3 3z" fill="#f0d0b4" />
                                                </g>
                                                <g>
                                                    <path d="m62 4v16c0 1.1-.9 2-2 2h-8-8c-1.1 0-2-.9-2-2v-8-8c0-1.1.9-2 2-2h4v6h8v-6h4c1.1 0 2 .9 2 2z" fill="#d3a06c" />
                                                </g>
                                                <g>
                                                    <circle cx="52" cy="52" fill="#fcd770" r="10" />
                                                </g>
                                                <g>
                                                    <path d="m48 2h8v6h-8z" fill="#b27946" />
                                                </g>
                                                <g>
                                                    <circle cx="52" cy="32" fill="#ff826e" r="2" />
                                                </g>
                                            </g>
                                            <g>
                                                <path d="m51 45v2.145c-1.155.366-2 1.435-2 2.709 0 1.087.604 2.065 1.578 2.553l1.95.975c.291.145.472.438.472.764 0 .47-.383.854-.854.854h-.292c-.471 0-.854-.384-.854-.854v-1.146h-2v1.146c0 1.275.845 2.344 2 2.709v2.145h2v-2.145c1.155-.366 2-1.435 2-2.709 0-1.087-.604-2.065-1.578-2.553l-1.95-.975c-.291-.145-.472-.438-.472-.764 0-.47.383-.854.854-.854h.292c.471 0 .854.384.854.854v1.146h2v-1.146c0-1.275-.845-2.344-2-2.709v-2.145z" />
                                                <path d="m60 23c1.654 0 3-1.346 3-3v-16c0-1.654-1.346-3-3-3h-16c-1.654 0-3 1.346-3 3v7h-9c0-1.103-.897-2-2-2h-.059c-.5-4.493-4.317-8-8.941-8h-8c-4.624 0-8.442 3.507-8.941 8h-.059c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2v5.07c0 4.56 2.868 8.698 7.138 10.3l.862.323v2.563c-6.514 2.12-11 8.24-11 15.146 0 5.843 4.754 10.598 10.598 10.598h9.402v1c0 1.654 1.346 3 3 3h12c1.654 0 3-1.346 3-3v-7h2.051c.507 5.598 5.221 10 10.949 10 6.065 0 11-4.935 11-11 0-5.728-4.402-10.442-10-10.949v-6.235c1.161-.414 2-1.514 2-2.816s-.839-2.402-2-2.816v-6.184zm-11-20h6v4h-6zm-6 1c0-.552.449-1 1-1h3v6h10v-6h3c.551 0 1 .448 1 1v16c0 .552-.449 1-1 1h-16c-.551 0-1-.448-1-1zm-30-1h8c3.519 0 6.432 2.614 6.92 6h-21.84c.488-3.386 3.401-6 6.92-6zm-9 8h26v2l-26 .001zm23.823 9.036c.115.174.177.377.177.587 0 .468-.26.889-.679 1.099l-1.321.66v3.618c0 1.654-1.346 3-3 3h-5v4.667l-2 2.666-2-2.666v-8.167l-3.066-2.3c-.585-.438-.934-1.137-.934-1.867 0-1.286 1.047-2.333 2.333-2.333h1.667v-4h12v2.303zm-8.375 15.033.312.041-.524 4.711-1.916-1.915zm-6.822.099 2.054 2.739-1.916 1.915-.504-4.537c.12-.044.244-.078.366-.117zm-.786-6.671c-3.493-1.309-5.84-4.696-5.84-8.427v-5.07h6v2.013c-2.234.171-4 2.043-4 4.32 0 1.356.648 2.652 1.733 3.467l2.267 1.7v2.057zm-8.84 19.904c0-5.193 2.907-9.871 7.343-12.26l.893 8.038 4.764-4.765 4.764 4.765.975-8.776c4.327.841 7.958 3.653 9.863 7.597h-7.602c-1.654 0-3 1.346-3 3v3.024c-.975.059-1.888.451-2.586 1.148l-.828.828h-4.465c-1.084 0-2.146-.44-2.914-1.207-.778-.778-1.207-1.813-1.207-2.914v-2.879h-2v2.879c0 1.636.637 3.173 1.793 4.328 1.157 1.156 2.694 1.793 4.328 1.793h3.879v4h-5.402c-4.741 0-8.598-3.857-8.598-8.599zm16 4.013.828-.828c.379-.378.881-.586 1.415-.586h1.757c1.103 0 2 .897 2 2v2c0 1.103-.897 2-2 2h-4zm18 7.586c0 .552-.449 1-1 1h-12c-.551 0-1-.448-1-1v-1c2.206 0 4-1.794 4-4v-2c0-2.206-1.794-4-4-4v-3c0-.552.449-1 1-1h12c.551 0 1 .448 1 1zm24-8c0 4.963-4.038 9-9 9s-9-4.037-9-9 4.038-9 9-9 9 4.037 9 9zm-9-19c-.551 0-1-.448-1-1s.449-1 1-1 1 .448 1 1-.449 1-1 1zm-1-3.816c-1.161.414-2 1.514-2 2.816s.839 2.402 2 2.816v6.235c-5.268.478-9.472 4.681-9.949 9.949h-2.051v-5c0-1.654-1.346-3-3-3h-2.209c-2.166-5.26-6.934-8.961-12.614-9.719l-1.177-.157v-2.124h3c2.757 0 5-2.243 5-5v-2.382l.216-.107c1.1-.552 1.784-1.657 1.784-2.888 0-.605-.177-1.192-.513-1.696l-1.487-2.23v-1.697h2c1.103 0 2-.897 2-2h9v7c0 1.654 1.346 3 3 3h7z" />
                                                <path d="m27 47h6v2h-6z" />
                                            </g>
                                        </g>
                                    </svg>
                                    <a href="na.php" id="proceed">View</a>
                                </div>
                            </div>


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
                                <div class="monitoring-mgt-fm">
                                    <div class="title-fm-spec"><b>Monitoring Management</b></div>
                                    <a href="na.php" id="proceed">View</a>

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
    <style>
        th.sorting::after {
            height: 3px;
            width: 5px;
            background: red !important;
        }
    </style>
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

    </html>

<?php } ?>