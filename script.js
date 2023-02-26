// DROPDOWN SIDEBAR
var dropdown = document.getElementsByClassName("drop-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
   dropdown[i].addEventListener("click", function () {
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
         dropdownContent.style.display = "none";
      } else {
         dropdownContent.style.display = "block";
      }
   });
}// END DROPDOWN


// MODAL1
var modal1 = document.getElementById("modal1");
var btn1 = document.getElementById("sar-btn1");
var span1 = document.getElementById("kntl1");
btn1.onclick = function() {
  modal1.style.display = "block";
  console.log("tombol clikced");
}
span1.onclick = function() {
  modal1.style.display = "none";
  console.log("close clicked");
}
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
    console.log("body clicked");
  }
} //END MODAL1

// MODAL2
var modal2 = document.getElementById("modal2");
var btn2 = document.getElementById("sar-btn2");
var span2 = document.getElementById("kntl2");
btn2.onclick = function() {
  modal2.style.display = "block";
  console.log("tombol clikced");
}
span2.onclick = function() {
  modal2.style.display = "none";
  console.log("close clicked");
}
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
    console.log("body clicked");
  }
} //END MODAL2