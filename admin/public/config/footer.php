        
        <!-- Mainly scripts -->
        <script src="public/js/jquery-2.1.1.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="public/js/plugins/dataTables/datatables.min.js"></script>
        <script src="public/js/plugins/jasny/jasny-bootstrap.min.js"></script>
        <script src="public/js/main.js"></script>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="public/js/skycons.js"></script>
        <!-- GeoCode -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCSWB8ogOt_P0L7lXpu-tCNTwB-atv9CD0&amp;sensor=false&amp;libraries=places"></script>
        <script src="public/js/jquery.geocomplete.min.js"></script>
        <!-- Flot
        <script src="public/js/plugins/flot/jquery.flot.js"></script>
        <script src="public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="public/js/plugins/flot/jquery.flot.spline.js"></script>
        <script src="public/js/plugins/flot/jquery.flot.resize.js"></script>
        <script src="public/js/plugins/flot/jquery.flot.pie.js"></script>
        -->
        <!-- Peity 
        <script src="public/js/plugins/peity/jquery.peity.min.js"></script>
        <script src="public/js/demo/peity-demo.js"></script>
         -->
        <!-- Custom and plugin javascript -->
        <script src="public/js/inspinia.js"></script>
        <script src="public/js/plugins/pace/pace.min.js"></script>
        
        <!-- jQuery UI -->
        <script src="public/js/plugins/jquery-ui/jquery-ui.min.js"></script>
        
        <!-- GITTER
        <script src="public/js/plugins/gritter/jquery.gritter.min.js"></script>
         -->
        <!-- Sparkline
        <script src="public/js/plugins/sparkline/jquery.sparkline.min.js"></script>
         -->
        <!-- Sparkline demo data 
        <script src="public/js/demo/sparkline-demo.js"></script>
         -->
        <!-- ChartJS
        <script src="public/js/plugins/chartJs/Chart.min.js"></script>
        -->
        <!-- Toastr 
        <script src="public/js/plugins/toastr/toastr.min.js"></script>
        -->
        <!-- Slide -->
        <script>
      var skycons = new Skycons({"color": "#ebebeb"}),
          list  = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for(i = list.length; i--; ) {
            var weatherType = list[i],
                elements = document.getElementsByClassName( weatherType );
            for (e = elements.length; e--;){
                skycons.set( elements[e], weatherType );
            }
        }

      skycons.play();

      //GeoCode
      $(function(){
        $("#geocomplete").geocomplete({
          details: "form",
          types: ["geocode"],
        });
      });

    </script>
        <script src="public/js/slide.js"></script>
        <script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
        
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Your Number 1 farm management company.', 'Welcome to DUFMA');
                    
                }, 1300);
                
                /*
                var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
                ];
                var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
                ];
                $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
                ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis:{
                    },
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                }
                );
                
                var doughnutData = {
                    labels: ["App","Software","Laptop" ],
                    datasets: [{
                        data: [300,50,100],
                        backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                    }]
                } ;
                
                
                var doughnutOptions = {
                    responsive: false,
                    legend: {
                        display: false
                    }
                };
                
                
                var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
                
                var doughnutData = {
                    labels: ["App","Software","Laptop" ],
                    datasets: [{
                        data: [70,27,85],
                        backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                    }]
                } ;
                
                
                var doughnutOptions = {
                    responsive: false,
                    legend: {
                        display: false
                    }
                };
                
                
                var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
                new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
                */
            });
        </script>
        <script>
        /*
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
            
            ga('create', 'UA-4625583-2', 'webapplayers.com');
            ga('send', 'pageview');
            */
        </script>
        
        
        
        
        
        
        
        <!----------------------EXTRA  --------------------------->
        <!-- date -->
        <script type="text/javascript">
            var d = new Date();
            document.getElementById("today").innerHTML = d;
        </script>
        