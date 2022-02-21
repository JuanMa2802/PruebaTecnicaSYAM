
<?php
    include_once "conex/conexion.php";
    include "./layout/nav.php";

    $con = Conectar();
    $sql = "SELECT * FROM orden ORDER BY Id DESC";
    $query = mysqli_query($con, $sql);

    
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/reportes.css">
<link rel="stylesheet" href="./assets/css/estilosgenerales.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<div class="container" style="margin-top: 70px !important;">
<table class="table" id="ordenes">
  <thead id="thea">
    <tr>
      <th>ID</th>
      <th scope="col">Comprador</th>
      <th scope="col">Fecha</th>
      <th scope="col">Detalles</th>
      <th scope="col">Sub Total compra</th>
      <th scope="col">Total IVA</th>
      <th scope="col">Total</th>
      <th scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody id="res">
      <?php
        while($row = mysqli_fetch_array($query)){
      ?>
        <tr>
            <td><?php echo $row['Id']?></td>
            <td><?php echo $row['Nombre']?></td>
            <td><?php echo $row['Fecha']?></td>
            <td>
              
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#detalles<?php echo $row['Id']?>"><i class="fa-solid fa-eye"></i></button>


            <div class="modal fade" id="detalles<?php echo $row['Id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 100000;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles de la compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?php 
                     

                      $Id = $row['Id'];

                      $consul = "SELECT * FROM detalles_orden WHERE Id_orden = $Id";
                      $quer = mysqli_query($con, $consul);

                    ?>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Orden</th>
                          <th>Articulo(s)</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($fila = mysqli_fetch_array($quer)){
                      ?>
                       <tr>
                         <td><?php echo $fila['Id_orden']?></td>
                         <td><?php echo $fila['Id_articulo']?></td>
                       </tr>

                      <?php
                        }
                      ?>
                      </tbody>
                    </table>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><strong>Cerrar</strong></button>
                    
                  </div>
                </div>
              </div>
            </div>
            </td>
            <td><?php echo $row['Subtotal']?></td>
            <td><?php echo $row['Iva']?></td>
            <td><?php echo $row['Total']?></td>
            <td>
                <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
      <?php
        }
      ?>
    
  </tbody>
</table>
</div>

<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#ordenes').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar " + 
                `<select class="custom-select custom-select-md form-control form-control-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="25">25</option>
                    <option value="-1">Todo</option>
                </select>`
            
            + " registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "infoFiltered": "(filtrado from _MAX_ registros totales)",
            "search": "Buscar: ",
            'paginate':{
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
} );
</script>