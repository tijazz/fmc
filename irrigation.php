<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/irrigation.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <title>Hackathon</title>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<link rel = 'favicon' href = './favicon.png'/>
  </head>
  <body>
    <section id="header">
      <div class="container">
        <img class="logo" src="./favicon.png" alt="logo" />
        <div class="header-text">
          <h1>The purpose is to <br />teach and bring learning to people</h1>
          <span class="square"></span>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime
            magni nobis cum sunt iusto, quasi rerum fugiat esse voluptates
           
          </p>
          <button class="common-btn">Read More</button>
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
        <li><a href="#header">HOME</a></li>
        <li><a href="#offer">offer US</a></li>
        <li><a href="#features">FEATURES</a></li>
        <li><a href="#courses">COURSES</a></li>
        <li><a href="#offer">OFFER</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </nav>
    <img src="./images/iconmonstr-menu-5-240.png" id="menuBtn" alt="" />
   
    <!--features-->

    <section id="features">
      <div class="feature-row">
        <div class="feature-col" id='feature1'>
          <img src="./images/pic-1.png" alt="" />
          <h4>Learn Anywhere</h4>
          <p>Switch between your computer, tablet or mobile device.</p>
        </div>
        <div class="feature-col" id="feature2">
          <img src="./images/pic-2.png" alt="" />
          <h4>Expert Teachers</h4>
          <p>Learn from industry experts who are passionate offer teaching.</p>
        </div>
        <div class="feature-col" id="feature3">
          <img src="./images/pic-3.png" alt="" />
          <h4>Unlimited Access</h4>
          <p>
            Choose what you would like to learn from our extensive subscription
            library.
          </p>
        </div>
      </div>
      <div class="feature-btn">
        <div class="line">
          <span class="line-1"></span><br />
          <span class="line-2"></span><br />
          <span class="line-3"></span>
        </div>
        <button class="common-btn">Start free trial</button>
      </div>
    </section>

    <!--courses-->
    <section id="courses">
      <div class="container course-row">
        <div class="course-left-col">
          <div class="course-text">
            <h1>Browse our top<br />courses</h1>
            <span class="square"></span>
            <p>
              Contrary to popular belief, Lorem Ipsum is not simply random text.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus,
              incidunt.
            </p>
            <button class="common-btn">View All Courses</button>
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
        <img src="./images/lambros-lyrarakis-Uf1gpYcKysA-unsplash.jpg" alt="" />
      </div>
      <div class="offer-right-col">
        <div class="offer-text">
          <h1>Limitless learning,<br />limitless possibilities</h1>
          <span class="square"></span>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti,
            maiores! Laudantium corporis tempore, voluptatibus fugit ab nemo?
            Magnam iste pariatur iusto quam aliquam voluptates necessitatibus,
            blanditiis tempora quis molestias libero!
          </p>
          <button class="common-btn">Start Free Trial</button>
          <div class="line">
            <span class="line-1"></span><br />
            <span class="line-2"></span><br />
            <span class="line-3"></span>
          </div>
        </div>
      </div>
    </section>

    <!--Contact-->
    <section id="contact">
      <div class="container contact-row">
        <div class="contact-left-col">
          <h1>Sign Up to join our<br />learning community</h1>
          <form action="#">
            <input type="text" placeholder="Enter Name" />
            <input type="email" placeholder="Enter Email" />
            <input type="password" placeholder="Enter Password" />
            <div class="btn-box">
              <button class="common-btn">Sign Up</button>
              <button class="common-btn">Start Free Trial</button>
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
    <section id="footer">
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
    </section>

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
</html>
