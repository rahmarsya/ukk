<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Table Film</h4>
                </div>
                <!-- Tombol Tambah User -->
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#addFilmModal">
                        <span class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i></span>Add
                    </button>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama_film</th>
                                    <!-- <th>Thriller</th> -->
                                    <th>Gambar_film</th>
                                    <th>Deskripsi</th>
                                    <!-- <th>Genre</th>
                                    <th>Tahun</th>
                                    <th>Negara</th> -->
                                    <!-- <th>Rating</th> -->
                                    <th>Durasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($film as $f) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($f->id_film); ?></td>
                                        <td><?= htmlspecialchars($f->nama_film); ?></td>
                                        <!-- <td><?= htmlspecialchars($f->thriller); ?></td> -->
                                        <td>
                                            <img src="<?= htmlspecialchars($f->gambar_film); ?>" alt="Gambar Film" width="50">
                                        </td>
                                        <td><?= htmlspecialchars($f->deskripsi); ?></td>
                                        <!-- <td><?= htmlspecialchars($f->id_genre); ?></td>
                                        <td><?= htmlspecialchars($f->id_tahun); ?></td>
                                        <td><?= htmlspecialchars($f->id_negara); ?></td> -->
                                        <!-- <td><?= htmlspecialchars($f->id_rating); ?></td> -->
                                        <td><?= htmlspecialchars($f->durasi); ?></td>
                                        <td>

                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editUserModal<?= $f->id_film; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger shadow btn-xs sharp delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $f->id_film; ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Film -->
        <div class="modal fade" id="addFilmModal" tabindex="-1" aria-labelledby="addFilmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFilmModalLabel">Tambah Film</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm" action="<?= base_url('tambah_film/')  ?>" method="post">
                            <input type="hidden" id="editUserId" name="id_film">
                            <div class="mb-3">
                                <label for="nama_film" class="form-label">Nama Film</label>
                                <input type="text" class="form-control" id="nama_film" name="nama_film" required>
                            </div>

                            <div class="mb-3">
                                <label for="thriller" class="form-label">Thriller (URL)</label>
                                <input type="text" class="form-control" id="thriller" name="thriller" required>
                            </div>

                            <div class="mb-3">
                                <label for="gambar_film" class="form-label">Gambar Film (URL)</label>
                                <input type="text" class="form-control" id="gambar_film" name="gambar_film" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <input type="text" class="form-control" id="genre" name="id_genre" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="id_tahun" required>
                            </div>

                            <div class="mb-3">
                                <label for="negara" class="form-label">Negara</label>
                                <input type="text" class="form-control" id="negara" name="id_negara" required>
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" class="form-control" id="rating" name="rating" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Durasi</label>
                                <input type="time" class="form-control" id="durasi" name="durasi" step="1" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah Film</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal Edit User -->
        <?php foreach ($film as $f) : ?>
            <div class="modal fade" id="editUserModal<?= $f->id_film; ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editUserForm" action="<?= base_url('edit_film/') . $f->id_film; ?>" method="post">
                                <input type="hidden" id="editUserId" name="id_film">

                                <div class="mb-3">
                                    <label for="nama_film" class="form-label">Nama_film</label>
                                    <input type="text" class="form-control" id="nama_film" name="nama_film" value="<?= $f->nama_film; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="thriller" class="form-label">Thriller</label>
                                    <input type="text" class="form-control" id="thriller" name="thriller" value="<?= $f->thriller; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_film" class="form-label">Gambar_film</label>
                                    <input type="text" class="form-control" id="gambar_film" name="gambar_film" value="<?= $f->gambar_film; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $f->deskripsi; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="genre" name="genre" value="<?= $f->id_genre; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $f->id_tahun; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="negara" class="form-label">Negara</label>
                                    <input type="text" class="form-control" id="negara" name="negara" value="<?= $f->id_negara; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <input type="text" class="form-control" id="rating" name="rating" value="<?= $f->id_rating; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="durasi" class="form-label">Durasi</label>
                                    <input type="time" class="form-control" id="durasi" name="durasi" value="<?= $f->durasi; ?>" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Modal Konfirmasi Hapus -->
        <?php foreach ($film as $f) : ?>
            <div class="modal fade" id="deleteModal<?= $f->id_film; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteModal" action="<?= base_url('delete_film/') . $f->id_film; ?>" method="post">
                            <input type="hidden" id="hapusfilmId" name="id_film">
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b><span id="filmName"></span></b>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="delete-btn btn btn-danger" data-id="">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </body>

        </html>

    </div>
</div>