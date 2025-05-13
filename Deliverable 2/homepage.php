<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Garden To Table</title>
  <?php include("stylingdependecies.php") ?>
</head>

<body>
  <!-- Header -->
  <?php include("header.php") ?>

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
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#chevron-right"></use>
              </svg>
            </a>
            <a class="icon-link" href="buy.html">
              Buy
              <svg class="bi" aria-hidden="true">
                <use xlink:href="#chevron-right"></use>
              </svg>
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
              <i class="bi bi-telephone h3"></i>
              <!-- Telephone number link -->
              <a href="tel:0123456789">
                <p>&emsp;012 345 6789</p>
              </a>
            </div>
            <!-- Email Address Div -->
            <div class="col-md-4" style="display: flex; align-content: center">
              <!-- Email Address Icon -->
              <i class="bi bi-envelope h3"></i>
              <!-- Email Address Link-->
              <a href="mailto:gardentotable@gtt.co.za">
                <p>&emsp;gardentotable@gtt.co.za</p>
              </a>
            </div>
            <!-- Physical Address Div-->
            <div class="col-md-4" style="display: flex; align-content: center">
              <!-- Physical Address Icon-->
              <i class="bi bi-geo-alt h3"></i>
              <!-- Physical Address Link -->
              <a href="https://maps.app.goo.gl/oYTR9QdnYckdQdi28">
                <p>&emsp;Alsatian Rd, Glen Austin AH, Midrand, 1685</p>
              </a>
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
  <?php include("footer.php") ?>

  <!-- Seller Sign In Modal -->
  <?php include("selllersigninmodal.php") ?>

  <!-- Buyer Sign In Modal -->
  <?php include("buyersigninmodal.php") ?>
</body>

</html>