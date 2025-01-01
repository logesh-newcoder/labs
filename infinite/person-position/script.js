// To show the specified person enter the person action part is work
var id = document.querySelector("#id"); 
var li = document.querySelector(".labs");

// Check if the password matches and the part is execute
if (id && (id.value === "101" || id.value === "102")) {
    li.style.display = "none"; 
}


// Function to validate the password
function loadIncharge() {
    // Define the correct password
    const correctPassword = "labsaccess"; 

    // Prompt the user for the password
    const enteredPassword = prompt("Please enter the password:"); 
    
    // Check if the password matches
    if (enteredPassword === correctPassword) {
        
        // Redirect to the INCHARGE page
        location.href = "lab_class_update/index.html";
    } else {
        
        // Show an alert and redirect to the home page
        alert("Incorrect password! Redirecting to the home page.");
        location.href = "index.php"; 
    }
}