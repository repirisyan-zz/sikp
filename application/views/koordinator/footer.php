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
$(document).ready( function () {
$('#myTable').DataTable({
    "scrollX": true
});
});
$(document).ready(function (){
    var active_menu = '<?php echo $this->session->userdata('menu')?>';
    menu_koor(active_menu);

    var prop = '<?php echo $this->session->flashdata('notif_prop')?>';
    notif_prop(prop);

    var sandi = '<?php echo $this->session->flashdata('sandi')?>';
    notif_ubah_sandi(sandi);

    var ubah_judul = '<?php echo $this->session->flashdata('ubah_judul')?>';
    notif_ubah_judul(ubah_judul);

    var kalkulasi = '<?php echo $this->session->flashdata('kalkulasi')?>';
    notif_kalkulasi(kalkulasi);

    var upload_foto = '<?php echo $this->session->flashdata('upload_foto')?>';
    notif_upload_foto(upload_foto);

    var upload_sampul = '<?php echo $this->session->flashdata('upload_sampul')?>';
    notif_upload_sampul(upload_sampul);
});
</script>
</body>

</html>