<?php
    include '../app/ProductsController.php';
    $producto = new ProductsController();
    $productos = $producto -> getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.php" ?>
</head>
<body>
    <!-- navbar -->
    <?php include "../layouts/nadvar.php" ?>

    <!-- container -->
    <div class="container-fluid">

        <div class="row">
            <!-- sidebar -->
            <?php include "../layouts/sidebar.php" ?>

            <!-- contenido -->
            <div class="col-lg-10 col-sm-12 bg-white">

                <!--bead-->
                <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Productos</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#modalAñadir">Añadir producto</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($productos as $key => $item): ?> 
                        <div class="col-md-3 col-sm-10 p-2 ">
                            <div class="card mb-1 ">
                                <img src="<?php echo $item->cover ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $item->name ?></h5>
                                    <h6 class="card-subtitle text-center"><i><?php echo $item->categories[0]->name ?></i></h6>
                                    <p class="card-text" style="text-align: justify;"><?php echo $item->description ?></p>
                                    <div class="row">
                                        <a class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#modalEditar">Editar</a>
                                        <a href="#" class="btn btn-danger col-6" onclick="remove(this)">Eliminar</a>
                                        <a href="details.php?<?= $product->slug ?>" class="btn btn-info col-12">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
    </div>
    <!-- modalAñadir -->
    <div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="modalAñadirLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAñadirLabel">modalAñadir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  enctype="multipart/form-data"  method="post" action="../app/ProductsController.php">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Titulo</span>
                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Slug</span>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Descripcion</span>
                        <input type="text" name="description" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Caracteristicas</span>
                        <input type="text" name="features" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input type="text" name="brand_id" class="form-control" placeholder="Brand_id" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Imagen</span>
                        <input name="cover" type="file">
                    </div>
                </div>

                <input type="hidden" name="action" value="create">

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    <!-- modalEditar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditar">modalEditar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php for ($i=0; $i < 6; $i++) {?> 
                    <div class="input-group mb-3">
                      <label class="text-center">
                          Correo electronico
                      </label>
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" class="form-control" placeholder="Correo@examp.com" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                <?php } ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.php" ?>
    
    <script>
        function remove (target) {
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
            });
        }
    </script>
</body>
</html>