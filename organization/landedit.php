<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {



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
                $sn = $_POST['edit'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $size = $_POST['size'];
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];

                $sql = "UPDATE `locations` SET `name`=(:name), `description`=(:description), `size`=(:size), `lat`=(:lat), `lng`=(:lng) WHERE id=(:sn)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':description', $description, PDO::PARAM_STR);
                $query->bindParam(':size', $size, PDO::PARAM_STR);
                $query->bindParam(':lat', $lat, PDO::PARAM_STR);
                $query->bindParam(':lng', $lng, PDO::PARAM_STR);
                $query->bindValue(':sn', $sn, PDO::PARAM_STR);
                $query->execute();
                $msg = "Rent Updated Successfully";

                echo var_dump($sn);

                // header('location:landlist.php');
            } elseif (isset($_GET['s'])) {
                $sn = $_GET['s'];


                $sql = "SELECT * from `locations` WHERE id=(:idedit)";
                $query = $dbh->prepare($sql);
                $query->bindValue(':idedit', $sn, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetch(PDO::FETCH_OBJ);



            ?>
                <form action="landedit.php" method="POST" class="forma" id="f_edit">

                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo ($results->name); ?>">
                    </p>


                    <p>
                        <label for="description">Description</label>
                        <input type="text" name="description" value=<?php echo ($results->description); ?>">
                    </p>

                    <p>
                        <label for="size">Size</label>
                        <input type="text" name="size" value="<?php echo ($results->size); ?>">
                    </p>

                    <iframe src="map.php" frameborder="0" width="100%"></iframe>
                    <input type="button" value="select" onclick="sel()">


                    <p>
                        <label for="lat">Latitude</label>
                        <input type="text" name="lat" value="<?php echo ($results->lat); ?>" id="lat">
                    </p>


                    <p>
                        <label for="lng">Longitude</label>
                        <input type="text" name="lng" value="<?php echo ($results->lng); ?>" id="lng">
                    </p>
                    <script>
                        function sel() {
                            document.getElementById("lat").value = localStorage.getItem("lat");
                            document.getElementById("lng").value = localStorage.getItem("lng");
                        }
                    </script>
                    <p>
                        <button type="submit" name="edit" id="submit" value="<?php echo ($results->id); ?>">
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


            }
        }


?>