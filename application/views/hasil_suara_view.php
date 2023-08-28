<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Hasil Pemungutan Suara</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <?php foreach ($daftar_calon as $dc): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?=base_url('uploads/image/');?><?=$dc['gambar'];?>" class="card-img-top" alt="Foto Calon"
                            width="100%" height="150">
                        <div class="card-body">
                            <p class="card-text"><?=$dc['visi_misi'];?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Total Suara <span class="badge badge-primary float-right"><?= $dc['total_suara']; ?>
                                Suara</span>
                            </li>
                        </ul>
                        <div class="card-footer">
                            <?php if ($this->session->userdata('level')=='administrator' || $this->session->userdata('level')=='operator'): ?>
                                <a href="<?=base_url('hasil/suara/');?><?=$dc['id_calon'];?>"
                                    class="badge badge-secondary float-left"><i class="fas fa-bullhorn"></i> Lihat
                                    Suara</a>
                                <a href="<?=base_url('hasil/video/');?><?=$dc['id_calon'];?>"
                                    class="badge badge-dark float-right"><i class="fas fa-video"></i> Nonton Video</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Tampilkan grafik batang -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div>
            <canvas id="graph"></canvas>
        </div>
    </div>
</div>

<!-- Script JavaScript untuk menggambar grafik batang -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data total suara dari controller
    var total_suara = <?= json_encode(array_column($daftar_calon, 'total_suara')); ?>;

    // Nama calon untuk label sumbu X dari controller
    var labels = <?= json_encode(array_column($daftar_calon, 'id_calon')); ?>;

    // Konfigurasi grafik batang
    var ctx = document.getElementById('graph').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Suara',
                data: total_suara,
                backgroundColor: 'rgba(54, 162, 235, 0.8)', // Warna latar belakang batang
                borderColor: 'rgba(54, 162, 235, 1)', // Warna garis batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Mulai sumbu Y dari nol
                }
            }
        }
    });
</script>
