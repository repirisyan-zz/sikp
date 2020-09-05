<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons files_single-copy-04"></i> Pengajuan
                            Proposal</span></h5>
                </div>

                <div class="card-body">
                    <div class="table100 ver1">
                        <div class="wrap-table100-nextcols js-pscroll ps ps--active-x">
                            <div class="table100-nextcols">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr class="row100 head">
                                            <th class="cell100 column2">Nama</th>
                                            <th class="cell100 column2">NPM</th>
                                            <th class="cell100 column3">Judul Kerja Praktek</th>
                                            <th class="cell100 column4">Tanggal Pengajuan</th>
                                            <th class="cell100 column5">Proposal</th>
                                            <th class="cell100 column6">Status</th>
                                            <th class="cell100 column7 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data_proposal->result_array() as $b):
                                                    $nama = $b['nama'];
                                                    $npm = $b['npm'];
                                                    $judul = $b['judul'];
                                                    $tanggal = $b['tanggal_proposal'];
                                                    $file = $b['file'];
                                                    $status = $b['status_proposal'];
                                                ?>
                                        <tr class="row100 body">
                                            <td class="cell100 column2"><?=$nama?></td>
                                            <td class="cell100 column2"><?=$npm?></td>
                                            <td class="cell100 column3"><?=$judul?></td>
                                            <td class="cell100 column4"><?=$tanggal?></td>
                                            <td class="cell100 column5"><a href="<?=base_url('file/proposal/').$file?>"
                                                    data-toggle="tooltip" data-placement="top" title="<?=$file?>"><i
                                                        class="now-ui-icons files_paper"></i>
                                                    Unduh</a></td>
                                            <td class="cell100 column6"><?=$status?></td>
                                            <td class="cell100 column7"><button type="button" class="btn btn-success"
                                                    data-toggle="modal" data-target="#terimaProp<?=$npm?>"><i
                                                        class="now-ui-icons ui-1_check"></i>
                                                    Terima</button>
                                                <button type="button" class="proposal_tolak btn btn-danger"
                                                    data-toggle="modal" data-target="#tolakProp<?=$npm?>"><i
                                                        class="now-ui-icons ui-1_simple-remove"></i>
                                                    Tolak</button></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="ps__rail-x" style="width: 611px; left: 0px; bottom: 10px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 189px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    foreach($data_proposal->result_array() as $i):
    $npm = $i['npm'];
    $nama = $i['nama'];
    $judul = $i['judul'];
    ?>

<!-- Modal Tolak Proposal -->
<div class="modal fade" id="tolakProp<?=$npm?>" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tolak Proposal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Koordinator/Pengajuan_prop/tolak_prop','class="form_login"');?>
                <input type="text" name="npm" value="<?php echo $npm?>" hidden>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Berkas Revisi</label>
                    <div class="col-sm-8">
                        <div class="custom-file mb-3">
                            <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Pilih berkas...</label>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="keterangan" class="form-control" cols="36" maxlength="100" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                &nbsp;
                <button type="submit" class="proposal_tolak btn btn-danger">
                    Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>


<?php
    foreach($data_proposal->result_array() as $i):
    $npm = $i['npm'];
?>

<!-- Modal Terima Proposal -->
<div class="modal fade" id="terimaProp<?=$npm?>" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?php echo form_open('Koordinator/Pengajuan_prop/terima_prop','class="form_login"');?>
            <input type="text" name="npm" value="<?php echo $npm?>" hidden required>
            <div class="modal-body d-flex justify-content-between">
                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal"> Batal</button>
                <button type="submit" class="btn btn-success"> Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach;?>