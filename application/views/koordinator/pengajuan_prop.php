<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons files_single-copy-04"></i> Pengajuan
                            Proposal</span></h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pengajuan" role="tab"
                                aria-controls="pengajuan" aria-selected="true">Pengajuan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#riwayat" role="tab"
                                aria-controls="riwayat" aria-selected="false">Riwayat</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#riwayat_revisi" role="tab"
                                aria-controls="riwayat" aria-selected="false">Riwayat Revisi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="pengajuan" role="tabpanel"
                            aria-labelledby="home-tab">
                            <br>
                            <table class="table nowrap" id="myTable" style="width: 100%;">
                                <thead class="text-primary">
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Tahun Akademik</th>
                                    <th>Judul Kerja Praktek</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Proposal</th>
                                    <th>Status</th>
                                    <th class="text-center"">Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($data_proposal->result_array() as $b):
                                                    $nama = $b['nama'];
                                                    $npm = $b['npm'];
                                                    $judul = $b['judul'];
                                                    $tanggal = $b['tanggal_proposal'];
                                                    $file = $b['file'];
                                                    $status = $b['status_proposal'];
                                                    $rekomendasi = $b['rekomendasi_dosen'];
                                                    $tahun_akademik = $b['tahun_akademik'];
                                                ?>
                            <tr>
                            <td><?=$nama?></td>
                            <td><?=$npm?></td>
                            <td><?=$tahun_akademik?></td>
                            <td><?=$judul?></td>
                            <td><?=$tanggal?></td>
                            <td><a href=" <?=base_url('file/proposal/').$file?>" data-toggle="tooltip"
                                        data-placement="right" title="<?=$file?>"><i
                                            class="now-ui-icons files_paper"></i>
                                        Unduh</a>&nbsp;<?php if($rekomendasi=='1'){
                                  echo '<i class="fa fa-star"></i>';  
                                }?></td>
                                    <td><?=$status?></td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#terimaProp<?=$npm?>"><i class="now-ui-icons ui-1_check"></i>
                                            Terima</button>
                                        <button type="button" class="proposal_tolak btn btn-danger" data-toggle="modal"
                                            data-target="#tolakProp<?=$npm?>"><i
                                                class="now-ui-icons ui-1_simple-remove"></i>
                                            Tolak</button>
                                    </td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <table class="table nowrap" id="myTable1" style="width: 100%;">
                                <thead class="text-primary">
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Tahun Akademik</th>
                                    <th>Judul</th>
                                    <th>Tanggal Diterima</th>
                                </thead>
                                <tbody>
                                    <?php foreach($riwayat_proposal->result_array() as $b):
                                                    $nama = $b['nama'];
                                                    $npm = $b['npm'];
                                                    $judul = $b['judul'];
                                                    $tanggal = $b['tanggal_proposal'];
                                                    $tahun_akademik = $b['tahun_akademik'];
                                                ?>
                                    <tr>
                                        <td><?=$nama?></td>
                                        <td><?=$npm?></td>
                                        <td><?=$tahun_akademik?></td>
                                        <td><?=$judul?></td>
                                        <td><?=$tanggal?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="riwayat_revisi" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <table class="table nowrap" id="myTable2" style="width: 100%;">
                                <thead class="text-primary">
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Tahun Akademik</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                </thead>
                                <tbody>
                                    <?php foreach($riwayat_revisi->result_array() as $b):
                                                    $nama = $b['nama'];
                                                    $npm = $b['npm'];
                                                    $judul = $b['judul'];
                                                    $tanggal = $b['tanggal_proposal'];
                                                    $tahun_akademik = $b['tahun_akademik'];
                                                ?>
                                    <tr>
                                        <td><?=$nama?></td>
                                        <td><?=$npm?></td>
                                        <td><?=$tahun_akademik?></td>
                                        <td><?=$judul?></td>
                                        <td><?=$tanggal?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    foreach($data_proposal->result_array() as $i):
    $npm = $i['npm'];
    $nama = $i['nama'];
    $judul = $i['judul'];
    $rekomendasi = $b['rekomendasi_dosen'];
    ?>

    <!-- Modal Tolak Proposal -->
    <div class=" modal fade" id="tolakProp<?=$npm?>" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">
                        Tolak Proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php echo form_open_multipart('Koordinator/Pengajuan_prop/tolak_prop','class="form_login"');?>
                        <input type="number" name="rekomendasi" value="<?php echo $rekomendasi?>" hidden>
                        <input type="text" name="npm" value="<?php echo $npm?>" hidden>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Berkas Revisi</label>
                            <div class="col-sm-8">
                                <div class="custom-file mb-3">
                                    <input type="file" name="file" class="custom-file-input" id="validatedCustomFile"
                                        required>
                                    <label class="custom-file-label" for="validatedCustomFile">Pilih
                                        berkas...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea name="keterangan" class="form-control" cols="36" maxlength="100"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                    <button type="submit" class="save proposal_tolak btn btn-danger">
                        Tolak&nbsp;</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>


    <?php
    foreach($data_proposal->result_array() as $i):
    $npm = $i['npm'];
?>

    <!-- Modal Terima Proposal -->
    <div class="modal fade" id="terimaProp<?=$npm?>" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <?php echo form_open('Koordinator/Pengajuan_prop/terima_prop','class="form_login"');?>
                <input type="text" name="npm" value="<?php echo $npm?>" hidden required>
                <div class="modal-body d-flex justify-content-between">
                    <button type="button" class="cancel btn btn-secondary mr-1"
                        data-dismiss="modal">Batal&nbsp;</button>
                    <button type="submit" class="save btn btn-success">Terima&nbsp;</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>