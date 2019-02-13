var agregar = agregarCarrito;

$(window).on('load', function(){
    var agregarCarritoMultiple = document.querySelector(".agregar-carrito-multiple");
    agregarCarritoMultiple.addEventListener('click', function(){
        console.log('hola');
        let cantidad = document.querySelector('input#cantidad').value;
        let productoID = document.querySelector('div.producto-info-container').getAttribute('id');
        return agregar(productoID, cantidad);
    });

    var agregarCarrito = document.querySelectorAll('.agregar-carrito');
    for (let i = 0; i < agregarCarrito.length; i++) {
        let element = agregarCarrito[i];
        element.addEventListener('click', function(){
            var id = element.parentElement.parentElement.parentElement.getAttribute('id');
            return agregar(id, 1);
        });
    }
})



