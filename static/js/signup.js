// Select elements from the DOM
const indicator = document.getElementById("indicator"); // Container for password strength indicator
const input = document.getElementById("password"); // Password input field
const weak = indicator.querySelector(".weak"); // Weak password indicator
const medium = indicator.querySelector(".medium"); // Medium password indicator
const strong = indicator.querySelector(".strong"); // Strong password indicator
const text = document.getElementById("text"); // Password strength text
const showBtn = document.getElementById("showBtn"); // Show/hide password button
const regExpWeak = /[a-z]/; // Regular expression for weak password (contains at least one lowercase letter)
const regExpMedium = /\d+/; // Regular expression for medium password (contains at least one digit)
const regExpStrong = /.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/; // Regular expression for strong password (contains at least one special character)
const confirmPasswordInput = document.getElementById("reenter-password"); // Confirm password input field
const passwordError = document.getElementById("password-error"); // Error message for password mismatch

/**
 * Function to check the strength of the password and update the password strength indicator
 */
function checkPasswordStrength() {
  let no = 0; // Password strength indicator (1: weak, 2: medium, 3: strong)

  // Check if password is not empty
  if (input.value != "") {
    indicator.style.display = "flex"; // Show password strength indicator

    // Check if password meets the requirements for each strength level
    if (input.value.length <= 3 && (input.value.match(regExpWeak) || input.value.match(regExpMedium) || input.value.match(regExpStrong))) no = 1;
    if (input.value.length >= 6 && ((input.value.match(regExpWeak) && input.value.match(regExpMedium)) || (input.value.match(regExpMedium) && input.value.match(regExpStrong)) || (input.value.match(regExpWeak) && input.value.match(regExpStrong)))) no = 2;
    if (input.value.length >= 6 && input.value.match(regExpWeak) && input.value.match(regExpMedium) && input.value.match(regExpStrong)) no = 3;

    // Update the password strength indicator
    if (no == 1) {
      weak.classList.add("active"); // Weak password
      text.style.display = "block";
      text.textContent = "Your password is too weak";
      text.classList.add("weak");
    }
    if (no == 2) {
      medium.classList.add("active"); // Medium password
      text.textContent = "Your password is medium";
      text.classList.add("medium");
    } else {
      medium.classList.remove("active");
      text.classList.remove("medium");
    }
    if (no == 3) {
      weak.classList.add("active");
      medium.classList.add("active");
      strong.classList.add("active");
      text.textContent = "Your password is strong";
      text.classList.add("strong");
    } else {
      strong.classList.remove("active");
      text.classList.remove("strong");
    }

    showBtn.style.display = "block"; // Show show/hide password button
    showBtn.onclick = function () {
      if (input.type == "password") {
        input.type = "text"; // Show password
        showBtn.textContent = "HIDE";
        showBtn.style.color = "#23ad5c";
      } else {
        input.type = "password"; // Hide password
        showBtn.textContent = "SHOW";
        showBtn.style.color = "#000";
      }
    }
  } else {
    indicator.style.display = "none"; // Hide password strength indicator
    text.style.display = "none";
    showBtn.style.display = "none";
  }
}

/**
 * Function to check if the confirm password matches the entered password
 */
function checkPasswordMatch() {
  if (confirmPasswordInput.value !== input.value) {
    passwordError.style.display = "block"; // Show error message for password mismatch
  } else {
    passwordError.style.display = "none";
  }
}

