<?php
require_once "stripe-php-master/init.php"; // stripe php github

$stripedetails = array(
    "publishableKey" => "pk_test_51PVzYaIozEBKp95vMFlgubyFSllhaVAE774tbOhcUoAwjWZJFEIdZfpNYCkza68uopOVlqNFvkveZKi09u8IwhvV00riGSZ86z",
    "secretKey" => "sk_test_51PVzYaIozEBKp95vSoYtlqmzoCruNgzJJ4kNAteXuF7xPHwamOTb7pBsrGIG9w0eleysLV5kitIzAokiaodnahj5006D1uQHAU"
);

\Stripe\Stripe::setApiKey($stripedetails["secretKey"]);

