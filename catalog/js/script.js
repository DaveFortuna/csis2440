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
