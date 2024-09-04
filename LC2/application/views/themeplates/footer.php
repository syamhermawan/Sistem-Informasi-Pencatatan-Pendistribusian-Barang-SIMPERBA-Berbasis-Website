<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid small">
        
            <center>
            <div class="text-muted ">Copyright &copy; CV. Lima Cahaya</div>
</center>
        
    </div>
</footer>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>
<!-- <script src="<?= base_url('assets/') ?>js/dynamic-form.js"></script> -->
<script src="<?= base_url('assets/') ?>js/output.js"></script>



<!-- <script src="<?= base_url('assets/vendor/') ?>datatables/jquery.dataTables.min.js"></script> -->
<script src="<?= base_url('assets/vendor/') ?>datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-responsive/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-responsive/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-buttons/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-buttons/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-buttons/buttons.print.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>datatables/datatables-buttons/buttons.colVis.min.js"></script>

<script>
    $('.form-check-input').click(function() {
        // ambil datanya
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

</body>

</html>