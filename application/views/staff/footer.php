<footer class="footer">
    <div class=" container-fluid ">
        <div class="copyright" id="copyright">
            &copy; FTUNSUR <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a
                href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url('assets/admin/demo/demo.js')?>"></script>
<script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
<script>
$(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

});

$(document).ready(function(){
  $("#filterName").on("keyup", function() {
    let value = $(this).val().toUpperCase();
    let tr = $("#myTable tr");
    for (let i = 0; i < tr.length; i++) {
      if (tr[i].getElementsByTagName("td")[1]) {
        let textFromValue = tr[i].getElementsByTagName("td")[1].textContent || tr[i].getElementsByTagName("td")[1].innerText;
        if (textFromValue.toUpperCase().indexOf(value) > -1) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }
    }
  });
});

// $(document).ready(function(){
//   $("#filterName").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#myTable tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });

$(document).ready(function() {

    var menu = '<?php echo $this->session->userdata('menu')?>';
    menu_staff(menu);

    var sandi = '<?php echo $this->session->flashdata('sandi')?>';
    notif_ubah_sandi(sandi);

    var status = '<?php echo $this->session->flashdata('kelola')?>';
    notif_kelola(status);

    var upload_foto = '<?php echo $this->session->flashdata('upload_foto')?>';
    notif_upload_foto(upload_foto);

    var upload_sampul = '<?php echo $this->session->flashdata('upload_sampul')?>';
    notif_upload_sampul(upload_sampul);


    var selesai_sidang = '<?php echo $this->session->flashdata('selesai_sidang')?>';
    notif_selesai_sidang(selesai_sidang);
});
</script>
</body>

</html>