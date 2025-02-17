// To show the specified person enter the person action part is work
var id = document.querySelector("#id"); 
var li = document.querySelector(".labs");

// Check if the password matches and the part is execute
if (id && (id.value === "kasc@101" || id.value === "kasc@102")) {
li.style.display = "none"; 
}

function loadIncharge() {
// Define the correct password
const correctPassword = "labs"; 

// Prompt the user for the password
const enteredPassword = prompt("Please enter the password:"); 

if (enteredPassword === correctPassword) {
    // Redirect to the INCHARGE page
    location.href = "classtable.html";
} else {
    // Show an alert and redirect to the home page
    alert("Incorrect password! Redirecting to the home page.");
    location.href = "index.php";
}
}
