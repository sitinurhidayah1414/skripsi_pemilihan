<script>
function preview_foto(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Data Calon</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?=base_url('calon/proses_tambah');?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RT Calon Kepala Des</label>
                                <select class="form-control" name="rt_calon_kdes">
                                    <?php foreach($rt as $f): ?>
                                    <option value="<?= $f['nama_rt']; ?>"><?= ucwords($f['nama_rt']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kdes">NIK Calon Kepala Desa</label>
                                <input type="number" class="form-control" id="kdes" name="nik_calon_kdes" autofocus
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kdes">Nama Calon Kepala Desa</label>
                        <input type="text" class="form-control" id="kdes" name="calon_kdes" autofocus required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="visi_misi">Visi Misi</label>
                        <textarea class="form-control" id="visi_misi" rows="3" name="visi_misi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto_calon">Foto Calon</label>
                        <input type="file" class="form-control-file" id="foto_calon" name="foto_calon"
                            aria-describedby="file_help" onchange="preview_foto(event)">
                        <small id="file_help" class="form-text text-muted">Tipe foto yang di izinkan <b>.jpg .jpeg
                                .png</b>, Ukuran maksimum foto <b>2 MB</b>.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="float-left">
                        <a href="<?=base_url('calon');?>" class="btn btn-secondary"><i class="fas fa-times"></i>
                            Batal</a>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>