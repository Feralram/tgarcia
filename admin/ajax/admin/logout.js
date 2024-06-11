const logout = document.getElementById("logout");

logout.addEventListener("click", async()=>{
    try {
        const url = "../../controllers/admin/logout.php";

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })

        const request = await response.json()
        if (request.success) {
            //redirecciona a la página de inicio
            showInfoNotification(request.message);
        }else{
            showErrorNotification(request.message);
        }
        window.location.href = '../../admin/iniciar-sesion.html';
    } catch (error) {
        showErrorNotification(error);
    }
})