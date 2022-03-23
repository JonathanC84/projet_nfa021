window.openBurger = openBurger;
window.closeBurger = closeBurger;

function openBurger() {
    document.getElementById("burger-menu").style.height = "100%";
  }
  
  function closeBurger() {
    document.getElementById("burger-menu").style.height = "0%";
  }