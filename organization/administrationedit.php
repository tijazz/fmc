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
    <h4 class="modal-title">Edit Operation</h4>
</div>
<div class="modal-body">

<?php
if (isset($_POST['edit'])) {
    $sn=$_POST['edit'];
    $category = $_POST['category'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $manufacturer = $_POST['manufacturer'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $place = $_POST['place'];
    
    $sql = "UPDATE `administration` SET `category`=(:category), `name`=(:name), `description`=(:description), `quantity`=(:quantity), `manufacturer`=(:manufacturer), `status`=(:status), `location`=(:location), `place`=(:place) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':quantity', $quantity, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':status', $status, PDO::PARAM_STR);
    $query-> bindParam(':location', $location, PDO::PARAM_STR);
    $query-> bindParam(':place', $place, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:administrationlist.php');
}
elseif (isset($_GET['s'])) {
    $sn=$_GET['s'];
    

    $sql = "SELECT * from `administration` WHERE sn=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $sn, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    echo $sn;
    

?>
<form action="administrationedit.php" method="POST" class="forma">

<p>
        <select name="category" id="">
            <option selected disabled>Select</option>
            <?php 
$sql = "SELECT * FROM `asset` WHERE item LIKE 'administration'";
$query = $dbh -> prepare($sql);
$query->execute();
$res=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($res as $re)
{		?>
    <option value="<?php echo htmlentities($re->category);?>">
        <?php echo htmlentities($re->category);?></option>
    <?php $cnt=$cnt+1; 
}} ?>
        </select>
    </p>

<p>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo ($results->name);?>">
    </p>


    <p>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo ($results->description);?>">
    </p>

    <p>
    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" value="<?php echo ($results->quantity);?>">
    </p>

    <p>
        <label for="amount">Manufacturer</label>
        <input type="text" name="manufacturer" value="<?php echo ($results->manufacturer);?>">
    </p>

    <p>
        <label for="location">Location</label>
        <input type="text" name="location" value="<?php echo ($results->location);?>">  
    </p>

    <p>
        <label for="location">Place</label>
        <input type="text" name="place" value="<?php echo ($results->place);?>">  
    </p>

    <p>
        <label for="status">Status</label>
        <select name="status">
            <option value="in stock">in stock</option>
            <option value="out stock">out stock</option>
        </select>
    </p>

    <p>
        <button type="submit" name="edit" value="<?php echo ($results->sn);?>">
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