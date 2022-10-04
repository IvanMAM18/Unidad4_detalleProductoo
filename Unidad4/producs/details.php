<?php
    include '../app/ProductsController.php';
    $producto = new ProductsController();
    $productos = $_GET['slug'];
    $product = $productController->getProduct($product_slug)
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
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($productos as $key => $item): ?> 
                        <div class="col-md-3 col-sm-10 p-2 ">
                            <div class="card mb-1 ">
                                <img src="<?= $product->cover ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $product->name ?></h5>
                                    <h6 class="card-subtitle text-center"><i><?php echo $product->categories[0]->name ?></i></h6>
                                    <p class="card-text" style="text-align: justify;"><?php echo $product->description ?></p>
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