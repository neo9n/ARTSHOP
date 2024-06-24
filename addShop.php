<?php
require "connection.php";
session_start();
$page_title = "Sign In"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title class=".website-title">
    <?php
    if (isset($page_title)) {
      echo "$page_title";
    }
    ?> - Artisan Alley
  </title>
  <link rel="icon" href="icons/logoSVG.svg" type="image/svg+xml">
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/buttons.scss">
  <link rel="stylesheet" href="styles/footer.scss">
  <link rel="stylesheet" href="styles/home.scss">
  <link rel="stylesheet" href="style.css">
</head>

<body onload="loadingFunctions();">
  <?php include('includes/navbar.php'); ?>
  <br>
  <br>

  <div class="container py-6">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div id="sp" class="col-sm">
            <a id="l1" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd1" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">Shop preferences</div>
            </a>
          </div>
          <div id="nys" class="col-sm">
            <a id="l2" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd2" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">Name your shop</div>
            </a>
          </div>
          <div id="sys" class="col-sm">
            <a id="l3" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd3" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">Stock your shop</div>
            </a>
          </div>
          <div id="hyp" class="col-sm">
            <a id="l4" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd4" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">How you'll get paid</div>
            </a>
          </div>
          <div id="syb" class="col-sm">
            <a id="l5" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd5" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">Share your billing info</div>
            </a>
          </div>
          <div id="yss" class="col-sm">
            <a id="l6" href="#" class="nav-link d-flex flex-column align-items-center custom-nav-link">
              <div id="addShopd6" class="roundDot mr-2"></div>
              <div class="col custom-nav-text">Your shop security</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <br>
  <br>

  <section id="addShopsection1" class="container py-6">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Shop preferences</h1>
          <p>Let's get started! Tell us about you and your shop.</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="shopLanguage">Shop language</label>

            <?php

            $query = "SELECT * FROM `language`";
            $resultSet = Database::search($query);

            if ($resultSet->num_rows > 0) {
              echo '<select class="form-control" id="shopLanguage" >';
              echo '<option value="" selected disabled></option>';

              while ($row = $resultSet->fetch_assoc()) {
                $language_code = $row['id'];
                $language_name = $row['name'];
                echo "<option value=\"$language_code\">$language_name</option>";
              }
              echo '</select>';
            }
            $resultSet->close();
            ?>
            <span id="shopLanguageError" class="error-message"></span>
            <br>

            <small class="form-text text-muted">The default language will be displayed to your customers. You can add more languages later.</small>
          </div>
          <div class="form-group">
            <label for="shopCountry">Shop country</label>
            <?php
            $query = "SELECT * FROM countries";
            $resultSet = Database::search($query);

            echo '<select class="form-control" id="shopCountry"  >';
            echo '<option value="" selected disabled></option>';

            while ($row = $resultSet->fetch_assoc()) {
              $country_code = $row['id'];
              $country_name = $row['name'];
              echo "<option value=\"$country_code\">$country_name</option>";
            }
            echo '</select>';

            $resultSet->close();
            ?>
            <span id="shopCountryError" class="error-message"></span>
            <small class="form-text text-muted">Tell us where your shop is based. This will help us determine some things, but you can't change it later.</small>
          </div>
          <div class="form-group">
            <label for="shopCurrency">Shop currency</label>
            <?php

            $query = "SELECT * FROM currency";
            $resultSet = Database::search($query);

            echo '<select class="form-control" id="shopCurrency" >';
            echo '<option value="" selected disabled></option>';

            while ($row = $resultSet->fetch_assoc()) {
              $shopCurrency_code = $row['id'];
              $shopCurrency_name = $row['name'];
              echo "<option value=\"$shopCurrency_code\">$shopCurrency_name</option>";
            }
            echo '</select>';
            $resultSet->close();
            ?>
            <span id="shopCurrencyError" class="error-message"></span>
            <small class="form-text text-muted">The currency you choose will be the currency your products are priced in. Customers will see prices in this currency.</small>
          </div>
        </div>
        <div class="col-md-6">
          <h3>Your billing info</h3>
          <p>This is where you'll enter the information we'll use to send you your payouts.</p>
          <button onclick="gotoPage('billing.php')" class="button">Set up billing</button>
        </div>
      </div>
    </div>
  </section>

  <section id="addShopsection2" class="container py-6">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1>Name your shop</h1>
          <p>Don't sweat it! You can draft a name now and change it later. We find sellers often draw inspiration from what they sell, their style, pretty much anything goes.</p>
          <form>
            <div class="mb-3">
              <label for="shopName" class="form-label">Enter your shop name</label>
              <input type="text" class="form-control" id="shopName" name="shopName" maxlength="420">
              <span id="shopNameError" class="error-message"></span>
              <div class="form-text">
                <p id="characterCount">420 characters. No special characters, spaces, or accented letters.</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="addShopsection3" class="container-py-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h1>Create a listing</h1>
          <p>Add some photos and details about your item. Fill out what you can for now, you'll be able to edit this later. <a href="#">Learn more about what types of items are allowed on Artisan Alley.</a></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h2>Photos</h2>
          <p>Add as many as you can so buyers can see every detail.</p>
          <p>Use up to ten photos to show your item's most important qualities.</p>
          <div class="mb-3">
            <label for="image" class="form-label">Upload an image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewAndCreateImages(event,this.id,'img-holder-one')">
            <span id="imageError" class="error-message"></span>
            <br>
            <div class="img-holder" id="img-holder-one">
              <div class="image-container">
              </div>
            </div>
          </div>

          <p class="upload-tips">
            <span class="listTick"></span> Use natural light and no flash.<br>
            <span class="listTick"></span> Include a common object for scale.<br>
            <span class="listTick"></span> Show the item being held or worn.<br>
            <span class="listTick"></span> Shoot against a clean, simple background.
          </p>



          <div class="mb-3">
            <div class="mb-3">
              <label for="images" class="form-label">Upload more pictures</label>
              <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple onchange="previewAndCreateImages(event,this.id,'img-holder')">
              <span id="imagesError" class="error-message"></span>
              <br>
              <div class="img-holder" id="img-holder"></div>
            </div>
          </div>

        </div>
        <div class="col-md-6">
          <h3>Details</h3>
          <p>Fill out as much information as you can to help buyers find your item.</p>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="row">
        <div class="col-md-12">
          <h2>Video</h2>
          <p class="upload-tips">
            <span class="listTick"></span> Film wearable items on a model or show a functional item being used.<br>
            <span class="listTick"></span> Adjust your settings to record high-resolution video (aim for 1080p or higher).<br>
            <span class="listTick"></span> Crop your video after you upload it to get the right dimensions.<br>
            <span class="listTick"></span> Learn how to make videos that sell. <a href="#">Max file size: 100MB</a><br>
            <span class="listTick"></span> Bring your product to life with a 3 to 15 second video—it could help you drive more sales. The video won't feature sound, so let your product do the talking!
          </p>


          <div id="videoPreview" style="display: none;"> <video id="preview12" class="video-preview" controls></video> </div>
          <input type="file" id="videoInput" accept="video/*">


        </div>
      </div>
    </div>


    <div class="container py-5">
      <div>
        <h2>Listing details</h2>
        <p>Tell the world all about your item and why they'll love it.</p>
      </div>
      <div class="form-group">
        <label for="seo_keywords">Keywords*</label>
        <input type="text" class="form-control" id="seo_keywords" placeholder="Enter comma to separate keywords" onkeyup="takeKeywordsList();">
        <span id="seo_keywordsError" class="error-message"></span>
        <div id="key-word-box-holder" class="key-word-box-holder">

        </div>
        <br>
        <small class="form-text text-muted">These keywords will help people find your listing in search. Separate keywords with commas. You can include up to 13 tags.</small>
      </div>
      <div>
        <label for="category">Category</label>
        <?php
        $query = "SELECT * FROM itemcategories";
        $resultSet = Database::search($query);

        echo '<select class="form-control" id="SelCategory" >';
        echo '<option value="" selected disabled></option>';

        while ($row = $resultSet->fetch_assoc()) {

          $processing_time_code = $row['id'];
          $returnpolicy_Des = $row['name'];
          echo "<option value=\"$processing_time_code\">$returnpolicy_Des</option>";
        }

        echo '</select>';
        $resultSet->close();
        ?>
        <span id="SelCategoryError" class="error-message"></span>
      </div>

      <div class="custom-control custom-radio">
        <input type="checkbox" id="add-category" name="new-op" class="custom-control-input" onchange="toggleAdditionalFieldscheckbox('new-category', this.id,'SelCategory')">
        <label class="custom-control-label">Add Your Category name</label>
      </div>

      <br>
      <section class="new-category" id="new-category">
        <h5>Add Your Category name here</h5>

        <div class="mb-3">
          <input type="text" class="form-control" id="newCategory" placeholder="Enter Name of the category here">
          <span id="newCategoryError" class="error-message"></span>
        </div>


        <button onclick="addCatergory();" class="button fast">Add</button>
      </section>

      <div>
        <label for="who_made_it">Who made it?</label>
        <?php
        $query = "SELECT * FROM whomade";
        $resultSet = Database::search($query);

        echo '<select class="form-control" id="whomade" >';
        echo '<option value="" selected disabled></option>';

        while ($row = $resultSet->fetch_assoc()) {
          $processing_time_code = $row['id'];
          $returnpolicy_Des = $row['type'];
          echo "<option value=\"$processing_time_code\">$returnpolicy_Des</option>";
        }

        echo '</select>';
        $resultSet->close();
        ?>
        <span id="whomadeError" class="error-message"></span>
      </div>
      <div class="renewal-options">
        <h3>Renewal options</h3>
        <p>Each renewal lasts for four months or until the listing sells out.</p>
        <div class="custom-control custom-radio">
          <input type="radio" id="auto_renew" name="renewal_option" class="custom-control-input" checked>
          <label for="auto_renew" class="custom-control-label">Automatic (recommended)</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="manual_renew" name="renewal_option" class="custom-control-input">
          <label for="manual_renew" class="custom-control-label">Manual</label>
        </div>
        <span id="renewal_optionError" class="error-message"></span>
        <p class="text-muted">I'll renew expired listings myself, each time (recommended).</p>
      </div>
      <div>
        <h3>Type</h3>
        <p>Select the type of item you're listing.</p>
        <div class="custom-control custom-radio">
          <input type="radio" id="physical_good" name="item_type" class="custom-control-input" checked>
          <label for="physical_good" class="custom-control-label">Physical item (A tangible item that you will ship to buyers)</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="digital_good" name="item_type" class="custom-control-input">
          <label for="digital_good" class="custom-control-label">Digital item (A digital file that buyers will download)</label>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Description</h5>
          <textarea class="form-control" rows="5" placeholder="Start with a brief overview that describes your item's finest features. Shoppers will only see the first few lines of your description at first, so make it count!" id="brief-overview"></textarea><span id="brief-overviewError" class="error-message"></span>
          <small class="form-text text-muted">Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.</small>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="section">Section</label>
            <input type="text" class="form-control" id="section" placeholder="Optional"><span id="sectionError" class="error-message"></span>
            <small class="form-text text-muted">Group related listings into Sections to help shoppers browse (e.g., Bracelets, Father's Day Gifts, Yarn). <a href="#">Add your first section</a></small>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <h2>Inventory and pricing</h2>
          <form>
            <div class="form-group mb-3">
              <label for="price">Price</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">USD</span>
                </div>
                <input type="text" class="form-control" id="price" placeholder="Enter price"><span id="priceError" class="error-message"></span>
              </div>
              <small class="form-text text-muted">Remember to factor in the costs of materials, labor, and other business expenses. If you offer free shipping, make sure to include the cost of shipping so it doesn't eat into your profits.</small>
            </div>
            <div class="form-group mb-3">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
              <span id="quantityError" class="error-message"></span>
              <small class="form-text text-muted">For quantities greater than one, this listing will renew automatically until it sells out. You'll be charged USD 0.20 listing fee each time.</small>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container py-6">
      <h2>Personalization</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="instruction">Instructions for buyers</label>
            <textarea class="form-control" id="instruction" rows="3" placeholder="Enter the personalization instructions you want buyers to see."></textarea><span id="instructionError" class="error-message"></span>
            <small class="form-text text-muted">Example: Enter the name you want on the necklace. Max 12 characters, no spaces, no special characters. Thank you!</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="whatBuyerSees">What the buyer will see</label>
            <textarea class="form-control" id="whatBuyerSees" rows="3" placeholder="Add your personalization"></textarea><span id="whatBuyerSeesError" class="error-message"></span>
            <small class="form-text text-muted">See item description for details</small>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-5">
      <h2>Shipping</h2>
      <p>Give shoppers clear expectations about delivery time and cost by making sure your shipping info is accurate, including the shipping profile and your order processing schedule. You can make updates any time in Shipping settings.</p>
      <div class="form-group">
        <label for="shippingPrices">Shipping prices</label>
        <small class="form-text text-muted">Let us calculate them or enter fixed prices yourself</small>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="calculateShipping" name="enterFixedPrices" checked onchange="toggleAdditionalFields('enterFixedPrices', !this.checked, 'custom_fixed_price')">
          <label class="form-check-label" for="calculateShipping">Calculate them for me (Recommended)</label>
          <small class="form-text text-muted">Shoppers will see prices based on their location and the weight and dimensions of the listing. <a href="shipping_how_it_works">How it works</a></small>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="enterFixedPrices" name="enterFixedPrices" onchange="toggleAdditionalFields(this.id, this.checked, 'custom_fixed_price')">
          <label class="form-check-label" for="enterFixedPrices">Enter fixed prices yourself</label>
        </div>
      </div>
      <section class="ship" id="custom_fixed_price">
        <h5>Add the fixed Price</h5>
        <div class="mb-3">
          <input type="text" class="form-control" id="fixed_price" placeholder="Enter fixed prices here"> <span id="fixed_priceError" class="error-message"></span>
        </div>
        <button class="button fast">Add</button>
      </section>
      <div class="form-group">
        <label>Origin ZIP code *</label>
        <small class="form-text text-muted">Where will your orders ship from — home, the post office, or another location?</small>
        <input type="text" class="form-control" id="originZIPCode" placeholder="12345"> <span id="originZIPCodeError" class="error-message"></span>
      </div>
      <div class="form-group">
        <label>Processing time *</label>
        <small class="form-text text-muted">How much time do you need to prepare an order and put it in the mail? Keep in mind, shoppers have shown they're more likely to buy items that ship quickly.</small>
        <?php
        $query = "SELECT * FROM processing_time";
        $resultSet = Database::search($query);

        echo '<select class="form-control" id="processing_time" >';
        echo '<option value="" selected disabled></option>';

        while ($row = $resultSet->fetch_assoc()) {
          $returnpolicy_id = $row['id'];
          $returnpolicy_Des = $row['time'];
          echo "<option value=\"$returnpolicy_id\">$returnpolicy_Des</option>";
        }

        echo '</select>';
        $resultSet->close();
        ?>
        <span id="processing_timeError" class="error-message"></span>
      </div>
      <br>

      <div class="container">
        <div class="row">
          <div class="col">
            <h5>Where I'll ship *</h5>
            <p>Select the countries or regions you'll ship to. You can also set different shipping profiles for different regions.</p>
            <div class="select-wrapper">
              <select id="shipping-country" aria-label="Select countries or regions you ship to">
                <option value="US">United States</option>
                <option value="WW">Worldwide</option>
              </select>
              <span id="shipping-countryError" class="error-message"></span>
            </div>
            <p class="text-right">
              <a href="#">Edit shipping profiles</a>
            </p>
            <h5>Shipping services</h5>
            <p>Choose the postal services you'll offer. Buyers can see these options at checkout.</p>

            <div class="checkbox-wrapper">
              <div class="btn-group" role="group" aria-label="Shipping options">
                <input type="radio" class="btn-check" name="shippingop" id="shipping-service-usps" value="USPS First Class Mail" onchange="toggleAdditionalFields('shipping-service-other', !this.checked, 'ship');" autocomplete="off">
                <label class="btn btn-outline-primary" for="shipping-service-usps">USPS First Class Mail</label>

                <input type="radio" class="btn-check" name="shippingop" id="shipping-service-fedex" value="FedEx Priority Mail" onchange="toggleAdditionalFields('shipping-service-other', !this.checked, 'ship');" autocomplete="off">
                <label class="btn btn-outline-primary" for="shipping-service-fedex">FedEx Priority Mail</label>

                <input type="radio" class="btn-check" name="shippingop" id="shipping-service-other" value="Other" onchange="toggleAdditionalFields('shipping-service-other', this.checked, 'ship');" autocomplete="off">
                <label class="btn btn-outline-primary" for="shipping-service-other">Other</label>
              </div>

              <br>
              <section class="ship" id="ship">
                <h5>Add Shipping Service</h5>
                <div class="mb-3">
                  <input type="text" class="form-control" id="name" placeholder="Enter Name of the Shipping Service">
                  <span id="nameError" class="error-message"></span>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </section>
            </div>


            <p class="text-right">
              <a href="#">Learn more about shipping services</a>
            </p>
            <div class="d-flex flex-wrap justify-content-between mt-4">
            </div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeShipping">
          <label class="form-check-label" for="freeShipping">Free shipping</label>
          <small class="form-text text-muted">Want to offer buyers a free shipping option?</small>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeDomesticShipping">
          <label class="form-check-label" for="freeDomesticShipping">Free domestic shipping</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeInternationalShipping">
          <label class="form-check-label" for="freeInternationalShipping">Free international shipping</label>
        </div>
        <span id="shippingOptionsError" class="error-message"></span>
        <div class="form-group">
          <label for="handlingFee">Handling fee</label>
          <small class="form-text text-muted">We'll add this to the buyer's shipping total, they won't see it separately</small>
          <input type="text" class="form-control" id="handlingFee" placeholder="USD">
          <span id="handlingFeeError" class="error-message"></span>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Save up to 30% on shipping labels*</h2>
          <p>Most US orders ship using labels purchased on Artisan Alley. It takes just a few clicks, and you'll get instant access to USPS and FedEx along with tracking and lots of other perks.</p>
          <div class="text-right">
            <a href="#">Check out pricing for labels on Artisan Alley</a>
          </div>
          <p class="text-muted">*Some restrictions may apply. Learn more about Artisan Alley Shipping Labels.</p>
          <button id="saveShopingProfile" class="button">Save Shopping Profile</button>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Customs information *</h2>
          <p>This information is required by customs agents to process your shipment. Provide accurate information to avoid delays.</p>
          <div class="form-group">
            <label for="hs-tariff-number">HS Tariff Number *</label>
            <input type="text" class="form-control" id="hs-tariff-number" placeholder="Enter HS Tariff Number"> <span id="hs-tariff-numberError" class="error-message"></span>
          </div>
        </div>
      </div>
    </div>
    <br>

    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Item weight and dimensions *</h2>
          <p>Enter the weight and dimensions of your package to calculate estimated shipping costs.</p>
          <div class="form-group">
            <label for="item-weight">Item weight *</label>
            <div class="input-group">
              <input type="number" class="form-control" id="item-weight" placeholder="Enter weight">
              <span class="input-group-text">lb</span>
            </div>
            <span id="item-weightError" class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="package-length">Package dimensions (in inches) *</label>
            <div class="mr-2">
              <label for="package-length">Length</label>
              <input type="number" class="form-control" style="margin-right: 10px;" id="package-length" placeholder="Enter length">
              <span id="package-lengthError" class="error-message"></span>
            </div>
            <div class="mr-2">
              <label for="package-width">Width</label>
              <input type="number" class="form-control" style="margin-right: 10px;" id="package-width" placeholder="Enter width">
              <span id="package-widthError" class="error-message"></span>
            </div>
            <div class="mr-2">
              <label for="package-height">Height</label>
              <input type="number" class="form-control" style="margin-right: 10px;" id="package-height" placeholder="Enter height">
              <span id="package-heightError" class="error-message"></span>
            </div>
          </div>
          <p>Enter the weight and dimensions of your package in its final packaging, including boxing materials.</p>
        </div>
      </div>
    </div>


    </div>
    <br>

    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Returns and exchanges *</h2>
          <div class="select-wrapper">
            <?php
            $query = "SELECT * FROM returnpolicy";
            $resultSet = Database::search($query);
            echo '<select class="form-control" id="returnpolicy" >';
            echo '<option value="" selected disabled></option>';

            while ($row = $resultSet->fetch_assoc()) {
              $returnpolicy_id = $row['id'];
              $returnpolicy_Des = $row['Description'];
              echo "<option value=\"$returnpolicy_id\">$returnpolicy_Des</option>";
            }
            echo '</select>';
            $resultSet->close();
            ?>
            <span id="returnpolicyError" class="error-message"></span>
          </div>

          <div class="custom-control custom-radio">
            <input type="checkbox" id="new-policy" name="new-op" class="custom-control-input" onchange="toggleAdditionalFieldscheckbox('custom-return-policy',this.id,'returnpolicy')">
            <label class="custom-control-label">Add new Custom Policy</label>
          </div>

          <div id="custom-return-policy" class="new-policy-box">
            <textarea class="form-control" id="custom-return-policy-text" rows="5" placeholder="Describe your return policy"></textarea><span id="custom-return-policy-textError" class="error-message"></span>
            <p class="text-right">
              <a href="#">Learn more about return policies</a>
            </p>
          </div>

          <p class="text-right">
            <a href="#">Learn more about Artisan Alley's return policy</a>
          </p>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="container py-6">
      <div class="row">
        <div class="col">
          <button onclick="preview();" id="save" class="button fast">Preview</button>
        </div>
      </div>
    </div>

    <br>




  </section>

  <section id="preview" class="container py-6" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2>Great job on your first listing!</h2>
          <p>You're one step closer to your first sale. Consider adding a few more listings (five's a good start). This gives buyers more chances to find your shop.</p>
        </div>
        <div class="col-3 text-center">
          <!-- Auto general picture -->
        </div>
      </div>
    </div>

  </section>

  <section id="addShopsection4" class="container py-5">

    <div class="container">
      <div class="row">
        <h2>How you'll get paid</h2>
        <div class="col-md-6">
          <p>Artisan Alley Payments gives buyers the most payment options and gives you Artisan Alley's seller protection. <a href="#">Learn more</a></p>
        </div>
        <div class="col-md-6">
          <div class="d-flex justify-content-end">
            <img class="payment-icon" src="res/Paypal.png" alt="PayPal">
            <img class="payment-icon" src="res/visa.png" alt="Visa">
            <img class="payment-icon" src="res/Mastercard.png" alt="Mastercard">
            <img class="payment-icon" src="res/Applepay.png" alt="Apple Pay">
            <img class="payment-icon" src="res/google-pay.jpeg" alt="Google Pay">
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Getting paid on Artisan Alley</h4>
          <p>To protect our marketplace and new sellers, a percentage of earned funds may be set aside in a temporary reserve for some new shops. <a href="#">Learn more</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="bank-location">Where is your bank located?</label>
          <?php
          $query = "SELECT * FROM countries";
          $resultSet = Database::search($query);
          echo '<select class="form-control" id="bank-location" >';
          echo '<option value="" selected disabled></option>';

          while ($row = $resultSet->fetch_assoc()) {
            $country_id = $row['id'];
            $country_name = $row['name'];
            echo "<option value=\"$country_id\">$country_name</option>";
          }
          echo '</select>';
          $resultSet->close();
          ?>
          <span id="bank-locationError" class="error-message"></span>
        </div>

        <div class="col-md-6">
          <fieldset>
            <legend>For tax purposes, what type of seller are you?</legend>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="seller-type" id="individual" value="individual" checked>
              <label class="form-check-label" for="individual">
                Individual
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="seller-type" id="business" value="business">
              <label class="form-check-label" for="business">
                Business
              </label>
            </div>
            <p>Artisan Alley will use this to verify your information. This will not affect the status of your Artisan Alley shop in any way and is just for us to know. Most sellers fall into the individual category when they first join Artisan Alley. Still not sure? <a href="#">Learn more</a></p>
          </fieldset>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Tell us a little bit about yourself</h4>
          <p>For compliance purposes, we may verify your identity with a secure third-party service. This information will never be displayed publicly on Artisan Alley. <a href="#">Learn more</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="country-residence">Country of residence *</label>
          <?php
          $query = "SELECT * FROM countries";
          $resultSet = Database::search($query);
          echo '<select class="form-control" id="country-residence" >';
          echo '<option value="" selected disabled></option>';
          while ($row = $resultSet->fetch_assoc()) {
            $country_id = $row['id'];
            $country_name = $row['name'];
            echo "<option value=\"$country_id\">$country_name</option>";
          }
          echo '</select>';
          $resultSet->close();
          ?>
          <span id="country-residenceError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="first-name">First name *</label>
          <input type="text" id="first-name" class="form-control"> <span id="first-nameError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="last-name">Last name *</label>
          <input type="text" id="last-name" class="form-control"> <span id="last-nameError" class="error-message"></span>
        </div>
      </div>
      <div id="date-of-birth" class="row">
        <div class="col-md-4">
          <label for="dob">Your date of birth *</label>
          <div class="row">
            <div class="col">
              <select id="month" class="form-select">
                <option>Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <span id="monthError" class="error-message"></span>
            </div>
            <div class="col">
              <select id="day" class="form-select">
                <option>Day</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
              </select>
              <span id="dayError" class="error-message"></span>
            </div>
            <div class="col">
              <select id="year" class="form-select">
                <option>Year</option>
                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>
                <option>2015</option>
                <option>2014</option>
                <option>2013</option>
                <option>2012</option>
                <option>2011</option>
                <option>2010</option>
                <option>2009</option>
                <option>2008</option>
                <option>2007</option>
                <option>2006</option>
                <option>2005</option>
                <option>2004</option>
                <option>2003</option>
                <option>2002</option>
                <option>2001</option>
                <option>2000</option>
                <option>1999</option>
                <option>1998</option>
                <option>1997</option>
                <option>1996</option>
                <option>1995</option>
                <option>1994</option>
              </select>
              <span id="yearError" class="error-message"></span>
            </div>
          </div>
          <span id="date-of-birthError" class="error-message"></span>
        </div>
      </div>
      <span id="date-of-birthError" class="error-message"></span>
      <div class="row">
        <div class="col-md-12">
          <p><strong>Taxpayer address *</strong> <em>This should be the same address used when filing taxes, not a P.O. Box or business address</em></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="number">Number</label>
          <input type="text" id="number" class="form-control"> <span id="numberError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="street-name">Street Name</label>
          <input type="text" id="street-name" class="form-control"> <span id="street-nameError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="address-line2">Address line 2 (optional)</label>
          <input type="text" id="address-line2" class="form-control"> <span id="address-line2Error" class="error-message"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="city-town">City / Town (optional)</label>
          <input type="text" id="city-town" class="form-control"> <span id="city-townError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="state">State / Province / Region (optional)</label>
          <input type="text" id="state" class="form-control"> <span id="stateError" class="error-message"></span>
        </div>
        <div class="col-md-4">
          <label for="postal-code">Postal code (optional)</label>
          <input type="text" id="postal-code" class="form-control"> <span id="postal-codeError" class="error-message"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="phone-number">Phone number</label>
          <input type="text" id="phone-number" class="form-control"> <span id="phone-numberError" class="error-message"></span>
        </div>
      </div>
    </div>

    <br>

    <div class="container">
      <div class="row">
        <h2>Your bank information</h2>
        <div class="col-md-6">
          <div class="form-group">
            <label for="full-name">Full name on account *</label>
            <input type="text" class="form-control" id="full-name" placeholder="Enter full name"> <span id="full-nameError" class="error-message"></span>
            <small id="full-name-help" class="form-text text-muted">Not to get all matchy-matchy, but the name on your bank account needs to be the same as the name you entered above. Need to fix it?</small>
          </div>
          <div class="form-group">
            <label for="bank-name">Bank name *</label>
            <input type="text" class="form-control" id="bank-name" placeholder="Enter bank name"> <span id="bank-nameError" class="error-message"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="iban">IBAN *</label>
            <input type="text" class="form-control" id="iban" placeholder="Enter IBAN"> <span id="ibanError" class="error-message"></span>
          </div>
          <div class="form-group">
            <label for="swift-bic">SWIFT BIC *</label>
            <input type="text" class="form-control" id="swift-bic" placeholder="Enter SWIFT BIC"> <span id="swift-bicError" class="error-message"></span>
          </div>
        </div>
      </div>
    </div>


  </section>

  <section id="addShopsection5" class="container py-5">
    <div class="container">
      <h1>Set up billing</h1>
      <div class="row">
        <div class="col-md-6">
          <p>Let us know how you'd like to pay your Artisan Alley bill.</p>
          <p>Stock up! Adding 10 or more listings gives buyers more opportunities to find your shop. <a href="#">Add more listings</a></p>
        </div>
        <div class="col-md-6">
          <form>
            <div class="form-group">
              <label for="card-number">Card number *</label>
              <input type="text" class="form-control" id="card-number" placeholder="Enter card number"> <span id="card-numberError" class="error-message"></span>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="expiration-date">Expiration date *</label>
                <div class="input-group">
                  <select class="custom-select" id="expiration-month">
                    <option value="99">Choose a month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                  <span id="expiration-monthError" class="error-message"></span>
                  <br>
                  <select class="custom-select" id="expiration-year">
                    <option value="99">Choose year</option>
                    <option>Year</option>
                    <option>2022</option>
                    <option>2021</option>
                    <option>2020</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                    <option>2015</option>
                    <option>2014</option>
                    <option>2013</option>
                    <option>2012</option>
                    <option>2011</option>
                    <option>2010</option>
                    <option>2009</option>
                    <option>2008</option>
                    <option>2007</option>
                    <option>2006</option>
                    <option>2005</option>
                    <option>2004</option>
                    <option>2003</option>
                    <option>2002</option>
                    <option>2001</option>
                    <option>2000</option>
                    <option>1999</option>
                    <option>1998</option>
                    <option>1997</option>
                    <option>1996</option>
                    <option>1995</option>
                    <option>1994</option>
                  </select>
                  <span id="expiration-yearError" class="error-message"></span>
                </div>
                <span id="expiration-dateError" class="error-message"></span>
              </div>
              <div class="form-group col-md-6">
                <label for="ccv">CCV *</label>
                <input type="text" class="form-control" id="ccv" placeholder="Enter CCV"> <span id="ccvError" class="error-message"></span>
              </div>
            </div>
            <div class="form-group">
              <label for="name-on-card">Name on card *</label>
              <input type="text" class="form-control" id="name-on-card" placeholder="Enter name on card"> <span id="name-on-cardError" class="error-message"></span>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

  <section id="addShopsection6" class="bg-light py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h2 class="mb-4 text-center">Keep Your Shop Extra Safe</h2>
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 border-end">
                  <h4 class="mb-3">Two-Factor Authentication</h4>
                  <p class="text-muted">Enhance your account security by setting up two-factor authentication. This ensures that only you can access your Artisan Alley account.</p>
                  <p class="text-muted">After setup, you'll enter a unique code sent to your chosen method every time you sign in.</p>
                  <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    Some countries may not support SMS or phone call authentication. For the best experience, we recommend using an authenticator app.
                  </div>
                 </div>
                <div class="col-md-6">
                  <h4 class="mb-3">Set Up Two-Factor Authentication</h4>
                  <form>
                    <div class="mb-3">
                      <label for="authMethod" class="form-label">Choose an authentication method</label>
                      <select class="form-select" id="authMethod">
                        <option selected disabled value="">Select a method</option>
                        <option value="1">Email</option>
                        <option value="2">Authenticator App</option>
                        <option value="3">SMS</option>
                      </select>
                      <span id="authMethodError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                      <label for="emailMethod" class="form-label">Verification method</label>
                      <select class="form-select" id="emailMethod">
                        <option selected disabled value="">Select a verification method</option>
                        <option value="1">Receive authentication code via Email</option>
                      </select>
                      <span id="emailMethodError" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                      <label for="email2" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email2" placeholder="Enter your email">
                      <span id="email2Error" class="text-danger"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Set Up Two-Factor Authentication</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="final" class="container py-5 final">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <div id="tick" class="checkmark"></div>
          <h2>You're All Set</h2>
          <p>You're almost ready to embark on starting your own market in Artisan Alley.</p>
        </div>
      </div>
    </div>
  </section>

  <div class="container py-5">
    <div class="row">
      <div class="col text-left">
        <button id="back" onclick="reverseSavencon('addShop');" class="button ">Back</button>
      </div>
      <div class="col-6 text-end">
        <button onclick="savencon('addShop');" id="save-btn" class="button fast">Save and continue</button>
      </div>
    </div>
  </div>





  <?php include('includes/footer.php'); ?>