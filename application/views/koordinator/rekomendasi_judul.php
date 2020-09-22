<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge badge-primary"><i class="now-ui-icons files_single-copy-04"></i> Daftar
                            Rekomendasi Judul</span></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Rekomendasi Judul</caption>
                            <thead class="text-primary">
                                <th>
                                    NIP
                                </th>
                                <th>
                                    Dosen
                                </th>
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Keterangan
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_rekomendasi->result_array() as $i):
                                        $nama = $i['nama_dosen'];
                                        $nip = $i['nip'];
                                        $judul = $i['judul'];
                                        $keterangan = $i['keterangan'];
                                    ?>
                                <tr>
                                    <td>
                                        <?=$nip?>
                                    </td>
                                    <td>
                                        <?=$nama?>
                                    </td>
                                    <td>
                                        <?=$judul?>
                                    </td>
                                    <td>
                                        <?=$keterangan?>
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