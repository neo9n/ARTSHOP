document.addEventListener("DOMContentLoaded", function () {
  loadGraphs();
  initializeFileInput();
});

function loadGraphs() {
  var labels = [
    "JAN",
    "FEB",
    "MAR",
    "APR",
    "MAY",
    "JUN",
    "JUL",
    "AUG",
    "SEP",
    "OCT",
    "NOV",
    "DEC",
  ];
  var datasets = [
    {
      label: "Last week",
      backgroundColor: "rgba(255, 99, 132, 0.5)",
      borderColor: "rgba(255, 99, 132, 1)",
      borderWidth: 1,
      data: [200, 250, 180, 200, 270, 240, 260, 210, 230, 220, 190, 280],
    },
    {
      label: "This week",
      backgroundColor: "rgba(75, 192, 192, 0.5)",
      borderColor: "rgba(75, 192, 192, 1)",
      borderWidth: 1,
      data: [100, 280, 200, 220, 300, 260, 280, 230, 250, 240, 210, 300],
    },
  ];

  graph(labels, datasets);
}

function graph(labels, datasets) {
  var ctx = document.getElementById("marketOverviewChart").getContext("2d");
  var marketOverviewChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: datasets,
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
      responsive: true,
      plugins: {
        legend: {
          position: "top",
        },
        tooltip: {
          enabled: true,
        },
      },
    },
  });
}

function adminLogin() {
  var e = document.getElementById("email");
  var pw = document.getElementById("password");
  if (!e.value.trim()) {
    swal("Please enter your Email!");
    return;
  } else if (!isValidEmail(e.value)) {
    swal("The email you tried to enter is not valid!");
    return;
  } else if (!pw.value.trim()) {
    swal("Please enter your Password!");
    return;
  } else {
    var form = new FormData();
    form.append("e", e.value);
    form.append("pw", pw.value);
    submitForm("adminLoginProcess.php", form);
  }
}

function section3Backend() {
  const values = {};

  inputElements.forEach((id) => {
    const element = document.getElementById(id);
    if (element) {
      if (element.type === "file") {
        values[id] =
          element.files.length > 0 ? element.files[0].name : "No file selected";
      } else if (element.type === "radio" || element.type === "checkbox") {
        values[id] = element.checked;
      } else {
        values[id] = element.value;
      }
    } else {
      console.warn(`Element with id "${id}" not found`);
    }
  });

  // Additional radio button groups
  values["renewal_option"] =
    document.querySelector('input[name="renewal_option"]:checked')?.value || "";
  values["item_type"] =
    document.querySelector('input[name="item_type"]:checked')?.value || "";
  values["enterFixedPrices"] =
    document.querySelector('input[name="enterFixedPrices"]:checked')?.value ||
    "";
  values["shippingop"] =
    document.querySelector('input[name="shippingop"]:checked')?.value || "";

  // Additional checkboxes
  values["freeShipping"] = document.getElementById("freeShipping").checked;
  values["freeDomesticShipping"] = document.getElementById(
    "freeDomesticShipping"
  ).checked;
  values["freeInternationalShipping"] = document.getElementById(
    "freeInternationalShipping"
  ).checked;

  console.log("Input values:", values);

  // You can add code here to send the values to a backend service or perform other actions
}

function getShopinitData() {
  // Get values from dropdown menus
  var shopLanguage = document.getElementById("shopLanguage").value;
  var shopCountry = document.getElementById("shopCountry").value;
  var shopCurrency = document.getElementById("shopCurrency").value;

  // Prepare the message
  var message =
    "Shop Preferences:\n\n" +
    "Language: " +
    (shopLanguage || "Not selected") +
    "\n" +
    "Country: " +
    (shopCountry || "Not selected") +
    "\n" +
    "Currency: " +
    (shopCurrency || "Not selected");
  swal(message);
}

function getShopNameInfo() {
  // Get input value
  var shopName = document.getElementById("shopName").value;

  // Prepare alert message
  var alertMessage = "Shop Name Information:\n\n" + "Shop Name: " + shopName;

  // Display alert
  alert(alertMessage);
}

function getBillingInfo() {
  // Get input values
  var cardNumber = document.getElementById("card-number").value;
  var expirationMonth = document.getElementById("expiration-month").value;
  var expirationYear = document.getElementById("expiration-year").value;
  var ccv = document.getElementById("ccv").value;
  var nameOnCard = document.getElementById("name-on-card").value;

  // Prepare alert message
  var alertMessage =
    "Billing Information:\n\n" +
    "Card Number: " +
    cardNumber +
    "\n" +
    "Expiration Date: " +
    expirationMonth +
    "/" +
    expirationYear +
    "\n" +
    "CCV: " +
    ccv +
    "\n" +
    "Name on Card: " +
    nameOnCard;

  // Display alert
  alert(alertMessage);
}

function getTwoFactorAuthInfo() {
  // Get input values
  var authMethod = document.getElementById("authMethod").value;
  var emailMethod = document.getElementById("emailMethod").value;
  var email = document.getElementById("email2").value;

  // Prepare alert message
  var alertMessage =
    "Two-Factor Authentication Information:\n\n" +
    "Authentication Method: " +
    authMethod +
    "\n" +
    "Email Verification Method: " +
    emailMethod +
    "\n" +
    "Email Address: " +
    email;

  // Display alert
  alert(alertMessage);
}

function section4Backend() {
  let inputValues = {
    bankLocation: document.getElementById("bank-location").value,
    countryName: document.getElementById("country-name").value,
    sellerType: document.querySelector('input[name="seller-type"]:checked')
      .value,
    countryOfResidence: document.getElementById("bank-location").value,
    firstName: document.getElementById("first-name").value,
    lastName: document.getElementById("last-name").value,
    dob: {
      month: document.getElementById("month").value,
      day: document.getElementById("day").value,
      year: document.getElementById("year").value,
    },
    address: {
      number: document.getElementById("number").value,
      streetName: document.getElementById("street-name").value,
      addressLine2: document.getElementById("address-line2").value,
      cityTown: document.getElementById("city-town").value,
      state: document.getElementById("state").value,
      postalCode: document.getElementById("postal-code").value,
    },
    phoneNumber: document.getElementById("phone-number").value,
    livedInSanctionedRegion: document.querySelector(
      'input[name="lived"]:checked'
    ).value,
    sanctionedRegion: document.getElementById("sanctioned-region").value,
    lastDayInSanctionedRegion: {
      day: document.getElementById("Day2").value,
      month: document.getElementById("month2").value,
      year: document.getElementById("year2").value,
    },
    bankInfo: {
      fullName: document.getElementById("full-name").value,
      bankName: document.getElementById("bank-name").value,
      iban: document.getElementById("iban").value,
      swiftBic: document.getElementById("swift-bic").value,
    },
  };

  alert(JSON.stringify(inputValues, null, 2));
}

const inputElements = [
  "image",
  "images",
  "videoInput",
  "shippingop",
  "SelCategory",
  "newCategory",
  "whomade",
  "brief-overview",
  "section",
  "price",
  "quantity",
  "instruction",
  "whatBuyerSees",
  "fixed_price",
  "originZIPCode",
  "processing_time",
  "shipping-country",
  "name",
  "handlingFee",
  "hs-tariff-number",
  "item-weight",
  "package-length",
  "package-width",
  "package-height",
  "returnpolicy",
  "custom-return-policy-text",
];

function submitForm(url, form) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    handleResponse(r, url);
  };
  r.open("POST", url, true);
  r.send(form);
}

function handleResponse(r, url) {
  if (r.readyState == 4) {
    var text = r.responseText;
    swal(text);
    console.log("Response from server:", text);
    selectResponseNExecute(url, text);
  }
}

function selectResponseNExecute(url, text) {
  if (url == "addUserProcess.php") {
    if (text == "Success") {
      ["uname", "lname", "fname", "cpw", "email", "pw", "mobile"].forEach(
        (id) => (document.getElementById(id).value = "")
      );
      SuccessM("You have successfully registered!");
    } else if (text == "Error") {
      ErrorM(
        "User with the same Email Address or Mobile Number already exists!"
      );
    } else {
      ErrorM("Something went wrong!");
    }
  } else if (url == "adminLoginProcess.php") {
    if (text == "Success") {
      SuccessM("You have successfully Logged In!");
      window.location.href = "adminPanel.php";
    } else if (text == "Error") {
      ErrorM("Invalid Email or Password. Please try again.");
    } else {
      ErrorM("Something went wrong!");
    }
  }
}

function checkRadioButtons(btnGroupName) {
  var op = false;
  var radios = document.getElementsByName(btnGroupName);
  for (let radio of radios) {
    if (radio.checked) {
      op = true;
    }
  }
  return op;
}

function validateradioButtonssAndShowError(radioBtnGroupName, AlertMsg) {
  var radioBtn = document.getElementsByName(radioBtnGroupName);
  var errorSpan = document.getElementById(radioBtnGroupName + "Error");
  var selectedValue = radioBtn.value;
  if (selectedValue === "") {
    radioBtn.classList.add("error");
    errorSpan.textContent = AlertMsg;
    errorSpan.style.display = "inline";
    return false;
  } else {
    radioBtn.classList.remove("error");
    errorSpan.style.display = "none";
    return true;
  }
}

var newOptionCounts = {
  country: 1,
  category: 1,
};

function addOptionAndSelect(
  text,
  dropdownId,
  successMsg,
  errorMsg,
  url,
  paramName
) {
  var dropdown = document.getElementById(dropdownId);
  var newOption = document.createElement("option");
  newOption.text = text;
  var newValue = "new" + newOptionCounts[dropdownId];
  newOption.value = newValue;
  dropdown.add(newOption);
  dropdown.value = newValue;
  newOptionCounts[dropdownId]++;

  var form = new FormData();
  form.append(paramName, text);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var responseText = r.responseText;
      console.log("Response from server:", responseText);
      if (responseText === "Success") {
        document.getElementById(dropdownId).value = newValue;
        document.getElementById(
          dropdownId.replace("Sel", "").toLowerCase()
        ).value = "";
        SuccessM(successMsg);
      } else if (responseText === "Error") {
        ErrorM(errorMsg);
        dropdown.remove(newOption);
      } else {
        ErrorM("Something went wrong!");
        dropdown.remove(newOption);
      }
    }
  };
  r.open("POST", url, true);
  r.send(form);
}

function addCountry(event) {
  var inputField = document.getElementById("country-name");
  if (!inputField.value.trim()) {
    swal("Please enter your New Category name!");
    return;
  }
  addOptionAndSelect(
    inputField.value,
    "bank-location",
    "You have successfully added the new country!",
    "This country already exists!",
    "addCountryProcess.php",
    "countries"
  );
}

function addCategory(event) {
  var inputField = document.getElementById("newCategory");
  if (!inputField.value.trim()) {
    swal("Please enter your New Category name!");
    return;
  }
  addOptionAndSelect(
    inputField.value,
    "SelCategory",
    "You have successfully added the new category!",
    "This category already exists!",
    "addCategoryProcesses.php",
    "categories"
  );
}

function displayVideoPreview(file) {
  const reader = new FileReader();
  const videoPreview = document.getElementById("videoPreview");
  const videoElement = document.getElementById("preview12");

  reader.onload = function (event) {
    videoElement.src = event.target.result;
    videoPreview.style.display = "block";
  };
  reader.readAsDataURL(file);
}

function initializeFileInput() {
  const fileInput = document.getElementById("videoInput");
  if (fileInput) {
    fileInput.addEventListener("change", handleFileSelect);
  } else {
    console.error("Element with id 'videoInput' not found.");
  }
}

function handleFileSelect(event) {
  const file = event.target.files[0];
  displayVideoPreview(file);
}

function removeElement(Id) {
  var element = document.getElementById(Id);
  if (element) {
    element.remove();
  }
}

function resetInputField(inputFeildID) {
  var fileInput = document.getElementById(inputFeildID);
  if (fileInput) {
    fileInput.value = "";
  }
}

function createBox(text) {
  const randomID = "key-word-No-" + Math.random().toString(36).substr(2, 9);
  const newDiv = document.createElement("div");
  newDiv.textContent = text;
  newDiv.id = randomID;
  newDiv.classList.add("key-word-box");
  newDiv.onclick = function () {
    const imgToRemove = document.getElementById(this.id);
    if (imgToRemove) {
      removeElement(this.id);
      this.remove();
    }
  };
  const container = document.getElementById("key-word-box-holder");
  container.appendChild(newDiv);
}

wordList = [];

function validateWordList() {
  return wordList.length > 0;
}

function takeKeywordsList() {
  var input = document.getElementById("seo_keywords");
  var word = input.value;
  if (word.indexOf(",") !== -1) {
    var keywords = word.split(",");
    for (var i = 0; i < keywords.length; i++) {
      var keyword = keywords[i].trim();
      if (keyword.length > 0) {
        if (wordList.includes(keyword)) {
        } else {
          wordList.push(keyword);
          createBox(keyword);
        }
      }
    }
    input.value = "";
  }
}

function createIMGBox(imgURL, holderID, inputFeildID) {
  const randomID = "img-" + Math.random().toString(36).substr(2, 9);
  const newImg = document.createElement("img");
  newImg.classList.add("img-preview");
  const imgId = randomID;
  newImg.id = imgId;
  newImg.src = imgURL;
  const cross = document.createElement("div");
  cross.classList.add("cross-mark");
  cross.id = imgId;
  cross.onclick = function () {
    const imgToRemove = document.getElementById(this.id);
    if (imgToRemove) {
      removeElement(this.id);
      resetInputField(inputFeildID);
      this.remove();
    }
  };
  const container = document.getElementById(holderID);
  container.appendChild(newImg);
  container.appendChild(cross);
}

function previewImage(event, imageField, previewContainerId) {
  const imageUpload = document.getElementById(imageField);
  const imagePreview = document.getElementById("imagePreview");

  if (event.target.files[0]) {
    const file = event.target.files[0];
    if (!file.type.match("image.*")) {
      ErrorM("Please select an image file.");
      return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgURL = e.target.result;
      imagePreview.src = imgURL;
      createIMGBox(imgURL, previewContainerId, imageField);
    };
    reader.readAsDataURL(file);
  } else {
    imagePreview.src = "";
    imagePreview.style.display = "none";
  }
}

function previewAndCreateImages(event, imageFieldId, previewContainerId) {
  const imageUpload = document.getElementById(imageFieldId);
  const previewContainer = document.getElementById(previewContainerId);
  if (event.target.files) {
    previewContainer.innerHTML = "";
    for (let i = 0; i < event.target.files.length; i++) {
      const file = event.target.files[i];
      if (!file.type.match("image.*")) {
        ErrorM("Please select only image files.");
        return;
      }
      const reader = new FileReader();
      reader.onload = function (e) {
        const imgURL = e.target.result;
        createIMGBox(imgURL, previewContainerId, imageFieldId);
      };
      reader.readAsDataURL(file);
    }
  } else {
    previewContainer.innerHTML = "";
  }
}

function previewVideo(event) {
  const videoUpload = document.getElementById("videoInput");
  const videoPreview = document.getElementById("videoPreview");
  if (!videoUpload || !videoPreview) {
    console.error("Missing video upload or preview element!");
    return;
  }
  const file = event.target.files[0];
  if (!file.type.match("video.*")) {
    swal("Please select a video file.");
    return;
  }
  const reader = new FileReader();
  reader.onload = function (e) {
    const previewVideo = document.getElementById("preview12");
    previewVideo.src = e.target.result;
    videoPreview.style.display = "block";
  };
  reader.onerror = function (error) {
    console.error("Error reading video file:", error);
  };
  reader.readAsDataURL(file);
}

function disableDropdown(Drop_down_boxId) {
  var dropdown = document.getElementById(Drop_down_boxId);
  dropdown.disabled = true;
}

function enableDropdown(Drop_down_boxId) {
  var dropdown = document.getElementById(Drop_down_boxId);
  dropdown.disabled = false;
}

// anime ticks
function animateTick() {
  var tick = document.getElementById("tick");
  if (tick) {
    tick.classList.add("animate-tick");
    setTimeout(function () {
      tick.classList.remove("animate-tick");
    }, 300);
  }
}

function toggleAdditionalFields(checkboxId, isChecked, sectionId) {
  var checkbox = document.getElementById(checkboxId);
  if (isChecked && checkbox.id === checkboxId) {
    showAdditionalFields(sectionId);
  } else {
    hideAdditionalFields(sectionId);
  }
}

function toggleAdditionalFieldscheckbox(inputId, checkboxID, Drop_down_boxId) {
  var checkbox = document.getElementById(checkboxID);
  if (checkbox.checked) {
    showAdditionalFields(inputId);
    disableDropdown(Drop_down_boxId);
  } else {
    hideAdditionalFields(inputId);
    enableDropdown(Drop_down_boxId);
  }
}

function hideAdditionalFields(inputId) {
  var additionalFields = document.getElementById(inputId);
  additionalFields.style.transition = "opacity 0.5s ease-out";
  additionalFields.style.opacity = 0;
  setTimeout(function () {
    additionalFields.style.display = "none";
  }, 500);
}

function showAdditionalFields(inputId) {
  var additionalFields = document.getElementById(inputId);
  additionalFields.style.display = "block";
  additionalFields.style.transition = "opacity 0.5s ease-in";
  additionalFields.style.opacity = 1;
}

var SectionNumber = 3;

function preview() {
  for (var i = 1; i <= 7; i++) {
    var section = document.getElementById("section" + i);
    if (section) {
      section.style.display = "none";
    }
  }
  var pre = document.getElementById("preview");
  pre.style.display = "block";
}

function load(pageName) {
  animateTick();
  var pre = document.getElementById("preview");
  if (pre) {
    pre.style.display = "none";
  }
  for (var i = 1; i <= 6; i++) {
    var sectionId = pageName + "section" + i;
    var section = document.getElementById(sectionId);
    if (section) {
      if (i === SectionNumber) {
        section.style.display = "block";
        var btn = document.getElementById("save-btn");
        if (btn) {
          if (sectionId == "addShopsection1") {
            btn.textContent = "Save shop preferences";
          } else if (sectionId == "addShopsection2") {
            btn.textContent = "Save shop name";
          } else if (sectionId == "addShopsection3") {
            btn.textContent = "Stock my shop";
          } else if (sectionId == "addShopsection4") {
            btn.textContent = "Save My bank details";
          } else if (sectionId == "addShopsection5") {
            btn.textContent = "Save my billing info";
          } else if (sectionId == "addShopsection6") {
            btn.textContent = "Let's verify";
          }
        }
      } else {
        section.style.display = "none";
      }
    }

    if (section) {
      if (i === SectionNumber) {
        section.style.display = "block";
        var btn = document.getElementById("buyPageConbtn");
        if (btn) {
          if (sectionId == "buypagesection1") {
            btn.textContent = "Continue to Payment";
          } else if (sectionId == "buypagesection2") {
            btn.textContent = "Review your order";
          } else if (sectionId == "buypagesection3") {
            btn.textContent = "Submit your order";
          }
        }
      } else {
        section.style.display = "none";
      }
    }
  }
}

function gloweffect(pageName) {
  var ball = document.getElementById(pageName + "d" + SectionNumber);
  if (ball) {
    ball.style.backgroundColor = "#007bff";
    ball.style.boxShadow = "0 0 10px rgba(0, 123, 255, 0.7)";
  }
}
const SECTION_1 = 1;
const SECTION_2 = 2;
const SECTION_3 = 3;
const SECTION_4 = 4;
const SECTION_5 = 5;
const SECTION_6 = 6;

const dropdownIds = [
  "shopLanguage",
  "shopCountry",
  "shopCurrency",
  "SelCategory",
  "whomade",
  "processing_time",
  "shipping-country",
  "returnpolicy",
  "bank-location",
  "month",
  "day",
  "year",
  "sanctioned-region",
  "Day2",
  "month2",
  "year2",
  "expiration-month",
  "expiration-year",
  "authMethod",
  "smsMethod",
];

const inputFieldIds = [
  "shopName",
  "newCategory",
  "section",
  "price",
  "fixed_price",
  "originZIPCode",
  "name",
  "handlingFee",
  "hs-tariff-number",
  "country-name",
  "first-name",
  "last-name",
  "number",
  "street-name",
  "address-line2",
  "city-town",
  "state",
  "postal-code",
  "phone-number",
  "full-name",
  "bank-name",
  "iban",
  "swift-bic",
  "card-number",
  "ccv",
  "name-on-card",
  "email",
  "vcode",
  "full-name",
  "street-address",
  "apt-suite",
  "city",
  "postal-code",
  "nameOnCard",
  "expirationDate",
  "securityCode",
  "personalization",
  "email",
  "ti",
  "dwc",
  "doc",
  "fn",
  "ln",
  "mo",
  "l1",
  "l2",
  "search-box",
  "name",
  "mobile",
  "email",
  "qtyInput",
  "title",
  "delivery_fee_colomco",
  "delivery_fee_other",
  "line1",
  "line2",
  "brief-overview",
  "instruction",
  "whatBuyerSees",
  "custom-return-policy-text",
  "quantity",
  "item-weight",
  "package-length",
  "package-width",
  "package-height",
];

const validationMessages = {
  shopLanguage: "Please select a language for the shop",
  shopCountry: "Please select a Country for your shop",
  shopCurrency: "Please select a currency",
  SelCategory: "Please select a Category for the item",
  whomade: "Please select an Option",
  processing_time: "Please select an Option",
  "shipping-country": "Please select an Option",
  returnpolicy: "Please select a Return policy Option",
  "bank-location": "Please select an Option",
  month: "Please select a Month",
  day: "Please select a Day",
  year: "Please select an Year",
  "sanctioned-region": "Please select an Region",
  Day2: "Please select a Day",
  month2: "Please select a Month",
  year2: "Please select an Year",
  "expiration-month": "Please select an Option",
  "expiration-year": "Please select an Option",
  authMethod: "Choose an option to get started",
  smsMethod: "Verify your account through",
};

const friendlyNames = {
  shopName: "Shop Name",
  seo_keywords: "SEO Keywords",
  newCategory: "New Category",
  section: "Section",
  price: "Price",
  fixed_price: "Fixed Price",
  originZIPCode: "Origin ZIP Code",
  name: "Name",
  handlingFee: "Handling Fee",
  "hs-tariff-number": "HS Tariff Number",
  "country-name": "Country Name",
  "first-name": "First Name",
  "last-name": "Last Name",
  number: "Number",
  "street-name": "Street Name",
  "address-line2": "Address Line 2",
  "city-town": "City/Town",
  state: "State",
  "postal-code": "Postal Code",
  "phone-number": "Phone Number",
  "full-name": "Full Name",
  "bank-name": "Bank Name",
  iban: "IBAN",
  "swift-bic": "SWIFT/BIC",
  "card-number": "Card Number",
  ccv: "CCV",
  "name-on-card": "Name on Card",
  email: "Email",
  vcode: "Verification Code",
  "street-address": "Street Address",
  "apt-suite": "Apartment/Suite",
  city: "City",
  nameOnCard: "Name on Card",
  expirationDate: "Expiration Date",
  securityCode: "Security Code",
  personalization: "Personalization",
  ti: "Title",
  dwc: "Delivery Fee Colomco",
  doc: "Delivery Fee Other",
  fn: "First Name",
  ln: "Last Name",
  mo: "Mobile",
  l1: "Line 1",
  l2: "Line 2",
  "search-box": "Search Box",
  qtyInput: "Quantity Input",
  "brief-overview": "Brief Overview",
  instruction: "Instructions for Buyers",
  whatBuyerSees: "What the Buyer Will See",
  "custom-return-policy-text": "Custom Return Policy",
  quantity: "Quantity",
  "item-weight": "Item Weight",
  "package-length": "Package Length",
  "package-width": "Package Width",
  "package-height": "Package Height",
};

function validateShippingOptions() {
  const freeShipping = document.getElementById("freeShipping");
  const freeDomesticShipping = document.getElementById("freeDomesticShipping");
  const freeInternationalShipping = document.getElementById(
    "freeInternationalShipping"
  );
  const errorSpan = document.getElementById("shippingOptionsError");

  if (
    !freeShipping.checked &&
    !freeDomesticShipping.checked &&
    !freeInternationalShipping.checked
  ) {
    showError(
      errorSpan,
      freeShipping,
      "Please select at least one shipping option"
    );
    return false;
  } else {
    clearError(errorSpan, freeShipping);
    return true;
  }
}

function validateAndAlert(idOrFunction, msg) {
  if (typeof idOrFunction === "object" && idOrFunction.validate) {
    const result = idOrFunction.validate();
    if (!result) {
      // You might want to show this error message somewhere
      console.error(msg);
    }
    return result;
  }

  if (typeof idOrFunction === "function") {
    const result = idOrFunction();
    if (!result) {
      console.error(msg);
    }
    return result;
  }

  if (idOrFunction === "shippingop") {
    return validateShippingOptions();
  }

  const element = document.getElementById(idOrFunction);
  const errorSpan = document.getElementById(idOrFunction + "Error");

  if (idOrFunction === "seo_keywords") {
    if (validateWordList()) {
      clearError(errorSpan, element);
      return true;
    } else {
      showError(errorSpan, element, msg);
      return false;
    }
  }

  if (!element || !errorSpan) {
    console.error(`Element or error span for '${idOrFunction}' not found.`);
    return false;
  }

  const addCategoryCheckbox = document.getElementById("add-category");
  const customPrice = document.getElementById("enterFixedPrices");
  const cusPolicy = document.getElementById("new-policy");

  const isCusPolicy =
    idOrFunction === "custom-return-policy-text" && !cusPolicy.checked;
  const isNewCategory =
    idOrFunction === "newCategory" && !addCategoryCheckbox.checked;
  const isFixedPrice = idOrFunction === "fixed_price" && !customPrice.checked;

  if (isNewCategory || isFixedPrice || isCusPolicy) {
    clearError(errorSpan, element);
    return true;
  }

  if (isEmpty(element)) {
    showError(errorSpan, element, msg);
    return false;
  } else {
    clearError(errorSpan, element);
    return true;
  }
}

function validateExpirationDate() {
  const monthValid = validateExpirationField(
    "expiration-month",
    "Please select a month"
  );
  const yearValid = validateExpirationField(
    "expiration-year",
    "Please select a year"
  );

  if (monthValid && yearValid) {
    clearError(document.getElementById("expiration-dateError"));
    return true;
  } else {
    showError(
      document.getElementById("expiration-dateError"),
      null,
      "Please select a valid expiration date"
    );
    return false;
  }
}

function validateExpirationField(fieldId, errorMsg) {
  const field = document.getElementById(fieldId);
  const errorSpan = document.getElementById(fieldId + "Error");

  if (field.value === field.options[0].text) {
    showError(errorSpan, field, errorMsg);
    return false;
  } else {
    clearError(errorSpan, field);
    return true;
  }
}

function validateDate() {
  const monthValid = validateDateField("month", "Please select a month");
  const dayValid = validateDateField("day", "Please select a day");
  const yearValid = validateDateField("year", "Please select a year");

  return monthValid && dayValid && yearValid;
}

function validateDateField(fieldId, errorMsg) {
  const field = document.getElementById(fieldId);
  const errorSpan = document.getElementById(fieldId + "Error");

  if (field.value === field.options[0].text) {
    showError(errorSpan, field, errorMsg);
    return false;
  } else {
    clearError(errorSpan, field);
    return true;
  }
}

function showError(errorSpan, element, msg) {
  errorSpan.textContent = msg;
  errorSpan.style.display = "block";
  element.classList.add("is-invalid");
  element.focus();
  element.scrollIntoView({ behavior: "smooth", block: "center" });
}

function clearError(errorSpan, element) {
  errorSpan.textContent = "";
  errorSpan.style.display = "none";
  element.classList.remove("is-invalid");
}

function isEmpty(element) {
  return element.value.trim() === "";
}

function isEmpty(element) {
  switch (element.type) {
    case "select-one":
    case "text":
    case "textarea":
    case "email":
    case "number":
      return element.value.trim() === "";

    case "checkbox":
    case "radio":
      return !element.checked;

    case "file":
      return element.files.length === 0;

    default:
      return false;
  }
}

function validationList() {
  let op = true;
  const alertMsg = "You can't leave this empty";

  const validations = {
    [SECTION_1]: ["shopLanguage", "shopCountry", "shopCurrency"],
    [SECTION_2]: ["shopName"],
    [SECTION_3]: [
      // ["image", "Please upload an image"],
      // ["images", "Please upload more pictures"],
      // ["newCategory", "Please enter the name of the category"],
      // ["brief-overview", "Please enter a brief overview"],
      // ["section", "Please enter the section name"],
      // ["price", "Please enter the price"],
      // ["quantity", "Please enter the quantity"],
      // ["instruction", "Please enter the personalization instructions"],
      // ["whatBuyerSees", "Please add what the buyer will see"],
      // ["fixed_price", "Please enter the fixed price"],
      // ["originZIPCode", "Please enter the origin ZIP code"],
      // ["item-weight", "Please enter the item weight"],
      // ["package-length", "Please enter the package length"],
      // ["package-width", "Please enter the package width"],
      // ["package-height", "Please enter the package height"],
      // ["hs-tariff-number", "Please enter the HS Tariff Number"],
      // ["shippingop", "Please select a shipping option"],
      // ["SelCategory", "Please select a category"],
      // ["whomade", "Please select who made the item"],[
      // { validate: validateShippingOptions, errorMsg: "Please select at least one shipping option" },
      // ["handlingFee", "Please enter the Handling fee amount"],
      // ["processing_time", "Please select processing time"],
      // ["returnpolicy", "Please select a return policy"],
      ["seo_keywords", "Please add atleast One key Word"],
      // [
      //   "custom-return-policy-text",
      //   "Please enter a custom return policy description",
      // ],
    ],
    [SECTION_4]: [
      ["bank-location", "Please enter bank-location"],
      ["country-residence", "Please enter country-residence"],
      ["first-name", "Please enter first-name"],
      ["last-name", "Please enter last-name"],
      [{ validate: validateDate, errorMsg: "Please select a valid date" }],
      ["number", "Please enter number"],
      ["street-name", "Please enter street-name"],
      ["address-line2", "Please enter address-line2"],
      ["city-town", "Please enter city-town"],
      ["state", "Please enter state"],
      ["postal-code", "Please enter postal-code"],
      ["phone-number", "Please enter phone-number"],
      ["full-name", "Please enter full-name"],
      ["bank-name", "Please enter bank-name"],
      ["iban", "Please enter iban"],
      ["swift-bic", "Please enter swift-bic"],
    ],
    [SECTION_5]: [
      ["card-number", "Please enter your card number"],
      [
        { validate: validateExpirationDate },
        "Please select a valid expiration date",
      ],
      ["ccv", "Please enter your CCV"],
      ["name-on-card", "Please enter the name on your card"],
    ],
    [SECTION_6]: [
      ["authMethod", "Please choose an authentication method"],
      ["emailMethod", "Please select a verification method"],
      ["email2", "Please enter your email address for verification"],
    ],
  };

  (validations[SectionNumber] || []).forEach((field) => {
    if (Array.isArray(field)) {
      op = op && validateAndAlert(field[0], field[1]);
    } else {
      op = op && validateAndAlert(field, alertMsg);
    }
  });

  (validations[SectionNumber] || []).forEach((field) => {
    if (
      Array.isArray(field) &&
      typeof field[0] === "object" &&
      field[0].validate
    ) {
      op = op && validateAndAlert(field[0], field[1]);
    } else if (Array.isArray(field)) {
      op = op && validateAndAlert(field[0], field[1]);
    } else {
      op = op && validateAndAlert(field, alertMsg);
    }
  });

  return op;
}

function handleSection() {
  switch (SectionNumber) {
    case SECTION_1:
      getShopinitData();
      break;
    case SECTION_2:
      getShopNameInfo();
      break;
    case SECTION_3:
      // section3Backend();
      break;
    case SECTION_4:
      section4Backend();
      break;
    case SECTION_5:
      getTwoFactorAuthInfo();
      break;
    default:
      console.log("Invalid section number");
  }
}

function savencon(pageName) {
  if (validationList()) {
    const element = document.getElementById(pageName + "d" + SectionNumber);
    if (element) {
      element.style.backgroundColor = "";
      element.style.boxShadow = "";
      element.style.backgroundImage =
        "url(\"data:image/svg+xml;utf8,<svg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>\")";
    }

    handleSection();

    SectionNumber += 1;
    gloweffect(pageName);
    load(pageName);
    if (SectionNumber == 7) {
      document.getElementById("section").style.display = "block";
      document.getElementById("final").style.display = "block";
    }
  }
}

function errorSpanToggle(elementId, alertMsg) {
  const element = document.getElementById(elementId);
  const errorSpan = document.getElementById(elementId + "Error");

  if (isEmpty(element)) {
    element.classList.add("error");
    errorSpan.textContent = alertMsg;
    errorSpan.style.display = "inline";
    element.focus();
    setTimeout(() => element.blur(), 3000);
  } else {
    element.classList.remove("error");
    errorSpan.style.display = "none";
  }
}

function initializeDropdownValidation() {
  dropdownIds.forEach((dropdownId) => {
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
      dropdown.onblur = () => {
        const message =
          validationMessages[dropdownId] || "Please make a selection";
        errorSpanToggle(dropdownId, message);
      };
    }
  });
}

function initializeInputValidation() {
  inputFieldIds.forEach((inputFieldId) => {
    const inputField = document.getElementById(inputFieldId);
    if (inputField) {
      inputField.onblur = () => {
        const friendlyName = friendlyNames[inputFieldId] || inputFieldId;
        errorSpanToggle(inputFieldId, `Please fill out the ${friendlyName}`);
      };
    }
  });
}

function loadingFunctions() {
  initializeInputValidation();
  initializeDropdownValidation();
  load("addShop");
  gloweffect("addShop");
}

function reverseSavencon(pageName) {
  if (SectionNumber > 1) {
    var ball = document.getElementById(pageName + "d" + SectionNumber);
    ball.style.backgroundColor = "";
    ball.style.boxShadow = "";
    SectionNumber -= 1;
    var element = document.getElementById(pageName + "d" + SectionNumber);
    element.style.backgroundColor = "#007bff";
    element.style.boxShadow = "0 0 10px rgba(0, 123, 255, 0.7)";
    element.style.backgroundImage = "";
    load(pageName);
  }
}

function showContent(index) {
  const contents = document.querySelectorAll(".tab-content");
  const tabs = document.querySelectorAll(".tab-item");
  contents.forEach((content) => content.classList.remove("active"));
  tabs.forEach((tab) => tab.classList.remove("active"));
  contents[index].classList.add("active");
  tabs[index].classList.add("active");
}

function changeView() {
  var signUpBox = document.getElementById("signUpBox");
  var signInBox = document.getElementById("signInBox");

  signInBox.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

function isValidEmail(email) {
  const emailRegex =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailRegex.test(email);
}

function isValidMobile(mobile) {
  const mobileRegex = /^[\+]?[(]?\d{3}[)]?[-\s\.]?\d{3}[-\s\.]?\d{4}$/;
  return mobileRegex.test(mobile);
}

function SuccessM(msg) {
  swal("Good job!", msg, "success");
}

function ErrorM(msg) {
  swal("Oops!", msg, "error");
}

function showAlert(message) {
  swal(message);
}

function isValidInput(fn, ln, m, e, pw, cpw, g) {
  if (!fn.value.trim()) {
    showAlert("Please enter your First name!");
    return false;
  } else if (!ln.value.trim()) {
    showAlert("Please enter your Last name!");
    return false;
  } else if (!m.value.trim()) {
    showAlert("Please enter your Mobile number!");
    return false;
  } else if (!isValidMobile(m.value)) {
    showAlert(
      "The mobile number you entered is incorrect! Please make sure the number is correct!"
    );
    return false;
  } else if (!e.value.trim()) {
    showAlert("Please enter your Email!");
    return false;
  } else if (!isValidEmail(e.value)) {
    showAlert("The email you entered is not valid!");
    return false;
  } else if (!pw.value.trim()) {
    showAlert("Please enter your Password!");
    return false;
  } else if (cpw.value !== pw.value) {
    showAlert("Your passwords don't match. Please try again!");
    return false;
  } else if (!g.value.trim()) {
    showAlert("Please select your gender!");
    return false;
  }
  return true;
}

function addUser() {
  var un = document.getElementById("uname");
  var fn = document.getElementById("fname");
  var ln = document.getElementById("lname");
  var cpw = document.getElementById("cpw");
  var e = document.getElementById("email");
  var pw = document.getElementById("pw");
  var m = document.getElementById("mobile");
  var g = document.getElementById("gender");

  if (isValidInput(fn, ln, m, e, pw, cpw, g)) {
    var form = new FormData();
    form.append("un", un.value);
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("cpw", cpw.value);
    form.append("e", e.value);
    form.append("pw", pw.value);
    form.append("m", m.value);
    form.append("g", g.value);

    submitForm("addUserProcess.php", form);
  }
}

function signUp() {
  var fn = document.getElementById("fname");
  var ln = document.getElementById("lname");
  var cpw = document.getElementById("cpw");
  var e = document.getElementById("email");
  var pw = document.getElementById("pw");
  var m = document.getElementById("mobile");
  var g = document.getElementById("gender");

  if (isValidInput(fn, ln, m, e, pw, cpw, g)) {
    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("cpw", cpw.value);
    form.append("e", e.value);
    form.append("pw", pw.value);
    form.append("m", m.value);
    form.append("g", g.value);

    submitForm("signUpProcess.php", form);
  }
}

function changeTab(sectionId, event) {
  event.preventDefault(); // Prevent default link behavior

  // Hide all sections
  const sections = document.querySelectorAll(".section");
  sections.forEach((section) => {
    section.style.display = "none";
  });

  // Show the selected section
  const sectionToShow = document.getElementById(sectionId);
  sectionToShow.style.display = "block";
}

function testSwal() {
  if (true) {
    swal("Please select your gender!");
  }
}

function signIn() {
  var e = document.getElementById("email");
  var pw = document.getElementById("pw");
  var rememberMe = document.getElementById("rememberMe").checked ? 1 : 0;

  if (!e.value.trim()) {
    swal("Please enter your Email!");
    return;
  } else if (!isValidEmail(e.value)) {
    swal("The email you tried to enter is not valid!");
    return;
  } else if (!pw.value.trim()) {
    swal("Please enter your Password!");
    return;
  } else {
    var form = new FormData();
    form.append("e", e.value);
    form.append("pw", pw.value);
    form.append("rememberMe", rememberMe);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var text = r.responseText;
        console.log("Response from server:", text);
        if (text == "Success") {
          SuccessM("You have successfully Logged In!");
          window.location.href = "Home.php";
        } else if (text == "Error") {
          ErrorM("Invalid Email or Password. Please try again.");
        } else {
          ErrorM("Something went wrong!");
        }
      }
    };
    r.open("POST", "signInProcess.php", true);
    r.send(form);
  }
}

function gotoPage(pageLocation) {
  window.location.href = pageLocation;
}
