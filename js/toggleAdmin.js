function toggleEditMode(userId) {
    console.log("toggle");
    
    var viewElements = document.querySelectorAll('[data-user-id="' + userId + '"].view-mode');

    var editElements = document.querySelectorAll('[data-user-id="' + userId + '"].edit-mode');


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

function toggleCreateMode() {
    console.log("toggle");
    
    var viewElements = document.getElementsByClassName("view-btn-mode");
    var createElements = document.getElementsByClassName("create-mode");

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