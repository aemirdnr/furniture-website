<?php
require '../db.php';
session_start();

$query = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='icon' href='./img/favicon.ico' type='image/x-icon'>
    <link rel='shortcut icon' href='./img/favicon.ico' type='image/x-icon'>
    <title>Furniture Panel</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <?php if(!isset($_SESSION['admin'])){ ?>
    <div class="modal d-block" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mx-auto" id="staticBackdropLabel">Admin Panel</h4>
                </div>
                <div class="modal-body p-4">
                    <form id="loginFrm" action="../login.php" method="POST">
                        <div class="my-3">
                            <label class="mb-2">Username</label>
                            <div class="input">
                                <input type="text" name="username" id="username">
                            </div>
                        </div>
                        <div class="my-4">
                            <label class="mb-2">Password</label>
                            <div class="input">
                                <input type="password" name="password" id="password">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="submit"
                        form="loginFrm"
                        class="btn button"
                    >Login
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php } else {?>
    <header class="shadow-sm">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <a href="../index.php"><img src="../img/logo.png" alt="Logo" width="165" height="100"></a>
                     </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div id="signout" class="d-flex gap-2">
                            <i class="bi-person"></i>
                            <a href="../logout.php" class="d-flex align-items-center"><span class="header-text"> Log out</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="mt-3">
        <div class="container">
            <div class="row mx-auto justify-content-center gap-3">
                <div class="col-12 col-md-9 product__container">
                    <div class="d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#product__add" style="cursor: pointer;">
                        <button class="btn">
                            <i class="product__button bi-plus-square d-flex align-items-center mx-auto gap-3">
                                <span style="font-size: 20px; font-style: normal;">Add Product</span>
                            </i>
                        </button>
                    </div>
                    <div class="modal" id="product__add" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="mx-auto">Add Product</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="addProduct" action="addProduct.php" method="POST" enctype="multipart/form-data">
                                        <div class="my-3">
                                            <label class="mb-2">Product Name</label>
                                            <div class="input">
                                                <input type="text" name="productName" id="productName">
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <label class="mb-2">Product Price</label>
                                            <div class="input">
                                                <input type="text" name="productPrice" id="productPrice">
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <label class="mb-2">Product Market Link</label>
                                            <div class="input">
                                                <input type="text" name="productLink" id="productLink">
                                            </div>
                                        </div>
                                        <div class="my-3">
                                            <label class="mb-2">Select a picture </label>
                                            <input name="productPicture" id="productPicture" type="file" accept="image/*" style="margin-left: 12px;">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer gap-4">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product__add">Close</button>
                                    <button class="btn button" type="submit" form="addProduct">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tag__container" class="col-12 col-md-2 product__container">
                    <div class="d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#tag__add" style="cursor: pointer;">
                        <button class="btn">
                            <i class="product__button bi-tags d-flex align-items-center mx-auto gap-3">
                                <span style="font-size: 20px; font-style: normal;">Add Tag</span>
                            </i>
                        </button>
                    </div>
                    <div class="modal" id="tag__add" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="mx-auto">Add Tag</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column">
                                        <form id="addTag" action="addTag.php" method="POST">
                                            <div class="my-3">
                                                <label class="mb-2">Tag Name</label>
                                                <div class="input">
                                                    <input type="text" name="tagName" id="tagName">
                                                </div>
                                            </div>
                                        </form>
                                        <b>Tags</b>
                                        <ul id="tag__list">
                                        <?php
                                            $tagQuery = mysqli_query($conn, "SELECT * FROM tags");

                                            while($tagRow = mysqli_fetch_row($tagQuery)){
                                                $id = $tagRow[0];
                                                $tag = $tagRow[1];
                                        ?>
                                            <li id="tag__item">
                                                - <?php echo $tag ?><b style="color: red; cursor: pointer; margin-left: 12px;" data-bs-toggle="modal" data-bs-target="#tag__remove<?php echo $id ?>">DELETE</b>
                                                <div class="modal" id="tag__remove<?php echo $id ?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body py-4">
                                                                <h4 class="mx-auto">Are you sure to delete the tag?</h4>
                                                                <form id="deleteTag<?php echo $id ?>" action="deleteTag.php" method="POST" >
                                                                    <input hidden="true" name="tagId" id="tagId" type="text" value="<?php echo $id ?>">
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" form="deleteTag<?php echo $id ?>" class="btn btn-success">Yes</button>
                                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tag__remove<?php echo $id ?>">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tag__add">Close</button>
                                    <button class="btn button" type="submit" form="addTag">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-4 gap-4">
                <?php
                    while($row = mysqli_fetch_row($query)){
                        $id = $row[0];
                        $name = $row[1];
                        $price = $row[2];
                        $link = $row[3];
                        $image = $row[4];
                ?>
                <div class="col-12">
                    <div class="product__container">
                        <div class="row flex-column flex-md-row w-100 mx-auto">
                            <div class="col-12 col-md-4 col-lg-3">
                                <img id="product__img" src="../img/static/<?php echo $image  ?>">
                            </div>
                            <div class="col-12 col-md-5 col-lg-5">
                                <div id="product__info" class="d-flex justify-content-center align-items-center h-100 mt-2 md-md-0">
                                    <span id="product__id">
                                        <?php echo $name ?>
                                    </span>
                                    <b id="product__price">
                                        <?php echo $price ?>
                                    </b>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-4">
                                <div class="d-flex justify-content-center justify-content-md-end align-items-center h-100 gap-5 mt-2 md-md-0">
                                    <a data-bs-toggle="modal" data-bs-target="#product__settings<?php echo $id ?>"><i id="productSettings" class="product__button bi-gear"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#product__remove<?php echo $id ?>"><i id="productRemove" class="product__button bi-x-lg"></i></a>
                                    <div id="product__settings<?php echo $id ?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="mx-auto">Product settings</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="saveProduct<?php echo $id ?>" action="saveProduct.php" method="POST" enctype="multipart/form-data">
                                                        <input hidden="true" type="text" name="productID" id="productID" value="<?php echo $id ?>">
                                                        <div class="my-3">
                                                            <label class="mb-2">Product Name</label>
                                                            <div class="input">
                                                                <input type="text" name="productName" id="productName" value="<?php echo $name ?>">
                                                            </div>
                                                        </div>
                                                        <div class="my-3">
                                                            <label class="mb-2">Product Price</label>
                                                            <div class="input">
                                                                <input type="text" name="productPrice" id="productPrice" value="<?php echo $price ?>">
                                                            </div>
                                                        </div>
                                                        <div class="my-3">
                                                            <label class="mb-2">Product Market Link</label>
                                                            <div class="input">
                                                                <input type="text" name="productLink" id="productLink" value="<?php echo $link ?>">
                                                            </div>
                                                        </div>
                                                        <div class="my-3">
                                                            <label class="mb-2">Select a picture </label>
                                                            <input id="productPicture" name="productPicture" type="file" accept="image/png, image/jpeg" style="margin-left: 12px;">
                                                        </div>
                                                    </form>
                                                    <form id="addTag<?php echo $id ?>" action="addProductTag.php" method="POST" enctype="multipart/form-data">
                                                        <div class="my-3">
                                                            <label class="mb-2">Add Tag to Product</label>
                                                                <select id="tagName" name="tagName" style="margin-left: 12px;">
                                                                <?php
                                                                    $listQuery = mysqli_query($conn, "SELECT * FROM tags");

                                                                    while($listrow = mysqli_fetch_row($listQuery)){
                                                                        $tag = $listrow[1];
                                                                ?>
                                                                    <option value="<?php echo $tag ?>"><?php echo $tag ?></option>
                                                                <?php } ?>
                                                                </select>
                                                                <input hidden="true" name="urunID" id="urunID" type="text" value="<?php echo $id ?>">
                                                        </div>
                                                        <button class="btn btn-success" type="submit" form="addTag<?php echo $id ?>">Add</button>
                                                    </form>
                                                        <div class="my-3">
                                                            <label class="mb-2">Product Tags</label>
                                                            <ul id="productTags">
                                                                <?php 
                                                                    $tagQuery = mysqli_query($conn, "SELECT * FROM productTags WHERE productID='$id'");

                                                                    while ($tagRow = mysqli_fetch_row($tagQuery)) {
                                                                        $tagID = $tagRow[0];
                                                                        $tagName = $tagRow[2];
                                                                ?>
                                                                    <li>- <?php echo $tagName ?> <b style="color: red; cursor: pointer; margin-left: 12px;" data-bs-toggle="modal" data-bs-target="#productTag__remove<?php echo $tagID ?>">DELETE</b></li>
                                                                    <div class="modal" id="productTag__remove<?php echo $tagID ?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body py-4">
                                                                                    <h4 class="mx-auto">Are you sure to delete the tag?</h4>
                                                                                    <form id="deleteProductTag<?php echo $tagID ?>" action="deleteProductTag.php" method="POST" >
                                                                                        <input hidden="true" name="productTagID" id="productTagID" type="text" value="<?php echo $id ?>">
                                                                                        <input hidden="true" name="productTagName" id="productTagName" type="text" value="<?php echo $tagName ?>">
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" form="deleteProductTag<?php echo $tagID ?>" class="btn btn-success">Yes</button>
                                                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#productTag__remove<?php echo $tagID ?>">No</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                </div>
                                                <div class="modal-footer gap-4">
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product__settings<?php echo $id ?>">Close</button>
                                                    <button class="btn button" type="submit" form="saveProduct<?php echo $id ?>">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="product__remove<?php echo $id ?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body py-4">
                                                    <h4 class="mx-auto">Are you sure to delete the product?</h4>
                                                    <form id="deleteProduct<?php echo $id ?>" action="deleteProduct.php" method="POST" >
                                                        <input hidden="true" name="removeID" id="removeID" type="text" value="<?php echo $id ?>">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" form="deleteProduct<?php echo $id ?>" class="btn btn-success">Yes</button>
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#product__remove<?php echo $id ?>">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <div id="to-top">
        <i class="bi-caret-up"></i>
    </div>
    <?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>