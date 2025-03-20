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
                    <h4 class="card-title">Table negara</h4>
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
                                    <th>Negara</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($negara as $n) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($n['id_negara']); ?></td>
                                        <td><?= htmlspecialchars($n['nama_negara']); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editnegaraModal<?= $n['id_negara']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger shadow btn-xs sharp delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $n['id_negara']; ?>">
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
        <?php foreach ($negara as $n) : ?>
            <!-- Modal Edit negara -->
            <div class="modal fade" id="editnegaraModal<?= $n['id_negara']; ?>" tabindex="-1" aria-labelledby="editnegaraModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editnegaraModalLabel">Edit negara</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editnegaraForm" action="<?= base_url('edit_negara/') . $n['id_negara']; ?>" method="post">
                                <input type="hidden" id="editnegaraId" name="id_negara">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Negara</label>
                                    <input type="text" class="form-control" id="nama_negara" name="nama_negara" value="<?= $n['nama_negara']; ?>" required>
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
        <?php foreach ($negara as $n) : ?>
            <div class="modal fade" id="deleteModal<?= $n['id_negara']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteModal" action="<?= base_url('delete_negara/') . $n['id_negara']; ?>" method="post">
                            <input type="hidden" id="hapusnegaraId" name="id_negara">
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b><span id="negaraName"></span></b>?</p>
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
        <?php foreach ($negara as $n) : ?>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('tambah_negara'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Negara</label>
                                    <input type="text" class="form-control" id="nama_negara" name="nama_negara"  value="<?= $n['nama_negara']; ?>" required>
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