/* --- LOGIN FORM --- */
// const Loginform = document.getElementById("form");
const loginEmail = document.getElementById("email");
const loginPassword = document.getElementById("password");


// Defining ValidateLogin()

function validateLogin() {
    const loginEmailval = loginEmail.value.trim();
    const loginPasswordval = loginPassword.value.trim();

    var returnval = true;
    if (loginEmailval.length == 0) {
        setErrorMsg(loginEmail, "E-mail can not be empty !");
        returnval = false;
    } else if (!isEmail(loginEmailval)) {
        setErrorMsg(loginEmail, "Not a valid E-mail !");
        returnval = false;
    } else {
        setSuccessMsg(loginEmail);
    }

    if (loginPasswordval.length == 0) {
        setErrorMsg(loginPassword, "Password can not be empty !");
        returnval = false;
    } else if (loginPasswordval.length < 8) {
        setErrorMsg(loginPassword, "Wrong Password !");
        returnval = false;
    } else {
        setSuccessMsg(loginPassword);
    }
    return returnval;
    // return false;
}

/* --- REGISTER FORM --- */
const fname = document.getElementById("first");
const lname = document.getElementById("last");
const registerEmail = document.getElementById("registerEmail");
const phone = document.getElementById("phone");
const address = document.getElementById("add");
const city = document.getElementById("city");
const zip = document.getElementById("code");
const country = document.getElementById("country");
const registerPassword = document.getElementById("crt-pass");
const cPassword = document.getElementById("cnf-pass");

// Defining validateRegister()

function validateRegister() {
    const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
    const registerEmailValue = registerEmail.value.trim();
    const phoneValue = phone.value.trim();
    const addressValue = address.value.trim();
    const cityValue = city.value.trim();
    const zipValue = zip.value.trim();
    const countryValue = country.value.trim();
    const registerPasswordValue = registerPassword.value.trim();
    const cPasswordValue = cPassword.value.trim();

    var returnval = true;
    if (fnameValue.length == 0) {
        setErrorMsg(fname, "First Name can not be empty!");
        returnval = false;
    } else if (fnameValue.length < 3) {
        setErrorMsg(fname, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(fname);
    }

    if (lnameValue.length == 0) {
        setErrorMsg(lname, "Last Name can not be empty!");
        returnval = false;
    } else if (lnameValue.length < 3) {
        setErrorMsg(lname, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(lname);
    }

    if (registerEmailValue.length == 0) {
        setErrorMsg(registerEmail, "E-mail can not be empty !");
        returnval = false;
    } else if (!isEmail(registerEmailValue)) {
        setErrorMsg(registerEmail, "Please enter valid email !");
        returnval = false;
    } else {
        setSuccessMsg(registerEmail);
    }

    if (phoneValue.length == 0) {
        setErrorMsg(phone, "Phone Number Can not be empty !");
        returnval = false;
    } else if (phoneValue.length < 12 || phoneValue.length > 13) {
        setErrorMsg(phone, "Please enter valid number,Start with 92");
        returnval = false;
    } else if (!phoneValue.startsWith("92")) {
        setErrorMsg(phone, "Must starts with 92");
        returnval = false;
    } else {
        setSuccessMsg(phone);
    }

    if (addressValue.length == 0) {
        setErrorMsg(address, "Address can not be empty !");
        returnval = false;
    } else if (addressValue.length < 15) {
        setErrorMsg(address, "Too short address !");
        returnval = false;
    } else if (addressValue.length > 200) {
        setErrorMsg(address, "Too Long address !");
        returnval = false;
    } else {
        setSuccessMsg(address);
    }

    if (cityValue.length == 0) {
        setErrorMsg(city, "This field can not be Empty !");
        returnval = false;
    } else if (cityValue.length < 4 || cityValue.length > 20) {
        setErrorMsg(city, "Please enter a valid city name !");
        returnval = false;
    } else {
        setSuccessMsg(city);
    }

    if (zipValue.length < 5 || zipValue.length > 5) {
        setErrorMsg(zip, "Please enter valid code !");
        returnval = false;
    } else {
        setSuccessMsg(zip);
    }

    if (countryValue.length == 0) {
        setErrorMsg(country, "City can not be Empty !");
        returnval = false;
    } else if (countryValue.length < 4) {
        setErrorMsg(country, "Too short !");
        returnval = false;
    } else if (countryValue.length > 20) {
        setErrorMsg(country, "Too Long !");
        returnval = false;
    } else {
        setSuccessMsg(country);
    }


    if (registerPasswordValue.length == 0) {
        setErrorMsg(registerPassword, "Password can not be empty !");
        returnval = false;
    } else if (registerPasswordValue.length < 8) {
        setErrorMsg(registerPassword, "must be 8 characters long !");
        returnval = false;
    } else {
        setSuccessMsg(registerPassword);
    }

    if (cPasswordValue.length == 0) {
        setErrorMsg(cPassword, "Please Confirm your password !");
        returnval = false;
    } else if (cPasswordValue != registerPasswordValue) {
        setErrorMsg(cPassword, "Password not matched!");
        returnval = false;
    } else {
        setSuccessMsg(cPassword);
    }

    return returnval;
}

/* --- Updating FORM --- */
const ufname = document.getElementById("ufirst");
const ulname = document.getElementById("ulast");
const uregisterEmail = document.getElementById("uregisterEmail");
const uphone = document.getElementById("uphone");
const uaddress = document.getElementById("uadd");
const ucity = document.getElementById("ucity");
const uzip = document.getElementById("ucode");
const ucountry = document.getElementById("ucountry");


function validateUpdateRegister() {
    const ufnameValue = ufname.value.trim();
    const ulnameValue = ulname.value.trim();
    const uregisterEmailValue = uregisterEmail.value.trim();
    const uphoneValue = uphone.value.trim();
    const uaddressValue = uaddress.value.trim();
    const ucityValue = ucity.value.trim();
    const uzipValue = uzip.value.trim();
    const ucountryValue = ucountry.value.trim();

    var ureturnval = true;
    if (ufnameValue.length == 0) {
        setErrorMsg(ufname, "First Name can not be empty!");
        ureturnval = false;
    } else if (ufnameValue.length < 3) {
        setErrorMsg(ufname, "Too short !");
        ureturnval = false;
    } else {
        setSuccessMsg(ufname);
    }

    if (ulnameValue.length == 0) {
        setErrorMsg(ulname, "Last Name can not be empty!");
        ureturnval = false;
    } else if (ulnameValue.length < 3) {
        setErrorMsg(ulname, "Too short !");
        ureturnval = false;
    } else {
        setSuccessMsg(ulname);
    }

    if (uregisterEmailValue.length == 0) {
        setErrorMsg(uregisterEmail, "E-mail can not be empty !");
        ureturnval = false;
    } else if (!isEmail(uregisterEmailValue)) {
        setErrorMsg(uregisterEmail, "Please enter valid email !");
        ureturnval = false;
    } else {
        setSuccessMsg(uregisterEmail);
    }

    if (uphoneValue.length == 0) {
        setErrorMsg(uphone, "Phone Number Can not be empty !");
        ureturnval = false;
    } else if (uphoneValue.length < 12 || uphoneValue.length > 13) {
        setErrorMsg(uphone, "Please enter valid number,Start with 92");
        ureturnval = false;
    } else if (!uphoneValue.startsWith("92")) {
        setErrorMsg(uphone, "Must starts with 92");
        ureturnval = false;
    } else {
        setSuccessMsg(uphone);
    }

    if (uaddressValue.length == 0) {
        setErrorMsg(uaddress, "Address can not be empty !");
        ureturnval = false;
    } else if (addressValue.length < 15) {
        setErrorMsg(uaddress, "Too short address !");
        ureturnval = false;
    } else if (uaddressValue.length > 200) {
        setErrorMsg(uaddress, "Too Long address !");
        ureturnval = false;
    } else {
        setSuccessMsg(uaddress);
    }

    if (ucityValue.length == 0) {
        setErrorMsg(ucity, "This field can not be Empty !");
        ureturnval = false;
    } else if (ucityValue.length < 4 || ucityValue.length > 20) {
        setErrorMsg(ucity, "Please enter a valid city name !");
        ureturnval = false;
    } else {
        setSuccessMsg(ucity);
    }

    if (uzipValue.length < 5 || uzipValue.length > 5) {
        setErrorMsg(uzip, "Please enter valid code !");
        ureturnval = false;
    } else {
        setSuccessMsg(uzip);
    }

    if (ucountryValue.length == 0) {
        setErrorMsg(ucountry, "City can not be Empty !");
        ureturnval = false;
    } else if (ucountryValue.length < 4) {
        setErrorMsg(ucountry, "Too short !");
        ureturnval = false;
    } else if (ucountryValue.length > 20) {
        setErrorMsg(ucountry, "Too Long !");
        ureturnval = false;
    } else {
        setSuccessMsg(ucountry);
    }

    return returnval;
}

/* --- CHECKOUT FORM --- */
const fcName = document.getElementById("checkoutFirst");
const lcName = document.getElementById("checkoutLast");
const cEmail = document.getElementById("checkoutMail");
const cPhone = document.getElementById("checkoutPhone");
const cAddress = document.getElementById("checkoutAddress");
const cCity = document.getElementById("checkoutCity");
const cZip = document.getElementById("checkoutCode");
const cCountry = document.getElementById("checkoutCountry");

// Defining validateCheckout()

function validateCheckout() {
    const fcNameValue = fcName.value.trim();
    const lcNameValue = lcName.value.trim();
    const cEmailValue = cEmail.value.trim();
    const cPhoneValue = cPhone.value.trim();
    const cAddressValue = cAddress.value.trim();
    const cCityValue = cCity.value.trim();
    const cZipValue = cZip.value.trim();
    const cCountryValue = cCountry.value.trim();

    var returnval = true;
    if (fcNameValue.length == 0) {
        setErrorMsg(fcName, "First Name can not be empty!");
        returnval = false;
    } else if (fcNameValue.length < 3) {
        setErrorMsg(fcName, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(fcName);
    }

    if (lcNameValue.length == 0) {
        setErrorMsg(lcName, "Last Name can not be empty!");
        returnval = false;
    } else if (lcNameValue.length < 3) {
        setErrorMsg(lcName, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(lcName);
    }

    if (cEmailValue.length == 0) {
        setErrorMsg(cEmail, "E-mail can not be empty !");
        returnval = false;
    } else if (!isEmail(cEmailValue)) {
        setErrorMsg(cEmail, "Please enter valid email !");
        returnval = false;
    } else {
        setSuccessMsg(cEmail);
    }

    if (cPhoneValue.length == 0) {
        setErrorMsg(cPhone, "Phone Number Can not be empty !");
        returnval = false;
    } else if (cPhoneValue.length != 11) {
        setErrorMsg(cPhone, "Please enter valid number");
        returnval = false;
    } else if (!cPhoneValue.startsWith("0")) {
        setErrorMsg(cPhone, "Must starts with 0");
        returnval = false;
    } else {
        setSuccessMsg(cPhone);
    }

    if (cAddressValue.length == 0) {
        setErrorMsg(cAddress, "Address can not be empty !");
        returnval = false;
    } else if (cAddressValue.length < 20) {
        setErrorMsg(cAddress, "Too short address !");
        returnval = false;
    } else if (cAddressValue.length > 200) {
        setErrorMsg(cAddress, "Too Long address !");
        returnval = false;
    } else {
        setSuccessMsg(cAddress);
    }

    if (cCityValue.length == 0) {
        setErrorMsg(cCity, "This field can not be Empty !");
        returnval = false;
    } else if (cCityValue.length < 4 || cityValue.length > 20) {
        setErrorMsg(cCity, "Please enter a valid city name !");
        returnval = false;
    } else {
        setSuccessMsg(cCity);
    }

    if (cZipValue.length < 5 || cZipValue.length > 5) {
        setErrorMsg(cZip, "Please enter valid code !");
        returnval = false;
    } else {
        setSuccessMsg(cZip);
    }

    if (cCountryValue.length == 0) {
        setErrorMsg(cCountry, "City can not be Empty !");
        returnval = false;
    } else if (cCountryValue.length < 4) {
        setErrorMsg(cCountry, "Too short !");
        returnval = false;
    } else if (cCountryValue.length > 20) {
        setErrorMsg(cCountry, "Too Long !");
        returnval = false;
    } else {
        setSuccessMsg(cCountry);
    }

    // return returnval;
    return false;
}

/* --- CONTACT FORM --- */
const contactfName = document.getElementById("contactFirst");
const contactlName = document.getElementById("contactLast");
const contactMessage = document.getElementById("contactMessage");

// Defining validateContact()

function validateContact() {
    const contactfNameValue = contactfName.value.trim();
    const contactlNameValue = contactlName.value.trim();
    const contactMessageValue = contactMessage.value.trim();

    var returnval = true;
    if (contactfNameValue.length == 0) {
        setErrorMsg(contactfName, "First Name can not be empty!");
        returnval = false;
    } else if (contactfNameValue.length < 3) {
        setErrorMsg(contactfName, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(contactfName);
    }

    if (contactlNameValue.length == 0) {
        setErrorMsg(contactlName, "Last Name can not be empty!");
        returnval = false;
    } else if (contactlNameValue.length < 3) {
        setErrorMsg(contactlName, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(contactlName);
    }

    if (contactMessageValue.length == 0) {
        setErrorMsg(contactMessage, "Message can not be empty !");
        returnval = false;
    } else if (contactMessageValue.length < 20) {
        setErrorMsg(contactMessage, "Message should be at least 20 characters Long !");
        returnval = false;
    } else {
        setSuccessMsg(contactMessage);
    }

    return returnval;
    // return false;
}


// ADD / UPDATE PRODUCT
const pname = document.getElementById("pname");
const price = document.getElementById("price");
const saleprice = document.getElementById("sale-price");
const Sdescrip = document.getElementById("S-descrip");
const Ldescrip = document.getElementById("L-descrip");

// Defining validateProduct()

function validateProduct() {
    const pnameValue = pname.value.trim();
    const priceValue = price.value.trim();
    const salepriceValue = saleprice.value.trim();
    const SdescripValue = Sdescrip.value.trim();
    const LdescripValue = Ldescrip.value.trim();

    var returnval = true;
    if (pnameValue.length == 0) {
        setErrorMsg(pname, "Product Name can not be empty !");
        returnval = false;
    } else if (pnameValue.length < 3) {
        setErrorMsg(pname, "Too short !");
        returnval = false;
    } else {
        setSuccessMsg(pname);
    }


    if (priceValue == 0) {
        setErrorMsg(price, "Price can not be zero !");
        returnval = false;
    } else if (priceValue < 0) {
        setErrorMsg(price, "Price can not be in negative value !");
        returnval = false;
    } else {
        setSuccessMsg(price);
    }

    if (salepriceValue > priceValue) {
        setErrorMsg(saleprice, "Sale price should be less than original Price !");
        returnval = false;
    } else if (salepriceValue < 0) {
        setErrorMsg(saleprice, "Sale Price can not be in negative value !");
        returnval = false;
    } else {
        setSuccessMsg(saleprice);
    }
    

    if (SdescripValue.length == 0) {
        setErrorMsg(Sdescrip, "Description can not be empty !");
        returnval = false;
    } else if (SdescripValue.length > 50) {
        setErrorMsg(Sdescrip, "Length of Short Description should be less than 50 !");
        returnval = false;
    } else {
        setSuccessMsg(Sdescrip);
    }

    if (LdescripValue.length == 0) {
        setErrorMsg(Ldescrip, "Description can not be empty !");
        returnval = false;
    } else if (LdescripValue.length < 60) {
        setErrorMsg(Ldescrip, "Please enter LONG Description !");
        returnval = false;
    } else {
        setSuccessMsg(Ldescrip);
    }

    return returnval;
}


// FUNCTIONS

function isEmail(emailvalue) {
    if (emailvalue == "") {
        return false;
    }
    var atIndex = emailvalue.indexOf('@');
    if (atIndex < 1) {
        return false;
    }
    var dotIndex = emailvalue.lastIndexOf('.');
    if (dotIndex <= atIndex + 2) {
        return false;
    }
    if (dotIndex == emailvalue.length - 1) {
        return false;
    }
    return true;
}


function setErrorMsg(input, errormsg) {
    const parent = input.parentElement;
    const small = parent.querySelector('small');
    parent.classList.add("error");
    if (parent.classList.contains("success")) {
        parent.classList.remove("success");
    }
    small.innerText = errormsg;
}

function setSuccessMsg(input) {
    const parent = input.parentElement;
    parent.classList.add("success");
    if (parent.classList.contains("error")) {
        parent.classList.remove("error");
    }
    const small = parent.querySelector('small');
    small.innerHTML = " ";
}