window.addEventListener('load', function(){
    var agregarCarritoMultiple = document.querySelector(".agregar-carrito-multiple");
    agregarCarritoMultiple.addEventListener('click', function(){
        let cantidad = document.querySelector('input#cantidad').value;
        let productoID = document.querySelector('div.producto-info-container').getAttribute('id');
        return agregarCarrito(productoID, cantidad);
    });
})