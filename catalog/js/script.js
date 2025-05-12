/* Button pop*/
document.querySelectorAll('.addcart input[type="submit"]').forEach((button) => {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    this.classList.remove("clicked");
    void this.offsetWidth;
    this.classList.add("clicked");
  });
});

function redirect() {
  window.location.href = "create-account.php";
}

//Account page
userName = document.getElementById("createusername");
userPass = document.getElementById("createpassword");
userPass2 = document.getElementById("createpassword2");
userName.addEventListener("keyup", realTimeValidation);
userPass.addEventListener("keyup", realTimeValidation);
userPass2.addEventListener("keyup", realTimeValidation);

let regex1 = new RegExp("^.{8,}$");
let regex2 = new RegExp("^.*\\d.*$");

function realTimeValidation() {
  if (
    userName.value != "" &&
    userPass.value != "" &&
    userPass2.value != "" &&
    userPass.value == userPass2.value &&
    regex1.test(userPass.value) &&
    regex2.test(userPass.value)
  ) {
    document.getElementById("submit").removeAttribute("disabled");
  } else {
    document.getElementById("submit").setAttribute("disabled", "");
  }

  // passwords match
  if (userPass.value != userPass2.value || userPass.value == "") {
    document.getElementById("errorfield").textContent =
      "Please make sure both password fields are identical. ";
  } else document.getElementById("errorfield").textContent = "";

  // 8 char long
  if (!regex1.test(userPass.value)) {
    document.getElementById("errorfield2").textContent =
      "Password must be at least 8 characters long. ";
  } else document.getElementById("errorfield2").textContent = "";

  // 1 number
  if (!regex2.test(userPass.value)) {
    document.getElementById("errorfield3").textContent =
      "Password must include at least 1 number. ";
  } else document.getElementById("errorfield3").textContent = "";
}

function clearSuggestion() {
  let textarea = document.getElementById("suggestion");
  textarea.value =
    "Thanks for the whiz-bang suggestion — the ACME labs are already strapping it to a rocket for immediate testing!";
}
