const createStudent = document.getElementById("create-student");
const message = document.getElementById("message");

let folio, nombre, curp;

createStudent.addEventListener("submit", async (event) => {
    event.preventDefault();

    try {
        let nombre = document.getElementById("nombre").value;
        let folio = document.getElementById("folio").value.toUpperCase();
        let curp = document.getElementById("curp").value.toUpperCase();

        if (!isAlpha(nombre)) {
            showWarningNotification("El nombre del alumno solo puede contener letras, favor de revisarlo.")
            return false;
        }

        if (!isFolio(folio)) {
            showWarningNotification("El folio ingresado no es valido, favor de revisarlo.")
            return false;
        }

        if (!isCURP(curp)) {
            showWarningNotification("El CURP ingresado no es valido, favor de revisarlo.")
            return false;
        }

        // const url = "/sige/controllers/admin/create_student.php";
        const url = "../../controllers/admin/create_student.php";

        const data = {
            nombre: nombre,
            folio: folio,
            curp: curp,
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
            // La inserción se realizó correctamente
            showSuccessNotification(request.message);
            location.reload();
        } else {
            // La inserción se realizó incorrectamente
            showErrorNotification(request.message)
        }

    } catch (error) {
        showErrorNotification(error)
        console.log(error);
    }
});