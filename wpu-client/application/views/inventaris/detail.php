<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Komponen
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $inventaris['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Jumlah : <?= $inventaris['jumlah']; ?> Buah </h6>
                    <p class="card-text"> Tempat : <?= $inventaris['tempat']; ?></p>
                    <p class="card-text"> Tanggal : <?= $inventaris['tanggal']; ?></p>
                    <a href="<?= base_url(); ?>inventaris" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>