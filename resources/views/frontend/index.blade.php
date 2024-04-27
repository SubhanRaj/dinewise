<x-frontend>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Dine Wise</h1>
          <h2 data-aos="fade-up" data-aos-delay="400"> Addressing Challenges and Opportunities in Restaurant Management through Technological Innovation</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Explore More</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{asset('frontend/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-1.png')}}" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-2.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-3.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-4.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-5.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="{{asset('frontend/assets/img/clients/client-6.png')}}" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Dine Wise </h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              The primary purpose of DineWise is to empower restaurant owners and managers with a comprehensive software solution that streamlines operations, optimizes decision-making, and ultimately enhances customer satisfaction and profitability. DineWise addresses this need by providing a user-friendly and feature-rich platform that automates routine tasks, facilitates communication and generates valuable data insights.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> <strong>Reduce Operational Costs:</strong> Eliminate manual processes and streamline workflows, leading to cost savings and improved resource allocation.
              </li>
              <li><i class="ri-check-double-line"></i> <strong>Enhance Customer Satisfaction:</strong> Foster a more efficient and responsive dining experience, minimizing wait times and ensuring accurate orders.</li>
              <li><i class="ri-check-double-line"></i> <strong>Drive Increased Profitability:</strong> Optimize inventory management, improve decision-making through data-driven insights, and ultimately boost the restaurant's bottom line.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              DineWise goes beyond mere automation; it empowers restaurants to gain a deeper understanding of their operations and customer behavior. Through this newfound knowledge, restaurants can make informed decisions, personalize offerings, and cultivate a loyal customer base. Ultimately, DineWise serves as a strategic partner for modern restaurants, paving the way for sustainable growth and success in a dynamic and competitive environment.
            </p>
            <p>
              Imagine a world where order tracking keeps your kitchen in perfect rhythm, inventory control ensures ingredients are always in tune, and insightful reports unveil opportunities to elevate your menu. DineWise empowers you to conduct your restaurant with confidence, making informed decisions based on data-driven insights. The result? Increased profitability, a thriving team, and happy customers returning for the perfect plate, every time.

            </p>
            <a href="{{route('login-view')}}" class="btn-learn-more">Explore Now</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>DineWise offers a wide range of services designed to meet the unique needs of modern restaurants. From order management to inventory control, our software solution provides the tools and support you need to succeed in today's competitive market. Explore our services below to learn more about how DineWise can help your restaurant thrive.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class='bx bxs-bowl-hot'></i></div>
              <h4 class="title"><a href="">Table Reservation & Booking</a></h4>
              <p class="description">DineWise helps you manage your restaurant's table reservations and bookings with ease, ensuring a seamless dining experience for your customers.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class='bx bx-wallet'></i></div>
              <h4 class="title"><a href="">Billing & Inventory Management</a></h4>
              <p class="description"> Our software solution enables you to manage billing and inventory efficiently, reducing waste and increasing profitability.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class='bx bxs-business'></i></div>
              <h4 class="title"><a href="">Employee & Payroll Management</a></h4>
              <p class="description">DineWise helps you manage your restaurant's employees and payroll, ensuring smooth operations, attendence, and salary management.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class='bx bxs-report'></i></div>
              <h4 class="title"><a href="">Reporting & Analysis with AI and ML</a></h4>
              <p class="description">Our software solution provides you with valuable insights and reports, enabling you to make data-driven decisions and optimize your restaurant's performance.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Features</h2>
          <p>
            DineWise offers a wide range of features designed to help restaurants streamline operations, optimize workflows, and improve overall efficiency. From order management to inventory control, our software solution provides the tools and support you need to succeed in today's competitive market. Explore our features below to learn more about how DineWise can help your restaurant thrive.
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-restaurant-2-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Table Booking</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ti ti-building-warehouse" style="color: #5578ff;"></i>

              <h3><a href="">Inventory Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ti ti-building-store" style="color: #e80368;"></i>
              <h3><a href="">Product Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ti ti-truck-delivery" style="color: #e361ff;"></i>
              <h3><a href="">Order Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-friends" style="color: #47aeff;"></i>
              <h3><a href="">Customer Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-headset" style="color: #ffa76e;"></i>
              <h3><a href="">Enquiry & Support</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-desk" style="color: #11dbcf;"></i>
              <h3><a href="">Staff Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-wallet" style="color: #4233ff;"></i>
              <h3><a href="">Payout Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-calendar-clock" style="color: #b2904f;"></i>
              <h3><a href="">Attendance Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-door-exit" style="color: #b20969;"></i>
              <h3><a href="">Leave Management</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-access-point" style="color: #ff5828;"></i>
              <h3><a href="">User Access Control</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ti ti-settings" style="color: #29cc61;"></i>
              <h3><a href="">Settings</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->





    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>
            The team behind DineWise is a group of passionate and dedicated professionals with a shared vision of transforming the restaurant industry through technological innovation. Our team members bring a diverse set of skills and experiences to the table, enabling us to develop a robust and user-friendly software solution that meets the needs of modern restaurants. Together, we are committed to helping restaurants thrive in today's competitive market by providing them with the tools and support they need to succeed.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{asset('frontend/assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Subhan Raj</h4>
                <span>
                  Project Manager & DevOps Engineer
                </span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="{{asset('frontend/assets/img/team/team-2.jpg')}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Vaibhav Goswami</h4>
                <span>Lead Developer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="{{asset('frontend/assets/img/team/team-3.jpg')}}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Vaishnavi Mishra</h4>
                <span>Tester & Documentation Specialist</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>What DineWise Is?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              DineWise is a comprehensive restaurant management software application developed using Laravel, designed to address the challenges and opportunities faced by modern restaurants in today's competitive market. It empowers restaurants to streamline operations, optimize workflows, and improve overall efficiency, ultimately leading to increased profitability and enhanced customer satisfaction.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>What is the Tech Stack of DineWise?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              DineWise primary used TALL (Tailwind CSS, Alpine.js, Laravel, and Livewire) stack for the development of the application. The application is built using the Laravel PHP framework, which provides a robust and secure foundation for the software. Tailwind CSS is used for styling, while Alpine.js and Livewire are used for interactivity and real-time updates.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->
      </div>
    </section><!-- End F.A.Q Section -->



  </main><!-- End #main -->
</x-frontend>