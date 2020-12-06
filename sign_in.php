<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="public/css/presets.css">
    <link rel="stylesheet" href="public/css/login_main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="public/images/favicon.png" type="image/x-icon">

</head>

<body>
        <nav class="main_nav flex a_cent">
                <a href="index.php">
                    <div class="logo flex a_cent">
                        <img src="public/images/favicon.png" alt="">
                        <span class="ufma" style="color:#fff;">ufma</span>
                    </div>
                </a>
                <ul class="right_nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="parent"><a href="solutions.php">Solutions
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                            </svg>
                        </a>
                        <ul class="child">
                            <a href="media.php">
                                <li>Media</li>
                            </a>
                            <a href="case_studies.php">
                                <li>Case Studies</li>
                            </a>
                            <a href="#">
                                <li>Webinars</li>
                            </a>
                        </ul>
                    </li>
                    <li><a href="index.php#demo_request">Request a Demo</a></li>
                    <li class="parent"><a href="#">Contact us
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                            </svg>
                        </a>
                        <ul class="child">
                            <a href="#">
                                <li>Careers</li>
                            </a>
                            <a href="#">
                                <li>Services</li>
                            </a>
                        </ul>
                    </li>
                    <li class="active"><a href="sign_in.php">Login</a></li>
                </ul>
                <li class="mobile_ham flex column">
                    <span></span>
                    <span></span>
                </li>
            </nav>
            <ul class="mobile_nav">
                <li><a href="index.php">Home</a></li>
                <li class="parent1 parent"><a href="solutions.php">Solutions
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                        </svg>
                    </a>
        
                </li>
                <ul class="child1">
                    <li><a href="media.php">Media</a></li>
                    <li><a href="case_studies.php">Case Studies</a></li>
                    <li><a href="#">Webinars</a></li>
                </ul>
                <li><a href="#demo_request">Request A Demo</a></li>
                <li class="parent2 parent"><a href="#">Contact Us
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                        </svg>
                    </a>
                </li>
                <ul class="child2">
                    <li><a href="media.php">Media</a></li>
                    <li><a href="case_studies.php">Case Studies</a></li>
                    <li><a href="#">Webinars</a></li>
                </ul>
                <li><a href="sign_in.php">Login</a></li>
            </ul>
    <div class="container">
        <div class="logo_holder">
            <img src="public/images/favicon.png" alt="">
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
                <form action="organization/index.php" class="organization_form active" method="POST">
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

                    <button type="submit" class="submit" name="login">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end organization form  -->

                <!-- investor form -->
                <form action="investor/index.php" class="investor_form" method="POST">
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

                    <button type="submit" class="submit" name="login">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end investor form -->



                <!-- employee form -->
                <form action="employee/index.php" class="employee_form" method="POST">
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

                    <button type="submit" class="submit" name="login">
                        <span>Login <i class="fa space fa-angle-right"></i></span>
                    </button>
                </form>
                <!-- end employee form -->


            </div>
        </div>
    </div>
</body>
<script src="public/js/landing.js"></script>
<script src="public/js/login_main.js"></script>
</html>