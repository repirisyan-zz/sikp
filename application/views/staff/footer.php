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
<script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
<script>
$(document).ready( function () {
$('#myTable').DataTable({
    "scrollX": true
});
});
$(document).ready(function() {
    $("#filterName").on("keyup", function() {
        let value = $(this).val().toUpperCase();
        let tr = $("#myTable tr");
        for (let i = 0; i < tr.length; i++) {
            if (tr[i].getElementsByTagName("td")[1]) {
                let textFromValue = tr[i].getElementsByTagName("td")[1].textContent || tr[i]
                    .getElementsByTagName("td")[1].innerText;
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
function upperCaseF(a) {
    setTimeout(function() {
        a.value = a.value.toUpperCase();
    }, 1);
}

function hapus_berkas(){
    var konfirmasi = $('#konfirmasi_berkas').val();
    if(konfirmasi != 'KONFIRMASI'){
        $('#btn_konfirmasi').prop('disabled',true);
    }
    else if(konfirmasi == 'KONFIRMASI'){
        $('#btn_konfirmasi').prop('disabled',false);
    }
}

$('#pass, #confirm').on('keyup', function() {
    if (($('#pass').val() == '') && ($('#confirm').val() == '')) {
        $('#confirm').removeClass('is-invalid');
        $('#confirm').removeClass('is-valid');
        $('#btn_ubah_pw').removeClass('btn-success');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
    } else if ($('#pass').val() == $('#confirm').val()) {
        $('#confirm').addClass('is-valid');
        $('#confirm').removeClass('is-invalid');
        $('#btn_ubah_pw').removeClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', false);
        $('#btn_ubah_pw').addClass('btn-success');
    } else {
        $('#confirm').addClass('is-invalid');
        $('#btn_ubah_pw').addClass('btn-danger');
        $('#btn_ubah_pw').prop('disabled', true);
    }
});

$(document).ready(function() {

    var menu = '<?php echo $this->session->userdata('menu')?>';
    menu_staff(menu);

    var sandi = '<?php echo $this->session->flashdata('sandi')?>';
    notif_ubah_sandi(sandi);

    var status = '<?php echo $this->session->flashdata('kelola')?>';
    notif_kelola(status);

    var hapus_file = '<?php echo $this->session->flashdata('hapus_file')?>';
    notif_hapus_file(hapus_file);

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