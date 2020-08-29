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
    
    $sql = "UPDATE `machinery` SET `name`=(:name), `description`=(:description), `serial_no`=(:serial_no), `manufacturer`=(:manufacturer), `category`=(:category) WHERE sn=(:sn)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query-> bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
    $query-> bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
    $query-> bindParam(':category', $category, PDO::PARAM_STR);
    $query-> bindValue(':sn', $sn, PDO::PARAM_STR);
    $query->execute(); 
    $msg="Rent Updated Successfully";
    
    header('location:salarylist.php');
}
elseif (isset($_GET['s'])) {
    $sn=$_GET['s'];
    

    $sql = "SELECT * from `employee` WHERE id=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindValue(':idedit', $sn, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetch(PDO::FETCH_OBJ);
    

?>
              <form action="salaryform.php" method="POST" class="forma">
                 <p>
                        <select name="type">
                        <option selected>Salary</option>
                        <option >Allowance</option>
                        <option >Bonus</option>  
                        </select>
                    </p>
					<p>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $results->name?>">
                    </p>
                    <p>
                        <label for="amount">Amount Payable</label>
                        <input type="text" name="amount" value="">
                    </p>
                    <p>
                        <select name="category">
                        <option disabled selected>Employee status</option>
                        <option >contract</option>
                        <option >permanent</option>  
                        </select>
                    </p>

                    <p>
                        <label for="full_name">Description</label>
                        <input type="text" name="description" value="">
                    </p>

                    <p>
                        <label for="full_name">Eligibity</label>
                        <input type="text" name="eligibility" value="">
                    </p>

                    <p>
                        <label for="amount">Allowance</label>
                        <input type="text" name="allowance" value="">
                    </p>
                    <p>
                        <label for="amount">Method</label>
                        <input type="text" name="method" value="">
                    </p>
					<p>
                        <label for="date">Date</label>
                        <input type="date" name="date" value="2017-06-01">
                    </p>
					<p>
                        <label for="add_parameters">Add Parameter</label>
                        <input type="textarea" name="add_parameters" value="<?php echo $results->table_name?>">
                    </p>
                    
                    <p>
                        <button type="submit" name="submit" value="<?php echo $sn?>">
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