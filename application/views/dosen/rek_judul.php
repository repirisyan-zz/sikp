<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#ajukanJudul">Rekomendasi Judul
                        <i class="now-ui-icons ui-1_simple-add"></i></button>
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Rekomendasi Judul</caption>
                            <thead class="text-primary">
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Keterangan
                                </th>
                                <th class="text-center">
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($rek_judul->result_array() as $i):
                                        $id = $i['id'];
                                        $judul = $i['judul'];
                                        $status = $i['status_judul'];
                                        $keterangan = $i['keterangan'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $judul?>
                                    </td>
                                    <td>
                                        <?php if($status == 1){echo 'Belum diambil';}else{echo 'Sudah diambil';}?>
                                    </td>
                                    <td>
                                        <?=$keterangan?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubahJudul<?=$id?>">Ubah <i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapusJudul<?=$id?>">Hapus
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

<!-- Modal Rekomendasi Judul-->
<div class="modal fade" id="ajukanJudul" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Rekomendasi Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Dosen/Rek_judul/tambah_judul','class="form_login"');?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Judul</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="judul" required maxlength="255">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" class="form-control" cols="35" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-success">Simpan&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Rekomendasi Judul-->
<?php
    foreach($rek_judul->result_array() as $i):
    $id = $i['id'];
    $judul = $i['judul'];
    $keterangan = $i['keterangan'];
?>
<div class="modal fade" id="ubahJudul<?=$id?>" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Rekomendasi Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Dosen/Rek_judul/ubah_judul','class="form_login"');?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Judul</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="id" value="<?=$id?>" hidden>
                            <input type="text" class="form-control" name="judul" value="<?=$judul?>" required
                                maxlength="255">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" class="form-control" cols="35"
                                rows="10"><?=$keterangan?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-warning">Ubah&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach?>

<!-- Modal Hapus Rekomendasi Judul-->
<?php
    foreach($rek_judul->result_array() as $i):
    $id = $i['id'];
    $judul = $i['judul'];
?>
<div class="modal fade" id="hapusJudul<?=$id?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Rekomendasi Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Dosen/Rek_judul/hapus_judul','class="form_login"');?>
                    <p>Anda yakin akan menghapus rekomendasi judul <strong><?=$judul?></strong> ?</p>
                </div>
                <input type="text" class="form-control" name="id" value="<?=$id?>" hidden required maxlength="255">
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-danger">Hapus&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach?>