        </div><!--/.main-->
    </div><!--/.row-->
</div><!--/.container-fluid-->

<script src="/Assets/js/jquery-1.11.1.min.js"></script>
<script src="/Assets/js/bootstrap.min.js"></script>
<script src="/Assets/js/bootstrap-table.js"></script>

<!-- Script untuk menghilangkan loading template bootstrap-table -->
<!-- <script>
$(function() {
    $.fn.bootstrapTable.defaults.loadingTemplate = '';
    $('table[data-toggle="table"]').bootstrapTable('refreshOptions', {loadingTemplate: ''});
});
</script> -->

<script src="/Assets/js/chart.min.js"></script>
<script src="/Assets/js/chart-data.js"></script>
<script src="/Assets/js/easypiechart.js"></script>
<script src="/Assets/js/easypiechart-data.js"></script>
<script src="/Assets/js/bootstrap-datepicker.js"></script>
<script src="/Assets/js/sweetalert2.min.js"></script>

<script>
    // Inisialisasi sidebar toggle
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>

<!-- Notifikasi SweetAlert2 -->
<?php if (session()->getFlashdata('success')) : ?>
<script>
$(document).ready(function() {
    swal("Sukses!", "<?= session()->getFlashdata('success'); ?>", "success");
});
</script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
<script>
$(document).ready(function() {
    swal("Gagal!", "<?= session()->getFlashdata('error'); ?>", "error");
});
</script>
<?php endif; ?>
<?php if (session()->getFlashdata('warning')) : ?>
<script>
$(document).ready(function() {
    swal("Peringatan!", "<?= session()->getFlashdata('warning'); ?>", "warning");
});
</script>
<?php endif; ?>

</body>
</html>