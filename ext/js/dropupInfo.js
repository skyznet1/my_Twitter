function showCompteInfo() {
    let monCompte = document.getElementById('monCompte')
    let monCompteInfo = document.getElementById('monCompteInfo')


    monCompte.addEventListener("click", function () {
        monCompte.classList.toggle('d-none')
        monCompteInfo.classList.toggle('d-block')
    })
}


function showColor() {
    let monCompte = document.getElementById('monCompte')
    let changeTheme = document.getElementById('changeTheme')

    monCompte.classList.toggle('d-none')
    changeTheme.classList.toggle('d-block')
}




