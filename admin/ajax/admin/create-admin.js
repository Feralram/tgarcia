const createAdmin = document.getElementById("create-admin")
let message = document.getElementById("message")

createAdmin.addEventListener("submit", async (event) => {
    event.preventDefault();
    try {
        let name      = document.getElementById("name").value;
        let email     = document.getElementById("email").value;
        let password  = document.getElementById("password").value;
        let repeat    = document.getElementById("repeat").value;
        if (validation(name, email, password, repeat)) {
            // const url = "/sige/controllers/admin/create_admin.php"
            const url = "../../controllers/admin/create_admin.php"

            const data = {
                name: name,
                email: email,
                password: password
            }

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })

            const request = await response.json()
            if (request.success) {
                showSuccessNotification(request.message)
            } else {
                showErrorNotification(request.message)
            }
        }
    } catch (error) {
        showErrorNotification(error)
    }
})

function validation(name, email, password, repeat){

    if (!isAlpha(name)) {
        showWarningNotification("El nombre del administrador solo puede contener letras.")
        return false
    }

    if (!isEmail(email)) {
        showWarningNotification("El correo electrónico no cumple con los requisitos necesarios para ser considerado válido.")
        return false
    }

    if (!passwordSecure(password)) {
        showWarningNotification("La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y una longitud minima de 8 caracteres. Por favor, inténtelo de nuevo con una contraseña más segura.")
        return false
    }

    if (!passwordConfirm(password, repeat)) {
        showWarningNotification("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.")
        return false
    }

    return true;
}