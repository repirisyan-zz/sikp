<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <button class="btn btn-primary" id="ajukan_prop" data-toggle="modal"
                        data-target="#ajukanProp">Proposal
                        <i class="now-ui-icons ui-1_simple-add"></i></button>
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Pengajuan Proposal</caption>
                            <thead class="text-primary">
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Proposal
                                </th>
                                <th>
                                    Status
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
                                    foreach($data_proposal->result_array() as $i):
                                        $id = $i['id'];
                                        $judul = $i['judul'];
                                        $tanggal = $i['tanggal_proposal'];
                                        $file = $i['file'];
                                        $status = $i['status_proposal'];
                                        $revisi = $i['revisi'];
                                        $keterangan = $i['keterangan'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $judul?>
                                    </td>
                                    <td>
                                        <div class="background_tanggal">
                                            <?=$tanggal?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?=base_url('file/proposal/').$file?>" data-toggle="tooltip"
                                            data-placement="right" title="<?=$file?>"><i
                                                class="now-ui-icons files_paper"></i>&nbsp;Unduh</a>
                                    </td>
                                    <td>
                                        <?=$status?>
                                    </td>
                                    <td>
                                        <?php if($revisi == null){
                                            echo "Tidak ada berkas";
                                        }else{
                                            echo "<a href='<?=base_url('file/revisi_proposal/').$revisi;' data-toggle='tooltip' data-placement='right' title='".$revisi."'><i class='now-ui-icons files_paper'></i> Unduh</a>";
                                            }?>
                                    </td>
                                    <td>
                                        <?php if($keterangan == null){
                                            echo "Tidak ada keterangan";
                                        }else{
                                            echo "<button class='btn btn-primary btn-block' data-toggle='tooltip' data-placement='left' title='".$keterangan."'>
                                            <i class='now-ui-icons gestures_tap-01'></i></button>";
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
<div class="modal fade" id="ajukanProp" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <h5 class="text-center font-weight-bold">Upload Berkas</h5>
                    <br>
                    <?php echo form_open_multipart('Mahasiswa/Pengajuan_prop/upload','class="form_login"');?>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input placeholder="Judul" type="text" class="form-control" name="judul" id="inputJudul"
                                required maxlength="255">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="custom-file mb-3">
                                <input type="file" name="proposal" class="custom-file-input" id="validatedCustomFile"
                                    required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih berkas
                                    proposal...</label><br><br>
                                <small class="text-muted">File docx|pdf</small>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Unggah <i
                            class="now-ui-icons arrows-1_cloud-upload-94"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>