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
    <h4 class="modal-title">Edit Product</h4>
</div>
<div class="modal-body">

<?php
if (isset($_POST['edit'])) {
    $sn=$_POST['edit'];
    $product_id=$_POST['product_id'];
    $user_id = $_POST['user_id'];
    $product_name = $_POST['product_name'];
    
    $sql = "UPDATE `product` SET `product_id`=(:product_id), `user_id`=(:user_id), `product_name`=(:product_name) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':product_id', $product_id, PDO::PARAM_STR);
    $query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $query-> bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Product Updated Successfully";
    
    header('location:product.php');
}
elseif (isset($_GET['s'])) {
    $sn=$_GET['s'];
    

    $sql = "SELECT * from `product` WHERE sn=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $sn, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    

?>
<form action="productedit.php" method="POST" class="forma">
<p>
                                                <label for="name">Product id</label>
                                                <input type="text" name="product_id" value="<?php echo ($results->product_id);?>">
                                            </p>


                                            <p>
                                                <label for="description">User Id</label>
                                                <input type="text" name="user_id" value="<?php echo ($results->user_id);?>">
                                            </p>

                                            <p>
                                                <label for="size">Product Name</label>
                                                <input type="text" name="product_name" value="<?php echo ($results->product_name);?>">
                                           </p>
                                            
                                               
                                            <p>
                                                <button type="submit" name="edit" value="<?php echo $sn;?>">
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