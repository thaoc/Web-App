// Get the elements with class="column"
var elements = document.getElementsByClassName("column2");

// Declare a loop variable
var i;

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
} 

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

