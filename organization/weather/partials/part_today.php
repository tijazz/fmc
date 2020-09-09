<div class="col-md-6 col-sm-6">
  <?php $ti = 1;
    foreach ($dailyCond as $cond) {
      $tTime = $cond['time'];
      $tSummary = $cond['summary'];
      $tIcon = $cond['icon'];
      $tPrecipProb = ($cond['precipProbability'])*100;
        if (isset($cond['precipType'])) {
          $tPrecipType = $cond['precipType'];
        } 
      $tTempHigh = round($cond['temperatureMax']);
      $tTempLow = round($cond['temperatureMin']);
      $tClouds = ($cond['cloudCover'])*100;
      $tHumidity = ($cond['humidity'])*100;
      $tSunRise = $cond['sunriseTime'];
      $tSunSet = $cond['sunsetTime'];
      $tWindSpeed = round($cond['windSpeed']);
    if ($ti++ == 1) break;  
    }
  ?>
    <div class="panel panel-default">
      <div class="panel-heading"><h3 class="no-margin"><strong>Today's Forecast</strong> <small class="text-warning hidden-sm hidden-xs"><?php echo date("l, M jS", $tTime); ?></small></h3></div>
      <div class="panel-body">
              
              <div class="col-md-2 no-padding">
                <canvas class="<?php echo $tIcon; ?>" width="64" height="120"></canvas>
              </div>   
              <div class="text-primary inline fs20"><b><?php echo $tTempHigh; ?></b><i class="wi wi-degrees"></i>&nbsp;&nbsp;</div>
              <div class="text-info inline fs20"><b><?php echo $tTempLow; ?></b><i class="wi wi-degrees"></i></div>
              <p><strong><?php echo $tSummary; ?></strong> <br>
              <?php
                  if (!empty ($tPrecipType)) {
                    echo '<i class="wi wi-umbrella"></i> '.$tPrecipProb.'% '.$tPrecipType;
                  } else {
                    echo '<i class="wi wi-umbrella"></i> '.$tPrecipProb.'% ';
                  }
              ?> 
              &nbsp;&nbsp;
              <i class="wi wi-cloudy"></i> <?php echo $tClouds; ?>% &nbsp; <i class="wi wi-humidity"></i> <?php echo $tHumidity; ?>% <br>
              <i class="wi wi-strong-wind"></i> <?php echo $tWindSpeed; ?> mph 
                        <?php
                            if ($curWindBearing>338 && $curWindBearing<23)
                              echo '<i class="wi wi-direction-down"></i>';
                            if ($curWindBearing>23 && $curWindBearing<68)
                              echo '<i class="wi wi-direction-down-right"></i>';
                            if ($curWindBearing>68 && $curWindBearing<113)
                              echo '<i class="wi wi-direction-left"></i>';
                            if ($curWindBearing>113 && $curWindBearing<158)
                              echo '<i class="wi wi-direction-up-left"></i>';
                            if ($curWindBearing>158 && $curWindBearing<203)
                              echo '<i class="wi wi-direction-up"></i>';
                            if ($curWindBearing>203 && $curWindBearing<248)
                              echo '<i class="wi wi-direction-up-right"></i>';
                            if ($curWindBearing>248 && $curWindBearing<293)
                              echo '<i class="wi wi-direction-right"></i>';
                            if ($curWindBearing>293 && $curWindBearing<338)
                              echo '<i class="wi wi-direction-down-right"></i>';
                         ?>
               &nbsp;&nbsp; <i class="wi wi-sunrise"></i> <?php echo date("g:i", $tSunRise); ?> &nbsp; <i class="wi wi-sunset"></i> <?php echo date("g:i", $tSunSet); ?>

              </p>
      </div>
    </div>

</div> <!-- /col-md -->