function toggleEditMode_Emp(taskId) {
    console.log("toggle");
    
    // var viewElements = document.getElementsByClassName("view-edit-mode");
    // var editElements = document.getElementsByClassName("edit-mode");

    var viewElements = document.querySelectorAll('[data-task-id="' + taskId + '"].view-edit-mode');
    var editElements = document.querySelectorAll('[data-task-id="' + taskId + '"].edit-mode');

    for (var i = 0; i < viewElements.length; i++) {
        viewElements[i].style.display = viewElements[i].style.display === "none" ? "block" : "none";
    }

    for (var j = 0; j < editElements.length; j++) {
        if (editElements[j].style.display == "block") {
            editElements[j].style.display = "none";
        } else if (editElements[j].style.display == "none" || " ") {
            editElements[j].style.display = "block";
        }

        // editElements[j].style.display = editElements[j].style.display === "none" ? " " : "block";
    }
}

function toggleCreateMode_Emp(taskId) {
    console.log("toggle");
    
    // var viewElements = document.getElementsByClassName("view-create-mode");
    // var createElements = document.getElementsByClassName("create-mode");

    var viewElements = document.querySelectorAll('[data-task-id="' + taskId + '"].view-create-mode');
    var createElements = document.querySelectorAll('[data-task-id="' + taskId + '"].create-mode');

    for (var i = 0; i < viewElements.length; i++) {
        viewElements[i].style.display = viewElements[i].style.display === "none" ? "block" : "none";
    }

    for (var j = 0; j < createElements.length; j++) {
        if (createElements[j].style.display == "block") {
            createElements[j].style.display = "none";
        } else if (createElements[j].style.display == "none" || " ") {
            createElements[j].style.display = "block";
        }

        // editElements[j].style.display = editElements[j].style.display === "none" ? " " : "block";
    }
}

function confirmNavigation(event) {
    // Display the confirm dialog box
    const userConfirmed = confirm("Are you sure you want to delete this user?");
    
    // If the user clicks "Cancel," prevent the default action (navigation)
    if (!userConfirmed) {
      event.preventDefault();
    }

    // Return the user's choice
    return userConfirmed;
  }