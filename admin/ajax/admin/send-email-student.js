const sendEmail = document.getElementById('sendEmail');


sendEmail.addEventListener('click', async () => {
    try {
        const studentID = obtenerParametro("id");
        const comments = document.getElementById('comments').value;
        if (!studentID) {
            showErrorNotification("Parece que falta información necesaria para completar esta acción. Por favor, revise la URL o consulte el manual. Error #1");
            window.location.replace('/admin/lista-alumnos.php');
            return false;
        }
        if (!comments) {
            showWarningNotification("Los comentarios no pueden quedar vacíos.");
            return false;
        }
        showInfoNotification("Enviando correo de notificación...");
        const url = '../../controllers/admin/notify_student.php';
        const data = {
            studentID : studentID,
            comments  : comments
        }

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })

        const request = await response.json()
        console.log(request)
        if (request.success) {
            showSuccessNotification(request.message);
            window.location.replace('/admin/lista-alumnos.php');
        } else {
            showErrorNotification(request.message)
        }
    } catch (error) {
        showErrorNotification(error);
        console.log(error);
    }
});