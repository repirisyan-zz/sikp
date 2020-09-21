<footer class="footer">
    <div class=" container-fluid ">
    <div class="copyright" id="copyright">
            &copy; <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by REMARI. Coded by REMARI.
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="<?=base_url('assets/admin/js/core/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/core/popper.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/core/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
<!-- Chart JS -->
<script src="<?=base_url('assets/admin/js/plugins/chartjs.min.js')?>"></script>
<!--  Notifications Plugin    -->
<script src="<?=base_url('assets/admin/js/plugins/bootstrap-notify.js')?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?=base_url('assets/admin/js/now-ui-dashboard.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/datatables.min.js')?>"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url('assets/admin/demo/demo.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
<script>
$(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

});
$(document).ready( function () {
$('#myTable').DataTable({
    "scrollX": true
});
});
$(document).ready(function() {
    var menu = '<?php echo $this->session->userdata('menu')?>';
    menu_mahasiswa(menu);
    
    var sidang = '<?php echo $this->session->userdata('sidang_mhs')?>';
    status_sidang(sidang);

    var sandi = '<?php echo $this->session->userdata('sandi')?>';
    notif_ubah_sandi(sandi);

    var bimbingan = '<?php echo $this->session->userdata('bimbingan_mhs')?>';
    var location = '<?=base_url('Mahasiswa/Bimbingan')?>';
    status_bimbingan(bimbingan,location);

    var status_prop = '<?php echo $this->session->userdata('prop_status')?>';
    status_proposal(status_prop);

    var rec_judul = '<?=$this->session->userdata('rekomend_judul')?>';
    var location1 = '<?=base_url('Mahasiswa/Rek_judul/judul_dipilih')?>';
    status_recjudul(rec_judul,location1);

    var bbm_mhs = '<?php echo $this->session->flashdata('kirim_bimbingan')?>';
    bimbingan_mhs(bbm_mhs);

    var prop = '<?php echo $this->session->flashdata('pengajuan_prop')?>';
    pengajuan_prop(prop);

});

</script>
</body>

</html>