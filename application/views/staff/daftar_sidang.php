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
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Seminar Mahasiswa</caption>
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
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#selesaiSidang<?php echo $npm?>">Selesai <i
                                                class="now-ui-icons sport_trophy"></i></button>
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
<!-- Modal Pilih Tanggal Sidang-->
<div class="modal fade" id="selesaiSidang<?php echo $npm?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p>Apakah <strong><?=$nama?></strong> telah menyelesaikan sidangnya ?</p>
                <?php echo form_open('Staff/Daftar_sidang/selesai_sidang','class="form_login"');?>
                <input type="text" value="<?=$npm?>" name="npm" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="width: 100px;">Tidak</button>
                <button type="submit" class="btn btn-success" style="width: 100px;">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach?>