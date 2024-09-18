document.addEventListener("DOMContentLoaded", function() {
    const nav = document.querySelector("nav");
    const navToggle = document.createElement("div");
    navToggle.classList.add("nav-toggle");
    navToggle.innerHTML = "☰";
    nav.appendChild(navToggle);

    const navLinks = document.getElementById("nav-links");

    // Toggle function for showing/hiding the nav-right items
    navToggle.addEventListener("click", function() {
        if (navLinks.style.display === "flex" || navLinks.style.display === "") {
            navLinks.style.display = "none";
        } else {
            navLinks.style.display = "flex";
        }
    });

    window.addEventListener("resize", function() {
        if (window.innerWidth > 768) {
            navLinks.style.display = "flex"; 
        } else {
            navLinks.style.display = "none";
        }
    });
});
