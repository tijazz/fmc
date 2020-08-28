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

<body>

<?php
        require_once "public/config/header.php";
        ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Title</h4>
</div>
<div class="modal-body">

<?php
if (isset($_POST['edit'])) {
    $sn=$_POST['edit'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $serial_no = $_POST['snum'];
    $manufacturer = $_POST['manufacturer'];
    $category = $_POST['category'];
    
    $sql = "UPDATE `assetamount` SET `name`=(:name), `description`=(:description), `serial_no`=(:serial_no), `manufacturer`=(:manufacturer), `category`=(:category) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:machinerylist.php');
}
elseif (isset($_GET['s'])) {
    $asset_id = $_GET['asset_id'];
    $asset_type = $_GET['asset_type'];
    $name = $_GET['name'];
    $user_id = $_GET['id'];
    

?>
<form action="assetform.php" method="POST" class="forma">

    <p>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $name;?>" readonly=readonly>
    </p>


    <p>
        <label for="description">Asset Type</label>
        <input type="text" name="asset_type" value="<?php echo $asset_type;?>" readonly=readonly>
    </p>

    <p>
        <label for="amount">amount</label>
        <input type="text" name="amount" value="">
    </p>

    <p>
        <label for="id">Asset ID</label>
        <input type="text" name="asset_id" value="<?php echo $asset_id;?>" readonly=readonly>
    </p>

    <p>
        <button type="submit" name="submit" value="">
            Submit
        </button>
    </p>

                                        </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success">OK</button>
</div>

<?php
                require_once "public/config/footer.php";
                ?>

</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6.1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Sep 2016 02:26:53 GMT -->

</html>


<?php 
}}


?>