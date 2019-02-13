// window.addEventListener('load', function(){
//     fetch("https://restcountries.eu/rest/v2/all")
//     .then(function(response) {
//     return response.json();
//     })
//     .then(function(data) {
//     var select = document.querySelector("select.paises");

//     select.removeAttribute("disabled")
//     select.innerHTML = ""

//     for (var i = 0; i < data.length; i++) {
//       select.innerHTML += "<option value='" + data[i].alpha2Code + "'>" + data[i].name + "</option>"
//     }
//     });
// })

window.addEventListener('load', function() {
    fetch("https://restcountries.eu/rest/v2/all")
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        console.log(data);
        var select = document.querySelector("select.paises");
        select.innerHTML = "";
        select.removeAttribute("disabled");
        for(var i = 0; i < data.length; i++) {
            var option = document.createElement('option');
            option.setAttribute('value', data[i].alpha2Code);
            option.innerHTML = data[i].name;
            select.append(option);
        }
    });

    var btnAgregar = document.querySelector('button.agregar-direccion');
    btnAgregar.addEventListener('click', function(event){
        event.preventDefault();
        console.log('click!');
        var containerElegirDireccion = document.querySelector('div.direcciones-container');
        containerElegirDireccion.style.display = 'none';
        var containerDireccionNueva = document.querySelector('div.direccion-nueva-container');
        containerDireccionNueva.classList.add('row');
        containerDireccionNueva.style.display = 'flex';
    })
});
