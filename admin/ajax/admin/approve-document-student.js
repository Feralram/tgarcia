
var documentID = "";
//Obtiene el ID del documento al que se le hizo click
function getDocumentID(ID) {
    documentID = ID;
}

const ApproveBtn = document.getElementById("Approve");

ApproveBtn.addEventListener("click", async()=>{
    showInfoNotification("Aprobando documento...");
    const studentID = obtenerParametro("id");
    const url = "../../controllers/admin/approve_document_student.php";
    // const url = "/sige/controllers/admin/approve_document_student.php";

    const data = {
        studentID : studentID,
        documentID : documentID
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
        window.location.reload();
    }else{
        showErrorNotification(request.message);
    }
})