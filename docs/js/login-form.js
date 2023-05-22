let passShowHide = document.getElementById("pass-show-hide");
let passInput = document.getElementById("password");

passShowHide.addEventListener("click", function (event) {
  event.preventDefault();

  if (passInput.getAttribute("type") == "password") {
    passInput.setAttribute("type", "text");
    passShowHide.setAttribute("name", "eye-outline");
  } else {
    passInput.setAttribute("type", "password");
    passShowHide.setAttribute("name", "eye-off-outline");
  }
});
