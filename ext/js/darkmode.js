
window.onload = () => {
    let theme = sessionStorage.getItem("theme")
    if (theme !== null) {
        document.body.classList.toggle(theme)
    } else {
        document.body.classList.toggle("lightmode")
    }

    document.querySelector("#darktheme").addEventListener("click", (e) => {
        let element = document.body;
        element.className = ""
        element.classList.toggle("darkmode");
        sessionStorage.setItem("theme","darkmode")
    })

    document.querySelector("#whitetheme").addEventListener("click", (e) => {
        let element = document.body;
        element.className = ""
        element.classList.toggle("lightmode");
        sessionStorage.setItem("theme", "lightmode")
    })


    document.querySelector("#bluetheme").addEventListener("click", (e) => {
        let element = document.body;
        element.className = ""
        element.classList.toggle("bluemode");
        sessionStorage.setItem("theme", "bluemode")
    })

}
