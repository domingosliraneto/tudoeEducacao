function showElementOnChecked(clickedElement, element) {
    if (clickedElement.checked) {
        document.getElementById(element).style.display = "block";
    } else {
        document.getElementById(element).style.display = "none";
    }


}
