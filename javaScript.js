document.getElementById("logo1").addEventListener("click", function () {
  var nav = document.getElementById("nav");
  if (nav.style.display === "none" || nav.style.display === "") {
    nav.style.display = "block";
  } else {
    nav.style.display = "none";
  }
});
