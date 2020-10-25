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

        $sql = "delete from insurance WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data Deleted successfully";
        header('location:insurancelist.php');
    }

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $item = $_POST['item'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $amount = $_POST['amount'];
        $amount_paid = $_POST['amount_paid'];
        $period = $_POST['period'];
        $company = $_POST['company'];
        $user_id = $_SESSION['id'];


        $sql = "INSERT INTO `insurance`(`user_id`, `name`, `item`, `start_date`, `end_date`, `amount`, `amount_paid`, `period`, `company`) VALUES (:user_id, :name, :item, :start_date, :end_date, :amount, :amount_paid, :period, :company)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':item', $item, PDO::PARAM_STR);
        $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':amount_paid', $amount_paid, PDO::PARAM_STR);
        $query->bindParam(':period', $period, PDO::PARAM_STR);
        $query->bindParam(':company', $company, PDO::PARAM_STR);
        $query->execute();
        $msg = "Rent Updated Successfully";
        header('location:insurancelist.php');
    }




?>

<!DOCTYPE html>
<html>

<?php
    require_once "public/config/header.php";
    ?>

<body>

    <div id="wrapper inventory_duf">
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
                    <h2 class="page-title">Inventory Management</h2>
                </div>
            </div>
            <div class="row">
                <div >
                    <!-- content -->
                    <div class="backdrop_org"></div>
                    <div class="question">
                        <form action="">
                            <p>Are you sure you want to delete this entry?</p>
                            <p class="del_item"></p>
                            <div class="buttons">
                                <button type="submit">
                                    <i class="fa fa-check"></i>
                                </button>
                                <div class="cancel">
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="items">
                        <div class="item item1">
                            <h1>30</h1>
                            <span>Pens of Chicken</span>
                        </div>
                        <div class="item item1">
                            <h1>45</h1>
                            <span>Bags of Grains</span>
                        </div>
                        <div class="item item1">
                            <h1>89</h1>
                            <span>Cows</span>
                        </div>
                        <div class="item item1">
                            <h1>40</h1>
                            <span>Tractors</span>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="summ">
                            <div class="summary">
                                <div class="hider"></div>
                                <div class="summary-left">
                                    <div class="hidden_details">
                                        <ul>
                                            <li>Bags of Rice</li>
                                            <li>Cattle</li>
                                            <li>Rabbits</li>
                                            <li>Worker Dogs</li>
                                            <li>Tractors</li>
                                        </ul>
                                        <ul>
                                            <li>200</li>
                                            <li>100</li>
                                            <li>50</li>
                                            <li>50</li>
                                            <li>55</li>
                                            <li>455</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <h1 class="summ_h1">
                                455<span>Total Items</span>
                            </h1>
                        </div>
                        <div class="details">
                            <table>
                                <thead>
                                    <tr>
                                        <th> S/N </th>
                                        <th> Item </th>
                                        <th> Quantity </th>
                                        <th> Price </th>
                                        <th> Description </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Cattle</td>
                                        <td>25</td>
                                        <td>&#8358;50,000.00</td>
                                        <td>To be sold in December</td>
                                        <td>
                                            <div class="add_btn"><i class="fa fa-plus"></i></div>
                                            <div class="sub_btn"><i class="fa fa-minus"></i></div>
                                            <div class="del_btn"><i class="fa fa-trash trash"></i></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content  -->
                </div>
            </div>
        </div>
        <?php
    require_once "public/config/footer.php";
    ?>
</body>
<script>
 let canceller = document.querySelector(".cancel")
    let del_item = document.querySelector("p.del_item");
    let del_modal = document.querySelector('.question');
    let backdrop_org = document.querySelector('.backdrop_org');
    let del_btns = document.querySelectorAll('.del_btn');
    let summary = document.querySelector(".wrapper > div.summ > div");
    let h1 = document.querySelector("h1.summ_h1");
    h1.addEventListener('mouseover', () => {
        summary.classList.add('show');
    })
    h1.addEventListener('mouseleave', () => {
        summary.classList.remove('show')
    })
    for (let i = 0; i < del_btns.length; i++) {
        del_btns[i].addEventListener('click', () => {
            var item = del_btns[i].parentElement.parentElement.querySelector('td:nth-of-type(2)').innerHTML;
            var quantity = del_btns[i].parentElement.parentElement.querySelector('td:nth-of-type(3)').innerHTML;
            del_item.textContent = item + ' (' + quantity + ')';
            del_modal.classList.add('question-shown');
            backdrop_org.classList.add('backdrop-shown')
        })
    }
    backdrop_org.addEventListener('click', () => {
        del_modal.classList.remove('question-shown');
        backdrop_org.classList.remove('backdrop-shown')
    })

    canceller.addEventListener('click', () => {
        del_modal.classList.remove('question-shown');
        backdrop_org.classList.remove('backdrop-shown')
    })
</script>

</html>
<?php } ?>