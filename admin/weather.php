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
         	
if(isset($_GET['lng']))
{

$longitude = $_GET['lng'];
$latitude = $_GET['lat'];
$location = $_GET['location'];
$api_key = '797897c2f10238d2556eadcc88930024';
$units = 'auto';  // Read the API docs for full details // default is auto


$json = 'https://api.forecast.io/forecast/'.$api_key.'/'.$latitude.','.$longitude.'?units='.$units; 
//$json = 'sample.json';  //for testing
$json = file_get_contents($json); 
$response = json_decode($json, true); 
      
if ($response != null) {

  $lat = $response['latitude'];
  $lon = $response['longitude'];
  $tz = $response['timezone'];
  $offset = $response['offset'];

  //Current Conditions
  $curTime = $response['currently']['time'];
  $curSummary = $response['currently']['summary'];
  $curIcon = $response['currently']['icon'];
  $curPrecipProb = ($response['currently']['precipProbability'])*100;
    if (isset($response['currently']['precipType'])) {
      $curPrecipType = $response['currently']['precipType'];
    }     
  $curTemp = round($response['currently']['temperature']);
  $curFeelsLike = round($response['currently']['apparentTemperature']);
  $curHumidity = ($response['currently']['humidity'])*100;
  $curDewPoint = $response['currently']['dewPoint'];
  $curWindSpeed = $response['currently']['windSpeed'];
  $curWindBearing = $response['currently']['windBearing'];
  $curCloudCover = ($response['currently']['cloudCover'])*100;
  $curPressure = round(($response['currently']['pressure'])*0.0295301, 2);
  $curVis = round($response['currently']['visibility']);

  //Now Conditions
  //$nowSumamry = $response['minutely']['summary'];
  //$nowIcon = $response['minutely']['icon'];

  //Hourly Forecast
  $hourlySumamry = $response['hourly']['summary'];
  $hourlyIcon = $response['hourly']['icon'];
  $hourlyCond= array();
    foreach ($response['hourly']['data'] as $td) {
      $hourlyCond[] = $td;
    } 

  //Daily Forecast
  $dailySumamry = $response['daily']['summary'];
  $dailyIcon = $response['daily']['icon'];
  $dailyCond= array();
    foreach ($response['daily']['data'] as $d) {
      $dailyCond[] = $d;
    } 

}
}    
?>

        <!DOCTYPE html>
        <html>


        <?php
        require_once ('public/config/header.php');
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
                <div class="row  border-bottom white-bg dashboard-header">
                <div class="panel-heading"><h4>Maintenance</h4></div>
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

				</div>
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                <div class="ibox-content">
                        <div class="row">
                        <input type="search" id="address" class="form-control" placeholder="Your location" />
                        <!-- Page Content Holder -->
            <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date("g:i a | l, F j", $curTime); ?></a></li> <!-- forecast time -->
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="container-fluid" id="msl">

            <div class="row">
            <h3 class="ml-15 text-info"><p>Selected: <strong id="address-value"><?php echo $location?></strong></p></small></h3>
            <!-- CURRENT CONDITIONS -->
            <?php require 'weather/partials/part_current.php' ?>

            <!-- TODAY FORECAST -->
            <?php require 'weather/partials/part_today.php' ?>

            </div> <!-- /row -->

            <!-- HOURLY -->
            <?php require 'weather/partials/part_hourly.php' ?>

            <!-- WEEK FORECAST -->
            <?php require 'weather/partials/part_daily.php' ?>

            </div> <!-- /container -->




<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script>
(function() {
  var placesAutocomplete = places({
    appId: 'plOFI0YHLC56',
    apiKey: 'cd2f8c915311c6ada6b7da90a861f87b',
    container: document.querySelector('#address'),
    templates: {
        value: function(suggestion) {
            return suggestion.name
        },
        nam: function(suggestion) {
            return suggestion.latlng['lng']
        }
    }
  }).configure({
    type: 'city',
    countries: ['ng'],
    aroundLatLngViaIP: false,
  });

  var $address = document.querySelector('#address-value')
  var $lng = document.querySelector('#lng')
  var $lat = document.querySelector('#lat')
  placesAutocomplete.on('change', function(e) {
    $location = e.suggestion.value;
    $lng = e.suggestion.latlng['lng'];
    $lat = e.suggestion.latlng['lat'];
    window.location.href = "weather.php?lng=" + $lng + "&lat=" + $lat + "&location=" + $location; 
  });

  placesAutocomplete.on('clear', function() {
    $address.textContent = 'none';
  });

})();
</script>
                        </div>
                    </div>
                </div>
            </div>
                
                <div class="col-lg-4">
                        <?php
                require_once "public/config/right-sidebar.php";
                ?>

                            </div>
            </div>

         
                        



                        
                    
                </div>

                
            </div>
            
        </div>
       
        <?php
                require_once "public/config/footer.php";
                ?>
					<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>