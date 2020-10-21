<?php
session_start();
error_reporting(0);
$error = "";
$msg = "";
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

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">

                <?php
                    require_once "public/config/topbar.php";
                    ?>

            </div>
            <div class="row  dashboard-header">
                <div class="panel-heading">
                    <h2 class="page-title">Overhead</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                    <!-- Zero Configuration Table -->
                    <div class="panel panel-default panel-outer">
                        <div class="panel-heading">View Panel</div>
                        <div class="panel-body">
                            <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                <?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div
                                class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-primary text-light">
                                            <div class="stat-panel text-center">
                                                <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="wallet"
                                                    x="0px" y="0px" viewBox="0 0 1010 1010" xml:space="preserve">
                                                    <g id="wallet-wallet">
                                                        <path id="wallet-label" fill="#3BAFDA"
                                                            d="M1010 505c0 278.904-226.106 505-505 505C226.086 1010 0 783.904 0 505S226.086 0 505 0c278.894 0 505 226.096 505 505z" />
                                                        <g id="wallet-wallet_1_">
                                                            <path fill="#FFB933"
                                                                d="M757.5 595.9h-101c-11.165 0-20.2-9.044-20.2-20.2v-60.6c0-11.156 9.035-20.2 20.2-20.2h101c11.146 0 20.2 9.044 20.2 20.2v60.6c0 11.155-9.055 20.2-20.2 20.2z" />
                                                            <path fill="#454545"
                                                                d="M757.5 606h-101c-16.708 0-30.3-13.592-30.3-30.3v-60.6c0-16.708 13.592-30.3 30.3-30.3h101c16.709 0 30.3 13.592 30.3 30.3v60.6c0 16.708-13.591 30.3-30.3 30.3zm-101-101c-5.567 0-10.1 4.537-10.1 10.1v60.6c0 5.563 4.533 10.1 10.1 10.1h101c5.568 0 10.1-4.537 10.1-10.1v-60.6c0-5.563-4.532-10.1-10.1-10.1h-101z" />
                                                            <path fill="#454545"
                                                                d="M686.8 565.6c-11.14 0-20.2-9.055-20.2-20.2 0-11.146 9.06-20.2 20.2-20.2 11.14 0 20.2 9.054 20.2 20.2 0 11.145-9.06 20.2-20.2 20.2z" />
                                                            <path fill="#ACAF48"
                                                                d="M656.5 595.9c-11.165 0-20.2-9.044-20.2-20.2v-60.6c0-11.156 9.035-20.2 20.2-20.2h101V373.7c0-22.31-18.089-40.4-40.4-40.4H272.7c-22.31 0-40.4-18.09-40.4-40.4v424.2c0 22.31 18.09 40.4 40.4 40.4h444.4c22.311 0 40.4-18.09 40.4-40.4V595.9h-101z" />
                                                            <path fill="#454545"
                                                                d="M717.1 767.6H272.7c-27.844 0-50.5-22.657-50.5-50.5V292.9c0-5.583 4.523-10.1 10.1-10.1 5.578 0 10.1 4.517 10.1 10.1 0 16.708 13.592 30.3 30.3 30.3h444.4c27.844 0 50.5 22.656 50.5 50.5v121.2c0 5.582-4.522 10.1-10.1 10.1h-101c-5.567 0-10.1 4.537-10.1 10.1v60.6c0 5.563 4.533 10.1 10.1 10.1h101c5.578 0 10.1 4.517 10.1 10.1v121.2c0 27.843-22.656 50.5-50.5 50.5zM242.4 333.28V717.1c0 16.709 13.592 30.3 30.3 30.3h444.4c16.709 0 30.3-13.591 30.3-30.3V606h-90.9c-16.708 0-30.3-13.592-30.3-30.3v-60.6c0-16.708 13.592-30.3 30.3-30.3h90.9V373.7c0-16.709-13.591-30.3-30.3-30.3H272.7a50.259 50.259 0 0 1-30.3-10.12z" />
                                                            <path fill="none" d="M717.1 454.5" />
                                                            <path fill="#454545"
                                                                d="M717.1 424.2c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1z" />
                                                            <path fill="none" d="M717.1 373.7" />
                                                            <path fill="#454545"
                                                                d="M676.7 383.8c-5.557 0-10.1-4.547-10.1-10.1 0-5.563 4.543-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.554 0 10.1 4.537 10.1 10.1 0 5.553-4.546 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1z" />
                                                            <path fill="none" d="M272.7 373.7" />
                                                            <g>
                                                                <path fill="none" d="M717.1 636.3" />
                                                                <path fill="#454545"
                                                                    d="M717.1 686.8c-5.558 0-10.1-4.547-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.553-4.547 10.1-10.1 10.1z" />
                                                                <path fill="none" d="M717.1 717.1" />
                                                                <path fill="#454545"
                                                                    d="M676.7 727.2c-5.557 0-10.1-4.548-10.1-10.1 0-5.563 4.543-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.554 0 10.1 4.537 10.1 10.1 0 5.552-4.546 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1zm-40.4 0c-5.558 0-10.1-4.548-10.1-10.1 0-5.563 4.542-10.1 10.1-10.1 5.553 0 10.1 4.537 10.1 10.1 0 5.552-4.547 10.1-10.1 10.1z" />
                                                                <path fill="none" d="M272.7 717.1" />
                                                            </g>
                                                            <g>
                                                                <path fill="#818336"
                                                                    d="M717.1 333.3H272.7c-22.31 0-40.4-18.09-40.4-40.4 0-22.311 18.09-40.4 40.4-40.4h404c22.31 0 40.4 18.089 40.4 40.4v40.4z" />
                                                                <path fill="#454545"
                                                                    d="M717.1 343.4H272.7c-27.844 0-50.5-22.656-50.5-50.5s22.656-50.5 50.5-50.5h404c27.844 0 50.5 22.656 50.5 50.5v40.4c0 5.583-4.522 10.1-10.1 10.1zm-444.4-80.8c-16.708 0-30.3 13.591-30.3 30.3s13.592 30.3 30.3 30.3H707v-30.3c0-16.709-13.592-30.3-30.3-30.3h-404z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <metadata>
                                                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                            xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
                                                            xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                            <rdf:Description
                                                                about="https://iconscout.com/legal#licenses"
                                                                dc:title="wallet" dc:description="wallet"
                                                                dc:publisher="Iconscout" dc:date="2017-09-22"
                                                                dc:format="image/svg+xml" dc:language="en">
                                                                <dc:creator>
                                                                    <rdf:Bag>
                                                                        <rdf:li>EcommDesign</rdf:li>
                                                                    </rdf:Bag>
                                                                </dc:creator>
                                                            </rdf:Description>
                                                        </rdf:RDF>
                                                    </metadata>
                                                </svg>
                                                <div class="stat-panel-number h1 "></div>
                                                <div class="stat-panel-title text-uppercase">Insurance</div>
                                            </div>
                                        </div>
                                        <a href="insurancelist.php" class="block-anchor panel-footer text-center">Full
                                            Detail <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                        <div class="panel-body bk-success text-light">
                                            <div class="stat-panel text-center">
                                                <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="invoice" x="0px" y="0px" viewBox="0 0 1010 1010"
                                                    xml:space="preserve">
                                                    <g id="invoice-invoice">
                                                        <circle id="invoice-label" fill="#FC6E51" cx="505" cy="505"
                                                            r="505" />
                                                        <g id="invoice-invoice_1_">
                                                            <path fill="#FFF"
                                                                d="M719.536 787.8H290.464V222.2h351.063l78.01 78.009z" />
                                                            <path fill="#ACAF48"
                                                                d="M426.981 358.728h234.056v58.499H426.981z" />
                                                            <path fill="#FFB933"
                                                                d="M582.26 593.443h78.017v58.51H582.26z" />
                                                            <path fill="#FFF" d="M505 592.773h78.019v58.51H505z" />
                                                            <path fill="#3BAFDA" d="M641.527 222.2v78.009h78.01" />
                                                            <path fill="#454545"
                                                                d="M719.536 309.973h-87.773V222.2h19.529v68.244h68.244v19.53z" />
                                                            <path fill="#454545"
                                                                d="M729.637 797.9H280.364V212.1H645.71l83.927 83.926V797.9zm-429.073-20.2h408.873V304.39l-72.091-72.09H300.564v545.4z" />
                                                            <path fill="#454545"
                                                                d="M475.736 290.809H339.218v-20.2h136.518v20.2z" />
                                                            <path fill="#454545"
                                                                d="M671.137 661.383H338.873V348.627h332.264v312.756zm-312.064-20.201h291.865V368.827H359.072v272.355z" />
                                                            <path fill="#454545"
                                                                d="M670.782 710.481H514.755v-20.2h156.027v20.2z" />
                                                            <path fill="#454545"
                                                                d="M612.273 739.39h-97.518v-20.199h97.518v20.2z" />
                                                            <path fill="#454545"
                                                                d="M661.037 427.327H348.973v-20.2h312.064v20.2z" />
                                                            <path fill="#454545"
                                                                d="M437.082 651.282h-20.2V358.727h20.2v292.555z" />
                                                            <path fill="#454545"
                                                                d="M515.1 651.282h-20.2V417.227h20.2v234.055z" />
                                                            <path fill="#454545"
                                                                d="M593.12 651.282h-20.201V417.227h20.2v234.055z" />
                                                            <path fill="#454545"
                                                                d="M661.037 485.846H426.981v-20.2h234.056v20.2z" />
                                                            <path fill="#454545"
                                                                d="M661.037 544.355H426.981v-20.2h234.056v20.2z" />
                                                            <g>
                                                                <path fill="#454545"
                                                                    d="M661.037 602.873H426.981v-20.2h234.056v20.2z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <metadata>
                                                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                            xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
                                                            xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                            <rdf:Description
                                                                about="https://iconscout.com/legal#licenses"
                                                                dc:title="invoice" dc:description="invoice"
                                                                dc:publisher="Iconscout" dc:date="2017-09-22"
                                                                dc:format="image/svg+xml" dc:language="en">
                                                                <dc:creator>
                                                                    <rdf:Bag>
                                                                        <rdf:li>EcommDesign</rdf:li>
                                                                    </rdf:Bag>
                                                                </dc:creator>
                                                            </rdf:Description>
                                                        </rdf:RDF>
                                                    </metadata>
                                                </svg>
                                                <div class="stat-panel-number h1 "><?php echo htmlentities($regbd); ?>
                                                </div>
                                                <div class="stat-panel-title text-uppercase">Security</div>
                                            </div>
                                        </div>
                                        <a href="securitylist.php" class="block-anchor panel-footer text-center">Full
                                            Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>

                </div>

                <!---
                <div class="col-lg-4">
                        <?php
                        // require_once "public/config/right-sidebar.php";
                        ?>
					 </div>
		-->
            </div>

        </div>


    </div>

    </div>
    <style>
    #page-wrapper>div:nth-child(3)>div>div>div.panel-body>div>div>div>a:hover {
        color: #fff;
    }
    </style>
    <?php
        require_once "public/config/footer.php";
        ?>

</body>
<style>
svg {
    height: 100px;
    width: 100px;
}
</style>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>

<?php } ?>