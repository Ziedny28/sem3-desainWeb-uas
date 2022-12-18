<?php
include_once('koneksi.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGLMeriah</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- top image -->
    <div class="darkened-image">
        <!-- top content and nav -->
        <div class="top pt-3">
            <div class="row">
                <h3 class="orange-text col-1 offset-1">NGLMeriah</h3>
                <nav class="col-4 offset-2">
                    <ul>
                        <li class="orange-text">Home</li>
                        <li class="top-links">Content 1</li>
                        <li class="top-links">Content 2</li>
                        <li class="top-links">About us</li>
                    </ul>
                </nav>

                <div class="register-login col-2 offset-2">
                    <a href="" class="top-links">Register</a>
                    <button type="button" class="btn btn-warning" id="btn-login">Login</button>
                </div>
            </div>
        </div>
        <!-- tulisan di paling atas -->
        <div class="row mt-5 pt-5">
            <div class="col-5 offset-1">
                <div class="top-words">
                    <h4 class="grey-text">Hello, We're</h4>
                    <h1 class="white-text">NGLMERIAH</h1>
                    <h4 class="orange-text">Your Travel Mate</h4>
                    <h6 class="white-text">Butuh melepaskan diri dari kesibukan dan healing? pas banget, NGLMERIAH
                        menyediakan layanan
                        travel, ke
                        seluruh Indonesia, untuk membantu anda melepas rasa penat. kami membantu anda dalam memilih
                        hotel, juga
                        mendapatkan jasa travel.</h6>
                </div>
            </div>
        </div>
    </div>


    <!-- php for read data -->
    <?php
    $sql = "SELECT * FROM destinasi 
    ORDER BY RAND() 
    LIMIT 3
    ";
    $hasil = mysqli_query($conn, $sql);

    ?>

    <!-- carousel -->
    <div class="carousel-destination reveal mt-200">
        <div class="row mt-5">
            <div class="col offset-1">
                <h2>Temukan Destinasi <div class="orange-text">Populer</div>
                </h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-8 offset-2">
                <div id="carouselExampleCaptions"class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                            <div class="carousel-item">
                                <img src="images/<?= $data["gambar_1"] ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="mb-5"><?= $data["nama_destinasi"] ?></h5>
                                    <p><?= $data["penjelasan_singkat"] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- paket / cards -->
    <div class="packs reveal mt-200">
        <h2 class="text-center mt-5">Dapatkan <span class="orange-text">Paket</span> Dan <span class="orange-text">Promo
                Menarik</span></h2>
        <div class="row mt-5">
            <div class="col-3 offset-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/puncak-main.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <button type="button" class="btn btn-warning " style="color: white;">order</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="images/puncak-main.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <button type="button" class="btn btn-warning " style="color: white;">order</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="images/puncak-main.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <button type="button" class="btn btn-warning " style="color: white;">order</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="reveal">
            <h3 class="text-center mt-5">Promo <span class="orange-text">Akhir Tahun</span></h3>
            <div class="row">
                <div class="col-3 offset-3">
                    <div class="card" style="width: 18rem;">
                        <img src="images/puncak-main.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the
                                card's content.</p>
                            <button type="button" class="btn btn-warning " style="color: white;">order</button>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="images/puncak-main.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                the
                                card's content.</p>
                            <button type="button" class="btn btn-warning " style="color: white;">order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- start explore -->
    <div class="start-explore reveal mt-200">
        <h2 class="text-center">Start Your <span class="orange-text">Exploration</span></h2>
        <h2 class="text-center">In Wonderfull <span class="orange-text">Indonesia</span></h2>
        <div class="row">
            <div class="col-4 offset-4">
                <p class="text-center grey-text-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas
                    suscipit, exercitationem nihil officia
                    itaque
                    vel saepe laudantium iste veritatis minima sapiente quidem, reprehenderit nam sint optio expedita
                    architecto.
                    Voluptate architecto perferendis, non assumenda vel dicta aliquam illo earum nam corporis.</p>
            </div>
        </div>
        <div class="row reveal">
            <div class="col-8 offset-2">
                <img class="w-100" src="images/indonesia.jpg" alt="">
            </div>
        </div>
    </div>

    <!-- comment -->
    <div class="comment reveal">
        <div class="row">
            <div class="col-4 offset-1">
                <div class="comment-left">
                    <div class="comment-title">
                        <h2>What <span class="orange-text">Explorers</span></h2>
                        <h2>Say About <span class="orange-text">Us</span></h2>
                    </div>
                    <div class="comment-explanation">
                        <p class="grey-text-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab exercitationem quos neque
                            voluptate
                            architecto deleniti!
                        </p>
                    </div>
                    <div class="comment-comment">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="comment-title-rating">
                                    <div>
                                        <h6 class="card-title">User101</h6>
                                        <p class="card-subtitle mb-2 text-muted">posted 2d ago</p>
                                    </div>
                                    <p>⭐⭐⭐⭐⭐</p>
                                </div>


                                <hr>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of
                                    the
                                    card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 offset-1">
                <div class="comment-right">
                    <img src="images/comment.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- quotes -->
    <div class="start-quotes reveal">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="fade-orange-box">
                    <div class="text-center mt-5">
                        <h2>Start <h2 class="orange-text">
                                Your Journey Here
                            </h2>
                        </h2>
                    </div>

                    <div class="row">
                        <div class="col-4 offset-4">
                            <p class="text-center mt-5 orange-text">Lorem ipsum dolor sit, amet consectetur adipisicing
                                elit. Itaque neque
                                impedit ratione. Numquam
                                repellendus, harum repellat tempore distinctio magni officia modi assumenda quibusdam,
                                asperiores
                                illo unde! Quas molestias obcaecati culpa?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>
</body>

</html>