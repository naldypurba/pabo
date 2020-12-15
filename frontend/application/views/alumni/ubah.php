<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Alumni
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $alumni['id']; ?>">
                        <div class="form-group">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" id="namalengkap" value="<?= $alumni['namalengkap']; ?>">
                            <small class="form-text text-danger"><?= form_error('namalengkap'); ?></small>
                        </div>
						<div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <?php foreach( $jeniskelamin as $j ) : ?>
                                    <?php if( $j == $alumni['jeniskelamin'] ) : ?>
                                        <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
						
                        <div class="form-group">
                            <label for="tahunlulus">Tahun lulus</label>
                            <input type="text" name="tahunlulus" class="form-control" id="tahunlulus" value="<?= $alumni['tahunlulus']; ?>">
                            <small class="form-text text-danger"><?= form_error('tahunlulus'); ?></small>
                        </div>
						
                        <div class="form-group">
                            <label for="nomorhp">Nomor Handphone</label>
                            <input type="text" name="nomorhp" class="form-control" id="nomorhp" value="<?= $alumni['nomorhp']; ?>">
                            <small class="form-text text-danger"><?= form_error('nomorhp'); ?></small>
                        </div>
						
						 <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $alumni['alamat']; ?>">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
						
						 <div class="form-group">
                            <label for="universitas">Universitas</label>
                            <input type="text" name="universitas" class="form-control" id="universitas" value="<?= $alumni['universitas']; ?>">
                            <small class="form-text text-danger"><?= form_error('universitas'); ?></small>
                        </div>
						
						 <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $alumni['pekerjaan']; ?>">
                            <small class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
                        </div>
                        
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>