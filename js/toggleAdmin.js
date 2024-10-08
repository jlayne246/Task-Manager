function toggleEditMode() {
    console.log("toggle");
    
    var viewElements = document.getElementsByClassName("view-mode");
    var editElements = document.getElementsByClassName("edit-mode");

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