<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons ui-1_calendar-60"></i> Jadwal
                            Seminar</span></h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#jadwal" role="tab"
                                aria-controls="pengajuan" aria-selected="true">Jadwal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#riwayat" role="tab"
                                aria-controls="riwayat" aria-selected="false">Riwayat</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="jadwal" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table nowrap" id="myTable" style="width: 100%">
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
                        <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table nowrap" id="myTable1" style="width: 100%">
                                <caption>Daftar Jadwal Seminar Mahasiswa</caption>
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
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($riwayat_seminar->result_array() as $i):
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
                                        <?php 
                                            echo $tanggal;
                                        ?>
                                        </td>
                                        <td>
                                        <?php
                                            echo $nama_penguji;
                                        ?>
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
                    <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Buat Jadwal Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
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
                            <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Tanggal
                                Sidang</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tanggal" required>
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
    <?php endforeach;?>