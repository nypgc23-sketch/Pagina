document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    const colaboradorId = params.get("colaborador");

    const fichas = document.querySelectorAll(".colaborador-card");

    // Si hay colaborador seleccionado, mostrar solo esa ficha
    if (colaboradorId) {
        fichas.forEach(ficha => ficha.style.display = "none");
        const seleccionado = document.getElementById(colaboradorId);

        if (seleccionado) {
            seleccionado.style.display = "block";
        } else {
            mostrarTodos(); // si el ID no existe, mostrar todos
        }
    } else {
        mostrarTodos(); // si no hay parámetro, mostrar todos
    }

    // Función: muestra todas las fichas
    function mostrarTodos() {
        fichas.forEach(ficha => ficha.style.display = "block");
    }
});
if (colaboradorId) {
    const contenedor = document.querySelector(".colaboradores-container");
    const boton = document.createElement("button");
    boton.textContent = "← Ver todos los colaboradores";
    boton.classList.add("btn-volver");
    boton.onclick = () => window.location.href = "Colaboradores.html";
    contenedor.prepend(boton);
}
