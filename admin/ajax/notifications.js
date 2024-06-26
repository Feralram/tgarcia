function showNotification(type, message) {
    // Obtiene el div de notificaciones
    const container = document.getElementById("notifications");

    clean()

    // Obtiene el temporizador de la primera notificación
    const firstTimer = container.timer;
    // Detiene el temporizador de la primera notificación
    if (firstTimer) {
        clearTimeout(firstTimer);
    }
    // Agrega la clase del tipo de notificación
    container.classList.add(type);

    // Establece el mensaje de la notificación
    const notificationBody = container.querySelector("strong");
    notificationBody.textContent = message;

    // Esconde la notificación después de 5 segundos
    setTimeout(() => {
        container.classList.add("hide");
    }, 5000);

}

function clean() {
    const container = document.getElementById("notifications");
    // Elimina la clase hide del contenedor
    container?.classList.remove("hide");

    // Elimina la clase del tipo de notificación del contenedor
    container?.classList.remove("alert-warning");
    container?.classList.remove("alert-info");
    container?.classList.remove("alert-danger");
    container?.classList.remove("alert-success");

    // Elimina el mensaje de la notificación
    const notificationBody = container?.querySelector("strong");
    notificationBody.textContent = "";
    // checa = clearTimeout(container)
    // console.log("funcion clean: ", checa)
}

// Muestra una notificación de éxito
function showSuccessNotification(message) {
    showNotification("alert-success", message);
}

// Muestra una notificación de error
function showErrorNotification(message) {
    showNotification("alert-danger", message);
}

// Muestra una notificación de información
function showInfoNotification(message) {
    showNotification("alert-info", message);
}

// Muestra una notificación de advertencia
function showWarningNotification(message) {
    showNotification("alert-warning", message);
}