// Function to validate the password
        function loadIncharge() {
            const correctPassword = "stu"; // Define the correct password
            const enteredPassword = prompt("Please enter the password:"); // Prompt the user for the password
            
            // Check if the password matches
            if (enteredPassword === correctPassword) {
                // Redirect to the INCHARGE page
                location.href = "lab_class_update/index.html";
            } else {
                // Show an alert and redirect to the home page
                alert("Incorrect password! Redirecting to the home page.");
                location.href = "index.html"; 
            }
        }
