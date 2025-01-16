<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>To One Coffe</title>
    <link re l="stylesheet" href="<?= base_url() ?>/public/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>/public/images/favicon.png" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?= base_url() ?>/public/vendors/feather/styles.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>

                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- Masthead-->

    <header class="masthead" style="background-image: url('<?= base_url('public/images/t.jpg') ?>');">
        <div class="container" style="position: relative;">
            <!-- Konten utama di tengah -->
            <div class="masthead-subheading">Selamat Berbelanja</div>
            <div class="masthead-heading text-uppercase">TO ONE COFFEE</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="<?= base_url('dashboard/goToMenu') ?>">Pesan Sekarang</a>

            <!-- Tombol Admin di Kanan Atas - Modern dan Klasik -->
            <button type="button" class="btn btn-admin" onclick="bukaModalLogin()" style="position: absolute; top: -270px; right: -95px;">
                <i class="mdi mdi-account-check"></i> Admin
            </button>
        </div>
    </header>

    <style>
        .btn-admin {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #5D4037;
            /* Coklat klasik */
            color: #fff;
            border: 2px solid #3E2723;
            /* Darker border for classic effect */
            border-radius: 50px;
            /* Rounded corners */
            text-transform: uppercase;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Soft shadow for modern look */
            transition: all 0.3s ease;
            /* Smooth transition */
        }

        .btn-admin i {
            margin-right: 10px;
            /* Spacing between icon and text */
        }

        .btn-admin:hover {
            background-color: #3E2723;
            /* Darker background on hover */
            border-color: #5D4037;
            /* Lighter border on hover */
            transform: translateY(-3px);
            /* Slight lift effect */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            /* Stronger shadow on hover */
        }

        .btn-admin:focus {
            outline: none;
            /* Remove outline on focus */
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.5);
            /* Glow effect on focus */
        }
    </style>



    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Pemesanan</h4>
                    <p class="text-muted">Nikmati rasa coofe yang begitu nikmat dan mari pesan sekarang.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Responsive </h4>
                    <p class="text-muted">Anda bisa memesannya melalui online</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3"> Keamanan</h4>
                    <p class="text-muted">Kerahasian pelanggan adalah tugas kami</p>
                </div>
            </div>
        </div>
    </section>
    

            <!-- Modal -->


            <!-- Modal -->


            <!-- Modal -->
            <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login admin.</h5>
                        </div>
                        <div class="modal-body">
                            <div id="errorLogin" class="mb-3"></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="idUser" class="form-control text-dark">
                                        <?php if (isset($user) && is_array($user)) : ?>
                                            <?php foreach ($user as $u) : ?>
                                                <option value="<?= $u['id'] ?>"><?= $u['nama'] ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option disabled>Tidak ada pengguna tersedia</option>
                                        <?php endif; ?>
                                    </select>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white">Password</span>
                                    </div>
                                    <input type="password" id="pass" class="form-control" aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="tutupModalLogin()">Batal</button>
                            <button type="button" class="btn btn-warning" onclick="login()" id="simpanTransaksi">Log in</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script src="<?php echo base_url() ?>/public/js/jquery/jquery.min.js"></script>
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-6WFPrizFRakRY4kd"></script>
    <script>
        var pesanan = [];
        var ditemukan = false
        var jmlPesanan = 0

        function bukaModalKeranjang() {
            tampilkanPesanan()
            $("#modalKeranjang").modal("show")
            $("#peringatan").hide()
        }

        function bukaModalLogin() {
            $("#modalLogin").modal("show")
        }

        function login() {
            idUser = $("#idUser").val()
            pass = $("#pass").val()

            if ($("#pass").val() == "") {
                $("#pass").focus();
            } else {
                $.ajax({
                    type: 'POST',
                    data: 'idUser=' + idUser + '&pass=' + pass,
                    url: '<?= base_url() ?>/dashboard/auth',
                    dataType: 'json',
                    success: function(data) {
                        if (data == "") {
                            window.location.href = "antrian";
                        } else {
                            $("#errorLogin").html(data)
                        }
                    }
                });
            }
        }





        function tutupModalKeranjang() {
            $("#modalKeranjang").modal("hide")
        }

        function tutupModalSelesai() {
            $("#modalSelesai").modal("hide")
        }

        function tutupModalLogin() {
            $("#modalLogin").modal("hide")
        }
    </script>
    <!-- Portfolio Grid-->

    <!-- About-->

    <!-- Team-->
    <!-- <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2> -->
    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
    <!-- </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                        <h4>Parveen Anand</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Dengan adanya kami coofe anda pasti akan terasa nikmat</p>
                </div>
            </div>
        </div>
    </section>
     Clients-->

    <!-- Contact-->

    <!-- Footer-->

    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Threads
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Illustration
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->

    <!-- Portfolio item 3 modal popup-->

    <!-- Bootstrap core JS-->
    <script src="<?= base_url() ?>/public/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url() ?>/public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>/public/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/public/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/public/js/template.js"></script>
    <script src="<?= base_url() ?>/public/js/settings.js"></script>
    <script src="<?= base_url() ?>/public/js/todolist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>/public/js/scripts.js"></script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>