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
    <h4 class="modal-title">Edit Building</h4>
</div>
<div class="modal-body">

<?php
if (isset($_POST['edit'])) {
    $sn=$_POST['edit'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    
    $sql = "UPDATE `building` SET `name`=(:name), `description`=(:description), `size`=(:size), `location`=(:location), `category`=(:category) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':size', $size, PDO::PARAM_STR);
    $query-> bindParam(':location', $location, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:buildinglist.php');
}
elseif (isset($_GET['s'])) {
    $sn=$_GET['s'];
    

    $sql = "SELECT * from `building` WHERE sn=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $sn, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    

?>
<form action="buildingedit.php" method="POST" class="forma">
<p>
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="<?php echo ($results->name);?>">
                                            </p>


                                            <p>
                                                <label for="description">Description</label>
                                                <input type="text" name="description" value="<?php echo ($results->description);?>">
                                            </p>

                                            <p>
                                                <label for="size">Size</label>
                                                <input type="text" name="size" value="<?php echo ($results->size);?>">
                                            </p>

                                            <p>
                                                <label for="location">Location</label>
                                                <input type="text" name="location" value="<?php echo ($results->location);?>">
                                            </p>

                                            <p>
                                                <select name="category">
                                                    <option selected disabled>Select</option>
                                                    <?php 
                                        $sql = "SELECT * FROM `asset` WHERE item LIKE 'building'";
                                        $query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>
                                                    <option value="<?php echo htmlentities($result->category);?>">
                                                        <?php echo htmlentities($result->category);?></option>
                                                    <?php $cnt=$cnt+1; 
                                        }} ?>
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