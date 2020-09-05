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
                    <div class="table-responsive">
                        <table class="table" id="myTable" style="width: 100%;">
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
                            <tbody>
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
                                    <td>
                                        <?php echo $nama?>
                                    </td>
                                    <td>
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
</div>

<!-- Modal Tambah Mahasiswa-->
<div class="modal fade" id="tambahMhs" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Staff/Kelola_mhs/tambah_mhs','class="form_login"');?>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="npm" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" maxlength="255" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Staff/Kelola_mhs/ubah_mhs','class="form_login"');?>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly name="npm" value="<?php echo $npm?>"
                            maxlength="20" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama?>" maxlength="255"
                            required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Ubah</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Staff/Kelola_mhs/hapus_mhs','class="form_login"');?>
                <input type="text" class="form-control" value="<?php echo $npm?>" hidden name="npm" maxlength="20"
                    required>
                Apakah anda yakin menghapus data mahasiswa <br>
                NPM : <strong><?php echo $npm?></strong><br>
                Nama : <strong><?php echo $nama?></strong><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>