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
            if(isset($_GET['del']))
                {
                    $id=$_GET['del'];

                    $sql = "delete from testimonial WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();                

                    $msg="Data Deleted successfully";
                }                 
?>

        <!DOCTYPE html>
        <html>
		<head>
        <title>Input Analysis</title>        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
		<link rel="stylesheet" href="public/css/new_styles.css">

        <?php
        require_once "public/config/header.php";
        ?>
    </head>               

<body>
		      
    <script>
        $(document).ready(function () {          
            lineChart();
            
        });       
        function lineChart()
        {
            {
                $.post("inputanalysisdatas.php",
                function (data)
                {
                    console.log(data);
                     var productname = [];
                    var amount = [];

                    for (var i in data) {
                        productname.push(data[i].productname);
                        amount.push(data[i].amount);
                    }

                    var chartdata = {
                        labels: productname,
                        datasets: [
                            {
                                label: 'Input Analysis',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: amount,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        } 
        
    </script>

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
                <div class="row  white-bg dashboard-header">
				</div>
            <div class="row">
                       
                <div class="col-lg-12">
                <div class="end_placer apart_placer">
                    <h2>Input Analysis</h2>
                <!--    <a class="green_btn plus_btn btn btn-md" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a>
                -->    </div>  <!-- Zero Configuration Table -->
				<div class="panel panel-default" style="border-radius:10px;">
                <div class="panel-heading">Input analysis</div>
							<div class="panel-body" style="background:#fff;border-radius:3px;">
											<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb tablePreview" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                                               <th>Name</th>
                                                <th>Description</th>
												<th>Price</th>										
                                                <th>Amount</th>
                                                	
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * from productsale";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
										    <td><?php echo htmlentities($result->productname);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <td><?php echo htmlentities($result->price);?></td>
                                            <td><?php echo htmlentities($result->amount);?></td>
																						
											
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
                            </div>
<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
  
      
        </div><!--end of modal-dialog-->
 </div>
						</div>							

                </div>	
        <center>
        <h1>Input Analysis graph</h1>
        </center>
        <div id="chart-container">
            <canvas id="graphCanvas1"></canvas>
        </div>
            </div>       
                          
                </div>

                
            </div>
			
		
            
        </div>
       
        <?php
                require_once "public/config/footer.php";
                ?>
				
				

    </body>
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>