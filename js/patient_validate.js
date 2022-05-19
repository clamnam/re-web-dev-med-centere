/**
 * Get input fields
 */
let submitBtn = document.getElementById('submit_btn');
let nameInput = document.getElementById('name');
let addressInput = document.getElementById('address');
let phoneInput = document.getElementById('phone');
let emailInput = document.getElementById('email');
let dobInput = document.getElementById('dob');
let centreInput = document.getElementById('centre');
let insuranceInput = document.getElementsByName('insurance');
let preferenceInput = document.getElementsByClassName('preference');

/**
 * Get error divs by id
 */
let nameError = document.getElementById('name_error');
let addressError = document.getElementById('address_error');
let phoneError = document.getElementById('phone_error');
let emailError = document.getElementById('email_error');
let dobError = document.getElementById('dob_error');
let centreError = document.getElementById('centre_error');
let insuranceError = document.getElementsByClassName('insurance_error');
let preferenceError = document.getElementsByClassName('preference_error');
submitBtn.addEventListener('click', onSubmitForm);

/**
 * Regex
 */
const NAME_REGEX = /^[a-zA-Z-' ]*$/;
const ADDRESS_REGEX = /^[0-9a-zA-Z-', ]*$/;
const PHONE_REGEX = /^\(?\s*\d{1,4}\s*\)?\s*[\d\s]{5,10}$/;
const EMAIL_REGEX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const DATE_REGEX = /^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;
const TEXT_REGEX = /^[a-zA-Z-' ]*$/;
const TEXTNUM_REGEX = /^[0-9a-zA-Z-', ]*$/;




let errorExists = false;

function showError(errorField, errorMessage) {
    errorExists = true;
    errorField.innerHTML = errorMessage;
}

function regexValid(regex, str) {
    return regex.test(str)
}

function isSelected(inputField) {
	let selected = false;
	for (let i = 0; i != inputField.length; i++) {
		if (!inputField[i].checked) {
			selected = true;
			break;
		}
	}
	return selected;
}
function resetValues() {
	nameError.innerHTML = "";
	addressError.innerHTML = "";
	phoneError.innerHTML = "";
	emailError.innerHTML = "";
	dobError.innerHTML = "";
	centreError.innerHTML = "";
	insuranceError.innerHTML = "";
	preferenceError.innerHTML = "";
	errorExists = false;
}

function onSubmitForm(evt) {
    resetValues();

	/*
	 *Validate Name
	 */
	if (nameInput.value === "") {
		showError(nameError, "The name field is required. js");
	} else if (!regexValid(NAME_REGEX, nameInput.value)) {
		showError(nameError,"only letters and spaces are allowed. js");
	}
	/*
	 *Validate address
	 */
	if (addressInput.value === "") {
		showError(addressError, "The address field is required. js");
	} else if (!regexValid(ADDRESS_REGEX, addressInput.value)) {
		showError(addressError, "invalid format. js");
	}

	/*
	 *Validate phone
	 */
	if (phoneInput.value === "") {
		showError(phoneError, "The phone field is required js");
	} else if (!regexValid(PHONE_REGEX, phoneInput.value)) {
		showError(phoneError, "invalid format. js");
	}

	/*
	 *Validate email
	 */
	if (emailInput.value === "") {
		showError(emailError, "The email field is requiredjs");
	} else if (!regexValid(EMAIL_REGEX, emailInput.value)) {
		showError(emailError, "only letters and spaces are allowed.js");
	}

	/*
	 *Validate dob
	 */
	if (dobInput.value === "") {
		showError(dobError, "The date of birth field is requiredjs");
	} else if (!regexValid(DATE_REGEX, dobInput.value)) {
		showError(dobError, "only letters and spaces are allowed.js");
	}

	/*
	 *Validate centre
	 */
	if (centreInput.value === "") {
		showError(centreError, "The centre field is requiredjs");
	} else if (!regexValid(TEXTNUM_REGEX, centreInput.value)) {
		showError(centreError, "only letters and spaces are allowed.jsjs");
	}
	/*
	 *Validate insurance
	 */

	if (!isSelected(insuranceInput)) {
		showError(insuranceError, "The insurance field is required.js");
	} else if (!regexValid(TEXT_REGEX, insuranceInput.value)) {
		showError(insuranceError, "only letters and spaces are allowed.js");
	}
	/*
	 *Validate preference
	 */
	if (!isSelected(preferenceInput)) {
		showError(preferenceError, "The preference field is required. js");
	} else if (!regexValid(TEXT_REGEX, preferenceInput.value)) {
		showError(preferenceError, "only letters and spaces are allowed. js");
	}

	if (errorExists) {
		evt.preventDefault();
	}
}

