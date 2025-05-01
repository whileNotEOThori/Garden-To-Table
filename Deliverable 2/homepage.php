<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden To Table</title>
    <!-- Icon next to title on tab -->
    <link rel="icon" href="images/GTT Logo.jpg" />
    <!-- Bootstrap CDN link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
      crossorigin="anonymous"></script>
    <!-- link to stylesheet -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <!-- Navbar Logo and Title-->
          <a class="navbar-brand" href="homepage.php"><img src="images/GTT Logo.jpg" alt="Logo" height="100px" class="d-inline-block align-text-top" />Garden To Table</a>
          <!--  -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
              <?php if (!empty($_SESSION['firstName']) && $_SESSION['userType'] === 'seller'): ?>
                <li class="nav-item"><a class="nav-link" id="header-nav-link" href="sellerhomepage.php">Sell</a></li>
              <?php else: ?>  <!-- Open the seller sign in modal if there no active session -->
                <li class="nav-item"><a class="nav-link" id="header-nav-link" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sell</a></li>
              <?php endif; ?>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="">Buy</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#about">About Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#faq">FAQ</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#contact">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="signuppage.php">Sign Up</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" aria-current="page" href="signinpage.php">Sign In</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- Hero -->
      <section id="hero-section">
        <div class="px-4 py-5 my-5 text-center" id="hero">
          <h1 id="hero-title">Garden To Table</h1>
          <div class="col-lg-6 mx-auto">
            <h3 class="lead mb-4" id="call-to-action">Affordable. Nutritious. Quality. Locally grown produce.</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
              <a class="icon-link" href="sell.html">
                Sell
                <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
              </a>
              <a class="icon-link" href="buy.html">
                Buy
                <svg class="bi" aria-hidden="true"><use xlink:href="#chevron-right"></use></svg>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- About -->
      <section id="about">
        <h2>About Us</h2>
        <p>Garden To Table is a community-centric C2C E-Commerce website targeted towards cultivating entreprenuership</p>
      </section>

      <!-- FAQ -->
      <section id="faq">
        <!-- FAQ Heading -->
        <h2>FAQ</h2>
        <!-- FAQ Accordion -->
        <div class="accordion" id="faqAccordion">
          <!-- Collection/delivery -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                How do I get my order?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Orders need to be collected by the buyer from the seller. If the buyer requires delivery of a product they would need to arrange delivery for themselves and coordinate the collection
                process with the seller. We recommend buyers make use of services like Uber Courier and Bolt Send
              </div>
            </div>
          </div>
          <!-- Charges -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What are the charges?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">Garden To Table will charge a 5% services fee on all orders.</div>
            </div>
          </div>
          <!-- Payment -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How do I pay for my order?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">The buyer will EFT the Garden To Table will</div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact -->
      <section id="contact">
        <div class="container">
          <!-- Heading -->
          <h2>Contact Us</h2>

          <form id="contactUsForm" action="contactus.php" method="POST">
            <!-- Row for Name, Last Name and Email -->
            <div class="row">
              <div class="col-md-6">
                <!-- Name Input -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required />
                  <label for="firstName">First name</label>
                </div>

                <!-- Last Name Input -->
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required />
                  <label for="lastName">Last name</label>
                </div>

                <!-- Email Address Input -->
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
                  <label for="emailAddress">Email address</label>
                </div>
              </div>

              <!-- Col for Message -->
              <div class="col-md-6 d-flex flex-column">
                <div class="form-floating flex-grow-1 mb-3">
                  <textarea class="form-control h-100" placeholder="Leave a comment here" id="message" name="message" style="min-height: 100%; height: 100%" required></textarea>
                  <label for="message">Message</label>
                </div>
              </div>
            </div>

            <!-- Row for contact details -->
            <div class="row">
              <!-- Telephone Div-->
              <div class="col-md-4" style="display: flex; align-content: center">
                <!-- Telephone icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                  <path
                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
                <!-- Telephone number link -->
                <a href="tel:0123456789"><p>&emsp;012 345 6789</p></a>
              </div>
              <!-- Email Address Div -->
              <div class="col-md-4" style="display: flex; align-content: center">
                <!-- Email Address Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                  <path
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                </svg>
                <!-- Email Address Link-->
                <a href="mailto:gardentotable@gtt.co.za"><p>&emsp;gardentotable@gtt.co.za</p></a>
              </div>
              <!-- Physical Address Div-->
              <div class="col-md-4" style="display: flex; align-content: center">
                <!-- Physical Address Icon-->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                  <path
                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <!-- Physical Address Link -->
                <a href="https://maps.app.goo.gl/oYTR9QdnYckdQdi28"><p>&emsp;Alsatian Rd, Glen Austin AH, Midrand, 1685</p></a>
              </div>
            </div>

            <!-- Message Submission Button -->
            <div class="row">
              <button type="submit" name="contactUs" value="contactUs" class="btn btn-primary align-self-start">Send</button>
            </div>
          </form>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
        <?php if (!empty($_SESSION['firstName']) && $_SESSION['userType'] === 'seller'): ?>
          <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="sellerhomepage.php">Sell</a></li>
        <?php else: ?>  <!-- Open the seller sign in modal if there no active session -->
          <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sell</a></li>
        <?php endif; ?>
        <li class="nav-item"><a href="" class="nav-link px-2 text-body-secondary">Buy</a></li>
        <li class="nav-item"><a href="homepage.php#about" class="nav-link px-2 text-body-secondary">About Us</a></li>
        <li class="nav-item"><a href="homepage.php#faq" class="nav-link px-2 text-body-secondary">FAQ</a></li>
        <li class="nav-item"><a href="homepage.php#contact" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
        <li class="nav-item"><a href="signuppage.php" class="nav-link px-2 text-body-secondary">Sign Up</a></li>
        <li class="nav-item"><a href="signinpage.php" class="nav-link px-2 text-body-secondary">Sign In</a></li>
      </ul>
      <p class="text-center text-body-secondary"><img src="images/GTT Logo.jpg" alt="Logo" height="50px" /> Garden To Table ©. All rights reserved.</p>
    </footer>

    <!-- Seller Sign In Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Seller Sign In</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Sign In Form -->
            <form id="sellerSignInForm" action="signin.php" method="POST">
              <div class="container" style="width: 450px">
                <!-- Email Address Input Div -->
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
                  <label for="emailAddress">Email address</label>
                </div>

                <!-- Password Input Div -->
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                  <label for="password">Password</label>
                </div>
              </div>

              <?php $_SESSION['userType'] = "seller";?>

              <!-- Sign In Button -->
              <div class="container" style="display: flex; justify-content: center">
                <button type="submit" name="sellerSignIn" value="sellerSignIn" class="btn btn-primary">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
