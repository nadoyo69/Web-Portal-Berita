<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            <i class="pull-right">
                <i id="jam"></i>:<i id="menit"></i>:<i id="detik"></i>
            </i>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $total_konten; ?></h3>
                        <p>Konten</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>daftar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $total_tags; ?></h3>
                        <p>Tags</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>tag" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $total_komen; ?></h3>
                        <p>Jumlah Komentar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-commenting"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>komen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $total_user; ?></h3>
                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>userListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="row container">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title fa fa-bar-chart">Grafik</h3>
                            <div class="box-tools">
                            </div>
                        </div>
                        <div class="box-body">
                            <div>
                                <canvas id="grafikonten"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>
<?php
foreach ($grafik as $data) {
    $jenis[] = $data->jenis;
    $total[] = $data->total;
}
?>
<script>
    var ctx = document.getElementById("grafikonten").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($jenis) ?>,
            datasets: [{
                label: 'Grafik Konten',
                data: <?= json_encode($total) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>