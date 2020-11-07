<?php
session_start();

error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../public/css/userprof.css">

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
            <div class="row profile_container">

                <div class="col-sm-12 col-lg-12">
                    <h2>Profile</h2>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div class="profile_header">
                        <div class="profile_info">
                            <div class="image_circle">

                                <img alt="image" class="img-profile"
                                    src="../images/<?php echo ($_SESSION["images"]); ?>">

                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="user_info">
                                <span><?php echo ($_SESSION["org"]); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="bank_set_up">
                        <div class="circle_bank_icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="util">
                            <h3>Bank Set-up</h3>
                            <p>Set up your bank now to enable smoother transactions with us.</p>
                            <a href="#" class="set_bank_btn">Register</a>
                        </div>
                    </div>
                    <td>
                        <div class="modal fade" id="edit<?= $cnt ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Add Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="employee.php" method="POST" class="forma"
                                            enctype="multipart/form-data">
                                            <label for="profilepic">Profile Pic</label>
                                            <input type="file" name="image" value="<?php echo $result->image ?>">
                                            </p>

                                            <p>
                                                <label for="address">Address</label>
                                                <input type="address" name="address"
                                                    value="<?php echo $result->address ?>">
                                            </p>

                                            <p>
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?php echo $result->email ?>">
                                            </p>

                                            <p>
                                                <label for="gender">Gender</label>
                                                <input list="gender" type="text" name="gender"
                                                    value="<?php echo $result->gender ?>">

                                                <datalist id="gender">
                                                    <option value="Female">
                                                    <option value="Male">
                                                </datalist>
                                            </p>
                                            <p>
                                                <label for="phone">Phone</label>
                                                <input type="tel" name="phone" value="<?php echo $result->phone ?>">
                                            </p>


                                            <p>
                                                <label for="kin">Kin</label>
                                                <input type="text" name="kin" value="<?php echo $result->kin ?>">
                                            </p>

                                            <p>
                                                <label for="kin_phone">Kin Phone Number</label>
                                                <input type="tel" name="kin_phone"
                                                    value="<?php echo $result->kin_phone ?>">
                                            </p>

                                            <p>
                                                <label for="job_location">Job Location</label>
                                                <input type="address" name="job_location"
                                                    value="<?php echo $result->job_location ?>">
                                            </p>

                                            <p>
                                                <label for="dob">Date Of Birth</label>
                                                <input type="date" name="dob" value="<?php echo $result->dob ?>">
                                            </p>


                                            <p>
                                                <button type="submit" name="edit" value="<?php echo $result->id ?>">
                                                    Submit
                                                </button>
                                            </p>

                                        </form>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--end of modal-dialog-->

                        <div class="other_info">
                            <div class="user_full_info_wrapper">
                                <h3 class="major_header">YOUR INFO</h3>
                                <ul class="user_full_info your_info">
                                    <li>
                                        <div>Phone Number</div>
                                        <div>0000000000000</div>
                                    </li>
                                    <li>
                                        <div>Role</div>
                                        <div>Developer</div>
                                    </li>
                                    <li>
                                        <div>Gender</div>
                                        <div>Male</div>
                                    </li>
                                    <li>
                                        <div>DOB</div>
                                        <div>12th Sep,1000</div>
                                    </li>
                                    <li>
                                        <div>Next of Kin</div>
                                        <div>John Doe</div>
                                    </li>
                                    <li>
                                        <div>Next of Kin Contact
                                        </div>
                                        <div>0000000000000</div>
                                    </li>
                                    <li class="editing">
                                        <div></div>
                                        <div>
                                            <div class="editor">
                                                <a data-toggle="modal" href="#edit<?= $cnt ?>">

                                                    <i class="fa fa-pen" style="color:#fff"></i></a>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="user_full_info_wrapper">
                                <h3 class="major_header">Contract Info</h3>
                                <ul class="user_full_info contract_info">
                                    <li>
                                        <div>Department</div>
                                        <div>0000000000000</div>
                                    </li>
                                    <li>
                                        <div>Contract Start</div>
                                        <div>
                                            <p>25th Sep,2020</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>Contract End</div>
                                        <div>Indefinite</div>
                                    </li>
                                    <li>
                                        <div>Salary</div>
                                        <div>&#8358;20,000.00</div>
                                    </li>
                                    <li>
                                        <div>Next of Kin</div>
                                        <div>John Doe</div>
                                    </li>
                                    <li>
                                        <div>Next of Kin Contact
                                        </div>
                                        <div>0000000000000</div>
                                    </li>


                                </ul>
                            </div>

                        </div>
                        <!-- <div class="explicit_dets">
                        <div class="address">
                            <div class="content_dets">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, quidem in! Dolorum, eaque iste quibusdam ab suscipit quo velit exercitationem?
                            </div>
                        </div>
                        <div class="employee">
                            <div class="content_dets">
                                Adio Philips
                            </div>
                        </div>
                        <div class="location">
                            <div class="content_dets">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, ullam.
                            </div>
                        </div>
                    </div> -->


                </div>



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