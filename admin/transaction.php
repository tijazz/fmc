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
            if(isset($_GET['del']) && isset($_GET['name']))
                {
                    $id=$_GET['del'];
                    $name=$_GET['name'];

                    $sql = "delete from member WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query -> bindParam(':id',$id, PDO::PARAM_STR);
                    $query -> execute();

                    $sql2 = "insert into deleteduser (email) values (:name)";
                    $query2 = $dbh->prepare($sql2);
                    $query2 -> bindParam(':name',$name, PDO::PARAM_STR);
                    $query2 -> execute();

                    $msg="Data Deleted successfully";
                }

                    if(isset($_REQUEST['unconfirm']))
                        {
                            $aeid=intval($_GET['unconfirm']);
                            $memstatus=1;
                            $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
                            $query = $dbh->prepare($sql);
                            $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
                            $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                            $query -> execute();
                            $msg="Changes Sucessfully";
                       }

                    if(isset($_REQUEST['confirm']))
                        {
                            $aeid=intval($_GET['confirm']);
                            $memstatus=0;
                            $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
                            $query = $dbh->prepare($sql);
                            $query -> bindParam(':status',$memstatus, PDO::PARAM_STR);
                            $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                            $query -> execute();
                            $msg="Changes Sucessfully";
                        }

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
                <div class="row  border-bottom white-bg dashboard-header">
                <div class="panel-heading"><h2 class="page-title">Transaction</h2></div>
				</div>
            <div class="row">
                       
                <div class="col-lg-12">

                    <h2 class="page-title">Users Transaction Details</h2>

                  <!-- Zero Configuration Table -->
				<div class="panel panel-default">
                <div class="panel-heading">List Users</div>
							<div class="panel-body">
											<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
								else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th>Name</th>
                                                <th>Detail</th>
                                                <th>Category</th>
												<th>Amount</th>												
                                                <th>Date</th>
										</tr>
									</thead>
									
									<tbody>

										<?php $sql = "SELECT * FROM transactions LEFT JOIN member ON transactions.user_id = member.id";
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
                                            <td><?php echo htmlentities($result->fullname);?></td>
                                            <td><?php echo htmlentities($result->details);?></td>
											<td><?php echo htmlentities($result->category);?></td>
											<td><?php echo htmlentities($result->amount);?></td>
                                            <td><?php echo htmlentities($result->date);?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
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
    
    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->
    </html>
    
    <?php } ?>