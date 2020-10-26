<?php
session_start();

error_reporting(0);
$error = "";
$msg = "";
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del']) && isset($_GET['name'])) {
        $id = $_GET['del'];
        $name = $_GET['name'];
        $sql = "delete from member WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $sql2 = "insert into deleteduser (email) values (:name)";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':name', $name, PDO::PARAM_STR);
        $query2->execute();

        $msg = "Data Deleted successfully";
    }

    if (isset($_REQUEST['unconfirm'])) {
        $aeid = intval($_GET['unconfirm']);
        $memstatus = 1;
        $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $memstatus, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Changes Sucessfully";
    }

    if (isset($_REQUEST['confirm'])) {
        $aeid = intval($_GET['confirm']);
        $memstatus = 0;
        $sql = "UPDATE member SET status=:status WHERE  id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $memstatus, PDO::PARAM_STR);
        $query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
        $query->execute();
        $msg = "Changes Sucessfully";
    }


?>

    <!DOCTYPE html>
    <html>


    <?php
    require_once "public/config/header.php";
    ?>

    <body>

        <div id="wrapper" class="wallet">
            <div class="wallet_backdrop not_visible"></div>
            <div class="wallet_fund not_visible">
                <form action="" class="wallet_fund_form">
                    <h2 style="margin:0;margin-bottom:1rem;">Fund Wallet</h2>
                    <label for="email">Email Address</label>
                    <input type="email" name="email_address" id="email_address">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" min="0">
                    <input type="submit" value="Fund Wallet">
                </form>
            </div>
            <div class="uic_transfer not_visible">
                <form action="" class="uic_transfer_form">
                    <h2 style="margin:0;margin-bottom:1rem;">Transfer UIC</h2>
                    <label for="account">Account</label>
                    <input type="text" name="account" id="email_address">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" min="0">
                    <input type="submit" value="Transfer">
                </form>
            </div>
            <div class="fund_withdraw not_visible">
                <form action="" class="fund_withdraw_form">
                    <h2 style="margin:0;margin-bottom:1rem;">Withdraw Funds</h2>
                    <label for="email">Email Address</label>
                    <input type="email" name="email_address" id="email_address">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" min="0">
                    <input type="submit" value="Withdraw Funds">
                </form>
            </div>
            <?php
            require_once "public/config/left-sidebar.php";
            ?>

            <div id="page-wrapper" class="gray-bg dashbard-1">
                <div class="row">

                    <?php
                    require_once "public/config/topbar.php";
                    ?>

                </div>
                <div class="row  dashboard-header">
                    <div class="panel-heading">
                        <h2 class="page-title">Wallet</h2>
                    </div>
                </div>
                <?php

                function trans($d)
                {
                    $sql = "SELECT SUM(amount) as total FROM wallet WHERE org_id=:org_id and user_id=:user_id";
                    $query = $d->prepare($sql);
                    $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                    $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result->total;
                }

                function debit($d)
                {
                    $sql = "SELECT SUM(amount) as total FROM wallet WHERE amount < 0 AND (org_id=:org_id and user_id=:user_id)";
                    $query = $d->prepare($sql);
                    $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                    $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result->total;
                }

                function credit($d)
                {
                    $sql = "SELECT SUM(amount) as total FROM wallet WHERE amount > 0 AND (org_id=:org_id and user_id=:user_id)";
                    $query = $d->prepare($sql);
                    $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                    $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result->total;
                }
                ?>

                <div class="panel panel-default">
                    <div class="panel-heading">List Users</div>
                    <div class="panel-body">
                        <?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
                    </div>
                    <div class="workzone">
                        <div class="mini_side_nav">
                            <h3>UIC Balance</h3>
                            <span>
                                <h2><?php echo trans($dbh); ?>UIC</h2>
                            </span>
                            <ul class="transaction_actions">
                                <li><i class="fa fa-money"></i> Transaction History</li>
                                <li id='fund_wallet'><i class="fa fa-credit-card"></i> Fund Wallet</li>
                                <li id="transfer_uic"><i class="fa fa-bank"></i> Transfer UIC</li>
                                <li id='withdraw_funds'><i class="fa fa-suitcase"></i> Withdraw Funds</li>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="headers">
                                <div class="mini-headers">
                                    <div class="active gen"><span>General Transactions</span></div>
                                    <div class="inc"><span>Incoming Transactions</span></div>
                                    <div class="out"><span>Outgoing Transactions</span></div>
                                </div>
                            </div>
                            <div class="payment_summaries">
                                <div class="transaction">
                                    <h3>Transaction</h3>
                                    <div class="graph">
                                        <div class="liner" style="width:<?php echo (abs(debit($dbh)) + credit($dbh)) * 100 / trans($dbh); ?>%"></div>
                                    </div>
                                    <span class="rate">
                                        <h3><?php echo trans($dbh); ?></h3><span class="line_100"> | OUIC</span>
                                    </span>
                                </div>
                                <div class="credit">
                                    <h3>Credit</h3>
                                    <div class="graph">
                                        <div class="liner" style="width:<?php echo credit($dbh) * 100 / (abs(debit($dbh)) + credit($dbh)); ?>%"></div>
                                    </div>
                                    <span class="rate">
                                        <h3><?php echo credit($dbh); ?></h3><span class="line_100"> | OUIC</span>
                                    </span>
                                </div>
                                <div class="debit">
                                    <h3>Debit</h3>
                                    <div class="graph">
                                        <div class="liner" style="width:<?php echo abs(debit($dbh)) * 100 / (abs(debit($dbh)) + credit($dbh)); ?>%"></div>
                                    </div>
                                    <span class="rate">
                                        <h3><?php echo abs(debit($dbh)); ?></h3><span class="line_100"> | OUIC</span>
                                    </span>
                                </div>
                            </div>

                            <div class="transaction_header">
                                <div><span>Transaction Reference Number</span></div>
                                <div><span>Date</span></div>
                                <div><span>Status</span></div>
                                <div><span>Debit/Credit</span></div>
                                <div><span>Amount</span></div>
                            </div>

                            <div class="transactions_wrapper">
                            <ul class="transactions general">
                                <?php
                                $sql = "SELECT * FROM wallet WHERE org_id=:org_id and user_id=:user_id";
                                $query = $dbh->prepare($sql);
                                $query->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                                $query->bindParam(':org_id', $_SESSION['org_id'], PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) {                ?>
                                        <li>
                                            <span><?php echo htmlentities($result->trans_ref); ?></span>
                                            <span><?php echo htmlentities($result->date); ?></span>
                                            <span class="status"><?php echo htmlentities($result->status); ?></span>
                                            <span><?php echo ($result->amount < 0) ? 'Debit' : 'Credit'; ?></span>
                                            <span><?php echo htmlentities($result->amount); ?>UC</span>
                                            <div class="transaction_details">
                                                <div class="receiver">
                                                    <h3>To</h3>
                                                    <h1><?php echo htmlentities($result->send_to); ?></h1>
                                                </div>
                                                <div class="invoice">
                                                    <h3>Invoice Ticket</h3>
                                                    <h2><?php echo htmlentities($result->description); ?></h2>
                                                </div>
                                                <div class="bank">
                                                    <h3>Bank</h3>
                                                    <h2>UBA</h2>
                                                </div>
                                                <?php echo ($result->status < 0) ? '<a href="" class="pay_cta">Pay Now</a>' : ''; ?>
                                            </div>
                                        </li>
                                <?php $cnt = $cnt + 1;
                                    }
                                } ?>
                            </ul>
                            <ul class="transactions outgoing">
                                <li>
                                    <span>Outgoing</span>
                                    <span>Outgoing</span>
                                    <span class="status">Outgoing</span>
                                    <span>Outgoing</span>
                                    <span>Outgoing</span>
                                    <div class="transaction_details">
                                        <div class="receiver">
                                            <h3>To</h3>
                                            <h1>FullName</h1>
                                        </div>
                                        <div class="invoice">
                                            <h3>Invoice Ticket</h3>
                                            <h2>Details</h2>
                                        </div>
                                        <div class="bank">
                                            <h3>Bank</h3>
                                            <h2>UBA</h2>
                                        </div>
                                        <a href="" class="pay_cta">Pay Now</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="transactions incoming">
                                <li>
                                    <span>Incoming</span>
                                    <span>Incoming</span>
                                    <span class="status">Incoming</span>
                                    <span>Incoming</span>
                                    <span>Incoming</span>
                                    <div class="transaction_details">
                                        <div class="receiver">
                                            <h3>To</h3>
                                            <h1>FullName</h1>
                                        </div>
                                        <div class="invoice">
                                            <h3>Invoice Ticket</h3>
                                            <h2>Details</h2>
                                        </div>
                                        <div class="bank">
                                            <h3>Bank</h3>
                                            <h2>UBA</h2>
                                        </div>
                                        <a href="" class="pay_cta">Pay Now</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>


                </div>








            </div>


        </div>

        </div>

        <?php
        require_once "public/config/footer.php";
        ?>
        <script src="../public/js/wallet.js"></script>

        <style>
            .panel,
            .panel-body {
                background: #fff !important;
            }
        </style>
    </body>

    </html>

<?php } ?>