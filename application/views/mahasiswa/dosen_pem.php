<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php foreach($data_dosen->result_array() as $i):
                    $nama = $i['nama_dosen'];
                    $nip = $i['nip'];
                    $foto = $i['foto'];
                    $batas = $i['batas_mhs'];
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card" style="width: 13rem;">
                        <img src="<?=base_url('assets/img/foto/profile/'.$foto)?>" class="card-img-top img-thumbnail"
                            alt="Foto Profile Dosen">
                        <div class="card-body">
                            <p class="card-title font-weight-bold"><?=$nama?></p>
                            <p>Ketersediaan : <?=$batas?></p>
                            <?php echo form_open('Mahasiswa/Dosen_pem/pilih_dosen','class="form_login"');?>
                            <input type="text" name="nip" value="<?=$nip?>" hidden>
                            <button type="submit" class="btn btn-primary btn-block">Pilih <i
                                    class="now-ui-icons gestures_tap-01"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>