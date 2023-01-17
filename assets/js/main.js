let wrapper = document.getElementById("wrapper");
let menuButton = document.getElementById("menu-toggle");
menuButton.onclick = function () {
    wrapper.classList.toggle("toggled");
};
