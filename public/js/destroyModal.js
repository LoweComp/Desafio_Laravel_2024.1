// Recebe a rota e adiciona esta rota como delete da no form do modal
function fillModal(route){
    console.log(route);
    $('#destroyForm').attr('action', route);
    console.log(document.getElementById('destroyForm').action)
}
