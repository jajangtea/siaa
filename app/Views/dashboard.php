<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIMANIS - Home</title>
    <link href="<?= base_url('asset/css/styles.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('asset/ui/img/favicon.png')?>" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutDefault">
        <div id="layoutDefault_content">
            <main>
                <!-- Navbar-->
                <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
                    <div class="container px-5">
                        <a class="navbar-brand text-white" href="<?= base_url('/dashboard') ?>">SIMANIS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto me-lg-5">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('/dashboard') ?>">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://lms.sman5-tpi.sch.id">E-Learning</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://pustaka.sman5-tpi.sch.id">E-Library</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('simple') ?>">Pencarian Alumni & Siswa</a></li>
                                <li class="nav-item dropdown no-caret">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Social Media
                                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                                        <a class="dropdown-item py-3" href="https://www.instagram.com/official.sman5tpi/?hl=id" target="_blank">
                                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="instagram"></i></div>
                                            <div>
                                                <div class="small text-gray-500">Like and Subscribe</div>
                                                Instagram
                                            </div>
                                        </a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item py-3" href="https://www.facebook.com/stella.tanjungpinang" target="_blank">
                                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="facebook"></i></div>
                                            <div>
                                                <div class="small text-gray-500">Like and Subscribe</div>
                                                Facebook
                                            </div>
                                        </a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item py-3" href="https://www.youtube.com/watch?v=Egcw3WCkBZQ&t=4s" target="_blank">
                                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="youtube"></i></div>
                                            <div>
                                                <div class="small text-gray-500">Like and Subscribe</div>
                                                Youtube
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <a class="btn fw-500 ms-lg-4 btn-teal" href="https://www.sman5-tpi.sch.id">
                                Official Site
                                <i class="ms-2" data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <!-- Page Header-->
                <header class="page-header-ui page-header-ui-dark bg-gradient-primary-to-secondary">
                    <div class="page-header-ui-content pt-10">
                        <div class="container px-5">
                            <div class="row gx-5 align-items-center">
                                <div class="col-lg-6" data-aos="fade-up">
                                    <h1 class="page-header-ui-title">SIMANIS SMAN 5 Tanjungpinang</h1>
                                    <p class="page-header-ui-text mb-5">Merupakan Sistem Informasi Manajemen Alumni dan Siswa SMAN 5 Tanjungpinang agar database alumni terstruktur dengan baik.</p>
                                    <a class="btn btn-teal fw-500 me-2" href="<?= base_url('alumni/login_alumni') ?>">
                                        Login Alumni
                                        <i class="ms-2" data-feather="arrow-right"></i>
                                    </a>
                                    <a class="btn btn-purple   fw-500 me-2" href="<?= base_url('index.php/login') ?>">
                                        Login Pegawai
                                        <i class="ms-2" data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="col-lg-6 d-none d-lg-block" data-aos="fade-up" data-aos-delay="100"><img class="img-fluid" src="<?= base_url('asset/ui/img/illustrations/ealumni.png') ?>" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-white">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </header>
                <section class="bg-white py-10">
                    <div class="container px-5">
                        <div class="row gx-5 text-center">
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="users"></i></div>
                                <h3>Pencarian Data Siswa</h3>
                                <p class="mb-0">Dapat melakukan pencarian data siswa aktif di SMAN 5 Tanjungpinang dengan mudah <a href="#">Klik disini</a></p>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="trello"></i></div>
                                <h3>Pencarian Data Alumni</h3>
                                <p class="mb-0">Dapat melakukan pencarian data alumni di SMAN 5 Tanjungpinang dengan mudah <a href="#">Klik disini</a></p>
                            </div>
                            <div class="col-lg-4">
                                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4"><i data-feather="code"></i></div>
                                <h3>Developer Information</h3>
                                <p class="mb-0">SIMANIS di desain secara khusus agar mudah digunakan dan efisien mengorganisir data alumni dan siswa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-light">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </section>
                <section class="bg-light py-10">
                    <div class="container px-5">
                        <div class="row gx-5 align-items-center justify-content-center">
                            <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                                <div class="content-skewed content-skewed-right"><img class="content-skewed-item img-fluid shadow-lg rounded-3" src="<?= base_url('asset/img/prestasi.jpg') ?>" alt="..." /></div>
                            </div>
                            <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                                <div class="mb-5">
                                    <h2>Disini Kamu akan dapat bergabung dengan berbagai Ekskul</h2>
                                    <p class="lead">Siapkan diri untuk mendapatkan pengetahuan tambahan yang akan sangat berguna untuk masa depanmu dengan bergabung di Ekskul SMAN 5 Tanjungpinang</p>
                                </div>
                                <div class="row gx-5">
                                    <div class="col-md-6 mb-4">
                                        <h6>Pramuka</h6>
                                        <p class="mb-2 small">Pramuka merupakan kegiatan ekstrakurikuler
                                            yang bertujuan mewadahi bakat, minat, dan potensi anak untuk
                                            dikembangkan.</p>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>PMR</h6>
                                        <p class="mb-2 small mb-0">PMR merupakan kegiatan ekstrakurikuler yang berkaitan erat dengan dunia kesehatan dan kemanusiaan.</p>

                                    </div>
                                </div>
                                <div class="row gx-5">
                                    <div class="col-md-6 mb-4">
                                        <h6>Futsal</h6>
                                        <p class="mb-2 small mb-0">Ekstrakurikuler merupakan wadah siswa untuk menyalurkan hobi serta mendidik sportifitas dan mencetak bibit olahragawan berprestasi di tingkat lokal, nasional maupun internasional.</p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Paskibra</h6>
                                        <p class="small mb-0">Paskibra dapat menjadi media bagi anggotanya untuk membentuk nilai-nilai penting dalam diri. Di dalamnya terdapat nilai nilai seperti kedisiplinan, cinta tanah air, patriotisme.</p>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Programming</h6>
                                        <p class="small mb-0">Ekstrakurikuler Programming merupakan kegiatan yang melatih peserta didik dalam merancang aplikasi secara visual, Output dari Ekskul ini berupa program komputer yang dapat berjalan disetiap sistem operasi.</p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Multimedia</h6>
                                        <p class="small mb-0">Ekstrakurikuler Multimedia merupakan kegiatan tambahan yang diselenggarakan sekolah untuk mengembangkan bakat dan hobi siswa, terutama dalam dunia desain grafis.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="m-0" />
                <section class="bg-light pt-10">
                    <div class="container px-5">
                        <div class="text-center mb-5">
                            <h2>Kegiatan Siswa</h2>
                            <p class="lead">Come join and learning with us</p>
                        </div>
                        <div class="row gx-5 z-1">
                            <div class="col-lg-4 mb-5 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                                <div class="card pricing h-100">
                                    <div class="card-body p-5">
                                        <div class="text-center">
                                            <div class="badge bg-light text-dark rounded-pill badge-marketing badge-sm">Kegiatan Rohani</div>
                                            <div class="content-skewed content-skewed-center"><img class="content-skewed-item img-fluid shadow-lg rounded-6" src="<?= base_url('asset/img/rohani.png') ?>" alt="..." /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-5 mb-lg-n10" data-aos="fade-up">
                                <div class="card pricing h-100">
                                    <div class="card-body p-5">
                                        <div class="text-center">
                                            <div class="badge bg-light text-dark rounded-pill badge-marketing badge-sm">Ekskul Futsal</div>
                                            <div class="content-skewed content-skewed-center"><img class="content-skewed-item img-fluid shadow-lg rounded-6" src="<?= base_url('asset/img/futsal.jpg') ?>" alt="..." /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-lg-n10" data-aos="fade-up" data-aos-delay="100">
                                <div class="card pricing h-100">
                                    <div class="card-body p-5">
                                        <div class="text-center">
                                            <div class="badge bg-light text-dark rounded-pill badge-marketing badge-sm">Kewirausahaan</div>
                                            <div class="content-skewed content-skewed-center"><img class="content-skewed-item img-fluid shadow-lg rounded-6" src="<?= base_url('asset/img/prestasi.jpg') ?>" alt="..." /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-dark">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>
                </section>
                <section class="bg-dark py-10">
                    <div class="container px-5">
                        <div class="row gx-5 my-10">
                            <div class="col-lg-6 mb-5">
                                <div class="d-flex h-100">
                                    <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                                    <div class="ms-4">
                                        <h5 class="text-white">Apa itu SIMANIS?</h5>
                                        <p class="text-white-50">SIMANIS Merupakan Sistem Informasi Manajemen Alumni dan Siswa SMAN 5 Tanjungpinang agar database alumni terorganisirs dengan baik.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-5">
                                <div class="d-flex h-100">
                                    <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                                    <div class="ms-4">
                                        <h5 class="text-white">Apa yang dapat dilakukan SIMANIS?</h5>
                                        <p class="text-white-50">SIMANIS dapat digunakan untuk melakukan tacking dan tracing data alumni serta dapat mencari data siswa yang aktif pada tahun pelajaran yang sedang berlangsung</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="d-flex h-100">
                                    <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                                    <div class="ms-4">
                                        <h5 class="text-white">Bagaimana cara menggunakan SIMANIS?</h5>
                                        <p class="text-white-50">SIMANIS di desain secara khusus agar mudah digunakan, alumni dapat mengupdate data riwayat pendidikan dan pekerjaan jika sudah dinyatakan lulus di SMAN 5 Tanjungpinang</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex h-100">
                                    <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-question"></i></div>
                                    <div class="ms-4">
                                        <h5 class="text-white">Siapa Saja yang dapat menggunakan SIMANIS?</h5>
                                        <p class="text-white-50">SIMANIS dapat digunakan oleh pihak sekolah untuk melihat kegiatan siswa setelah lulus sekolah dan dapat digunakan Alumni untuk mengupdate data riwayat pendidikan dan pekerjaan setelah lulus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5 justify-content-center text-center">
                            <div class="col-lg-8">
                                <div class="badge bg-transparent-light rounded-pill badge-marketing mb-4">Get Started</div>
                                <h2 class="text-white">Save time with E-Alumni</h2>
                                <p class="lead text-white-50 mb-5">E-Alumni</p>
                                <a class="btn btn-teal fw-500" href="https://www.sman5-tpi.sch.id/">Official Site</a>
                            </div>
                        </div>
                    </div>
                    <div class="svg-border-rounded text-white">
                        <!-- Rounded SVG Border-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor">
                            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0"></path>
                        </svg>
                    </div>

                    <hr class="m-0" />
            </main>
        </div>
        <div id="layoutDefault_footer">
            <footer class="footer pt-10 pb-5 mt-auto bg-light footer-light">
                <div class="container px-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="footer-brand">SIMANIS</div>
                            <div class="mb-3">Design made easy</div>
                            <div class="icon-list-social mb-5">
                                <a class="icon-list-social-link" href="https://www.instagram.com/official.sman5tpi/?hl=id"><i class="fab fa-instagram"></i></a>
                                <a class="icon-list-social-link" href="https://www.facebook.com/stella.tanjungpinang"><i class="fab fa-facebook"></i></a>
                                <a class="icon-list-social-link" href="https://www.youtube.com/watch?v=Egcw3WCkBZQ&t=4s"><i class="fab fa-youtube"></i></a>
                                <a class="icon-list-social-link" href="https://github.com/jajangtea"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row gx-5">
                                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                    <div class="text-uppercase-expanded text-xs mb-4">Product</div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><a href="#!">Landing</a></li>
                                        <li class="mb-2"><a href="#!">Pages</a></li>
                                        <li class="mb-2"><a href="#!">Sections</a></li>
                                        <li class="mb-2"><a href="#!">Documentation</a></li>
                                        <li><a href="#!">Changelog</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                                    <div class="text-uppercase-expanded text-xs mb-4">Technical</div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><a href="#!">Documentation</a></li>
                                        <li class="mb-2"><a href="#!">Changelog</a></li>
                                        <li class="mb-2"><a href="#!">Theme Customizer</a></li>
                                        <li><a href="#!">UI Kit</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                                    <div class="text-uppercase-expanded text-xs mb-4">Includes</div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><a href="#!">Utilities</a></li>
                                        <li class="mb-2"><a href="#!">Components</a></li>
                                        <li class="mb-2"><a href="#!">Layouts</a></li>
                                        <li class="mb-2"><a href="#!">Code Samples</a></li>
                                        <li class="mb-2"><a href="#!">Products</a></li>
                                        <li class="mb-2"><a href="#!">Affiliates</a></li>
                                        <li><a href="#!">Updates</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="text-uppercase-expanded text-xs mb-4">Legal</div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><a href="#!">Privacy Policy</a></li>
                                        <li class="mb-2"><a href="#!">Terms and Conditions</a></li>
                                        <li><a href="#!">License</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-5" />
                    <div class="row gx-5 align-items-center">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('asset/js/scripts.js') ?>"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true,
        });
    </script>
</body>

</html>