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
    <title>Furniture Website</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <header>
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
                            <a href="#map"><span class="header-text"> Location</span></a>
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
        <section id="image-slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./img/slider/slider-1.webp" class="carousel-img d-block w-100" alt="Slider Image 1">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/slider/slider-2.webp" class="carousel-img d-block w-100" alt="Slider Image 2">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/slider/slider-3.webp" class="carousel-img d-block w-100" alt="Slider Image 3">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section id="card-items">
            <div class="container">
                <div class="row py-4 p-md-5">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 my-xl-0">
                        <a id="card__link" href="products.php?tag=LIVING ROOM">
                            <div class="card__nav">
                                <span class="mt-2">Living Room</span>
                                <img src="./img/card/card-1.webp" alt="Card Image 1" width="290" height="148">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 my-xl-0">
                        <a id="card__link" href="products.php?tag=KITCHEN">
                            <div class="card__nav">
                                <span class="mt-2">Kitchen</span>
                                <img src="./img/card/card-2.webp" alt="Card Image 2" width="290" height="148">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 my-xl-0">
                        <a id="card__link" href="products.php?tag=BEDROOM">
                            <div class="card__nav">
                                <span class="mt-2">Bedroom</span>
                                <img src="./img/card/card-3.webp" alt="Card Image 3" width="290" height="148">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-3 my-xl-0">
                        <a id="card__link" href="products.php?tag=DECORATION">
                            <div class="card__nav">
                                <span class="mt-2">Decoration</span>
                                <img src="./img/card/card-4.webp" alt="Card Image 4" width="290" height="148">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="high-quality" class="mt-5">
            <div class="d-flex flex-column align-items-center position-relative">
                <div class="hq-background"><span>Best quality and long lasting.</span></div>
                <img class="hq-img" src="./img/sofa.webp" alt="Sofa">
            </div>
        </section>
        <h3 id="rf-text" class="text-center p-2">OUR SELECTIONS FOR YOU</h3>
        <section id="random-furniture">
            <div class="container">
                <div class="row">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM products ORDER BY RAND() LIMIT 6");

                        while ($row = mysqli_fetch_row($query)) {
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
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <div id="contact" class="mt-5">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-center p-3">
                <a href="https://wa.me/+3721234567890?text=Hey%20i%20wanna%20buy%20a%20furniture%2C%20can%20you%20help%20me%3F" target="_blank">
                    <div id="contact__phone" class="d-flex align-items-center py-2 py-md-0 gap-4">
                        <i class="bi-telephone" style="font-size: 32px;"></i>
                        <span id="contact__number"> +372 123 456 7890</span>
                    </div>
                </a>
                <div class="d-none d-md-block mx-4" style="width: 1px; height: 48px; background-color: black;"></div>
                <span id="contact__text">Call now to order.</span>
            </div>
        </div>
        <section id="map">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center gap-3">
                    <i class="bi-geo-alt nav-icon" style="font-size: 32px;"></i>
                    <span id="map__text"> ABC Quarter ABC Street No:X Zeytinburnu/İstanbul</span>
                </div>
                <div class="mt-4">
                    <iframe id="g-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31236.50056056993!2d29.00387063577636!3d41.00711264622764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caca68143c999f%3A0x63005b61fde9dfb5!2sBosphorus!5e0!3m2!1sen!2str!4v1655677588595!5m2!1sen!2str" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container text-center">
            <div class="d-flex flex-md-row align-items-center justify-content-center gap-5 p-4">
                <div class="icon-box">
                    <a href="https://wa.me/+3721234567890?text=Hey%20i%20wanna%20buy%20a%20furniture%2C%20can%20you%20help%20me%3F" target="_blank"><i class="bi-whatsapp" style="font-size: 26px;"></i></a>
                </div>
                <div class="icon-box">
                    <a href="https://instagram.com" target="_blank"><i class="bi-instagram" style="font-size: 26px;"></i></a>
                </div>
                <div class="icon-box">
                    <a href="mailto:x@gmail.com"><i class="bi-envelope" style="font-size: 26px;"></i></a>
                </div>
            </div>
            <span style="font-size: 14px;">© 2022 | All Rights Reserved.</span>
        </div>
    </footer>
    <div id="to-top">
        <i class="bi-caret-up"></i>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>
</html>