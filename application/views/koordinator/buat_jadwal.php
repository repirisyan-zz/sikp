<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display nowrap" id="myTable" style="width: 100%;">
                        <caption>Daftar Mahasiswa Bisa Seminar</caption>
                            <thead class="text-primary">
                                <th>
                                    NPM
                                </th>
                                <th>
                                    Nama Mahasiswa
                                </th>
                                <th>
                                    Nama Dosen Pembimbing
                                </th>
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Nama Penguji
                                </th>
                                <th class="text-center">
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_mhs->result_array() as $i):
                                        $npm = $i['npm'];
                                        $nama_mhs = $i['nama'];
                                        $nama_dosen = $i['nama_dosen'];
                                        $judul = $i['judul'];
                                        $tanggal = $i['tanggal_sidang'];
                                        $nama_penguji = $i['nama_penguji'];
                                    ?>
                                <tr>
                                    <td>
                                        <?=$npm?>
                                    </td>
                                    <td>
                                        <?=$nama_mhs?>
                                    </td>
                                    <td>
                                        <?=$nama_dosen?>
                                    </td>
                                    <td>
                                        <?=$judul?>
                                    </td>
                                    <td>
                                        <?php if($tanggal == null){
                                            echo "Tidak ada data";
                                        }else{
                                            echo $tanggal;
                                        }?>
                                    </td>
                                    <td>
                                        <?php if($nama_penguji == null){
                                            echo "Tidak ada data";
                                        }else{
                                            echo $nama_penguji;
                                        }?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#tentukan<?php echo $npm?>">Tentukan <i
                                                class="now-ui-icons gestures_tap-01"></i></button>
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
?>
<!-- Modal Tentukan tanggal sidang dan penguji-->
<div class="modal fade" id="tentukan<?php echo $npm?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pilih Tanggal Sidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Koordinator/Jadwal/buat_jadwal','class="form_login"');?>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-4 col-form-label">NPM</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" readonly name="npm" value="<?php echo $npm?>"
                            maxlength="20" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" readonly value="<?php echo $nama?>"
                            maxlength="255" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Nama Penguji</label>
                    <div class="col-sm-8">
                        <select name="nama_penguji" class="form-control" required>
                            <?php foreach($data_penguji as $q => $value){?>
                                <option><?php echo $value['nama_dosen']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Tanggal Sidang</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="tanggal" required>
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
                            <?php endforeach;?>