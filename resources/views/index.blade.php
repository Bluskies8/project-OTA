<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>tampilan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="header shadow-lg d-flex justify-content-between px-3 position-fixed" style="height: 64px;background-color: #FF9142;color: white;top: 0px;width: 100%;z-index: 10;">
        <div class="h-100 d-flex align-items-center"><i class="fas fa-bars fa-thin fa-lg p-4 me-3"></i><img class="h-75 py-2" src="assets/img/logoWhite.png"></div>
        <div class="h-100 d-none d-lg-flex justify-content-center align-items-center"><button class="btn" type="button">HOME</button>
            <div class="dropdown"><button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">ACTIVITIES</button>
                <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
            </div><button class="btn" type="button">EVENT</button><button class="btn" type="button">PROMO</button>
            <div class="dropdown"><button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">HELP DESK</button>
                <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
            </div>
        </div>
        <div class="h-100 d-flex align-items-center justify-content-end p-3"><i class="fas fa-thin fa-user-group"></i><button class="btn" type="button">Login</button><button class="btn" type="button" style="border: 1px solid;border-radius: 25px;border-color: rgb(255,255,255,0.5);">Register</button></div>
    </div>
    <div class="container p-5 pb-0 mb-5">
        <section class="shadow pt-3 p-4 card mt-5" id="section-quick-action">
            <div>
                <ul class="nav nav-tabs" role="tablist" style="border-bottom: none;">
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1"><i class="fas fa-thin fa-plane-departure me-2"></i>FLIGHT<br></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2"><i class="fas fa-thin fa-house-building me-2"></i>TOUR</a></li>
                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="d-flex align-items-center">
                            <h3 class="text-uppercase color-main me-3">book your flight<br></h3>
                            <div class="form-check me-2 mb-0"><input class="form-check-input" type="radio" id="formCheck-1" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);"><label class="form-check-label" for="formCheck-1">Round-Trip</label></div>
                            <div class="form-check me-2 mb-0"><input class="form-check-input" type="radio" id="formCheck-2" name="flight-type" style="filter: hue-rotate(180deg) saturate(160%);"><label class="form-check-label" for="formCheck-2">One-Way</label></div>
                        </div>
                        <form class="mt-3">
                            <div class="row mb-4">
                                <div class="col-4">
                                    <div class="position-relative"><select class="form-select">
                                            <optgroup label="This is a group">
                                                <option value="12" selected="">This is item 1</option>
                                                <option value="13">This is item 2</option>
                                                <option value="14">This is item 3</option>
                                            </optgroup>
                                        </select>
                                        <p class="position-absolute color-sub input-head">Departure</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative"><select class="form-select">
                                            <optgroup label="This is a group">
                                                <option value="12" selected="">This is item 1</option>
                                                <option value="13">This is item 2</option>
                                                <option value="14">This is item 3</option>
                                            </optgroup>
                                        </select>
                                        <p class="position-absolute color-sub input-head">Destination</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="position-relative"><input class="form-control" type="date">
                                        <p class="position-absolute color-sub input-head">Depart</p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="position-relative">
                                        <p class="position-absolute color-sub input-head">Return</p><input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="position-relative">
                                        <p class="position-absolute color-sub input-head">Passenger</p><input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative"><select class="form-select">
                                            <optgroup label="This is a group">
                                                <option value="12" selected="">This is item 1</option>
                                                <option value="13">This is item 2</option>
                                                <option value="14">This is item 3</option>
                                            </optgroup>
                                        </select>
                                        <p class="position-absolute color-sub input-head">Class</p>
                                    </div>
                                </div>
                                <div class="col text-end"><button class="btn bgcolor-main" type="button">Search</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div class="d-flex align-items-center">
                            <h3 class="text-uppercase color-main me-3">travels beyond</h3>
                        </div>
                        <form class="mt-3 text-end"><input class="form-control mb-4" type="text" placeholder="City, destination or tour name"><button class="btn bgcolor-main" type="button">Explore</button></form>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>The content of your modal.</p>
                        </div>
                        <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-carousel" class="mt-5">
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image" style="max-height: 420px;object-fit: none;"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev" style="width: 10%;"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next" style="width: 10%;"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <ol class="carousel-indicators color-main">
                    <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                </ol>
            </div>
        </section>
        <section id="section-package-1" class="mt-5 text-center section-package">
            <h2 class="text-uppercase color-main">holiday package</h2>
            <h5 class="mb-3 color-sub">Travel to exciting destinations with flights, hotel, transfers and tours - all packaged up!<br></h5>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-2">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col px-4">
                                <div style="background-color: #FF9142;border-radius: 16px;color: white;">
                                    <div class="card position-relative" style="height: 520px;border: none;background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.75)),url(assets/img/bg_japan.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;">
                                        <div class="card-body d-flex flex-column justify-content-between" style="z-index: 2;text-align: start;">
                                            <h3 class="text-uppercase card-title mt-3">7 days exploration osaka - tokyo</h3>
                                            <div class="mb-3">
                                                <div>
                                                    <p>Starting from</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h2>Rp 25.000.000</h2>
                                                    <div style="font-size: 24px;"><i class="far fa-heart"></i><i class="fas fa-heart" style="display: none;"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="font-size: 20px;margin-top: 4px;padding-bottom: 4px;">Book Now&nbsp;<i class="fas fa-angle-right"></i></p>
                                </div>
                            </div>
                            <div class="col px-4">
                                <div style="background-color: #FF9142;border-radius: 16px;color: white;">
                                    <div class="card position-relative" style="height: 520px;border: none;background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.75)),url(assets/img/bg_japan.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;">
                                        <div class="card-body d-flex flex-column justify-content-between" style="z-index: 2;text-align: start;">
                                            <h3 class="text-uppercase card-title mt-3">7 days exploration osaka - tokyo</h3>
                                            <div class="mb-3">
                                                <div>
                                                    <p>Starting from</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h2>Rp 25.000.000</h2>
                                                    <div style="font-size: 24px;"><i class="far fa-heart"></i><i class="fas fa-heart" style="display: none;"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="font-size: 20px;margin-top: 4px;padding-bottom: 4px;">Book Now&nbsp;<i class="fas fa-angle-right"></i></p>
                                </div>
                            </div>
                            <div class="col px-4">
                                <div style="background-color: #FF9142;border-radius: 16px;color: white;">
                                    <div class="card position-relative" style="height: 520px;border: none;background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.75)),url(assets/img/bg_japan.jpg);background-repeat: no-repeat;background-size: cover;background-position: center center;">
                                        <div class="card-body d-flex flex-column justify-content-between" style="z-index: 2;text-align: start;">
                                            <h3 class="text-uppercase card-title mt-3">7 days exploration osaka - tokyo</h3>
                                            <div class="mb-3">
                                                <div>
                                                    <p>Starting from</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h2>Rp 25.000.000</h2>
                                                    <div style="font-size: 24px;"><i class="far fa-heart"></i><i class="fas fa-heart" style="display: none;"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="font-size: 20px;margin-top: 4px;padding-bottom: 4px;">Book Now&nbsp;<i class="fas fa-angle-right"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none"><a class="carousel-control-prev" href="#carousel-2" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-2" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <ol class="carousel-indicators" style="margin-bottom: 0;bottom: -22px;">
                    <li data-bs-target="#carousel-2" data-bs-slide-to="0" class="active"></li>
                </ol>
            </div>
        </section>
    </div>
    <section id="section-footer">
        <div class="py-3" style="background-image: linear-gradient(0deg, rgba(255, 206, 160, 0.6), rgba(255, 206, 160, 0.6)), url(assets/img/bg_footer.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-3">Lila Travel &amp; Tour</h2>
                        <div>
                            <p class="mb-1">About Us</p>
                            <p class="mb-1">Corporate</p>
                            <p class="mb-1">Privacy &amp; Policy</p>
                            <p class="mb-1">FAQ</p>
                            <p class="mb-1">Contact Us</p>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="mb-3">Manage Booking</h2>
                        <div>
                            <p class="mb-1">Flights</p>
                            <p class="mb-1">Tour</p>
                        </div>
                    </div>
                    <div class="col d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="mb-3">Follow Us</h2>
                            <div><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-whatsapp fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-instagram fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-youtube fa-stack-1x" style="color: white;"></i></span><span class="fa-stack me-3"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-facebook-square fa-stack-1x" style="color: white;"></i></span></div>
                        </div>
                        <p style="max-width: 280px;">Jl Raya Puputan NO 16D, Renon Denpasar - Bali, Indonesia<br></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-2" style="background-color: #FF9142;color: white;text-align: center;">
            <p>lila.co.id © 2021. All rights reserved.<br></p>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2703c9f9d9.js" crossorigin="anonymous"></script>
</body>

</html>