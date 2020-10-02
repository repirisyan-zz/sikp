<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons education_agenda-bookmark"></i> Judul
                            Kerja Praktek</span></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Judul Kerja Praktek Mahasiswa</caption>
                            <thead class="text-primary">
                                <th>
                                    NPM
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Judul Kerja Praktek
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
                                        $judul = $i['judul'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $npm?>
                                    </td>
                                    <td>
                                        <?php echo $nama?>
                                    </td>
                                    <td>
                                        <?php echo $judul?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubahJudul<?php echo $npm?>">Ubah&nbsp;<i
                                                class="fa fa-edit"></i></button>
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

<?php
    foreach($data_mhs->result_array() as $i):
    $npm = $i['npm'];
    $nama = $i['nama'];
    $judul = $i['judul'];
?>
<!-- Modal Ubah Mahasiswa-->
<div class="modal fade" id="ubahJudul<?php echo $npm?>" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Judul Kerja Praktek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open('Koordinator/Judul_mhs/ubah_judul','class="form_login"');?>
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
                            <input type="text" class="form-control" value="<?php echo $nama?>" maxlength="255" required
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputState" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" value="<?php echo $judul?>"
                                maxlength="255" required>
                        </div>
                    </div>
                    <button type="submit" class="save btn btn-warning float-right">Ubah&nbsp;</button>
                    <button type="button" class="cancel btn btn-secondary float-right" data-dismiss="modal">Batal&nbsp;</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach?>