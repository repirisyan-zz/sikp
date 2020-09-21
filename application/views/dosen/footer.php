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
<script src="<?=base_url('assets/admin/demo/demo.js')?>"></script>
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
    menu_dosen(menu);


    var sandi = '<?php echo $this->session->flashdata('sandi')?>';
    notif_ubah_sandi(sandi);


    var status = '<?php echo $this->session->flashdata('rek_judul')?>';
    notif_rek_judul(status);

    var bimbingan_dosen = '<?php echo $this->session->flashdata('bimbingan_dosen')?>';
    bimbingan_dosen(bimbingan_dosen);

    
});
</script>
</body>

</html>