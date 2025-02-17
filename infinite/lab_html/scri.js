// selected button in html to work a set of action
let submitButton = document.querySelector("#sub");
let deleteButton = document.querySelector("#del");
submitButton.style.display = "none";
deleteButton.style.display = "none";

// select the input tags in html page for a set for work
let selectedClassInput = document.querySelector("#classname");
let classIdInput = document.querySelector("#classid");
let selectUpdate = document.querySelector("#classupdate");
let infoTextarea = document.querySelector("#show");

// Define correct password once
const correctPassword = "labaccess"; 

// Function to display class information when a class is selected
function showInfo(className, item) {
    
    deleteButton.style.display = "block";    
    // Set class name is show in the input fields
    selectedClassInput.value = item.textContent;

    // Get class date, class id and content from the PHP table structure
    let classInfoElement = document.getElementById(className);

    // the class id for the update process in php
    let classId = classInfoElement.previousElementSibling.textContent.trim();
    classIdInput.value = classId;
    
    // the class last update date is show in the respective input field
    let classDate =classInfoElement.nextElementSibling.textContent.trim();
    selectUpdate.value = classDate;
    
    // the class assign work and is show in the respective textarea field
    infoTextarea.value = classInfoElement.textContent;
}

function disableAllButtons() {
    let buttons = document.querySelectorAll("button");
    buttons.forEach(button => {
        button.disabled = true;
    });

    // delete button is show when the fuction is work
    submitButton.disabled=false;
    submitButton.style.display = "block";

}

// Function to handle the delete action
function deleteInfo() {

    // to get a password from user to access to write new information
    let password = prompt("Please enter the password:");
    if (password === correctPassword) {

        disableAllButtons();
        // delete button is hide and the submit button is show when the fuction is work
        deleteButton.style.display = "none";
        submitButton.style.display = "block";

        // Enable the textarea for editing
        infoTextarea.removeAttribute("readonly");
    } 
    else {
        alert("Incorrect password");
    }
}
