<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Bimbingan</h4>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary" id="bimbingan" data-toggle="modal"
                        data-target="#tambah_bimbingan">Bimbingan
                        <i class="now-ui-icons ui-1_simple-add"></i></button>
                    <div class="table-responsive">
                        <span class="badge" id="badge_bim_mhs"></span><br>
                        <table class="table" id="myTable" style="width: 100%;">
                            <thead class="text-primary">
                                <th>
                                    TANGGAL
                                </th>
                                <th>
                                    PEMBAHASAN
                                </th>
                                <th>
                                    BERKAS
                                </th>
                                <th>
                                    REVISI
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_bimbingan->result_array() as $i):
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

<!-- Modal Pengajuan Proposal-->
<div class="modal fade" id="tambah_bimbingan" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Mahasiswa/Bimbingan/tambah','class="form_login"');?>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Pembahasan</label>
                    <div class="col-sm-8">
                        <select class="custom-select custom-select-sm" name="pembahasan">
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
                    <label for="inputPassword" class="col-sm-4 col-form-label">Berkas</label>
                    <div class="col-sm-8">
                        <div class="custom-file mb-3">
                            <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">KIRIM</button>
                </form>
            </div>
        </div>
    </div>
</div>