const createEscolar = document.getElementById("create-personal");

createEscolar.addEventListener("submit", async (event) => {
    event.preventDefault();
    try {
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let jobTitle = document.getElementById("jobTitle").value;
        let rfc = document.getElementById("rfc").value.toUpperCase();
        let password = document.getElementById("password").value;
        let repeat = document.getElementById("repeat").value;

        validate = validation(name, email, password, repeat, jobTitle, rfc);
        if (validate) {
            const url = "../../controllers/admin/create_escolar.php"
            // const url = "/sige/controllers/admin/create_escolar.php"

            const data = {
                name: name,
                email: email,
                password: password,
                jobTitle: jobTitle,
                rfc: rfc
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
        showErrorNotification(error);
    }
})

function validation(name, email, password, repeat, jobTitle, rfc) {

    if (!isAlpha(name)) {
        showWarningNotification(`El nombre del ${jobTitle} solo puede contener letras.`)
        return false;
    }

    if (!isEmail(email)) {
        showWarningNotification("El correo electrónico no cumple con los requisitos necesarios para ser considerado válido.")
        return false;
    }

    if (!isAlpha(jobTitle)) {
        showWarningNotification("El puesto de trabajo solo puede contener letras. Por favor, inténtelo de nuevo.")
        return false;
    }

    if (!isRFC(rfc)) {
        showWarningNotification("El RFC ingresado no cumple con los requisitos necesarios para ser considerado válido. Por favor, inténtelo de nuevo.")
        return false;
    }
    if (!passwordSecure(password)) {
        showWarningNotification("La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un número y una longitud minima de 8 caracteres. Por favor, inténtelo de nuevo con una contraseña más segura.")
        return false;
    }

    if (!passwordConfirm(password, repeat)) {
        showWarningNotification("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.")
        return false;
    }

    return true;
}