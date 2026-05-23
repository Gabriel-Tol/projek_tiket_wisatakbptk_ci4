<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>

<!-- Breadcrumb -->
<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Dashboard</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div><!--/.row-->

<!-- Panel Statistik -->
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-th-list glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalKategori ?? 0; ?></div>
                    <div class="text-muted">Kategori</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-picture glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalDestinasi ?? 0; ?></div>
                    <div class="text-muted">Destinasi</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalTransaksi ?? 0; ?></div>
                    <div class="text-muted">Transaksi</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <em class="glyphicon glyphicon-user glyphicon-l"></em>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $totalPengunjung ?? 0; ?></div>
                    <div class="text-muted">Pengunjung</div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Grafik Transaksi 7 Hari Terakhir
            </div>
            <div class="panel-body">
                <canvas id="transaksi-line-chart" height="120"></canvas>
            </div>
        </div>
    </div>
</div><!--/.row-->

<script>
    window.addEventListener('load', function() {
        var ctx = document.getElementById('transaksi-line-chart');
        if (!ctx || !window.Chart) {
            return;
        }

        var transaksiChart = {
            labels: <?= json_encode($grafikLabels, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>,
            datasets: [{
                label: 'Transaksi',
                fillColor: 'rgba(48, 164, 255, 0.2)',
                strokeColor: 'rgba(48, 164, 255, 1)',
                pointColor: 'rgba(48, 164, 255, 1)',
                pointStrokeColor: '#fff',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(48, 164, 255, 1)',
                data: <?= json_encode($grafikData, JSON_NUMERIC_CHECK); ?>
            }]
        };

        var chartInstance = ctx.getContext('2d');
        new Chart(chartInstance).Line(transaksiChart, {
            responsive: true,
            scaleBeginAtZero: true,
            pointDotRadius: 5,
            bezierCurve: false
        });
    });
</script>

<?= $this->include('Backend/Template/footer'); ?>