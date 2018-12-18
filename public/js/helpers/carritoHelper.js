const ajaxURL = "/carrito/agregar";

function agregarCarrito(productoID, cantidad){
    var data = {id: productoID, cantidad: cantidad};

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

    var request = new Request(ajaxURL, init);

    console.log(`Ejecutandome y mi ajaxURL es ${ajaxURL}`);

    fetch(request)
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        console.log(data);
        if(data.success === true){
            actualizarContadorCarrito(data.carritoCount);
            if(cantidad == 1)
            {
                swal("Listo!", "Se agrego el producto a tu carrito.", "success");
            }
            else
            {
                swal("Listo!", `Se agregaron ${cantidad} unidades a tu carrito.`, 'success');
            }
        }else{
            swal("Error :(", "Hubo un problema al agregar tu producto al carrito.", 'error');
        }
    })
}

function actualizarContadorCarrito(contador){
    document.querySelector('#carrito-count').innerHTML = contador;
}