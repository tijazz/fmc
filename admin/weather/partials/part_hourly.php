<div class="row">
<h4 class="ml-15">Next Few Hours</h4>

    <?php
      $hi = 1;
      foreach ($hourlyCond as $cond) {
        $hTime = $cond['time'];
        $hSummary = $cond['summary'];
        $hIcon = $cond['icon'];
        $hPrecipProb = ($cond['precipProbability'])*100;
          if (isset($cond['precipType'])) {
            $hPrecipType = $cond['precipType'];
          } 
        $hTemp = round($cond['temperature']);
        $hClouds = $cond['cloudCover']*100;

        echo '<div class="col-md-2 col-xs-6">';
          echo '<div class="panel panel-default">';
            echo '<div class="panel-heading"><div class="text-primary inline fs20">'.$hTemp.'<i class="wi wi-degrees"></i> &nbsp; <canvas class="'.$hIcon.'" width="25" height="25"></canvas></div>'.date("ga", $hTime).'</div>';
              echo '<div class="panel-body hourly-box">';

                 echo '<canvas class="'.$hIcon.'" width="32" height="32"></canvas>';
                echo $hSummary;
                echo '<br>';
                  if (!empty ($hPrecipType)) {
                    echo '<i class="wi wi-umbrella"></i> '.$hPrecipProb.'% '.$hPrecipType;
                  } else {
                    echo '<i class="wi wi-umbrella"></i> '.$hPrecipProb.'% ';
                  }
                echo '<br> <i class="wi wi-cloudy"></i> '.$hClouds.'%';

            echo "</div>";
          echo "</div>";
        echo "</div>";
      if ($hi++ == 6) break; 
      }

    ?>

</div> <!-- /HOURLY -->