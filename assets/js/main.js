let datos =  "";

function traerDatos(){

    const xhttp = new XMLHttpRequest();
    
    xhttp.open('GET', 'info_prueba.json', true);
    xhttp.send();

    xhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){

            var json_res = this.responseText;
            datos = JSON.parse(json_res);

            let res = document.querySelector('#cardi');
            let arti = document.querySelector('#articulos');
            
            res.innerHTML = "";
            arti.innerHTML = `<option>-- Seleccione --</option>`;


            Object.values(datos).forEach(function (e){
                arti.innerHTML += `
                <option value="${e.descripcion}" precio="${e.precio}">${e.descripcion}</option>         
                `
            });

            Object.values(datos).forEach(function (e){
                res.innerHTML += `
                    <div class="col-md-4">
                        <div class="card mb-3 mt-3 text-center" style="width: 22rem;" >
                            <div class="card-body">
                                <img src="./assets/img/crema.jpg" heigth="">
                                <h5 class="card-title" style="font-weight: bold;">${e.descripcion}</h5>
                                <h6 class="card-text"><strong>$COP:</strong> ${e.precio}</h6>
                                <p><strong>Cantidad:</strong> ${e.existencia}</p>
                                <button class="btn btn-outline-primary btn-block agregar-carrito" data-bs-toggle="modal" data-bs-target="#compra"><i class="fa-solid fa-cart-shopping"></i> &nbsp; Comprar</button>
                            </div>
                        </div>
                    </div>
                `
            });           
        }   
    } 
}


function colocar(){
    let precio = $("#articulos option:selected").attr("precio");
    $("#precio").val(precio);
}

