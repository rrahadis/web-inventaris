<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>inventaris/tambah" class="btn btn-primary">Tambah
                Data Komponen</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data komponen.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <div class="input-group-append">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-info" type="submit">Semua</button>
                    <button type="submit" value="B5" name="b5"  class="btn btn-info">Meja B5</button>
                    <button type="submit" name="pandora" value="Pandora" class="btn btn-info">Kotak Pandora</button>
                    </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Komponen</h3>
            <?php if (empty($inventaris)) : ?>
                <div class="alert alert-danger" role="alert">
                data inventaris tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($inventaris as $inven) : ?>
                <li class="list-group-item">
                    <?= $inven['nama']; ?>
                    <a href="<?= base_url(); ?>inventaris/hapus/<?= $inven['id']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                    <a href="<?= base_url(); ?>inventaris/ubah/<?= $inven['id']; ?>"
                        class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>inventaris/detail/<?= $inven['id']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>