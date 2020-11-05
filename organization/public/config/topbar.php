<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" id='slide_left_btn'><i class="fa fa-bars"></i> </a>

        <form role="search" class="navbar-form-custom" action="http://webapplayers.com/  inspinia_admin-v2.6.1/search_results.html">
        </form>

    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Welcome
                <?php echo ($_SESSION["alogin"]); ?></span>
        </li>
        <li class="dropdown notifier">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell notification-bell"></i> <span class="label label-primary"></span>
            </a>
            <ul class="dropdown-menu dropdown-messages notifications_">
         
            </ul>
        </li>
        <li>
            <a href="faq.php"><span class="m-r-sm text-muted welcome-message">FAQ</span></a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa fa-sign-out"></i> Log out
            </a>
        </li>
    </ul>

</nav>


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

    renderTimestamp = timestamp => {
        let prefix = '';
        const timeDiff = Math.round((new Date().getTime() - new Date(timestamp).getTime()) / 60000);
        if (timeDiff < 60 && timeDiff > 1) {
            prefix = `${timeDiff} minutes ago`
        }
        else if (timeDiff <= 1) {
            if(timeDiff == 0){
                prefix = 'now'
            }else{
                prefix = `${timeDiff} minute ago`
            }
        }
        else if (timeDiff < 24 * 60 && timeDiff > 60) {
            prefix = `${Math.round(timeDiff / 60)} hours ago`
        }
        else if (timeDiff <= 31 * 24 * 60 && timeDiff > 24 * 60) {
            const prefix_math = Math.round(timeDiff / (60 * 24))
            if (prefix_math <= 1) {
                prefix = 'Yesterday'
            }
            else {
                prefix = `${Math.round(timeDiff / (60 * 24))} days ago`
            }
        }
        else {
            prefix = `${new Date(timestamp)}`
        }
        return prefix
    }

    // Json data for notifications
    var notifications = JSON.stringify(<?= sendnotify($dbh, $_SESSION['org_id']) ?>);
    var notificationsElement = document.querySelector('.notifications_')
    notifications = JSON.parse(notifications)
    for(var i in notifications){
        var notification = notifications[i]
        var listElement = document.createElement('li')
        listElement.classList.add('user_notification')
        var divElement = document.createElement('div')
        divElement.classList.add('dropdown-messages-box')
        aTag = document.createElement('a')
        aTag.classList.add('pull-left')
        var image = document.createElement('img')
        image.classList.add('img-circle')
        image.src = 'public/images/farm.jpg'
        aTag.appendChild(image)
        divElement.appendChild(aTag)
        var SecondDiv = document.createElement('div')
        SecondDiv.classList.add('media-body')
        var smallTag = document.createElement('small')
        smallTag.classList.add('pull-right')
        smallTag.innerText = renderTimestamp(notification['time'])
        var strongTag = document.createElement('strong')
        strongTag.innerText = notification['message']
        var secondsmallTag = document.createElement('small')
        lineTag = document.createElement('br')
        secondsmallTag.innerText = renderTimestamp(notification['time']) + ' at ' + new Date(notification['time']).toTimeString().
        replace("West Africa Standard Time","").replace("GMT+0100","").replace('(','').replace(')','')
        secondsmallTag.classList.add('text-muted')
        SecondDiv.appendChild(smallTag)
        SecondDiv.appendChild(strongTag)
        SecondDiv.appendChild(lineTag)
        SecondDiv.appendChild(secondsmallTag)
        divElement.appendChild(SecondDiv)
        listElement.appendChild(divElement)
        notificationsElement.appendChild(listElement)
        var divider = document.createElement('li')
        divider.classList.add('divider')
        notificationsElement.appendChild(divider)
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