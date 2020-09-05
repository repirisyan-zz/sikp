<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="card text-center">
                    <div class="card-header">
                        REKOMENDASI JUDUL DOSEN
                    </div>
                    <?php foreach($data_judul->result_array() as $i):
                        $judul = $i['judul'];
                        $nama_dosen = $i['nama_dosen'];
                        $keterangan = $i['keterangan'];
                    ?>
                    <div class="card-body">
                        <h3 class="card-title">INFO JUDUL KERJA PRAKTEK</h3>
                        <h4 class="card-title"><?=$judul?></h4>
                        <h5 class="card-title"><?=$nama_dosen?></h5>
                        <p class="card-text"><?=$keterangan?></p>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>