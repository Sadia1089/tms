<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- important for responsiveness and mediaqueries -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- icon to show on link -->
    <link rel="icon" href="img/favicon.png" />

    <!-- icon for favourite website on ios -->
    <link rel="icon" href="img/apple-touch-icon.png" />

    <!-- icon for favourite website on android by creating manifest -->
    <link rel="manifest" href="manifest.webmanifest" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="/tms/dist/CSS/style.css" class="css">
    <link rel="stylesheet" href="/tms/dist/CSS/general.css">
    <link rel="stylesheet" href="/tms/dist/CSS/queries.css">

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>

    <script
      nomodule=""
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script
      defer
      src="https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js"
    ></script>

    

    <!-- addind batter looking title -->
    <title>BAIUST &mdash; Transport Solution</title>
  </head>
  <body>
    <header class="header sticky">
      <a href="#">
        <img src="https://baiust.ac.bd/wp-content/uploads/2023/11/Untitled-design-150x150.png" alt="Omnifood-logo" height="50px" width="50px"/>
      </a>
      <nav class="main-nav">
        <ul class="main-nav-lists">
          <li><a href="#how" class="main-nav-link">Monitoring</a></li>
          <li><a href="#pricing" class="main-nav-link">Destinations</a></li>
          <li><a href="#meals" class="main-nav-link">Developers</a></li>
        </ul>
      </nav>
      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
      </button>
    </header>

    <main>
      <section class="section-hero">
        <div class="hero">
          <div class="hero-text-box">
            <h1 class="heading-primary">
              The Best Transport Solution.
            </h1>
            <p class="hero-description">
            An innovative solution revolutionizing student bus pass management at Bangladesh Army International University of Science and Technology. Simplify, streamline, succeed.
            </p>
            <a href="/tms/admin/login.php" target="_blank" class="btn btn-full margin-right-sm"
              >Administration</a
            >
            <a href="<?php echo '/tms/user/login.php'; ?>" target="_blank" class="btn btn-outline">Transport User</a>
            
          </div>
          <div class="hero-img-box">
            <picture>
              <source srcset="/tms/dist/img/trans-2.gif" type="image/webp" />
              <source srcset="/tms/dist/img/hero-min.png" type="image/png" />

              <img
                src="img/hero-min.png"
                class="hero-img"
                alt="Woman enjoying food, meals in storage container, and food bowls on a table"
              />
            </picture>
          </div>
        </div>
      </section>

      
      <section class="how-it-works" id="how">
        <div class="container">
          <span class="subheading">Advisory/Operations Team</span>
          <h2 class="heading-secondary">
            Operation Team
          </h2>
        </div>

        <div class="container grid grid-2-col grid-center-vertical">
          <!-- Operations Team -->
          <div class="step-text-box">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">
              Md. Zahid Hossain
            </h3>
            <p class="step-description">
              Senior Warrant Officer (Retd.)
              <br>
              Transport Manager, MT
              <br>
              01712082224
            </p>
          </div>

          <div class="step-img-box">
            <img
              src="/tms/dist/img/app/ad-1.png"
              class="step-img"
              alt=""
            />
            <!-- step 02 -->
          </div>
          <div class="step-img-box">
            <img
              src="/tms/dist/img/app/ad-2.png"
              class="step-img"
              alt="iphone app preference meal approval screen"
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">Md. Kamrul Hasan</h3>
            <p class="step-description">
              Coordination Assistant &amp; Accounts
              <br>
                Mob: 01622016566
              <br>
              Email: transport@baiust.ac.bd
            </p>
          </div>
          <!-- step 03 -->
          <div class="step-text-box">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">Sahab Uddin</h3>
            <p class="step-description">
              MT. Sgt.
              <br>
                Mob: 01727065537
            </p>
          </div>

          <div class="step-img-box">
            <img
              src="/tms/dist/img/app/ad-3.png"
              class="step-img"
              alt="iphone app preference delivery screen"
            />
          </div>

          <!-- Advisory Team -->
           <!-- step 04 -->
          <div class="step-img-box">
            <img
              src="/tms/dist/img/app/ad-4.png"
              class="step-img"
              alt="iphone app preference meal approval screen"
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">04</p>
            <h3 class="heading-tertiary">Mohammad Shariful Islam</h3>
            <p class="step-description">
              Associate Professor	
              <br>
                Department of DBA
              <br>
              Advisor
              <br>
              Mob: 01324763825
            </p>
          </div>
          <!-- step 05 -->
          <div class="step-text-box">
            <p class="step-number">05</p>
            <h3 class="heading-tertiary">Md. Yasir Arafat Arman</h3>
            <p class="step-description">
              Lecturer
              <br>
                Department of Sc & Hum
              <br>
              Co-Advisor
            </p>
          </div>

          <div class="step-img-box">
            <img
              src="/tms/dist/img/app/ad-5.png"
              class="step-img"
              alt="iphone app preference delivery screen"
            />
          </div>
        </div>
      </section>

      <section class="section-pricing" id="pricing">
        <div class="container">
          <span class="subheading">Routes & Fees</span>
          <h2 class="heading-secondary">
            The Destination
          </h2>
        </div>
        <div class="container grid grid-2-col margin-bottom-md">
          <div class="pricing-plan plan-starter">
            <header class="plan-header">
              <p class="plan-name">Route - 1</p>
              <p class="plan-price"><span>৳</span>8500</p>
            </header>
            <ul class="lists">
              <li class="list-items">
                <ion-icon class="list-icon" name="bus-outline"></ion-icon>
                <span>কান্দিরপাড়/ঈদ্গাহ -- নোয়াপাড়া -- আলেখার চর -- ক্যাম্পাস</span>
              </li>
            </ul>
          </div>



        <div class="pricing-plan plan-starter">
            <header class="plan-header">
              <p class="plan-name">Route - 2</p>
              <p class="plan-price"><span>৳</span>8500</p>
            </header>
            <ul class="lists">
              <li class="list-items">
                <ion-icon class="list-icon" name="bus-outline"></ion-icon>
                <span>টমসম ব্রিজ -- পদুয়ার বাজার বিশ্বরোড -- আলেখার চর -- ক্যাম্পাস</span>
              </li>
            </ul>
        </div>



        <div class="pricing-plan plan-starter">
            <header class="plan-header">
              <p class="plan-name">Route - 3</p>
              <p class="plan-price"><span>৳</span>5500</p>
            </header>
            <ul class="lists">
              <li class="list-items">
                <ion-icon class="list-icon" name="bus-outline"></ion-icon>
                <span>ঝাগুরঝুলি বিশ্বরোড -- আলেখার চর -- ক্যাম্পাস</span>
              </li>
            </ul>
        </div>


        <div class="pricing-plan plan-starter">
            <header class="plan-header">
              <p class="plan-name">Route - 4</p>
              <p class="plan-price"><span>৳</span>3500</p>
            </header>
            <ul class="lists">
              <li class="list-items">
                <ion-icon class="list-icon" name="bus-outline"></ion-icon>
                <span>ক্যান্টনমেন্ট/টিপরা বাজার -- ক্যাম্পাস</span>
              </li>
            </ul>
        </div>




        <div class="pricing-plan plan-starter">
            <header class="plan-header">
              <p class="plan-name">Route - 5</p>
              <p class="plan-price"><span>৳</span>4000</p>
            </header>
            <ul class="lists">
              <li class="list-items">
                <ion-icon class="list-icon" name="bus-outline"></ion-icon>
                <span>ঈদগাহ সম্মুখ - পুলিশ লাইন - নোয়াপাড়া - ক্যাম্পাস</span>
              </li>
            </ul>
        </div>
     </div>
        
        
      </section>


      <section class="section-meals" id="meals">
        <div class="container center-text">
          <span class="subheading">Ideas & Planners</span>
          <h2 class="heading-secondary">
            Developers
          </h2>
        </div>
        <div class="container grid grid-3-col margin-bottom-md">
          <div class="meals">
            <img
              src="/tms/dist/img/developer/dev-1.jpg"
              class="meal-img"
              alt="japanese gyozes"
            />
            <div class="meal-content">
              <div class="meal-tags">
                <span class="tags tag-vagetarian">Leader</span>
              </div>
              <p class="meal-name">Sadia Sultana</p>
              <ul class="meal-attributes">
                <li class="meal-attribute">
                  <span><strong>Id:- </strong> 0822220205101089 </span>
                </li>
                <li class="meal-attribute">
                  <span><strong>Level/Term:-</strong> 3/1 </span>
                </li>
                <li class="meal-attribute">
                  <span><strong>Dept:-</strong> Department of CSE </span>
                </li>
              </ul>
            </div>
          </div>
        
          
          
        
      </section>
      
    </main>
    <footer class="footer">
      <div class="container grid grid-footer grid-3-col">
        <div class="logo-col">
          <a href="#" class="footer-logo">
            <img src="https://baiust.ac.bd/wp-content/uploads/2023/11/Untitled-design-150x150.png" alt="Omnifood-logo" height="50px" width="50px" />
          </a>
          <h2>
          Bangladesh Army International University of Science and Technology
          </h2>
          <p class="copyright">
            Copyright © <span class="year"> 2024</span> by BAIUST, All
            rights reserved.
          </p>
        </div>
        <div class="address-col">
          <p class="footer-heading">Contact us</p>
          <address class="contacts">
            <p class="address">
            Address: Syedpur, Adarsha Sadar, Cumilla.
            </p>
            <p>
              <a class="footer-link" href="tel:415-201-6370">Tel: 02339334212	</a
              ><br/>
              <a class="footer-link" href="tel:415-201-6370">Mob: +8801756436655</a
              ><br/>
              <a class="footer-link" href="tel:415-201-6370">Mob: +8801572482331	</a
              ><br />
              <a class="footer-link" href="mailto:info@baiust.ac.bd "
                >info@baiust.ac.bd </a
              ><br/>
              <a class="footer-link" href="mailto:admission@baiust.ac.bd "
                >admission@baiust.ac.bd </a
              >
            </p>
            <br>
            <ul class="social-links">
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-facebook"></ion-icon
              ></a>
            </li>
            <li>
              <a class="footer-link" href="#"
                ><ion-icon class="social-icon" name="logo-youtube"></ion-icon
              ></a>
            </li>
          </ul>
          </address>
        </div>
        
       
        <nav class="nav-col">
          <p class="footer-heading">Departments</p>
          <ul class="footer-nav" style="gap:1.2rem;">
            <li><a class="footer-link" href="#">Department of CSE</a></li>
            <li><a class="footer-link" href="#">Department of EEE</a></li>
            <li><a class="footer-link" href="#">Department of CE</a></li>
            <li><a class="footer-link" href="#">Department of ICT</a></li>
            <li><a class="footer-link" href="#">Department of Business Administration</a></li>
            <li><a class="footer-link" href="#">Department of Economics</a></li>
            <li><a class="footer-link" href="#">Department of English</a></li>
            <li><a class="footer-link" href="#">Department of ICT</a></li>
            <li><a class="footer-link" href="#">Department of Law</a></li>
            <li><a class="footer-link" href="#">Department of Sc & Hum</a></li>
          </ul>
        </nav>
      </div>
    </footer>

    <script defer src="/tms/dist/JS/script.js"></script>
  </body>
</html>
