<?php
session_start();
include('./public/includes/config.php');
if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT id, username, email, password, table_name FROM organization WHERE (username=:email or email=:email) and password=:password
        UNION
        SELECT id, username, email, password, table_name FROM employee WHERE (username=:email or email=:email) and password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_OBJ);

    if ($results->table_name == "employee") {
        $s = "SELECT * FROM employee WHERE id = :id";
        $q = $dbh->prepare($s);
        $q->bindParam(':id', $results->id, PDO::PARAM_STR);
        $q->execute();
        $res = $q->fetch(PDO::FETCH_OBJ);
        // echo var_dump($res->id);
        if ($q->rowCount() > 0) {
            $_SESSION['alogin'] = $_POST['username'];
            $_SESSION['name'] = $res->name;
            $_SESSION['user_id'] = $res->id;
            $_SESSION['supply'] = $res->supply;
            $_SESSION['risk'] = $res->risk;
            $_SESSION['inventory'] = $res->inventory;
            $_SESSION['monitory'] = $res->monitory;
            $_SESSION['financial'] = $res->financial;
            $_SESSION['images'] = $res->image;

            $sq = "SELECT * FROM organization WHERE id=:id";
            $qu = $dbh->prepare($sq);
            $qu->bindParam(':id', $res->org_id, PDO::PARAM_STR);
            $qu->execute();
            $re = $qu->fetch(PDO::FETCH_OBJ);

            if ($qu->rowCount() > 0) {
                $_SESSION['org_name'] = $re->organization;
                $_SESSION['org_id'] = $re->id;
            }

            

            // echo $_SESSION['supply'];
            echo "<script type='text/javascript'> document.location = 'employee/dashboard.php'; </script>";
        } else {

            echo "<script>alert('Invalid Details');</script>";
        }
    } elseif ($results->table_name == "organization") {
        $s = "SELECT * FROM organization WHERE id = :id";
        $q = $dbh->prepare($s);
        $q->bindParam(':id', $results->id, PDO::PARAM_STR);
        $q->execute();
        $res = $q->fetch(PDO::FETCH_OBJ);
// echo var_dump($res);
        if ($q->rowCount() > 0) {
            $_SESSION['alogin'] = $_POST['username'];
            $_SESSION['org_id'] = $res->id;
            $_SESSION['org_name'] = $res->organization;
            $_SESSION['user_id'] = 0;
            echo "<script type='text/javascript'> document.location = 'organization/dashboard.php'; </script>";
        } else {

            echo "<script>alert('Invalid Details');</script>";
        }
    }
    // if ($query->rowCount() > 0) {
    //     $_SESSION['alogin'] = $_POST['username'];
    //     $_SESSION['org_id'] = $results[0]->id;
    //     $_SESSION['org_name'] = $results[0]->organization;
    //     $_SESSION['user_id'] = 0;
    //     echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    // } else {

    //     echo "<script>alert('Invalid Details');</script>";
    // }
}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/login.css">

</head>

<body>
    <div class="login-page bk-img">
        <div class="form-content">
            <h1 class="org-text text-center text-bold mt-" style="color:#fff">Organization Login</h1>
            <div class="well row pt-2x pb-3x bk-light">
                <div class=form_holder">
                    <form method="post">
                        <label for="" class="text-uppercase text-sm">Your Username </label>
                        <input type="text" placeholder="Username" name="username" class="form-control mb" required>
                        <label for="" class="text-uppercase text-sm">Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control mb" required>
                        <div class="cover-tn">
                            <button name="login" type="submit">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    
</body>

</html>