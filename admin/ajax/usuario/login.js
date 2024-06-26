const signIn = document.getElementById("signIn");

signIn.addEventListener("submit", async(e)=>{
    e.preventDefault();
    try {
        console.log("enviando");
        let usu = document.getElementById("usu").value;
        let psw = document.getElementById("psw").value;

        const url = "controllers/Usuario/controllerUsuario.php";

            const data = {
                accion : 1,
                usu : usu,
                psw : psw
            }

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })

            const request = await response.json()

            if (request.success && request.tipouser==1) {
                showSuccessNotification(request.message);
                window.location.href = 'Operacion/perfil.php';
            }else if(request.success && request.tipouser==2){
                showSuccessNotification(request.message);
                window.location.href = 'Facturacion/perfil.php';
            }else if(request.success && request.tipouser==3) {
                showSuccessNotification(request.message);
                window.location.href = 'adminT/perfil.php';
            }else{
                showErrorNotification(request.message)
            }
    } catch (error) {
        console.log(error);
    }
})