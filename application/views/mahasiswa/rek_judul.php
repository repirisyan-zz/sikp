<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="width: 100%;">
                        <caption>Daftar Rekomendasi Judul</caption>
                            <thead class="text-primary">
                                <th>
                                    Dosen Pembimbing
                                </th>
                                <th>
                                    Judul
                                </th>
                                <th>
                                    Keterangan
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_judul->result_array() as $i):
                                        $id = $i['id'];
                                        $nama = $i['nama_dosen'];
                                        $nip = $i['nip'];
                                        $judul = $i['judul'];
                                        $keterangan = $i['keterangan'];
                                    ?>
                                <tr>
                                    <td>
                                        <?=$nama?>
                                    </td>
                                    <td>
                                        <?=$judul?>
                                    </td>
                                    <td>
                                        <?=$keterangan?>
                                    </td>
                                    <td>
                                        <?php echo form_open('Mahasiswa/Rek_judul/pilih_judul','class="form_login"');?>
                                        <input type="text" value="<?php echo $id?>" name="id"  hidden>
                                        <button type="submit" class="btn btn-success"><i
                                                class="now-ui-icons ui-1_check"></i> Pilih</button>
                                        </form>
                                        <br>
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