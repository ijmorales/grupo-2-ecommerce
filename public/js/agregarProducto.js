window.addEventListener('load', function(){
    traerCategoriasOMarcas('/api/categorias').then(function(categorias){
        console.log(categorias);
        $("input[name='categoria']").autocomplete({
            source: categorias,
        });
    });
    traerCategoriasOMarcas('/api/marcas').then(function(marcas){
        console.log(marcas);
        $("input[name='marca']").autocomplete({
            source: marcas,
        });
    });
});

function traerCategoriasOMarcas(url){
    return new Promise(function(resolve, reject){
        fetch(url)
        .then(function(response){
            return response.json();
        })
        .then(function(json){
            var data = [];
            for (let i = 0; i < json.length; i++) {
                let element = json[i];
                data.push({
                    label: element.nombre,
                    value: element.id,
                });
            }
            resolve(data);
        })
    });
}
