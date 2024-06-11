const signInBtn = document.getElementById("signIn");

signInBtn.addEventListener("click", async()=>{
    try {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        if (!isEmail(email)) {
            showErrorNotification("El correo ingresado no cumple con el formato requerido, favor de revisarlo.")
            return false;
        }

        const url = "../../controllers/admin/signIn.php";

        const data = {
            email : email,
            password : password
        }

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })

        const request = await response.json()
        if(request.success){
            showSuccessNotification(request.message);
            window.location.href = '../../admin/crear-usuario.php';
        }else{
            showErrorNotification(request.message);
        }
    } catch (error) {
        showErrorNotification(error);
    }
})