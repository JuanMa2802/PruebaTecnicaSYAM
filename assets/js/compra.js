

function agregar_articulo(){
    let articulo_id = $("#articulos option:selected").val();
    let articulo_text = $("#articulos option:selected").text();
    let cantidad = $("#canti").val();
    let precio = $("#precio").val();

    if(cantidad > 0 && precio > 0){

        $("#tblArticulos").append(`
        
            <tr id="tr-${articulo_text}">
                <td>
                    <input type="hidden" name="articulo_text[]" value="${articulo_text}">
                    <input type="hidden" name="cantidades[]" value="${cantidad}">
                    ${articulo_text}
                </td>
                <td>${cantidad}</td>
                <td>${parseFloat(cantidad) * parseFloat(precio)}</td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="eliminar(${articulo_text}, ${parseFloat(cantidad) * parseFloat(precio)});">X</button>
                </td>

            </tr>
            
        
        `);

        let precio_subtotal = $('#precio_subtotal').val() || 0;
        $('#precio_subtotal').val(parseFloat(precio_subtotal) + parseFloat(cantidad) * parseFloat(precio));


        let tasa = 19;
        let iva = ($('#precio_subtotal').val() * tasa)/100;
        $('#IVA').val(iva);

  
        let precio_total = $('#precio_total').val();
        $('#precio_total').val(parseInt($('#precio_subtotal').val()) + parseInt($('#IVA').val()));
    }

    else{
        Swal.fire({
            icon: 'warning',
            title: 'Ingrese una cantidad o precio válido',
            showConfirmButton: false,
            timer: 1500
        });
    };
};

function eliminar(id, subtotal){
    $('#tr-' + id).remove();
    let precio_subtotal = $('#precio_total').val() || 0;

    $('#precio_total').val(parseFloat(precio_subtotal) - subtotal);
}