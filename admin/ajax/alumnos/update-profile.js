const updateStudent = document.getElementById("update-profile");
const birthDate = document.getElementById("birthdayStudent");
const entity = document.getElementById("entidaddenacimiento");
const parentEntity = document.getElementById("tentidaddenacimiento");
const checkAddress = document.getElementById("checkAddress");
const isIndigenous = document.getElementById("isIndigenous");

birthDate.addEventListener("input", (event) => {
    let date = new Date(birthDate.value + 'T00:00:00');
    if (date) {
        const { edad, meses } = calcularEdadYMeses(date);
        if (isNaN(edad) || isNaN(meses)) {
            document.getElementById("edad").value = 0;
            document.getElementById("meses").value = 0;
            return;
        }
        document.getElementById("edad").value = edad;
        document.getElementById("meses").value = meses;
    }
})

function calcularEdadYMeses(date) {
    const nacimiento = new Date(date);
    const fechaActual = new Date();

    const yearsDiff = fechaActual.getFullYear() - nacimiento.getFullYear();
    const monthsDiff = fechaActual.getMonth() - nacimiento.getMonth();
    const daysDiff = fechaActual.getDate() - nacimiento.getDate();

    let age = yearsDiff;
    let months = monthsDiff;

    if (monthsDiff < 0 || (monthsDiff === 0 && daysDiff < 0)) {
        age--;
        months += 11;
    }

    return {
        edad: age,
        meses: months,
    };
}

entity.addEventListener("input", (event) => {
    let entityValue = document.getElementById("entidaddenacimiento").value;
    if (entityValue != "Otro") {
        document.getElementById("nacionalidad").value = "Mexicana";
    } else {
        document.getElementById("nacionalidad").value = "";
    }
})

parentEntity.addEventListener("input", (event) => {
    let parentEntityValue = document.getElementById("tentidaddenacimiento").value;
    if (parentEntityValue != "Otro") {
        document.getElementById("tnacionalidad").value = "Mexicana";
    } else {
        document.getElementById("tnacionalidad").value = "";
    }
})

//Checkbox que muestra y oculta el input de la dirección del tutor para usar la misma dirección que el alumno
checkAddress.addEventListener("change", (event) => {
    if (checkAddress.checked) {
        document.getElementById("parentAddress").classList.add("hidden");
        sameAddress();
    } else {
        document.getElementById("parentAddress").classList.remove("hidden");
        sameAddress();
    }
})

function sameAddress() {
    let suburb = document.getElementById("domicilio4").value;
    let zipCode = document.getElementById("domicilio5").value;
    let locality = document.getElementById("domicilio6").value;
    let municipality = document.getElementById("domicilio7").value;
    let state = document.getElementById("domicilio8").value;
    let reference = document.getElementById("domicilio9").value;
    if (checkAddress.checked) {
        document.getElementById("tdomicilio1").value = suburb;
        document.getElementById("tdomicilio2").value = zipCode;
        document.getElementById("tdomicilio3").value = locality;
        document.getElementById("tdomicilio4").value = municipality;
        document.getElementById("tdomicilio5").value = state;
        document.getElementById("tdomicilio6").value = reference;
    } else {
        document.getElementById("tdomicilio1").value = "";
        document.getElementById("tdomicilio2").value = "";
        document.getElementById("tdomicilio3").value = "";
        document.getElementById("tdomicilio4").value = "";
        document.getElementById("tdomicilio5").value = "";
        document.getElementById("tdomicilio6").value = "";
    }
}

isIndigenous.addEventListener("change", (event) => {
    if (event.target.value === "No") {
        document.getElementById("indigenousGroup").classList.add("hidden");
        document.getElementById("tgrupoindigena").value = "Ninguno";
    } else {
        document.getElementById("indigenousGroup").classList.remove("hidden");
        document.getElementById("tgrupoindigena").value = "";
    }
})

function validation(studentData, parentData) {
    try {
        

        return true;
    } catch (error) {
        console.log("algo salió mal ",error);
    }
}

updateStudent.addEventListener("submit", async (e) => {
    e.preventDefault();
    try {
        sameAddress();
        let studentData = {
            bDate: document.getElementById("birthdayStudent").value,
            age: document.getElementById("edad").value,
            months: document.getElementById("meses").value,
            weight: document.getElementById("peso").value,
            glasses: document.getElementById("lentes").value,
            record: document.getElementById("cartilla").value,
            vaccines: document.getElementById("vacunas").value,
            orthopedic: document.getElementById("ortopedico").value,
            sex: document.getElementById("sexo").value,
            entity: document.getElementById("entidaddenacimiento").value,
            nationality: document.getElementById("nacionalidad").value,
            street: document.getElementById("domicilio1").value,
            other: document.getElementById("domicilio2").value,
            another: document.getElementById("domicilio3").value,
            suburb: document.getElementById("domicilio4").value,
            zipCode: document.getElementById("domicilio5").value,
            locality: document.getElementById("domicilio6").value,
            municipality: document.getElementById("domicilio7").value,
            state: document.getElementById("domicilio8").value,
            reference: document.getElementById("domicilio9").value,
            phone: document.getElementById("telefono").value,
            email: document.getElementById("correoelectronico").value,
        }
        let parentData = {
            relationship: document.getElementById("tparentesco").value,
            surname: document.getElementById("tape").value,
            secondS: document.getElementById("tape2").value,
            name: document.getElementById("tnombre").value,
            bDate: document.getElementById("tfechadenacimiento").value,
            sex: document.getElementById("tsexo").value,
            civilStatus: document.getElementById("testadocivil").value,
            studyGrade: document.getElementById("tgradodeestudios").value,
            curp: document.getElementById("tcurp").value.toUpperCase(),
            entity: document.getElementById("tentidaddenacimiento").value,
            nationality: document.getElementById("tnacionalidad").value,
            typeDocument: document.getElementById("ttipodedocumento").value,
            suburb: document.getElementById("tdomicilio1").value,
            zipCode: document.getElementById("tdomicilio2").value,
            locality: document.getElementById("tdomicilio3").value,
            municipality: document.getElementById("tdomicilio4").value,
            state: document.getElementById("tdomicilio5").value,
            reference: document.getElementById("tdomicilio6").value,
            phone: document.getElementById("ttelefono").value,
            email: document.getElementById("tcorreoelectronico").value,
            specialEduc: document.getElementById("tnecesidadespecial").value,
            supportTool: document.getElementById("therramientasdeapoyo").value,
            laboralStat: document.getElementById("tsituacionlaboral").value,
            indigenous: document.getElementById("tgrupoindigena").value,
        }
        if (!isNumeric(studentData.age)) {
            showWarningNotification("El campo de Edad del alumno debe ser un número entero")
            document.getElementById("edad").focus();
            return false;
        }

        if (!isNumeric(studentData.months)) {
            showWarningNotification("El campo Meses debe ser un número entero")
            document.getElementById("meses").focus();
            return false;
        }

        if (!isDecimal(studentData.weight)) {
            showWarningNotification("El campo de Peso debe ser un número")
            document.getElementById("peso").focus();
            return false;
        }

        if (!isBool(studentData.glasses)) {
            showWarningNotification("El campo de Lentes solo acepta Sí o No");
            document.getElementById("lentes").focus();
            return false;
        }

        if (!isBool(studentData.record)) {
            showWarningNotification("El campo de Cartilla de vacunación solo acepta Sí o No");
            document.getElementById("cartilla").focus();
            return false;
        }

        if (!isBool(studentData.vaccines)) {
            showWarningNotification("El campo de Vacunas completas solo acepta Sí o No");
            document.getElementById("vacunas").focus();
            return false;
        }

        if (!isBool(studentData.orthopedic)) {
            showWarningNotification("El campo de Zapatos ortopédicos solo acepta Sí o No");
            document.getElementById("ortopedico").focus();
            return false;
        }

        if (!isGenre(studentData.sex)) {
            showWarningNotification("El campo de Sexo del alumno solo acepta Hombre o Mujer");
            document.getElementById("sexo").focus();
            return false;
        }

        if (!isAlpha(studentData.entity)) {
            showWarningNotification("El campo de Entidad de Nacimiento del alumno solo acepta letras");
            document.getElementById("entidaddenacimiento").focus();
            return false;
        }

        if (!isAlpha(studentData.nationality)) {
            showWarningNotification("El campo de Nacionalidad del alumno solo acepta letras");
            document.getElementById("nacionalidad").focus();
            return false;
        }

        if (!isAlphaNumeric(studentData.street)) {
            showWarningNotification("El campo de Calle del alumno solo acepta letras y números");
            document.getElementById("domicilio1").focus();
            return false;
        }

        if (!isAlphaNumeric(studentData.other)) {
            showWarningNotification("El campo de Entre calle del alumno solo acepta letras y números");
            document.getElementById("domicilio2").focus();
            return false;
        }

        if (!isAlphaNumeric(studentData.another)) {
            showWarningNotification("El campo de Y la calle del alumno solo acepta letras y números");
            document.getElementById("domicilio3").focus();
            return false;
        }

        if (!isAlphaNumeric(studentData.suburb)) {
            showWarningNotification("El campo de Colonia del alumno solo acepta letras y números");
            document.getElementById("domicilio4").focus();
            return false;
        }

        if (!isZipCode(studentData.zipCode)) {
            showWarningNotification("El campo de Código Postal del alumno solo acepta 5 dígitos numéricos");
            document.getElementById("domicilio5").focus();
            return false;
        }

        if (!isAlpha(studentData.locality)) {
            showWarningNotification("El campo de Localidad del alumno solo acepta letras");
            document.getElementById("domicilio6").focus();
            return false;
        }

        if (!isAlpha(studentData.municipality)) {
            showWarningNotification("El campo de Municipio del alumno solo acepta letras");
            document.getElementById("domicilio7").focus();
            return false;
        }

        if (!isAlpha(studentData.state)) {
            showWarningNotification("El campo de Estado del alumno solo acepta letras");
            document.getElementById("domicilio8").focus();
            return false;
        }

        if (!isAlphaNumeric(studentData.reference)) {
            showWarningNotification("El campo de Referencia del alumno solo acepta letras y números");
            document.getElementById("domicilio9").focus();
            return false;
        }

        if (!isPhone(studentData.phone)) {
            showWarningNotification("El campo de Teléfono del alumno solo acepta 10 dígitos numéricos");
            document.getElementById("telefono").focus();
            return false;
        }

        if (!isEmail(studentData.email)) {
            showWarningNotification("El campo de Correo Electrónico del alumno no es valido");
            document.getElementById("correoelectronico").focus();
            return false;
        }

        if (!isAlpha(parentData.relationship)) {
            showWarningNotification("El campo de Parentesco del tutor no es valido");
            document.getElementById("tparentesco").focus();
            return false;
        }

        if (!isAlpha(parentData.surname)) {
            showWarningNotification("El campo de Primer apellido del tutor no es valido, solo se aceptan letras");
            document.getElementById("tape").focus();
            return false;
        }

        if (!isAlpha(parentData.secondS)) {
            showWarningNotification("El campo de Segundo apellido del tutor no es valido, solo se aceptan letras");
            document.getElementById("tape2").focus();
            return false;
        }

        if (!isAlpha(parentData.name)) {
            showWarningNotification("El campo de Nombre del tutor no es valido, solo se aceptan letras");
            document.getElementById("tnombre").focus();
            return false;
        }

        if (!isGenre(parentData.sex)) {
            showWarningNotification("El campo de Sexo del tutor no es valido, solo se aceptan Hombre, Mujer u Otro como opciones");
            document.getElementById("tsexo").focus();
            return false;
        }

        if (!isCivilStatus(parentData.civilStatus)) {
            showWarningNotification("El campo de Estado Civil del tutor no es valido, solo se aceptan como opciones Soltero(a), Casado(a), Unión Libre, Separado(a), Divorciado(a), Viudo(a)");
            document.getElementById("testadocivil").focus();
            return false;
        }

        // if (!isStudyGrade(parentData.studyGrade)) {
        //     showWarningNotification("El campo de Grado de estudios del tutor no es valido, solo se aceptan como opciones Primaria, Secundaria, Media-superior, Superior o Ninguno");
        //     document.getElementById("tgradodeestudios").focus();
        //     return false;
        // }

        if (!isCURP(parentData.curp)) {
            showWarningNotification("El campo de CURP del tutor no es valido");
            document.getElementById("tcurp").focus();
            return false;
        }

        if (!isAlpha(parentData.entity)) {
            showWarningNotification("El campo de Entidad de Nacimiento del tutor no es valido, solo se aceptan las opciones dadas");
            document.getElementById("tentidaddenacimiento").focus();
            return false;
        }

        if (!isAlpha(parentData.nationality)) {
            showWarningNotification("El campo de Nacionalidad del tutor no es valido, solo se aceptan letras");
            document.getElementById("tnacionalidad").focus();
            return false;
        }

        if (!isOfficialDocument(parentData.typeDocument)) {
            showWarningNotification("El campo de Tipo de documento oficial del tutor no es valido, solo se aceptan como opciones INE, Cartilla y Pasaporte");
            document.getElementById("ttipodedocumento").focus();
            return false;
        }

        if(!isAlphaNumeric(parentData.suburb)) {
            showWarningNotification("El campo de Colonia del tutor no es valido, solo se aceptan letras y números");
            document.getElementById("tdomicilio1").focus();
            return false;
        }
        if(!isZipCode(parentData.zipCode)) {
            showWarningNotification("El campo de Código Postal del tutor solo acepta 5 dígitos numéricos");
            document.getElementById("tdomicilio2").focus();
            return false;
        }
        if(!isAlpha(parentData.locality)) {
            showWarningNotification("El campo de Localidad del tutor no es valido, solo se aceptan letras");
            document.getElementById("tdomicilio3").focus();
            return false;
        }
        if(!isAlpha(parentData.municipality)) {
            showWarningNotification("El campo de Municipio del tutor no es valido, solo se aceptan letras");
            document.getElementById("tdomicilio4").focus();
            return false;
        }
        if(!isAlpha(parentData.state)) {
            showWarningNotification("El campo de Estado del tutor no es valido, solo se aceptan letras");
            document.getElementById("tdomicilio5").focus();
            return false;
        }
        if(!isAlphaNumeric(parentData.reference)) {
            showWarningNotification("El campo de Referencia del tutor no es valido, solo se aceptan letras y números");
            document.getElementById("tdomicilio6").focus();
            return false;
        }

        if(!isPhone(parentData.phone)) {
            showWarningNotification("El campo de Numero de teléfono del tutor no es valido, solo se aceptan 10 dígitos numéricos");
            document.getElementById("ttelefono").focus();
            return false;
        }

        if(!isEmail(parentData.email)) {
            showWarningNotification("El campo de Correo electrónico del tutor no es valido");
            document.getElementById("tcorreoelectronico").focus();
            return false;
        }

        if(!isAlpha(parentData.specialEduc)) {
            showWarningNotification("El campo de Necesidad educativa especial del tutor no es valido, solo se aceptan letras");
            document.getElementById("tnecesidadespecial").focus();
            return false;
        }

        if(!isAlpha(parentData.supportTool)) {
            showWarningNotification("El campo de Herramientas de apoyo del tutor no es valido, solo se aceptan letras");
            document.getElementById("therramientasdeapoyo")
            return false;
        }

        if (!isAlpha(parentData.laboralStat)) {
            showWarningNotification("El campo de Situación laboral del tutor no es valido, solo se aceptan letras");
            document.getElementById("tsituacionlaboral").focus();
            return false;
        }

        if (!isAlpha(parentData.indigenous)) {
            showWarningNotification("El campo de grupo indígena del tutor no es valido, solo se aceptan letras");
            document.getElementById("tgrupoindigena").focus();
            return false;
        }

        // const url = "/sige/controllers/Alumno/controllerAlumnos.php";
        const url = "../../controllers/Alumno/controllerAlumnos.php";

        const data = {
            accion  : '2',
            alumno  : studentData,
            tutor   : parentData,
        };
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json',
            },
            body: JSON.stringify(data),
        });

        const request = await response.json()
        console.log(request);
        showSuccessNotification(request.message);
        window.location.href = '/sige/alumnos/documentos.php';
        window.location.href = '../../alumnos/documentos.php';

    } catch (error) {
        showErrorNotification(error);
        console.log(error);
    }
})