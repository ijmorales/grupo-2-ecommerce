window.addEventListener('load', function(){
    var inputsCantidadCarrito = document.querySelectorAll('.cantidad-input');
    var botonConfirmarCarrito = document.querySelector('.confirmar-carrito');
    var botonActualizarCarrito = document.querySelector('.actualizar-carrito');

    for (let i = 0; i < inputsCantidadCarrito.length; i++) {
        let element = inputsCantidadCarrito[i];
        element.addEventListener('change', function(){
            botonConfirmarCarrito.style.display = 'none';
            botonActualizarCarrito.setAttribute('style', 'display:block !important');
        });
    }
});