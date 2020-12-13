<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/irrigation.css" />
  <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <title>Hackathon</title>
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <link rel='favicon' href='./favicon.png' />
</head>

<body>
  <section id="header">
    <div class="container">
      <div id='logo'>
        <img class="logo" src="./favicon.png" alt="logo" style='height:3rem;' />
        <span class="logo-text">ufma</span>
      </div>
      <div class="header-text">
        <h1>Precision Farming using<br /> irrigation
          and farm sensors is the new normal in mordern day Agricultural practice</h1>
        <span class="square"></span>
        <p>
          With world population growing exponentially, As a farmer, you can't afford to farm anymore from generalist
          point of view. get in touch with us for a productive farming experience.


        </p>
        <button class="common-btn">Book a demo here</button>
        <div class="line">
          <span class="line-1"></span><br />
          <span class="line-2"></span><br />
          <span class="line-3"></span>
        </div>
      </div>
    </div>

    <!--NAVIGATION BAR-->
  </section>
  <nav id="sideNav">
    <ul>
      <li><a href="#header">Home</a></li>
      <li><a href="#courses">About Us</a></li>
      <li><a href="#offer">Product offer</a></li>
      <li><a href="#features">Features
        </a></li>
      <li><a href="#contact">Book a demo
        </a></li>
      <li><a href="#contact">Contact us
        </a></li>
    </ul>
  </nav>
  <img src="./images/iconmonstr-menu-5-240.png" id="menuBtn" alt="" />

  <!--features-->

  <section id="features">
    <div class="feature-row">
      <div class="feature-col" id='feature1'>
        <img src="public/images/feature1.png" alt="" />
        <h4>Free Management Software
        </h4>
        <p>6 month free Farm Management Software Integration
        </p>
      </div>
      <div class="feature-col" id="feature2">
        <img src="public/images/feature2.png" alt="" />
        <h4>Free Usage Training
        </h4>
        <p>Free After installation Training on usage
        </p>
      </div>
      <div class="feature-col" id="feature3">
        <img src="public/images/feature3.png" alt="" />
        <h4>Discounted After service
        </h4>
        <p>
          50% discount After Installation Servicing and maintenance

        </p>
      </div>
    </div>
    <div class="feature-btn">
      <div class="line">
        <span class="line-1"></span><br />
        <span class="line-2"></span><br />
        <span class="line-3"></span>
      </div>
      <button class="common-btn">Book a demo</button>
    </div>
  </section>

  <!--courses-->
  <section id="courses">
    <div class="container course-row">
      <div class="course-left-col">
        <div class="course-text">
          <h1>About us</h1>
          <span class="square"></span>
          <p>
            Farm Management Hardware Services and tools that include irrigation and farm sensors, helps farmers’ farm
            smart and imbibe precision farming technology into their business operation. DUFMA’s hardware tools help
            farmers improve the soil and the rate at which farm returns are monitored delivered. This tool is
            advantageous and important in modern agriculture as it also enhances the analysis of other factors affecting
            production of food crop and animal on the field
          </p>
          <button class="common-btn">Book a demo
          </button>
          <div class="line">
            <span class="line-1"></span><br />
            <span class="line-2"></span><br />
            <span class="line-3"></span>
          </div>
        </div>
      </div>
      <div class="course-right-col">
        <img src="./images/erwan-hesry-1q75BReKpms-unsplash.jpg" alt="" />
      </div>
    </div>
  </section>

  <!--offer-->
  <section id="offer">
    <div class="offer-left-col">
      <h4>Irrigation Services</h4>
      <br/>
<div class="offer-grid">
      <div class="prod1 prod">
        <div class="prod_image">
          <img src="public/images/prod1.jpg" alt="">
        </div>
        <div class="prod_details">
          <h4>Drip Irrigation System</h4>
          <p>This helps economizes water and ensure the water are directed to the root of the crop. Preferable for small
            field</p>
        </div>
      </div>

      <div class="prod2 prod">
        <div class="prod_image">
          <img src="public/images/prod3.jpg" alt="">
        </div>
        <div class="prod_details">
          <h4>Surface Irrigation System</h4>
          <p>
            This helps broaden the impact and reach of water across wide range of farmland. Preferable for large fields

          </p>
        </div>
      </div>
      </div>


    </div>
    <div class="offer-right-col">
      <h4>Farm Sensor Services</h4>
      <br/>
      <div class="offer-grid">
        <div class="prod3 prod">
          <div class="prod_image">
            <img src="public/images/prod2.jpg" alt="">
          </div>
          <div class="prod_details">
            <h4>Animal Farm Smart Box</h4>
            <p>
              This system contains sensors that include CO sensor, NH3 and NH4 sensor, H2S sensor, Heat sensor,
              Temperature and Humidity sensor

            </p>
          </div>
        </div>

        <div class="prod4 prod">
          <div class="prod_image">
            <img src="public/images/prod4.jpg" alt="">
          </div>
          <div class="prod_details">
            <h4>Plant Farm Smart Box</h4>
            <p>
              This system contains sensors that include, Water moisture, NPK, PH scale, Temperature and Humidity sensor

            </p>
          </div>


        </div>
      </div>
  </section>

  <!--Contact-->
  <section id="contact">
    <div class="container contact-row">
      <div class="contact-left-col">
        <h1>Book a Demo</h1>
        <form action="#">
          <input type="text" placeholder="Enter Name" />
          <input type="email" placeholder="Enter Email" />
          <input type="password" placeholder="Enter Password" />
          <div class="btn-box">
            <button class="common-btn">Contact Us</button>
            <button class="common-btn">Book a Demo</button>
          </div>
        </form>
        <div class="line">
          <span class="line-1"></span><br />
          <span class="line-2"></span><br />
          <span class="line-3"></span>
        </div>
      </div>
      <div class="contact-right-col">
        <img src="./images/marcel-mccarthy-VOXTlaLW25U-unsplash.jpg" alt="" />
      </div>
    </div>
  </section>

  <!--Footer-->
  <!-- <section id="footer">
    <div class="container footer-row">
      <hr />
      <div class="footer-left-col">
        <div class="footer-links">
          <div class="link-title">
            <h4>Product</h4>
            <small>Our plan</small><br />
            <small>Free Trial</small>
          </div>
          <div class="link-title">
            <h4>offer Us</h4>
            <small>Request Demo</small><br />
            <small>FAQs</small>
          </div>
          <div class="link-title">
            <h4>Support</h4>
            <small>Features</small><br />
            <small>Contact Us</small>
          </div>
          <div class="link-title">
            <h4>Explore</h4>
            <small>Find a nonprofit </small><br />
            <small>Corporate Solution</small>
          </div>
        </div>
      </div>
      <div class="footer-right-col">
        <div class="footer-info">
          <div class="copyright-text">
            <small>support@Dufma.com</small><br />
            <small>copyright 2020 Dufma</small>
          </div>
          <div class="footer-logo">
            <img src="./images/favicon2.png" alt="" />
            <button class="common-btn">English</button>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <div class="footer" style="background:#2e3636;margin-top:1rem">
    <div class="footer_wrapper">
      <div class="location">
        <h3>Contacts/Locations</h3>
        <ul>
          <li><i class="fa fa-envelope"></i><span>info@dufma.ng</span></li>
          <li><i class="fa fa-map-marker"></i><span>
              No 1, Lonlo street, Abule Egba, Lagos State.
            </span></li>
          <li><i class="fa fa-phone"></i>
            <span>+2348162313162, +2348137913430</span>
          </li>
        </ul>
      </div>
      <div class="services">
        <h3>Services</h3>
        <ul>
          <li>Farm Investment</li>
          <li>Farm Clinic</li>
          <li>Farm Training</li>
          <li>Management System</li>
        </ul>
      </div>
      <div class="company">
        <h3>Our company</h3>
        <ul>
          <li>Dermisho</li>
          <li>Seller's Hub</li>
          <li>Market</li>
          <li>About us</li>
          <li> <a href="admin/index.php">Admin</a></li>
        </ul>
      </div>
      <div class="social-buttons">
        <a href="#" class="social-buttons__button social-button social-button--facebook" aria-label="Facebook">
          <span class="social-button__inner">
            <i class="fa fa-facebook"></i>
          </span>
        </a>
        <a href="#" class="social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn">
          <span class="social-button__inner">
            <i class="fa fa-linkedin"></i>
          </span>
        </a>
        <a href="#" class="social-buttons__button social-button social-button--twitter" aria-label="Twitter">
          <span class="social-button__inner">
            <i class="fa fa-twitter"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <!--Social icons-->
  <div class="social-icons">
    <img src="./images/facebook.png" alt="" />
    <img src="./images/instagram.png" alt="" />
    <img src="./images/twitter.png" alt="" />
    <img src="./images/linkedin.png" alt="" />
  </div>


  <script>
    var menuBtn = document.getElementById("menuBtn");
    var sideNav = document.getElementById("sideNav");
    sideNav.style.right = "-250px";
    menuBtn.onclick = function () {
      if (sideNav.style.right == "-250px") {
        sideNav.style.right = "0";
      } else {
        sideNav.style.right = "-250px";
      }
    };

    var scroll = new SmoothScroll('a[href*="#"]', {
      speed: 1000,
      speedAsDuration: true,
    });
  </script>
  <script src="public/js/irrigation.js"></script>
</body>
<style>
  /* footer */
  * footer */ .footer {
    background: #2e3636;
    margin-top: 1rem
  }

  .footer_wrapper {
    padding: 2rem 50px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    justify-items: center
  }

  .social-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: -10px
  }

  .social-buttons__button {
    margin: 10px 5px 0
  }

  .social-button {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    outline: 0;
    width: 50px;
    height: 50px;
    text-decoration: none
  }

  .social-button__inner {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: calc(100% - 2px);
    height: calc(100% - 2px);
    border-radius: 100%;
    background: #fff;
    text-align: center
  }

  .social-button i,
  .social-button svg {
    position: relative;
    z-index: 1;
    transition: .3s
  }

  .social-button i {
    font-size: 28px
  }

  .social-button svg {
    height: 40%;
    width: 40%
  }

  .social-button::after {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    display: block;
    width: 0;
    height: 0;
    border-radius: 100%;
    transition: .3s
  }

  .social-button:focus,
  .social-button:hover {
    color: #fff
  }

  .social-button:focus::after,
  .social-button:hover::after {
    width: 100%;
    height: 100%;
    margin-left: -50%
  }

  .social-button--facebook {
    color: #3b5999
  }

  .social-button--facebook::after {
    background: #3b5999
  }

  .social-button--linkedin {
    color: #0077b5
  }

  .social-button--linkedin::after {
    background: #0077b5
  }

  .social-button--twitter {
    color: #55acee
  }

  .social-button--twitter::after {
    background: #55acee
  }

  /* footer styling */
  .footer h3 {
    color: #fff;
    margin-bottom: 0.7rem;
  }

  .footer ul {
    color: #d6d3d3;
  }

  .footer ul li {
    margin-bottom: 0.8rem;
    cursor: pointer;
    transition: 0.4s ease
  }

  .footer ul li:hover {
    color: #fff;
  }

  .location .fa {
    margin-right: 1rem;
  }

  .location li {
    display: grid;
    grid-template-columns: 1rem 1fr;
    grid-gap: 1rem;
  }


  @media(max-width:941px) {
    .footer_wrapper {
      padding: 1.4rem 1rem;
      grid-template-columns: 1fr;
      justify-items: stretch;
    }

    .footer_wrapper>div {
      margin-bottom: 1.5rem;
    }

    .social-buttons {
      justify-content: flex-start;
    }
  }
</style>

</html>