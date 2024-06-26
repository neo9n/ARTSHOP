<section id="addShopsection3" class="container-py-5">
  <div class="container py-5 " style="background-color:whitesmoke;">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <h1 class="my-3 py-2" >Product</h1>
            <label class="my-3" >Add your Product Name Here</label>
            <input type="text" class="form-control" id="product-name" placeholder="Enter your product Name Here">
            <span id="product-nameError" class="error-message"></span>
            <small class="form-text text-muted">Customers are going to see this as the Name of your Product</small>
          </div>
        </div>
      </div>
    </div>
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
          <p>Clear photos add clear quality.</p>
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
          <input type="radio" id="auto_renew" name="renewal_option" class="custom-control-input" checked value="1">
          <label for="auto_renew" class="custom-control-label">Automatic (recommended)</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="manual_renew" name="renewal_option" class="custom-control-input" value="2">
          <label for="manual_renew" class="custom-control-label">Manual</label>
        </div>
        <span id="renewal_optionError" class="error-message"></span>
        <p class="text-muted">I'll renew expired listings myself, each time (recommended).</p>
      </div>
      <div>
        <h3>Type</h3>
        <p>Select the type of item you're listing.</p>
        <div class="custom-control custom-radio">
          <input type="radio" id="physical_good" name="item_type" class="custom-control-input" checked value="1" >
          <label for="physical_good" class="custom-control-label">Physical item (A tangible item that you will ship to buyers)</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="digital_good" name="item_type" class="custom-control-input" value="2" >
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
                <option id="us" value="1">United States</option>
                <option id="ww" value="2">Worldwide</option>
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
                <input type="radio" class="btn-check" name="shippingop" id="shipping-service-usps" value="1" autocomplete="off">
                <label class="btn btn-outline-primary" for="shipping-service-usps">USPS First Class Mail</label>

                <input type="radio" class="btn-check" name="shippingop" id="shipping-service-fedex" value="2"  autocomplete="off">
                <label class="btn btn-outline-primary" for="shipping-service-fedex">FedEx Priority Mail</label>
              </div>

              <br>
            </div>            
            <div class="d-flex flex-wrap justify-content-between mt-4">
            </div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeShipping" value="1">
          <label class="form-check-label" for="freeShipping">Free shipping</label>
          <small class="form-text text-muted">Want to offer buyers a free shipping option?</small>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeDomesticShipping" value="2">
          <label class="form-check-label" for="freeDomesticShipping">Free domestic shipping</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="freeInternationalShipping" value="3">
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