<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary title" id="bimbingan" data-toggle="modal"
                        data-target="#tambah_bimbingan">Bimbingan
                        <i class="now-ui-icons ui-1_simple-add"></i></button>
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
                                    Berkas
                                </th>
                                <th>
                                    Revisi
                                </th>
                                <th>
                                    Keterangan
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_bimbingan->result_array() as $i):
                                        $pembahasan = $i['pembahasan'];
                                        $tanggal = $i['tanggal'];
                                        $file = $i['file'];
                                        $revisi = $i['revisi'];
                                        $keterangan = $i['keterangan'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $tanggal?>
                                    </td>
                                    <td>
                                        <?php echo $pembahasan?>
                                    </td>
                                    <td>
                                    <?php if($file == null){
                                            echo "Tidak ada berkas";
                                        }else{
                                            echo "<a href=".base_url("file/laporan/".$file)." data-toggle='tooltip'
                                            data-placement='left' title='$file'><i
                                                class='now-ui-icons files_paper'></i>
                                            Unduh</a>";
                                            }?>
                                    </td>
                                    <td>
                                        <?php if($revisi == null){
                                            echo "Tidak ada berkas";
                                        }else{
                                            echo "<a href=".base_url("file/revisi/".$revisi)." data-toggle='tooltip'
                                            data-placement='left' title='$revisi'><i
                                                class='now-ui-icons files_paper'></i>
                                            Unduh</a>";
                                            }?>
                                    </td>
                                    <td>
                                    <?php if($keterangan == null){
                                            echo "Tidak ada keterangan";
                                        }else{
                                            echo "<a href='#' data-toggle='tooltip'
                                            data-placement='left' title='$keterangan'><i
                                                class='now-ui-icons files_paper'></i>
                                            Lihat</a>";
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
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Tambah Data Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php echo form_open_multipart('Mahasiswa/Bimbingan/tambah','class="form_login"');?>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Pembahasan</label>
                        <div class="col-sm-8">
                            <select class="custom-select custom-select-sm form-control" name="pembahasan">
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
                                <input type="file" name="file" class="custom-file-input form-control"
                                    id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>
                                <br><br>
                                <small class="text-muted">File docx|pdf</small>
                            </div>
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