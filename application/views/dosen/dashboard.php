<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-6 col-lg-3 col-md-3">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Total Rekomendasi Judul</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('total_rek_judul');?></h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Rekomendasi Judul Diambil</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('tot_ambil_rekjudul')?></h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Mahasiswa Bimbingan</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('tot_mhs_bimbingan')?></h5>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center title">Mahasiswa Seminar</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $this->session->userdata('jml_mhs_sidang')?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons ui-1_calendar-60"></i> Jadwal
                            Seminar</span></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Jadwal Seminar Mahasiswa Bimbingan</caption>
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
                                    Dosen Penguji
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
                                    $nama_penguji = $i['nama_penguji'];
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
                                        <?=$nama_penguji?>
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