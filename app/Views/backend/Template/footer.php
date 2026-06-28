        </div><!--/.main-->
    </div><!--/.row-->
</div><!--/.container-fluid-->

<script src="/Assets/js/jquery-1.11.1.min.js"></script>
<script src="/Assets/js/bootstrap.min.js"></script>

<!-- Mobile sidebar toggle -->
<script>
$(document).ready(function() {
    $('#sidebar-toggle').on('click', function() {
        var $sidebar = $('#sidebar-collapse');
        $sidebar.toggleClass('in');
        if ($sidebar.hasClass('in')) {
            $('body').append('<div class="sidebar-backdrop" id="sidebar-backdrop"></div>');
            $('#sidebar-backdrop').on('click', function() {
                $sidebar.removeClass('in');
                $(this).remove();
            });
        } else {
            $('#sidebar-backdrop').remove();
        }
    });
});
</script>
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
    // Inisialisasi sidebar icon toggle
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    // Reset sidebar on desktop resize
    $(window).on('resize', function () {
        if ($(window).width() > 768) {
            $('#sidebar-collapse').addClass('in');
            $('#sidebar-backdrop').remove();
        } else {
            $('#sidebar-collapse').removeClass('in');
        }
    });

    // Ensure sidebar visible on load if desktop
    if ($(window).width() > 768) {
        $('#sidebar-collapse').addClass('in');
    }
    
    // Dark Mode Toggle
    var currentTheme = localStorage.getItem('theme') || 'light';
    
    function updateIcon(theme) {
        var icon = $('#darkModeIcon');
        if (theme === 'dark') {
            icon.text('☀️');
        } else {
            icon.text('🌙');
        }
    }
    
    updateIcon(currentTheme);
    
    $('#darkModeToggle').on('click', function() {
        var html = document.documentElement;
        var current = html.getAttribute('data-theme');
        var next = current === 'dark' ? 'light' : 'dark';
        
        html.setAttribute('data-theme', next);
        localStorage.setItem('theme', next);
        updateIcon(next);
    });
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

<script>
function forceWhiteButtons() {
    if (document.documentElement.getAttribute('data-theme') === 'dark') {
        document.querySelectorAll('.btn-warning, .btn-danger, .btn-success, .btn-info, .btn-primary').forEach(function(btn) {
            btn.style.color = '#ffffff';
            btn.style.textShadow = 'none';
            btn.querySelectorAll('*').forEach(function(el) {
                el.style.color = '#ffffff';
            });
        });
    }
}

// Run on load
forceWhiteButtons();

// Run on theme change
var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'data-theme') {
            forceWhiteButtons();
        }
    });
});
observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });

// Also run periodically to catch dynamic content
setInterval(forceWhiteButtons, 500);
</script>

</body>
</html>