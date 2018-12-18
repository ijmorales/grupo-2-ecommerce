window.addEventListener('load', function(){
    var inputsCantidadCarrito = document.querySelectorAll('.cantidad-input');
    var botonConfirmarCarrito = document.querySelector('.confirmar-carrito');
    var botonActualizarCarrito = document.querySelector('.actualizar-carrito');

    for (let i = 0; i < inputsCantidadCarrito.length; i++) {
        let element = inputsCantidadCarrito[i];
        element.addEventListener('change', function(){
            botonConfirmarCarrito.style.display = 'none';
            botonActualizarCarrito.setAttribute('style', 'display:inline-block !important');
        });
    }

    var botonesEliminarCarrito = document.querySelectorAll('.eliminar');
    for (let i = 0; i < botonesEliminarCarrito.length; i++) {
        let element = botonesEliminarCarrito[i];
        element.addEventListener('click', function(event){
            event.preventDefault();
            let id = element.id;
            return eliminarCarrito(id);
        });
    }
});

function eliminarCarrito(id){
    var data = {id: id};

    var headers = new Headers();
    var sessionToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    headers.append('Content-Type', 'application/json');
    headers.append('Accept', 'application/json');
    headers.append('X-CSRF-TOKEN', sessionToken);

    var init = {
        method: 'POST',
        headers: headers,
        mode: 'cors',
        credentials: 'same-origin',
        body: JSON.stringify(data),
    };

    var request = new Request('/carrito/eliminar', init);

    fetch(request)
    .then(function(response){
        return response.json()
    })
    .then(function(json){
        if(json.success){
            swal('Listo!', 'Se elimino el producto de tu carrito.', 'success');
        }else{
            swal('Error :(', 'Hubo un error eliminando el producto de tu carrito', 'error');
        }
        console.log(json);
    });
}