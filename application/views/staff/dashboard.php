<div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Total Mahasiswa</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('total_mhs')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Total Dosen</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('total_dosen')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Total Dosen Pembimbing</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('total_dosen_pem')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Pengajuan Proposal</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('tot_pengajuan_prop')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-newdg1 mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Mahasiswa Bimbingan</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('tot_mhs_bimbingan')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Mahasiswa Sidang</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('jml_mhs_sidang')?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <caption>Daftar Jadwal Semina Mahasiswa</caption>
                            <thead class=" text-primary">
                                <th>
                                    NPM
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Dosen Pembimbing
                                </th>
                                <th>
                                    Tanggal
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach($data_sidang->result_array() as $i):
                                    $npm = $i['npm'];
                                    $nama = $i['nama'];
                                    $judul = $i['judul'];
                                    $nama_dosen = $i['nama_dosen'];
                                    $tanggal = $i['tanggal_sidang'];
                                ?>
                                <tr>
                                    <td>
                                        <?=$npm?>
                                    </td>
                                    <td>
                                        <?=$nama?>
                                    </td>
                                    <td>
                                        <?=$judul?>
                                    </td>
                                    <td>
                                        <?=$nama_dosen?>
                                    </td>
                                    <td>
                                        <?=$tanggal?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>