function toggleTaskEdit() {
    console.log("toggle");
    
    var viewElements = document.getElementsByClassName("view-task-mode");
    var createElements = document.getElementsByClassName("edit-task-mode");

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