<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" id='slide_left_btn'><i
                class="fa fa-bars"></i> </a>

        <form role="search" class="navbar-form-custom"
            action="http://webapplayers.com/  inspinia_admin-v2.6.1/search_results.html">
        </form>

    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Welcome
                <?php echo ($_SESSION["alogin"]); ?></span>
        </li>
        <li>
            <a href="faq.php"><span class="m-r-sm text-muted welcome-message">FAQ</span></a>
        </li>
        <li class="dropdown notifier">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-primary"></span>
                </a>
    
            </li>
    
            <!-- setting 
                             <li>
                                <a class="right-sidebar-toggle">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li> -->
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    
    </nav>
    <div class="backdrop"></div>
    <ul class="notifications__">
        <i class="fa fa-bell notification-bell"></i>
        <li>
            <span><span>27th Aug, 2020</span> <span>9PM</span></span>
            <p>Your flock has been fed by Mr.Olayinks</p>
        </li>
        <li>
            <span><span>27th Aug, 2020</span> <span>9PM</span></span>
            <p>Your flock has been fed by Mr.Olayinks</p>
        </li>
        <li>
            <span><span>27th Aug, 2020</span> <span>9PM</span></span>
            <p>Your flock has been fed by Mr.Olayinks</p>
        </li>
    </ul>
<!-- Temporary fix to the navbar issue -->
<script>
    let navTriggerBtn = document.getElementById('slide_left_btn');
    let BigLeftNav = document.querySelector("#wrapper > nav");
    let pageWrapper = document.querySelector('#page-wrapper');
    if (window.innerWidth > 763) {
        navTriggerBtn.addEventListener('click', () => {
            BigLeftNav.classList.toggle('slide_in_navbar');
            pageWrapper.classList.toggle('_margin_left');
        })
    } else if (window.innerWidth < 763) {
        navTriggerBtn.addEventListener('click', () => {
            BigLeftNav.classList.toggle('slide_in_navbar');
            BigLeftNav.classList.toggle('navbar_small');
            // pageWrapper.classList.toggle('no_margin_left_small_screens');
            navTriggerBtn.classList.toggle('right_btn');
        })
    }
</script>
<style>
    /* initally  */
    #wrapper>nav {
        margin-left: -500px;
        display: block;
    }

    #page-wrapper {
        margin-left: 0;
    }

    #wrapper>nav>div {
        width: 250px;
    }

    /* end initially */

    /* styles for big screens */
    .slide_in_navbar {
        margin-left: 0 !important;
        transition: 0.4s ease-in-out;
        display: block;
    }

    ._margin_left {
        margin-left: 250px !important;
    }

    /* end styles for huge screens */

    /* styles for small screens */
    .right_btn {
        position: absolute;
        right: 1rem;
    }

    .navbar_small {
        margin-left: 0;
        /* z-index:1000; */
        width: 250px !important;
        display: block !important;
        background-color: #2f4050;
    }
</style>