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

/************************************************
 * The following styles are for the modal windows
 *
 * TODO: This is currently not working or does, but only opens on click
 ***********************************************/
// Get the modal
var modal = document.getElementById('successModal');

// Get the button that opens the modal
var btn = document.getElementById("successBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// Database query helper functions
// TODO: This uses AJAX and there might be a better way using pure PHP
//====================================================
function getRowID (tableName){
  rowID = '';



  return rowID;
}
//====================================================

function variableRedirect(pageName) {

  location.href = pageName;
}
