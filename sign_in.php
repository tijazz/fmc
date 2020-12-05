<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="public/css/login_main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="public/images/favicon.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <div class="logo_holder">
            <img src="public/images/favicon.png" alt="">
            <h1>Log in</h1>
        </div>
        <div class="wrapper">
            <div class="options">
                <div class="organization selector active">
                    <h2>Log in as an organization</h2>
                    <div class="svg">
                        <img src="public/images/organization.svg" alt="organization">
                    </div>
                </div>
                <div class="investor selector">
                    <h2>Log in as an investor</h2>
                    <div class="svg">
                        <img src="public/images/investor.svg" alt="investor">
                    </div>
                </div>
                <div class="employee selector">
                    <h2>Log in as an employee</h2>
                    <div class="svg">
                        <img src="public/images/employee.svg" alt="employee">
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="forms">
                <!-- organization form -->
                <form action="#" class="organization_form active">
                    <h2>Organization form</h2>
                    <div>
                        <label for="username"><span>Username</span><i class="fa fa-user"></i> </label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div>
                        <label for="password"><span>Password</span><i class="fa fa-lock"></i> </label>
                        <input type="password" name="password" id="password" class="password">
                        <i class="fa fa-eye float-right showpassword"></i>
                        </input>
                    </div>

                    <button type="submit" class="submit">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end organization form  -->

                <!-- investor form -->
                <form action="#" class="investor_form">
                    <h2>Investor form</h2>
                    <div>
                        <label for="username"><span>Username</span><i class="fa fa-user"></i> </label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div>
                        <label for="password"><span>Password</span><i class="fa fa-lock"></i> </label>
                        <input type="password" name="password" id="password" class="password">
                        <i class="fa fa-eye float-right showpassword"></i>
                        </input>
                    </div>

                    <button type="submit" class="submit">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end investor form -->



                <!-- employee form -->
                <form action="#" class="employee_form">
                    <h2>Employee form</h2>
                    <div>
                        <label for="username"><span>Username</span><i class="fa fa-user"></i> </label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div>
                        <label for="password"><span>Password</span><i class="fa fa-lock"></i> </label>
                        <input type="password" name="password" id="password" class="password">
                        <i class="fa fa-eye float-right showpassword"></i>
                        </input>
                    </div>

                    <button type="submit" class="submit">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end employee form -->


            </div>
        </div>
    </div>
</body>

<script src="public/js/login_main.js"></script>
</html>