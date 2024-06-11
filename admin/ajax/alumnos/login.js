const signIn = document.getElementById("signIn");

signIn.addEventListener("submit", async(e)=>{
    e.preventDefault();
    try {
        console.log("enviando");
        let curp = document.getElementById("curp").value;
        let folio = document.getElementById("folio").value;

        const url = "../../controllers/Alumno/controllerAlumnos.php";

            const data = {
                accion : 1,
                curp : curp,
                folio : folio
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
                showSuccessNotification(request.message);
                // window.location.href = '/sige/alumnos/perfil.php';
                window.location.href = '../../alumnos/perfil.php';
            }else{
                showErrorNotification(request.message)
            }
    } catch (error) {
        console.log(error);
    }
})