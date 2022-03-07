window.onload = () => {
    let dropDown = document.querySelector("#dropup");
    let dropDownDiv = document.querySelector(".dropdown");
    dropDown.addEventListener("click", function () {
        dropDownDiv.classList.toggle('show-menu');
    });
}