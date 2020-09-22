<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons files_single-copy-04"></i> Bimbingan
                            Mahasiswa <?=$this->session->userdata('set_nama')?></span></h5>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary" id="bimbingan" data-toggle="modal"
                        data-target="#tambah_bimbingan">Bimbingan
                        <i class="now-ui-icons ui-1_simple-add"></i></button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#selesai_bimbingan">SELESAI <i
                            class="now-ui-icons ui-1_check"></i></button>
                    <div class="table-responsive">
                        <span class="badge" id="badge_bim_mhs"></span><br>
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <thead class="text-primary">
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Pembahasan
                                </th>
                                <th>
                                    Berkas Mahasiswa
                                </th>
                                <th>
                                    Revisi Dosen
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_bimbingan->result_array() as $i):
                                        $id = $i['id'];
                                        $pembahasan = $i['pembahasan'];
                                        $tanggal = $i['tanggal'];
                                        $file = $i['file'];
                                        $revisi = $i['revisi'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $tanggal?>
                                    </td>
                                    <td>
                                        <?php echo $pembahasan?>
                                    </td>
                                    <td>
                                        <a href="<?=base_url('file/laporan/').$file?>"><i
                                                class="now-ui-icons files_paper"></i> <?php echo $file?></a>
                                    </td>
                                    <td>
                                        <?php if($revisi == null){
                                            echo "Tidak ada berkas";
                                        }else{
                                            echo "<a href='<?=base_url('file/revisi/').$revisi;'><i class='now-ui-icons files_paper'></i> $revisi</a>";
                                            }?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#uploadRevisi<?=$id?>">
                                            Upload Revisi <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
                                        </button>
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

<!-- Modal Upload Bimbingan-->
<div class="modal fade" id="tambah_bimbingan" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Tambah Data Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Dosen/Bimbingan/tambah_bimbingan','class="form_login"');?>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">NPM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="npm"
                                value="<?=$this->session->userdata('set_npm')?>" maxlength="20" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama"
                                value="<?=$this->session->userdata('set_nama')?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Pembahasan</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="pembahasan">
                                <option selected disabled>Pilih pembahasan...</option>
                                <option>BAB I</option>
                                <option>BAB II</option>
                                <option>BAB III</option>
                                <option>BAB IV</option>
                                <option>BAB V</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Berkas Mahasiswa</label>
                        <div class="col-sm-8">
                            <div class="custom-file mb-3">
                                <input type="file" name="file" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" cols="40" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-success">Kirim&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Upload Revisi !-->
<?php
    foreach($data_bimbingan->result_array() as $i):
    $id = $i['id'];
?>
<div class="modal fade" id="uploadRevisi<?=$id?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Upload Berkas Revisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Dosen/Bimbingan/upload_revisi','class="form_login"');?>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Berkas Revisi</label>
                        <div class="col-sm-8">
                            <div class="custom-file mb-3">
                                <input type="text" name="id" value="<?=$id?>" hidden>
                                <input type="file" name="file" class="custom-file-input1 form-control"
                                    id="validatedCustomFile1" required>
                                <label class="custom-file-label" for="validatedCustomFile1">Pilih berkas...</label>
                                <br><br>
                                <small class="text-muted">File docx|pdf</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea name="keterangan" cols="40" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-secondary" data-dismiss="modal">Batal&nbsp;</button>
                <button type="submit" class="save btn btn-success">Kirim&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- Modal Selesai-->
<div class="modal fade" id="selesai_bimbingan" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Konfirmasi Seminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Dosen/Bimbingan/selesai','class="form_login"');?>
            <div class="form-group row">
                <input type="text" name="npm" value="<?php echo $this->session->userdata('set_npm')?>" hidden>
            </div>
            <div class="modal-body">
                <div class="container">
                    <p class="font-weight-normal">Apakah mahasiswa ini memenuhi syarat untuk seminar ?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-danger" data-dismiss="modal">Tidak&nbsp;</button>
                &nbsp;
                <button type="submit" class="save btn btn-success">Ya&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>