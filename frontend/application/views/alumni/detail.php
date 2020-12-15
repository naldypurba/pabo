<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data 
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $alumni['namalengkap']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $alumni['jeniskelamin']; ?></h6>
                    <p class="card-text"><?= $alumni['tahunlulus']; ?></p>
                    <p class="card-text"><?= $alumni['nomorhp']; ?></p>
					<p class="card-text"><?= $alumni['alamat']; ?></p>
                    <p class="card-text"><?= $alumni['universitas']; ?></p>
					<p class="card-text"><?= $alumni['pekerjaan']; ?></p>
                    <a href="<?= base_url(); ?>alumni" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>