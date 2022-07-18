document.addEventListener('DOMContentLoaded',()=>{
    inciarApp();
});
function inciarApp() {
    buscarporFecha();
}
function buscarporFecha(){
    const fechaInput= document.querySelector('#fecha');
    fechaInput.addEventListener('input',e=>{
        const fechaSeleccionada= e.target.value;

        window.location= `?fecha=${fechaSeleccionada}`;
    })
}