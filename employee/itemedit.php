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
    $id=$_POST['edit'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $serial_no = $_POST['snum'];
    $manufacturer = $_POST['manufacturer'];
    $category = $_POST['category'];
    
    $sql = "UPDATE `machinery` SET `name`=(:name), `description`=(:description), `serial_no`=(:serial_no), `manufacturer`=(:manufacturer), `category`=(:category) WHERE id=(:id)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:machinerylist.php');
}
elseif (isset($_GET['s'])) {
    $id=$_GET['s'];
    

    $sql = "SELECT * from `machinery` WHERE id=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $id, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    

?>
<form action="machineryedit.php" method="POST" class="forma">

<p>
    <select name="category" id="">
    <option selected disabled>Select</option>
    <?php 
        $sql = "SELECT * FROM `asset` WHERE item LIKE 'Machinery'";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $res=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($res as $re)
        {?>
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
        <label for="snum">Item Serial Number</label>
        <input type="text" name="snum" value="<?php echo ($results->serial_no);?>">
    </p>

    <p>
        <label for="amount">Manufacturer</label>
        <input type="text" name="manufacturer" value="<?php echo ($results->manufacturer);?>">
    </p>

    <p>
        <button type="submit" name="edit" value="<?php echo ($results->id);?>">
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