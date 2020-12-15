<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Alumni
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" id="namalengkap">
                            <small class="form-text text-danger"><?= form_error('namalengkap'); ?></small>
                        </div>
						
						<div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin </label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
						
						 <div class="form-group">
                            <label for="tahunlulus">Tahun Lulus </label>
                            <input type="text" name="tahunlulus" class="form-control" id="tahunlulus">
                            <small class="form-text text-danger"><?= form_error('tahunlulus'); ?></small>
                        </div>
						
						 <div class="form-group">
                            <label for="nomorhp">Nomor handphone </label>
                            <input type="text" name="nomorhp" class="form-control" id="nomorhp">
                            <small class="form-text text-danger"><?= form_error('nomorhp'); ?></small>
                        </div>
						
						<div class="form-group">
                            <label for="alamat">Alamat </label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
						
						<div class="form-group">
                            <label for="universitas">Universitas </label>
                            <input type="text" name="universitas" class="form-control" id="universitas">
                            <small class="form-text text-danger"><?= form_error('universitas'); ?></small>
                        </div>
						
						<div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan">
                            <small class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>