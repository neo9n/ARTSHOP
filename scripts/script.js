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
  fileInput.addEventListener("change", handleFileSelect);
}

function handleFileSelect(event) {
  const file = event.target.files[0];
  displayVideoPreview(file);
}
document.addEventListener("DOMContentLoaded", initializeFileInput);

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

var wordList = [];
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
    alert("Please select a video file.");
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

var SectionNumber = 1;

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

function isEmptyDropDown(id) {
  return !validateElementsOutput(id);
}

function validateAndAlert(id, msg) {
  var checkEmpty = true;
  var isValid = true;
  if (isEmptyDropDown(id)) {
    errorSpanToggle(id, msg);
    isValid = false;
  } else if (validateElementsOutput(id)) {
    errorSpanToggle(id, msg);
    isValid = false;
  }
  return isValid;
}

function validationList() {
  var alertMsg = "You can't leave this empty";
  var op = true;
  // if (SectionNumber === 1) {
  //   op &= validateAndAlert("shopLanguage", alertMsg);
  //   op &= validateAndAlert("shopCountry", alertMsg);
  //   op &= validateAndAlert("shopCurrency", alertMsg);
  // }
  // if (SectionNumber === 2) {
  //   op &= validateAndAlert("shopName", alertMsg);
  // }
  alert(op);
  return op;
}

function validateElementsOutput(dropdownId, emptyReturns) {
  var dropdown = document.getElementById(dropdownId);
  var selectedValue = dropdown.value;
  if (selectedValue === "") {
    return emptyReturns;
  } else {
    return !emptyReturns;
  }
}

function errorSpanToggle(elementId, alertMsg) {
  var element = document.getElementById(elementId);
  var errorSpan = document.getElementById(elementId + "Error");
  var selectedValue = element.value;
  if (selectedValue === "") {
    element.classList.add("error");
    errorSpan.textContent = alertMsg;
    errorSpan.style.display = "inline";
    return false;
  } else {
    element.classList.remove("error");
    errorSpan.style.display = "none";
    return true;
  }
}

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

const inputFieldIds = [
  "shopName",
  "seo_keywords",
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

function initializeDropdownValidation() {
  dropdownIds.forEach((dropdownId) => {
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
      dropdown.onblur = () => {
        const message =validationMessages[dropdownId] || "Please make a selection";
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

function savencon(pageName) {
  // alert(validationList());
  if (validationList()) {
    var element = document.getElementById(pageName + "d" + SectionNumber);
    if (element) {
      element.style.backgroundColor = "";
      element.style.boxShadow = "";
      element.style.backgroundImage =
        "url(\"data:image/svg+xml;utf8,<svg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>\")";
    }
    SectionNumber += 1;
    gloweffect(pageName);
    load(pageName);
    if (SectionNumber == 7) {
      section.style.display = "block";
      document.getElementById("final").style.display = "block";
    }
  }
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

function SimpleErrorM(msg) {
  swal(msg);
}

function signUp() {
  var n = document.getElementById("name");
  var cpw = document.getElementById("cpw");
  var e = document.getElementById("email");
  var pw = document.getElementById("pw");
  var m = document.getElementById("mobile");
  var g = document.getElementById("gender");

  if (!n.value.trim()) {
    swal("Please enter your name!");
    return;
  } else if (!m.value.trim()) {
    swal("Please enter your Mobile number!");
    return;
  } else if (!isValidMobile(m.value)) {
    swal(
      "The mobile number you try to enter is incorrect! Please Make sure the number you enter is correct!"
    );
    return;
  } else if (!e.value.trim()) {
    swal("Please enter your Email!");
    return;
  } else if (!isValidEmail(e.value)) {
    swal("The email you tried to enter is not valid!");
    return;
  } else if (!pw.value.trim()) {
    swal("Please enter your Password!");
    return;
  } else if (cpw.value !== pw.value) {
    swal("Your passwords don't match. Please try again!");
    return;
  } else if (!g.value.trim()) {
    swal("Please select your gender!");
    return;
  } else {
    var form = new FormData();
    form.append("n", n.value);
    form.append("cpw", cpw.value);
    form.append("e", e.value);
    form.append("pw", pw.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var text = r.responseText;
        console.log("Response from server:", text);
        if (text == "Success") {
          document.getElementById("name").value = "";
          document.getElementById("cpw").value = "";
          document.getElementById("email").value = "";
          document.getElementById("pw").value = "";
          document.getElementById("mobile").value = "";
          SuccessM("You have successfully registered!");
        } else if (text == "Error") {
          ErrorM(
            "user with the same Email Address or Mobile Number already exists!"
          );
        } else {
          ErrorM("Something went wrong!");
        }
      }
    };
    r.open("POST", "signUpProcess.php", true);
    r.send(form);
  }
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

function showpassword1() {
  var np = document.getElementById("np");
  var npb = document.getElementById("npb");

  if (np.type == "password") {
    np.type = "text";
    npb.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    np.type = "password";
    npb.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

function showpassword2() {
  var rnp = document.getElementById("rnp");
  var rnpb = document.getElementById("rnpb");

  if (rnp.type == "password") {
    rnp.type = "text";
    rnpb.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    rnp.type = "password";
    rnpb.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

function resetpassword() {
  var e = document.getElementById("email2");
  var np = document.getElementById("np");
  var rnp = document.getElementById("rnp");
  var vc = document.getElementById("vc");

  var form = new FormData();
  form.append("e", e.value);
  form.append("np", np.value);
  form.append("rnp", rnp.value);
  form.append("vc", vc.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Password reset success");
        bm.hide();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "resetPassword.php", true);
  r.send(form);
}

function signout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
      }
    }
  };

  r.open("GET", "signoutprocess.php", true);
  r.send();
}

function viewpw() {
  var pwtxt = document.getElementById("pwtxt");
  var pwbtn = document.getElementById("pwbtn");

  if (pwtxt.type == "text") {
    pwtxt.type = "password";
    pwbtn.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    pwtxt.type = "text";
    pwbtn.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

function changeImage() {
  var view = document.getElementById("viewimg"); //image tag
  var file = document.getElementById("profileimg"); //file chooser

  file.onchange = function () {
    var file1 = this.files[0];
    var url1 = window.URL.createObjectURL(file1);
    view.src = url1;
  };
}

function update_profile() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var mobile = document.getElementById("mo");
  var line1 = document.getElementById("l1");
  var line2 = document.getElementById("l2");
  var province = document.getElementById("pr");
  var district = document.getElementById("dr");
  var city = document.getElementById("ci");
  var postal_code = document.getElementById("pc");
  var image = document.getElementById("profileimg");

  var form = new FormData();
  form.append("fn", fname.value);
  form.append("ln", lname.value);
  form.append("m", mobile.value);
  form.append("li1", line1.value);
  form.append("li2", line2.value);
  form.append("pr", province.value);
  form.append("dr", district.value);
  form.append("ci", city.value);
  form.append("pc", postal_code.value);

  if (image.files.length == 0) {
    var confirmAction = confirm(
      "Are you sure you don't want to update your profile picture?"
    );

    if (confirmAction) {
      alert("You have not selected any image");
    }
  } else {
    form.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Please Log In to your account first") {
        alert(t);
        window.location = "index.php";
      } else if (t == "Success") {
        window.location = "userProfile.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "updateProfileProcess.php", true);
  r.send(form);
}

function changeProductImage() {
  var image = document.getElementById("imageUploader");

  image.onchange = function () {
    var img_count = image.files.length;

    for (var x = 0; x < img_count; x++) {
      var file = this.files[x];
      var url = window.URL.createObjectURL(file);

      document.getElementById("preview" + x).src = url;
    }
  };
}

function addProduct() {
  //addProductProcess

  var category = document.getElementById("category");
  var brand = document.getElementById("brand");
  var model = document.getElementById("model");
  var title = document.getElementById("title");

  var condition = 0;
  if (document.getElementById("bn").checked) {
    condition = 1;
  } else if (document.getElementById("us").checked) {
    condition = 2;
  }

  var color = 0;

  if (document.getElementById("clr1").checked) {
    color = 1;
  } else if (document.getElementById("clr2").checked) {
    color = 2;
  } else if (document.getElementById("clr3").checked) {
    color = 3;
  } else if (document.getElementById("clr4").checked) {
    color = 4;
  } else if (document.getElementById("clr5").checked) {
    color = 5;
  } else if (document.getElementById("clr6").checked) {
    color = 6;
  }

  var qty = document.getElementById("qty");
  var cost = document.getElementById("cost");
  var dwc = document.getElementById("dwc");
  var doc = document.getElementById("doc");
  var description = document.getElementById("description");
  var image = document.getElementById("imageUploader");

  var form = new FormData();
  form.append("cat", category.value);
  form.append("bra", brand.value);
  form.append("mod", model.value);
  form.append("tit", title.value);
  form.append("con", condition);
  form.append("clr", color);
  form.append("qty", qty.value);
  form.append("cost", cost.value);
  form.append("dwc", dwc.value);
  form.append("doc", doc.value);
  form.append("des", description.value);
  form.append("img", image.files[0]);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      alert(t);
    }
  };

  r.open("POST", "addProductProcess.php", true);
  r.send(form);
}

function changeStatus(id) {
  // alert(id);

  var product_id = id;
  var seitch_btn = document.getElementById("flexSwitchCheckDefault" + id);
  var switch_lbl = document.getElementById("switch_lbl" + id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "deactivated") {
        alert("Product has been Deactivated");
        window.location = "myProducts.php";
      } else if (t == "activated") {
        alert("Product has been Activated");
        window.location = "myProducts.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "statusChangeProcess.php?id=" + product_id, true);
  r.send();
}

function sortFunction() {
  var search = document.getElementById("s");
  var time;

  if (document.getElementById("n").checked) {
    time = "1";
  } else if (document.getElementById("o").checked) {
    time = "2";
  }

  var qty;

  if (document.getElementById("l").checked) {
    qty = "1";
  } else if (document.getElementById("h").checked) {
    qty = "2";
  }

  var condition;

  if (document.getElementById("b").checked) {
    condition = "1";
  } else if (document.getElementById("u").checked) {
    condition = "2";
  }

  var f = new FormData();
  f.append("s", search.value);
  f.append("t", time);
  f.append("q", qty);
  f.append("c", condition);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("sort").innerHTML = t;
    }
  };

  r.open("POST", "sortProcess.php", true);
  r.send(f);

  // alert(search);
  // alert(time);
  // alert(qty);
  // alert(condition);
}

function clearSort() {
  window.location = "myProducts.php";
}

function sendId(id) {
  // alert(id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "updateProduct.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "sendProductIdProcess.php?id=" + id, true);
  r.send();
}

function updateProduct() {
  var title = document.getElementById("ti");
  var qty = document.getElementById("qty");
  var delivery_within_colombo = document.getElementById("dwc");
  var delivery_outof_colombo = document.getElementById("doc");
  var description = document.getElementById("des");
  var image = document.getElementByI("imageUploader");

  // alert(title.value);
  // alert(qty.value);
  // alert(delivery_within_colombo.value);
  // alert(delivery_outof_colombo.value);
  // alert(description.value);
  // alert(image.file[0]["tmp_name"]);

  var f = new FormData();
  f.append("t", title.value);
  f.append("s", qty.value);
  f.append("dwc", delivery_within_colombo.value);
  f.append("doc", delivery_outof_colombo.value);
  f.append("d", description.value);
  f.append("i", image.file[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("POST", "updateProcess.php", true);
  r.send(f);
}

function basicSearch(x) {
  var txt = document.getElementById("basic_search_txt");
  var select = document.getElementById("basic_search_select");

  var f = new FormData();
  f.append("t", txt.value);
  f.append("s", select.value);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("basicSearchResult").innerHTML = t;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

function advancedSearch(x) {
  var search_text = document.getElementById("s1");
  var category = document.getElementById("c1");
  var brand = document.getElementById("b1");
  var model = document.getElementById("m1");
  var condition = document.getElementById("con");
  var color = document.getElementById("col");
  var price_from_txt = document.getElementById("pf");
  var price_to_txt = document.getElementById("pt");
  var sort = document.getElementById("sort");

  var form = new FormData();
  form.append("page", x);
  form.append("s", search_text.value);
  form.append("c", category.value);
  form.append("b", brand.value);
  form.append("m", model.value);
  form.append("c1", condition.value);
  form.append("c2", color.value);
  form.append("p1", price_from_txt.value);
  form.append("p2", price_to_txt.value);
  form.append("sort", sort.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("view_area").innerHTML = t;
    }
  };

  r.open("POST", "advancedSearchProcess.php", true);
  r.send(form);
}

function loadMainImg(id) {
  // alert(id);
  var sample_img = document.getElementById("productImg" + id).src;
  var main_img = document.getElementById("mainImg");

  main_img.style.backgroundImage = "url(" + sample_img + ")";
}

function check_value(qty) {
  var input = document.getElementById("qtyInput");

  if (input.value <= 0) {
    alert("Product Quantity must be greater than 1.");
    input.value = "1";
  } else if (input.value > qty) {
    alert("Insufficient Quantity.");
    input.value = qty;
  }
}

function qty_inc(qty) {
  var input = document.getElementById("qtyInput");

  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    alert("Maximum quantity has achieved.");
  }
}

function qty_dec() {
  var input = document.getElementById("qtyInput");

  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    alert("Minimum quantity has achieved.");
  }
}

function addToCard(id) {
  // alert(id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("GET", "addToCardProcess.php?id=" + id, true);
  r.send();
}

function deleteFromCart(id) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var txt = r.responseText;
      if (txt == "Success") {
        alert("Product removed from the cart.");
        window.location = "card.php";
      } else {
        alert(txt);
      }
    }
  };

  r.open("GET", "removeCartProcess.php?id= " + id, true);
  r.send();
}

function addToWatchList(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Added") {
        document.getElementById("heart" + id).style.color = "red";
        window.location.reload();
      } else if (t == "Removed") {
        document.getElementById("heart" + id).style.color = "white";
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToWatchListProcess.php?id=" + id, true);
  r.send();
}

function removeFromWatchlist(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var t = request.responseText;

      if (t == "success") {
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  request.open("GET", "removedWatchlistProcess.php?id=" + id, true);
  request.send();
}

function viewMessages(email) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      document.getElementById("chat_box").innerHTML = t;
    }
  };
  r.open("GET", "viewMessageProcess.php?email=" + email, true);
  r.send();
}

function sendMsg(email) {
  var receiver_mail = document.getElementById("rmail");
  var msg_txt = document.getElementById("msgTxt");

  var f = new FormData();
  // f.append("rm", receiver_mail.innerHTML);
  f.append("rm", email);
  f.append("mt", msg_txt.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "message.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "sendMessageProcess.php", true);
  r.send(f);
}

function printInvoice() {
  var restorePage = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorePage;
}

var xm;

function adminVerification() {
  var e = document.getElementById("em");

  var f = new FormData();
  f.append("em", e.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        var verificationModal = document.getElementById("verificationModal");
        xm = new bootstrap.Modal(verificationModal);
        xm.show();
      } else {
        alert(t);
      }
    }
  };
  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}

function verify() {
  var vcode = document.getElementById("vcode");
  var e = document.getElementById("em");

  var f = new FormData();
  f.append("em", e.value);
  f.append("vcode", vcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if ((t = "success")) {
        window.location = "adminPanel.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "verifyProcess.php", true);
  r.send(f);
}

var mm;

function viewmsgmodel() {
  var m = document.getElementById("viewMsgModal");
  mm = new bootstrap.Modal(m);
  mm.show();
}

var pm;

function viewProductModal(id) {
  var am = document.getElementById("viewproductmodal" + id);
  pm = new bootstrap.Modal(am);
  pm.show();
}

var cm;

function addNewCategory() {
  var am = document.getElementById("addCategoryMadal");
  cm = new bootstrap.Modal(am);
  cm.show();
}

var cvm;
var newCategory;
var uemail;

function categoryVerifyModal() {
  var m = document.getElementById("addCategoryModalVerification");
  cvm = new bootstrap.Modal(m);

  newCategory = document.getElementById("n").value;
  uemail = document.getElementById("e").value;

  var f = new FormData();
  f.append("n", newCategory);
  f.append("e", uemail);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var responce = r.responseText;

      if (responce == "success") {
        cm.hide();
        cvm.show();
      } else {
        alert(responce);
      }
    }
  };
  r.open("POST", "addNewCategoryProcess.php", true);
  r.send(f);
}

function saveCategory() {
  var text = document.getElementById("vtxt").value;
  var newCategory = document.getElementById("n").value;
  var uemail = document.getElementById("e").value;

  var f = new FormData();
  f.append("t", text);
  f.append("c", newCategory);
  f.append("e", uemail);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var responce = r.responseText;
      if (responce == "success") {
        window.location = "manageProducts.php";
      } else {
        alert(responce);
      }
    }
  };
  r.open("POST", "saveCategoryProcess.php", true);
  r.send(f);
}

function changeInvoiceId(id) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      location.reload();
    }
  };
  r.open("GET", "changeInvoiceIdProcess.php?id=" + id, true);
  r.send();
}

function buynow(id) {
  var qty = document.getElementById("qtyInput").value;

  var f = new FormData();
  f.append("pid", id);
  f.append("qty", qty);
  // f.append("uniot_price", uniot_price);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      window.location = "invoice.php?order_id=" + t;
    }
  };
  r.open("POST", "buyNowProcess.php", true);
  r.send(f);
}

function blockProcess(email) {
  alert(email);

  // var block = document.getElementById("bl");
  // if (block.innerHTML == "Block") {
  //     block.innerHTML = "Unblock";
  //     block.style.background = "Green";
  // } else {
  //     block.innerHTML = "Block";
  //     block.style.background = "#dc3545";
  // }
}
