<?php
require_once('functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Garden To Table</title>
  <?php require_once("stylingdependecies.php") ?>
</head>

<body>
  <!-- Header -->
  <?php require_once("header.php") ?>

  <main>
    <!-- Hero -->
    <section id="hero-section">
      <div class="px-4 py-5 my-5 text-center" id="hero">
        <h1 id="hero-title">Garden To Table</h1>
        <div class="col-lg-6 mx-auto">
          <h3 class="lead mb-4" id="call-to-action">Affordable. Nutritious. Quality. Locally grown produce.</h3>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <h2>About Us</h2>
      <div class="row ">
        <div class="col col-12 col-md-6 mb-3">
          <div class="card m-2">
            <div class="card-body">
              <h5>Garden To Table is a community-driven C2C (consumer-to-consumer) marketplace where everyday growers, urban farmers, and home gardeners can buy, sell, or trade fresh produce within their local area. Born out of a need to support food accessibility and economic sustainability in townships and lower-income communities, our platform connects neighbors to share the bounty of their gardens — straight to the table.</h5>
            </div>
          </div>
        </div>

        <div class="col col-12 col-md-6 mb-3">
          <div class="card m-2">
            <div class="card-body">
              <h5>We believe in:</h5>
              <h5>
                <ul>
                  <li>Empowering local growers</li>
                  <li>Reducing food waste</li>
                  <li>Supporting community-based economies</li>
                  <li>Encouraging healthier lifestyles through fresh produce</li>
                </ul>
              </h5>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col mb-3">
          <div class="card m-2">
            <div class="card-body">
              <h5>No expensive transport or middlemen — just real, local food exchanged with ease. Whether you're looking for fresh tomatoes, organic herbs, or extra fruit from a backyard tree, Garden To Table is your trusted local marketplace.</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq">
      <!-- FAQ Heading -->
      <h2>FAQ</h2>
      <!-- FAQ Accordion -->
      <div class="accordion" id="faqAccordion">
        <!-- Who can sign up -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#who" aria-expanded="false" aria-controls="who">
              Who can sign up?
            </button>
          </h2>
          <div id="who" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Anyone can sign up - whether you are a buyer looking for fresh produce or a seller with a surplus harvest.
            </div>
          </div>
        </div>

        <!-- What can I sell -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#what" aria-expanded="false" aria-controls="what">
              What can I sell?
            </button>
          </h2>
          <div id="what" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Currently, you can sell:
              <ul>
                <?php listCategories(); ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Charges -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#charges" aria-expanded="false" aria-controls="charges">
              What are the charges?
            </button>
          </h2>
          <div id="charges" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">Garden To Table will charge a <?php echo $_ENV['SERVICE_FEE'] * 100 ?>% services fee on all orders and delivery fees are calculated based on a rate per 10km set by the seller.</div>
          </div>
        </div>

        <!-- Collection/delivery -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#delivery" aria-expanded="false" aria-controls="delivery">
              How do I get my order?
            </button>
          </h2>
          <div id="delivery" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Garden To Table offers buyers the option to select between collecting their order from the sellers or having it delivered to their address. We encourage local transactions to reduce transportation costs and environmental impacts.
            </div>
          </div>
        </div>

        <!-- Payment -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
              How do I pay for my order?
            </button>
          </h2>
          <div id="payment" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">Payments on Garden To Table are all facilitated electronically using debit and credit cards. The buyer will select whether they are paying using their debit or credit card then they will have to enter their card details to process the order and payment. </div>
          </div>
        </div>

        <!-- Safety -->
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#safety" aria-expanded="false" aria-controls="safety">
              Is it safe?
            </button>
          </h2>
          <div id="safety" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">We prioritize user safety by verifying accounts and encouraging community-based transactions. Always meet in public places or within known neighborhoods when possible.</div>
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
              <a href="tel:0123456789" style="text-decoration: none; color: black;">
                <p>&emsp;012 345 6789</p>
              </a>
            </div>
            <!-- Email Address Div -->
            <div class="col-md-4" style="display: flex; align-content: center">
              <!-- Email Address Icon -->
              <i class="bi bi-envelope h3"></i>
              <!-- Email Address Link-->
              <a href="mailto:gardentotable@gtt.co.za" style="text-decoration: none; color: black;" target="_blank">
                <p>&emsp;gardentotable@gtt.co.za</p>
              </a>
            </div>
            <!-- Physical Address Div-->
            <div class="col-md-4" style="display: flex; align-content: center">
              <!-- Physical Address Icon-->
              <i class="bi bi-geo-alt h3"></i>
              <!-- Physical Address Link -->
              <a href="https://maps.app.goo.gl/oYTR9QdnYckdQdi28" style="text-decoration: none; color: black;" target="_blank">
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
  <?php require_once("footer.php") ?>

  <!-- Seller Sign In Modal -->
  <?php require_once("selllersigninmodal.php") ?>

  <!-- Buyer Sign In Modal -->
  <?php require_once("buyersigninmodal.php") ?>
</body>

</html>