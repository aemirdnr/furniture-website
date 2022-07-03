<?php
    require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='icon' href='./img/favicon.ico' type='image/x-icon'>
    <link rel='shortcut icon' href='./img/favicon.ico' type='image/x-icon'>
    <title>Products</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <header class="shadow-sm">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-12 col-md-4 mt-3 mt-md-0">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div id="phone-number" class="d-flex align-items-center gap-1">
                            <i class="bi-telephone nav-icon"></i>
                            <a href="https://wa.me/+3721234567890?text=Hey%20i%20wanna%20buy%20a%20furniture%2C%20can%20you%20help%20me%3F" target="_blank"><span class="header-text"> +372 123 456 7890</span></a>
                        </div>
                        <div class="mx-2" style="width: 1px; height: 28px; background-color: black;"></div>
                        <div id="location" class="d-flex align-items-center gap-1">
                            <i class="bi-geo-alt nav-icon"></i>
                            <a href="./#map"><span class="header-text"> Location</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="d-flex align-items-center justify-content-center h-100">
                       <a href="./"><img src="./img/logo.png" alt="Logo" width="165" height="100"></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <div class="d-flex align-items-center justify-content-center h-100 gap-2">
                        <input id="search-input" name="search-input" type="search" placeholder="Find anything home...">
                        <i class="bi-search nav-icon"></i>
                        <div id="search-box" class="search-box">
                            <ul class="search-list m-0">
                                <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM products");

                                    while ($list = mysqli_fetch_row($sql)) {
                                        $id = $list[0];
                                        $name = $list[1];
                                        $price = $list[2];
                                        $link = $list[3];
                                        $image = $list[4];
                                ?>
                                <li class="search-item mb-2">
                                    <a href="<?php echo $link ?>" target="_blank">
                                        <img src="./img/static/<?php echo $image ?>" alt="Furniture <?php echo $id ?>">
                                        <span id="searchName" class="mx-auto my-1"><?php echo $name ?></span><br>
                                        <b class="mx-auto"><?php echo $price ?></b>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="row overflow-auto no-scrollbar">
                <ul class="d-flex justify-content-start justify-content-lg-center gap-3 m-0">
                <?php
                        $tagQuery = mysqli_query($conn, "SELECT * FROM tags");

                        while($tagRow = mysqli_fetch_row($tagQuery)){
                            $id = $tagRow[0];
                            $tag = $tagRow[1];

                            $liTag = strtoupper($tag);
                    ?>
                    <li class="nav-item py-2">
                        <a href="./products.php?tag=<?php echo $liTag?>"><span><?php echo $liTag?></span></a>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div id="products" class="container my-4">
            <div class="row">
                <?php 
                    
                    if (empty($_GET)) {
                        $query = mysqli_query($conn, "SELECT * FROM products");
                    } else {
                        $tagName = $_GET['tag'];
                        $query = mysqli_query($conn, "SELECT * FROM products INNER JOIN producttags ON products.id = producttags.productID WHERE producttags.tag='$tagName'");
                    }

                    while($row = mysqli_fetch_row($query)){
                        $id = $row[0];
                        $name = $row[1];
                        $price = $row[2];
                        $link = $row[3];
                        $image = $row[4];
                ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <a id="furniture__link" href="<?php echo $link ?>" target="_blank">
                        <div class="furniture__card">
                            <img id="furniture__img" src="./img/static/<?php echo $image ?>" alt="Furniture <?php echo $id ?>">
                            <div id="furniture__bottom" class="d-flex flex-column py-2">
                                <span id="furniture__id"><?php echo $name ?></span>
                                <b id="furniture__price" class="mt-1"><?php echo $price ?></b>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <div id="to-top">
        <i class="bi-caret-up"></i>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>
</html>