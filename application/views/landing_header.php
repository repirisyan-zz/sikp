<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="http://ft.unsur.ac.id/" target="_blank" rel="noopener noreferrer">
                <img src="<?=base_url('assets/img/logo_ft.png')?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="#" class="text-white text-decoration-none ml-auto" id="login" data-toggle="modal"
                    data-target="#modalLogin">
                    <i class="fa fa-sign-in-alt"></i>&nbsp;Login
                </a>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <img src="<?=base_url('assets/img/modal_login/staff_login.jpg')?>"
                                    class="card-img-top img-thumbnail" alt="Staff">
                                <div class="card-body">
                                    <a href="<?=base_url('Staff/Staff/login')?>"
                                        class="btn btn-primary btn-block">Staff</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card"">
                            <img src=" <?=base_url('assets/img/modal_login/koordinator_login.jpg')?>"
                                class="card-img-top img-thumbnail" alt="Koordinator">
                                <div class="card-body">
                                    <a href="<?=base_url('Koordinator/Koordinator/login')?>"
                                        class="btn btn-primary btn-block">Koordinator</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card"">
                            <img src=" <?=base_url('assets/img/modal_login/dosen_login.jpg')?>"
                                class="card-img-top img-thumbnail" alt="Dosen">
                                <div class="card-body">
                                    <a href="<?=base_url('Dosen/Dosen/login')?>"
                                        class="btn btn-primary btn-block">Dosen</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <img src="<?=base_url('assets/img/modal_login/mhs_login.jpg')?>"
                                    class="card-img-top img-thumbnail" alt="Mahasiswa">
                                <div class="card-body">
                                    <a href="<?=base_url('Mahasiswa/Mahasiswa/login')?>"
                                        class="btn btn-primary btn-block">Mahasiswa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>