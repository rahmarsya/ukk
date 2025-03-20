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
                    <h4 class="card-title">Table Genre</h4>
                </div>
                <!-- Tombol Tambah User -->
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Add</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Genre</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($genre as $g) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($g->id_genre); ?></td>
                                        <td><?= htmlspecialchars($g->nama_genre); ?></td>

                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editgenreModal<?= ($g->id_genre); ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger shadow btn-xs sharp delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= ($g->id_genre); ?>">
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
        <?php foreach ($genre as $g) : ?>
            <!-- Modal Edit genre -->
            <div class="modal fade" id="editgenreModal<?= ($g->id_genre); ?>" tabindex="-1" aria-labelledby="editgenreModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editgenreModalLabel">Edit genre</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editgenreForm" action="<?= base_url('edit_genre/') . ($g->id_genre); ?>" method="post">
                                <input type="hidden" id="editgenreId" name="id_genre">

                                <div class="mb-3">
                                    <label for="name" class="form-label">genre</label>
                                    <input type="text" class="form-control" id="nama_genre" name="nama_genre" value="<?= ($g->nama_genre); ?>" required>
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
        <?php foreach ($genre as $g) : ?>
            <div class="modal fade" id="deleteModal<?= ($g->id_genre); ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteModal" action="<?= base_url('delete_genre/') . ($g->id_genre); ?>" method="post">
                            <input type="hidden" id="hapusgenreId" name="id_genre">
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b><span id="genreName"></span></b>?</p>
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

        <!-- Modal Tambah User -->
        <?php foreach ($genre as $g) : ?>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('tambah_genre'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">genre</label>
                                    <input type="text" class="form-control" id="nama_genre" name="nama_genre" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </body>

        </html>

    </div>
</div>