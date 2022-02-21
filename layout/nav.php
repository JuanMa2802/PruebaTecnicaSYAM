<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/estilosgenerales.css">
    <link rel="stylesheet" href="./assets/css/menu.css">
    <title>SYAM Shop</title>
</head>
<body onload="traerDatos(); colocar()">

<div id="bar">
    <p>📦 Envíos gratis de todos nuestros productos 📦</p>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" id="Logo">SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./index.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./menu.php">Menu</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#compra">Nueva Compra</a>

            <div class="modal fade" id="compra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realizar Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="./controller/ordenController.php" method="POST">
                  <div class="modal-body">
                      <div class="row">
                       
                        <div class="col-6" >
                          <div class="row">
                             
                              <div class="col-md-12 mb-3">
                                <label for=""><strong>Nombre Completo</strong></label>
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre completo" autocomplete="off" required> 
                              </div>

                              <div class="col-md-12 mb-3">
                                <label for=""><strong>Fecha de Pedido</strong></label>
                                <input type="datetime-local" class="form-control" name="fecha" placeholder="Fecha" required>               
                              </div>

                              <div class="col-md-4 mb-3">
                                <label for=""><strong>Articulo</strong></label>
                                <select class="form-control" name="" id="articulos" onchange="colocar(this)" required>
                                  <option value="">-- Seleccione --</option>
                                  
                                </select>
                              </div>

                              <div class="col-md-4">
                                <label for=""><strong>Cantidad</strong></label>
                                <input type="number" class="form-control" id="canti" min="1" placeholder="Cantidad" aria-label="Username" aria-describedby="basic-addon1">
                            
                              </div>

                              <div class="col-md-4">
                                <label for=""><strong>Precio</strong></label>
                                <input type="text" class="form-control" id="precio" value="0" readonly>
                            
                              </div>


                              <div class="col-md-6">
                                <button type="button" class="btn btn-primary" onclick="agregar_articulo()"><i class="fa-solid fa-plus"></i> &nbsp; <strong>Añadir</strong></button>
                            
                              </div>
                             
                          </div>
                          
                        </div>
                        <div class="col-6">
                          <div class="row">
                            <div class="col-12 mb-4" id="det">
                            <table class="table" id="tablaDatos">
                              <thead>
                              
                                <th scope="col">Descripcion</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Eliminar</th>
                              </thead>
                              <tbody id="tblArticulos">
                                
                              </tbody>
                            </table>
                             
                            </div>
                            <div class="col-12">

                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><h6>SubTotal: </h6></span>
                                <input type="text" class="form-control" id="precio_subtotal" name="precio_subtotal" readonly style="background-color: transparent; border: 1px solid transparent;">
                              </div>

                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 17%;"><h6>IVA: </h6></span>
                                <input type="text" class="form-control" id="IVA" name="iva" readonly style="background-color: transparent; border: 1px solid transparent;">
                              </div>

                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 17%;"><h5>Total: </h5></span>
                                <input type="text" class="form-control" id="precio_total" name="precio_total" readonly style="background-color: transparent; border: 1px solid transparent;">
                              </div>

                             

                            </div>
                          </div>
                        </div>
                        
                      
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><strong>Cerrar</strong></button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> &nbsp; <strong>Guardar</strong></button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportes.php">reportes</a>
        </li>
        
        
      </ul>
      <div class="d-flex">
        <a data-bs-toggle="modal" data-bs-target="#example"><i class="fa-solid fa-cart-shopping" id="carrito" style="color: white;"></i></a>
        
       
        <a data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user" style="color: white;"></i></a>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <h3 class="text-center mb-4 mt-4" style="color: black;"><strong>INICIAR DE SESION</strong></h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                 <input type="text" class="form-control" placeholder="Ingrese su Usuario" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                 <input type="text" class="form-control" placeholder="Ingrese su contraseña" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-md-12 mb-4 text-center">
                                <button class="btn btn-primary btn-block"><i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp; <strong>Ingresar</strong></button>
                            </div>
                            <div class="col-md-12">
                                <p>¿Olvidaste tu contraseña?</p>
                                <p>¿Aun no tienes cuenta?</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</nav>

<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/js/compra.js"></script>
    
</body>
</html>