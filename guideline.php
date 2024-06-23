<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('creds/creds.php'); ?>
<div class="container mt-5">
  <h1 class="mb-4">Community Guidelines & Help Section</h1>

  <h2>Seller Guidelines</h2>
  <p>
    To ensure a positive and safe shopping experience for all users, please
    follow these guidelines:
  </p>
  <ul class="list-group mb-4">
    <li class="list-group-item">Respect other sellers and their products.</li>
    <li class="list-group-item">
      Do not engage in spamming or promoting irrelevant products.
    </li>
    <li class="list-group-item">
      Keep your product listings accurate and up-to-date.
    </li>
    <li class="list-group-item">
      Respond to customer inquiries in a timely manner.
    </li>
  </ul>

  <h2>Market Manager Guidelines</h2>
  <p>
    To ensure the smooth operation of our marketplace, please follow these
    guidelines:
  </p>
  <ul class="list-group mb-4">
    <li class="list-group-item">
      Maintain accurate and up-to-date product listings for all sellers in your
      market.
    </li>
    <li class="list-group-item">
      Monitor and resolve any issues or disputes between buyers and sellers in a
      fair and timely manner.
    </li>
    <li class="list-group-item">
      Ensure that all seller accounts are verified and compliant with our
      community guidelines.
    </li>
  </ul>

  <h2>Help Section</h2>
  <p>Need help with something? Check out these frequently asked questions:</p>
  <ul class="list-group mb-4">
    <li class="list-group-item">How do I create a new product listing?</li>
    <li class="list-group-item">
      What is the refund and return policy for your marketplace?
    </li>
    <li class="list-group-item">How do I resolve an issue with a seller?</li>
  </ul>

  <h2>Contact Us</h2>
  <p>
    If you have any questions or concerns, please don't hesitate to reach out:
  </p>
  <ul class="list-group mb-4">
    <li class="list-group-item">
      Email:
      <a href="mailto:<?php echo getEmail(); ?>"><?php echo getEmail(); ?></a>
    </li>
    <li class="list-group-item">
      Phone:
      <a href="tel:<?php echo getPhoneNumber(); ?>"
        ><?php echo getPhoneNumber(); ?></a
      >
    </li>
  </ul>
</div>


<?php include('includes/advertisement.php'); ?>
<?php include('includes/footer.php'); ?>