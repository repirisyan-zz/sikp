<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?=base_url('Koordinator/Status_dosen/batas_mhs')?>" class="btn btn-primary title"
                        data-toggle='tooltip' data-placement='right'
                        title='Digunakan untuk membatasi jumlah mahasiswa bimbingan dosen'><i
                            class="now-ui-icons ui-2_settings-90"></i> Kalkulasi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table nowrap" id="myTable" style="width: 100%;">
                            <caption>Daftar Dosen</caption>
                            <thead class="text-primary">
                                <th>
                                    NIDN
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Batas Mahasiswa
                                </th>
                                <th>
                                    Batas Menguji
                                </th>
                                <th>
                                    Batas Rekomendasi Judul
                                </th>
                                <th>
                                    Status
                                </th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($data_dosen->result_array() as $i):
                                        $nip = $i['nip'];
                                        $nama = $i['nama_dosen'];
                                        $status = $i['status_aktif'];
                                        $batas_mhs = $i['batas_mhs'];
                                        $batas_menguji = $i['batas_menguji'];
                                        $batas_rek_judul = $i['batas_judul'];
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $nip?>
                                    </td>
                                    <td>
                                        <?php echo $nama?>
                                    </td>
                                    <td>
                                        <?php echo $batas_mhs?>
                                    </td>
                                    <td>
                                        <?php echo $batas_menguji?>
                                    </td>
                                    <td>
                                        <?php echo $batas_rek_judul?>
                                    </td>
                                    <td>
                                        <?php echo form_open('Koordinator/Status_dosen/status_aktif','class="form_login"');?>
                                        <input type="text" name="nip" value="<?=$nip?>" hidden>
                                        <input type="text" name="status" value="<?=$status?>" hidden>
                                        <button class="btn btn-primary btn_aktif" type="submit"><?php if($status == 0){echo "<i class='now-ui-icons ui-1_simple-remove' data-toggle='tooltip'
                                            data-placement='left' title='Tidak Aktif'></i>";}else{echo
                                                "<i class='now-ui-icons ui-1_check
                                                ' data-toggle='tooltip'
                                                data-placement='left' title='Aktif'></i>";}?></button>
                                        </form>
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