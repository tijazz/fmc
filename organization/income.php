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
                <div class="panel-heading"><h2 class="page-title">INCOME</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h2 class="page-title"></h2>

                  <!-- Zero Configuration Table -->
						<div class="panel panel-default panel-outer" >
							<div class="panel-heading">View Panel</div>
							<div class="panel-body">
								<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
                                                                    
                                <div class="row">
									<div class="col-md-3">
										<div class="panel panel-default income-item" style='border-radius: 10px;box-shadow:1px 2px 5px 3px rgba(110, 104, 104, 0.335)'>
                                            <div class="info">Take a detailed look at income generated through product sales</div>
                                            <div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
                                                    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="money-pig" x="0px" y="0px" viewBox="0 0 1010 1010" xml:space="preserve"><g id="money-pig-money-pig"><circle id="money-pig-label" fill="#ACAF48" cx="505" cy="505" r="505"/><g id="money-pig-money-pig_1_"><path fill="#FC6E51" d="M505 348.529c24.352 0 68.708 4.537 90.9 10.1 50.402-52.364 124.199-46.683 129.06-36.396 2.95 6.264-21.59 41.564-38.16 66.696 26.69 23.238 49.277 59.16 60.6 90.9h40.4v86.008l-41.9 19.411c-15.938 43.852-49.306 81.45-92.773 107.45v70.187c0 2.27-.849 4.517-2.584 6.215-1.727 1.735-7.142 3.471-9.37 3.471h-83.799v-52.354s-39.019.058-52.355 0c-12.387-.06-41.889 0-41.889 0v52.354h-82.446c-3.157 0-6.353-1.736-9.243-3.492-2.89-1.795-1.173-4.122-2.593-6.963v-41.9s-81.254-65.61-83.78-157.102c-.255-9.212.277-22.034 0-31.425C293.423 424.595 375.387 348.53 505 348.53z"/><path fill="#454545" d="M641.173 782.67h-83.799c-5.578 0-10.1-4.517-10.1-10.099v-42.245c-12.506.02-33.279.03-42.298-.01-7.694-.029-22.025-.01-31.746-.02v42.275c0 5.582-4.522 10.1-10.1 10.1h-82.446c-5.559 0-10.249-2.387-14.485-4.961-6.248-3.876-6.618-9.844-6.737-11.807-.004-.02-.004-.05-.004-.069a10.11 10.11 0 0 1-.71-3.718v-37.234c-16.645-14.627-81.442-76.874-83.774-161.491-.128-4.656-.07-10.21 0-15.801.029-2.407.059-4.814.074-7.151-34.389-6.323-61.296-27.144-62.874-49.79-.395-5.642.498-24.58 28.56-31.592 5.36-1.292 10.893 1.943 12.244 7.358 1.352 5.415-1.943 10.899-7.353 12.25-5.153 1.282-13.734 4.37-13.3 10.583.7 10.022 17.354 25.23 43.768 30.813C289.803 409.336 378.483 338.429 505 338.429c22.656 0 63.007 3.807 87.719 9.104 42.55-40.943 96.97-44.898 120.416-41.032 11.353 1.854 18.208 5.593 20.96 11.412 4.409 9.38-2.476 21.867-32.185 66.518l-1.923 2.9c22.222 21.482 42.324 51.9 54.396 82.397H787.8c5.583 0 10.1 4.518 10.1 10.101v86.008c0 3.935-2.289 7.506-5.859 9.163l-38.14 17.675c-16.286 41.77-48.243 79.005-90.674 105.675v64.535c0 5.119-1.997 9.893-5.627 13.434-4.024 4.054-12.29 6.352-16.427 6.352zM379.317 761.92c.833.414 1.263.532 1.47.552h72.243v-42.254c0-5.573 4.508-10.09 10.08-10.1-.01 0 29.546-.07 41.96 0 13.325.068 52.285 0 52.29 0h.014a10.096 10.096 0 0 1 10.1 10.1v42.254h73.699c.241-.05 1.095-.326 1.854-.631v-69.142a10.1 10.1 0 0 1 4.916-8.67c42.275-25.29 73.694-61.597 88.47-102.233a10.065 10.065 0 0 1 5.247-5.711l36.04-16.698v-69.457h-30.3a10.086 10.086 0 0 1-9.508-6.707c-11.452-32.095-34.107-66.114-57.725-86.68-3.811-3.313-4.581-8.945-1.8-13.176l6.722-10.13c9.271-13.927 23.893-35.902 28.589-46.12-15.95-4.183-70.453-3.078-110.498 38.516-2.511 2.603-6.23 3.698-9.736 2.79-22.01-5.513-65.615-9.793-88.444-9.793-119.05 0-201.353 68.007-209.821 173.317.123 4.775.059 10.347-.005 15.88-.065 5.316-.133 10.584-.01 15.012 2.372 85.84 79.251 148.896 80.03 149.517a10.129 10.129 0 0 1 3.753 7.862v40.124c.159.552.281 1.085.37 1.578z"/><path fill="#454545" d="M625.904 451.955c0 11.62 9.45 21.068 21.069 21.068 11.648 0 21.067-9.449 21.067-21.068 0-11.639-9.419-21.107-21.067-21.107-11.62 0-21.069 9.468-21.069 21.107z"/><path fill="#454545" d="M570.314 398.585H439.685c-5.578 0-10.1-4.518-10.1-10.1 0-5.583 4.522-10.1 10.1-10.1h130.63c5.578 0 10.1 4.517 10.1 10.1 0 5.582-4.522 10.1-10.1 10.1z"/><path fill="#FFF" d="M429.25 313.179c0 41.84 33.91 75.75 75.75 75.75s75.75-33.91 75.75-75.75-33.91-75.75-75.75-75.75-75.75 33.91-75.75 75.75z"/><path fill="#454545" d="M505 399.029c-47.339 0-85.85-38.516-85.85-85.85s38.511-85.85 85.85-85.85 85.85 38.516 85.85 85.85-38.511 85.85-85.85 85.85zm0-151.5c-36.198 0-65.65 29.451-65.65 65.65 0 36.198 29.452 65.65 65.65 65.65s65.65-29.452 65.65-65.65c0-36.198-29.452-65.65-65.65-65.65z"/><circle fill="#FFB933" cx="505" cy="313.1787" r="45.4502"/></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="money,pig" dc:description="money,pig" dc:publisher="Iconscout" dc:date="2017-09-22" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>EcommDesign</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
													<div class="stat-panel-number h1 "></div>
													<div class="stat-panel-title text-uppercase">Product Sales</div>
												</div>
											</div>
											<a href="productsalelist.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default income-item" style='border-radius: 10px;box-shadow:1px 2px 5px 3px rgba(110, 104, 104, 0.335)'>
                                            <div class="info">Take a detailed look at income generated through service sales</div>
                                            <div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
                                                    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="delivery-truck" x="0px" y="0px" viewBox="0 0 1010 1010" xml:space="preserve"><g id="delivery-truck-delivery-truck"><path id="delivery-truck-label" fill="#ACAF48" d="M1010 505c0 278.904-226.106 505-505 505C226.086 1010 0 783.904 0 505S226.086 0 505 0c278.894 0 505 226.096 505 505z"/><g id="delivery-truck-delivery-truck_1_"><path fill="#FFF" d="M351.774 726.667c-28.564 0-51.802-23.247-51.802-51.821 0-28.565 23.238-51.802 51.802-51.802 28.574 0 51.832 23.237 51.832 51.802 0 28.574-23.258 51.821-51.832 51.821z"/><path fill="#FC6E51" d="M404.237 679.56l-.878-9.478c-2.407-26.385-25.083-47.038-51.585-47.038-26.493 0-49.149 20.653-51.555 47.038l-.878 9.479h-46.466c-10.396 0-18.858-8.444-18.858-18.85V378.099c0-10.396 8.462-18.84 18.858-18.84h282.612c10.387 0 18.84 8.444 18.84 18.84v43.537l-.11.769c-.147.927-.315 1.834-.315 2.801v27.242l.424 10.436V679.56h-150.09z"/><path fill="#FFF" d="M681.514 726.667c-28.584 0-51.823-23.247-51.823-51.821 0-28.565 23.239-51.802 51.823-51.802 28.563 0 51.811 23.237 51.811 51.802 0 28.574-23.248 51.821-51.811 51.821z"/><path fill="#FFB933" d="M733.957 679.56l-.879-9.478c-2.406-26.385-25.062-47.038-51.564-47.038-26.513 0-49.17 20.653-51.576 47.038l-.878 9.479h-74.734V444.045h131.902c10.386 0 18.829 8.453 18.829 18.839l37.677 84.784 56.537 9.43h1.519l1.213.414c9.34 2.771 16.097 18.562 16.097 27.834v56.537h-55.51 55.51v18.828c0 10.406-8.443 18.85-18.829 18.85h-65.314z"/><path fill="#454545" d="M799.271 689.66h-56.537v-20.2h56.537c4.813 0 8.729-3.925 8.729-8.75v-75.364c0-7.14-5.952-17.418-8.892-18.168-.557 0-.947-.03-1.499-.118l-56.537-9.43a10.1 10.1 0 0 1-7.57-5.858l-37.677-84.786a10.102 10.102 0 0 1-.868-4.102c0-4.824-3.916-8.74-8.729-8.74H554.326v-20.199h131.902c15.16 0 27.632 11.717 28.835 26.581l34.695 78.068 50.5 8.424c16.84.847 27.942 23.356 27.942 38.328v75.365c0 15.969-12.975 28.95-28.929 28.95z"/><path fill="#454545" d="M290.543 689.66h-37.668c-15.969 0-28.959-12.98-28.959-28.95V538.24h20.2v122.47c0 4.825 3.93 8.75 8.759 8.75h37.668v20.2z"/><path fill="#454545" d="M629.691 689.66H403.605v-20.2h226.086v20.2z"/><path fill="#454545" d="M351.774 736.768c-34.132 0-61.902-27.776-61.902-61.922 0-34.127 27.77-61.903 61.902-61.903 34.152 0 61.932 27.776 61.932 61.903 0 34.146-27.78 61.922-61.932 61.922zm0-103.624c-22.996 0-41.702 18.7-41.702 41.702s18.706 41.721 41.702 41.721c23.011 0 41.732-18.72 41.732-41.721s-18.72-41.702-41.732-41.702z"/><path fill="#454545" d="M681.514 736.768c-34.143 0-61.922-27.776-61.922-61.922 0-34.127 27.78-61.903 61.922-61.903 34.136 0 61.912 27.776 61.912 61.903 0 34.146-27.776 61.922-61.912 61.922zm0-103.624c-23.006 0-41.722 18.7-41.722 41.702s18.716 41.721 41.722 41.721c23 0 41.71-18.72 41.71-41.721s-18.71-41.702-41.71-41.702z"/><path fill="#454545" d="M808.69 651.982h-56.526v-20.2h56.526v20.2z"/><path fill="#454545" d="M564.426 670.13h-20.2V444.046h20.2V670.13z"/><path fill="#454545" d="M620.273 601.719h-28.279v-20.2h28.279v20.2z"/><path fill="#454545" d="M564.426 585.346h-20.2V378.099c0-4.823-3.92-8.739-8.739-8.739H252.875c-4.828 0-8.759 3.916-8.759 8.739v207.247h-20.2V378.099c0-15.959 12.99-28.939 28.959-28.939h282.612c15.96 0 28.94 12.98 28.94 28.939v207.247z"/><path fill="#454545" d="M526.068 425.877H252.875v-20.2h273.193v20.2z"/><path fill="#454545" d="M526.068 501.252H252.875v-20.2h273.193v20.2z"/><path fill="#454545" d="M526.068 576.607H252.875v-20.2h273.193v20.2z"/><path fill="#3BAFDA" d="M582.595 548.714c0 5.208 4.221 9.419 9.4 9.419h103.653c5.198 0 9.409-4.211 9.409-9.42l-28.258-56.535c0-5.208-4.222-9.42-9.43-9.42h-75.375c-5.178 0-9.4 4.212-9.4 9.42v56.536z"/><path fill="#454545" d="M695.648 568.233H591.994c-10.75 0-19.5-8.758-19.5-19.52v-56.535c0-10.761 8.75-19.52 19.5-19.52h75.375c9.824 0 17.98 7.29 19.332 16.748l27.39 54.79a10.08 10.08 0 0 1 1.066 4.518c0 10.76-8.754 19.52-19.51 19.52zm-28.949-76.055l-74.705.68.7 55.856 100.74-.671-25.67-51.348c-.7-1.4-1.065-2.94-1.065-4.517z"/><g><path fill="#FFF" d="M329.65 263.133c53.775 0 97.361 43.595 97.361 97.35 0 53.775-43.586 97.351-97.36 97.351-53.775 0-97.351-43.576-97.351-97.35 0-53.755 43.576-97.351 97.35-97.351z"/><path fill="#454545" d="M329.65 467.934c-59.248 0-107.45-48.192-107.45-107.45 0-59.24 48.202-107.452 107.45-107.452 59.254 0 107.461 48.212 107.461 107.451 0 59.259-48.207 107.45-107.46 107.45zm0-194.702c-48.107 0-87.25 39.148-87.25 87.251 0 48.113 39.142 87.25 87.25 87.25 48.119 0 87.261-39.137 87.261-87.25 0-48.103-39.142-87.25-87.26-87.25z"/><g><path fill="#454545" d="M385.29 370.268h-65.887v-85.85h20.2v65.65h45.687v20.2z"/></g></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="delivery,truck" dc:description="delivery,truck" dc:publisher="Iconscout" dc:date="2017-09-22" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>EcommDesign</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Service Sales</div>
												</div>
											</div>
											<a href="servicelist.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default income-item" style='border-radius: 10px;box-shadow:1px 2px 5px 3px rgba(110, 104, 104, 0.335)'>
                                            <div class="info">Take a detailed look at income generated through grants</div>
                                            <div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="giftbox" x="0px" y="0px" viewBox="0 0 1010 1010" xml:space="preserve"><g id="giftbox-giftbox"><path id="giftbox-label" fill="#FFB933" d="M1010 505c0 278.894-226.096 505-505 505S0 783.894 0 505C0 226.086 226.096 0 505 0s505 226.086 505 505z"/><g id="giftbox-giftbox_1_"><path fill="#3BAFDA" d="M554.612 351.192h208.382v99.224H554.612z"/><path fill="#FC6E51" d="M455.388 351.192h99.224v99.224h-99.224z"/><path fill="#FC6E51" d="M455.388 450.416h99.224V787.8h-99.224z"/><path fill="#3BAFDA" d="M247.006 351.192h208.382v99.224H247.006z"/><path fill="#FFF" d="M267.068 450.416h188.32V787.8h-188.32z"/><path fill="#FFF" d="M554.612 450.416h189.563V787.8H554.612z"/><g><path fill="#454545" d="M465.488 787.8h-20.2V351.192h20.2V787.8z"/><path fill="#454545" d="M564.712 787.8h-20.2V351.192h20.2V787.8z"/><path fill="#454545" d="M744.175 797.9H267.068c-5.578 0-10.1-4.517-10.1-10.1V450.416h20.2V777.7h456.906V450.416h20.201V787.8c0 5.583-4.517 10.1-10.1 10.1z"/><path fill="#454545" d="M762.994 460.517H247.006c-5.577 0-10.1-4.518-10.1-10.101v-99.224c0-5.583 4.523-10.1 10.1-10.1h515.988c5.582 0 10.1 4.517 10.1 10.1v99.224c0 5.583-4.518 10.1-10.1 10.1zm-505.888-20.2h495.788v-79.025H257.106v79.024z"/><path fill="#454545" d="M505 351.37c-.33 0-.666-.02-1.001-.05-3.28-.325-80.643-8.344-110.918-38.595-22.971-22.981-22.971-60.383-.005-83.365 11.146-11.135 25.95-17.26 41.693-17.26 15.742 0 30.546 6.125 41.677 17.26 30.275 30.251 38.28 107.629 38.605 110.913A10.102 10.102 0 0 1 505 351.37h-.001zM434.769 232.3c-10.352 0-20.082 4.024-27.406 11.343-15.1 15.11-15.1 39.69.005 54.8 17.458 17.448 60.408 27.203 85.93 31.128-3.921-25.526-13.671-68.48-31.134-85.928-7.319-7.319-17.049-11.343-27.395-11.343z"/><path fill="#454545" d="M505 351.37a10.1 10.1 0 0 1-7.14-2.96 10.093 10.093 0 0 1-2.91-8.137c.325-3.284 8.34-80.662 38.604-110.913 11.131-11.135 25.936-17.26 41.677-17.26 15.743 0 30.547 6.125 41.688 17.26 22.972 22.982 22.972 60.384.005 83.365-30.28 30.25-107.643 38.27-110.923 38.595-.335.03-.67.05-1.001.05zm70.231-119.07c-10.346 0-20.076 4.024-27.395 11.343-17.453 17.448-27.212 60.402-31.133 85.928 25.521-3.925 68.47-13.68 85.934-31.128 15.1-15.11 15.1-39.69-.005-54.8-7.318-7.319-17.049-11.343-27.4-11.343z"/><g><path fill="#FFF" d="M515.1 767.955h-20.2v-15.15h20.2v15.15zm0-35.35h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2zm0-40.4h-20.2v-20.2h20.2v20.2z"/></g></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="giftbox" dc:description="giftbox" dc:publisher="Iconscout" dc:date="2017-09-22" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>EcommDesign</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>

													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Grants</div>
												</div>
											</div>
											<a href="grantlist.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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
	
		   #page-wrapper > div:nth-child(3) > div > div > div.panel-body > div > div > div > a:hover{
			   color:#fff;
           }
           svg{height:100px;width:100px;}
           .panel a{color:#1ab394;}
           .panel a:hover{color:#085747 !important;}
           .income-item{
               transition:0.4s ease;
               position:relative;
           }

           .info{
               position:absolute;
               background:rgba(0, 0, 0, 0.719);
               padding:1rem 1.5rem ;
               border-radius: 5px;
               color:#fff;
               width:80%;
               left:50%;
               transform:translateX(-50%);
               text-align:center;
               opacity:0;
               top:-10px;
               transition:0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
               box-shadow: 3px 4px 9px 4px #8d8d8d1f;
           }

           .income-item:hover{
               transform: translateY(-3px);
           }

           .income-item:hover .info{
               opacity:1;
               /* transform:translateX(-50%); */
               top:-30px;
           }
	   </style>
        <?php
                require_once "public/config/footer.php";
                ?>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>