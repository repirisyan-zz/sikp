<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahMhs">Tambah Data
                        <i class="now-ui-icons ui-1_simple-add"></i></a>
                    <table class="table nowrap" id="myTable" style="width: 100%;">
                        <caption>Daftar Mahasiswa</caption>
                        <thead class="text-primary">
                            <th>
                                NPM
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Kemajuan
                            </th>
                            <th>
                                Status
                            </th>
                            <th class="text-center">
                                Aksi
                            </th>
                        </thead>
                        <tbody id="myTable">
                            <?php
                                    foreach($data_mhs->result_array() as $i):
                                        $npm = $i['npm'];
                                        $nama = $i['nama'];
                                        $kemajuan = $i['kemajuan'];
                                        $status = $i['status'];
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $npm?>
                                </td>
                                <td class="namaa">
                                    <?php echo $nama?>
                                </td>
                                <td>
                                    <?php if($kemajuan == 'Mulai Kerja Praktek'){
                                        echo '<svg height="20" width="20">
                                        <circle cx="10" cy="10" r="5" stroke-width="3" fill="#e74c3c" />
                                      </svg>';
                                    }else if($kemajuan == 'Pengajuan Proposal'){
                                        echo '<svg height="20" width="20">
                                        <circle cx="10" cy="10" r="5" stroke-width="3" fill="#f1c40f" />
                                      </svg>';
                                    }else if($kemajuan == 'Bimbingan'){
                                        echo '<svg height="20" width="20">
                                        <circle cx="10" cy="10" r="5" stroke-width="3" fill="#2ecc71" />
                                      </svg>'; 
                                    }else if($kemajuan == 'Seminar'){
                                        echo '<svg height="20" width="20">
                                        <circle cx="10" cy="10" r="5" stroke-width="3" fill="#3498db" />
                                      </svg>'; 
                                    };?>
                                    <?php echo $kemajuan?>
                                </td>
                                <td>
                                    <?php echo $status?>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning" data-toggle="modal"
                                        data-target="#ubahMhs<?php echo $npm?>">Ubah <i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal"
                                        data-target="#hapusMhs<?php echo $npm?>">Hapus
                                        <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mahasiswa-->
<div class="modal fade" id="tambahMhs" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Staff/Kelola_mhs/tambah_mhs','class="form_login"');?>
                <div class="container">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="npm" maxlength="20" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" onkeydown="upperCaseF(this)"
                                maxlength="255" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-success">Simpan&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
    foreach($data_mhs->result_array() as $i):
    $npm = $i['npm'];
    $nama = $i['nama'];
?>
<!-- Modal Ubah Mahasiswa-->
<div class="modal fade" id="ubahMhs<?php echo $npm?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Ubah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open('Staff/Kelola_mhs/ubah_mhs','class="form_login"');?>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" readonly name="npm" value="<?php echo $npm?>"
                                maxlength="20" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" onkeydown="upperCaseF(this)" name="nama"
                                value="<?php echo $nama?>" maxlength="255" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-warning">Ubah&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach?>

<!-- Modal Hapus Data Mahasiswa-->
<?php
    foreach($data_mhs->result_array() as $i):
    $npm = $i['npm'];
    $nama = $i['nama'];
?>
<div class="modal fade" id="hapusMhs<?php echo $npm?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open('Staff/Kelola_mhs/hapus_mhs','class="form_login"');?>
                    <input type="text" class="form-control" value="<?php echo $npm?>" hidden name="npm" maxlength="20"
                        required>
                    <div class="container">
                        <p class="font-font-weight-normal">Apa anda yakin akan menghapus data mahasiswa
                            <strong><?php echo $nama?></strong> ?
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-danger">Hapus&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>