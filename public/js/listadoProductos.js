window.addEventListener('load', function(){
    var botonesAgregarCarrito = document.querySelectorAll(".agregar-carrito");
    for (var i = 0; i < botonesAgregarCarrito.length; i++) {
        let element = botonesAgregarCarrito[i];
        element.addEventListener('click', function(){
            let productoID = element.parentElement.parentElement.parentElement.getAttribute('id');
            let cantidad = 1;
            return agregarCarrito(productoID, cantidad);
        });
    }
});