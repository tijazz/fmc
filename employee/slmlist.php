<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];

        $sql = "delete from slm WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:slmlist.php');
    }



?>

    <!DOCTYPE html>
    <html>
    <link rel="stylesheet" href="public/css/new_styles.css">

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
                <div class="row  white-bg dashboard-header">
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <!-- button style Start -->
                        <div class="navbar">
                            <div class="container-fluid" style="padding-left:7px;">
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add1" data-target="#add1" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Machinery</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add2" data-target="#add2" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Vehicle</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add3" data-target="#add3" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Building</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add4" data-target="#add4" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Other Tangible Asset</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add5" data-target="#add5" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Equipment</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add6" data-target="#add6" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Goods/Products</a>
                                </h1>
                                <h1 class="nav navbar-nav">
                                    <a class="btn btn-md btn-primary" href="#add7" data-target="#add7" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i> Add Fields/Lands</a>
                                </h1>
                            </div>
                        </div>
                        <!-- button style End -->

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">slm list</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                                <table id="zctb tablePreview" class="display table table-dark table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">#</th>
                                            <th colspan="7" style="text-align: center;">Asset Information</th>
                                            <th colspan="2" style="text-align: center;">Year 1</th>
                                            <th colspan="2" style="text-align: center;">Year 2</th>
                                            <th colspan="2" style="text-align: center;">Year 3</th>
                                            <th colspan="2" style="text-align: center;">Year 4</th>
                                            <th rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                            <th>Asset Name</th>
                                            <th>Asset Type</th>
                                            <th>Asset Cost</th>
                                            <th>Salvage Value</th>
                                            <th>Allowable Lifespan</th>
                                            <th>Operating Cost per Year</th>
                                            <th>Depriciation Value</th>
                                            <th>Value at year start</th>
                                            <th>Value at year end</th>
                                            <th>Value at year start</th>
                                            <th>Value at year end</th>
                                            <th>Value at year start</th>
                                            <th>Value at year end</th>
                                            <th>Value at year start</th>
                                            <th>Value at year end</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php

                                        $sql = "SELECT * from slm WHERE org_id = :org_id";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {

                                                switch ($result->asset_type) {
                                                    case 'machinery':
                                                        $s = "SELECT * from machinery WHERE sn = :sn";
                                                        break;
                                                    case 'building':
                                                        $s = "SELECT * from building WHERE sn = :sn";
                                                        break;
                                                    case 'vehicle':
                                                        $s = "SELECT * from vehicle WHERE sn = :sn";
                                                        break;
                                                    case 'other_asset':
                                                        $s = "SELECT * from other_asset WHERE sn = :sn";
                                                        break;
                                                    case 'administration':
                                                        $s = "SELECT * from administration WHERE sn = :sn";
                                                        break;
                                                    case 'operation':
                                                        $s = "SELECT * from operation WHERE sn = :sn";
                                                        break;
                                                    case 'locations':
                                                        $s = "SELECT * from locations WHERE id = :sn";
                                                        break;
                                                }

                                                $q = $dbh->prepare($s);
                                                $q->bindParam(':sn', $result->asset_id, PDO::PARAM_STR);
                                                $q->execute();
                                                $r = $q->fetch(PDO::FETCH_OBJ);

                                                $depreciate = round(($r->amount - $result->salvage) / $result->asset_life, 2);
                                        ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($r->name); ?></td>
                                                    <td><?php echo htmlentities($result->asset_type); ?></td>
                                                    <td><?php echo htmlentities(round($r->amount, 2)); ?></td>
                                                    <td><?php echo htmlentities(round($result->salvage, 2)); ?></td>
                                                    <td><?php echo htmlentities(round ($result->asset_life, 2)); ?></td>
                                                    <td><?php echo htmlentities($result->ope_cost); ?></td>
                                                    <td><?php echo htmlentities($depreciate); ?></td>
                                                    <td><?php echo htmlentities($result->asset_id); ?></td>
                                                    <?php $cost = $result->asset_id - $depreciate ?>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <?php $cost = $cost - $depreciate ?>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <?php $cost = $cost - $depreciate ?>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <?php $cost = $cost - $depreciate ?>
                                                    <td><?php echo htmlentities($cost); ?></td>
                                                    <!-- Action Button Start -->
                                                    <td>
                                                        <a data-toggle=" modal" href="slmedit.php?s=<?php echo $result->id; ?>" data-target="#MyModal" data-backdrop="static">&nbsp;
                                                            <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                        <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog model-sm">
                                                                <div class="modal-content"> </div>
                                                            </div>
                                                        </div>

                                                        <a href="slmlist.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
                                                    </td>

                                                    <!-- Action Button End -->
                                                </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>



                            <div id="add1" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from machinery WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="machinery" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->



                            <div id="add2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from vehicle WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="vehicle" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->


                            <div id="add3" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from building WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="building" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->

                            <div id="add4" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from other_asset WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="other_asset" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->

                            <div id="add5" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from administration WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="administration" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->


                            <div id="add6" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from operation WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->sn; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="operation" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->



                            <div id="add7" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="slm.php" method="POST" class="forma">

                                                <p>
                                                    <label for="asset_id">Asset Name</label>
                                                    <select name="asset_id" id="asset_id">
                                                        <?php
                                                        $s = "SELECT * from locations WHERE org_id = :org_id";
                                                        $q = $dbh->prepare($s);
                                                        $q->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                                        $q->execute();
                                                        $res = $q->fetchAll(PDO::FETCH_OBJ);

                                                        if ($q->rowCount() > 0) {
                                                            foreach ($res as $re) { ?>
                                                                <option value="<?php echo $re->id; ?>"><?php echo $re->name; ?></option>
                                                        <?php }
                                                        }
                                                        ?>


                                                    </select>
                                                </p>
                                                <input type="text" name="asset_type" value="locations" hidden>
                                                <p>
                                                    <label for="full_name">Salvage</label>
                                                    <input type="text" name="salvage" value="">
                                                </p>
                                                <p>
                                                    <label for="sn">Asset Operating Cost</label>
                                                    <input type="text" name="ope_cost">
                                                </p>
                                                <p>
                                                    <label for="full_name">Asset Allowable Life Span</label>
                                                    <input type="text" name="asset_life" value="0" id="qitem">
                                                </p>

                                                <p>
                                                    <button type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                </p>

                                            </form>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end of modal-dialog-->


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