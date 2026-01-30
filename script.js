document.addEventListener("DOMContentLoaded", function () {
    const botones = document.querySelectorAll(".maestro-btn");

    botones.forEach(button => {
        button.addEventListener("click", () => {
            const contenido = button.nextElementSibling;
            const isActive = contenido.style.display === "block";

            // Cierra todos los demás
            document.querySelectorAll(".contenido").forEach(c => c.style.display = "none");

            // Alterna el actual
            contenido.style.display = isActive ? "none" : "block";
        });
    });
});

