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

        $sql = "delete from faq WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        header('location:faq.php');
    }

    if (isset($_POST['submit'])) {

        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $sql = "INSERT INTO `faq`(`question`, `answer`) VALUES (:question, :answer)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':question', $question, PDO::PARAM_STR);
        $query->bindParam(':answer', $answer, PDO::PARAM_STR);
        $query->execute();

        header('location:faq.php');
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
                <div class="row dashboard-header">
                    <div class="panel-heading" style='padding:0;'>
                        <h2 class="page-title">Frequently Asked Questions</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12">


                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <div class="panel-heading">List of FAQ</div>
                            <div class="panel-body">
                                <?php if ($error) { ?><div class="errorWrap" id="msgshow">
                                        <?php echo htmlentities($error); ?>
                                    </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow">
                                        <?php echo htmlentities($msg); ?>
                                    </div><?php } ?>

                                <!-- accordion -->

                                <div class="panel-group" id="accordion">

                                    <?php $sql = "SELECT * from faq";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {  ?>


                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cnt?>">
                                                            <?php echo $result->question?></a>
                                                </div>
                                                <div id="collapse<?php echo $cnt?>" class="panel-collapse collapse in">
                                                    <div class="panel-body"><?php echo $result->answer?></div>
                                                </div>
                                            </div>

                                    <?php $cnt++; }
                                    } ?>

                                </div>
                                <!-- Ending -->

                            </div>
                            <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:auto">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Add New Product</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="faq.php" method="POST" class="forma">
                                                <p>
                                                    <label for="full_name">Question</label>
                                                    <input type="text" name="question">
                                                </p>


                                                <p>
                                                    <label for="answer">Answer</label>
                                                    <textarea name="answer" id="" cols="30" rows="10"></textarea>

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
                                    <!--end of modal-dialog-->
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