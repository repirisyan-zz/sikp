<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php foreach($data_mhs->result_array() as $i):
                    $nama = $i['nama'];
                    $npm = $i['npm'];
                    $foto = $i['foto'];
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card" style="width: 14rem;">
                        <div class="container">
                            <img src="<?=base_url('file/foto/profile/'.$foto)?>"
                                class="rounded-circle mt-3 img-thumbnail" alt="Foto Profile Dosen">
                            <div class="card-body">
                                <p class="lead text-center text-primary font-weight-bold text-capitalize"><?=$nama?>
                                <br>
                                    <span class="badge badge-primary text-center">NPM : <?=$npm?></span>
                                </p>

                                <?php echo form_open('Dosen/Bimbingan/bimbingan_mhs','class="form_login"');?>
                                <input type="text" name="npm" value="<?=$npm?>" hidden>
                                <input type="text" name="nama" value="<?=$nama?>" hidden>
                                <button type="submit" class="btn btn-primary btn-block">Bimbingan <i
                                        class="now-ui-icons gestures_tap-01"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>