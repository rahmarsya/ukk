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
                    <h4 class="card-title">Table Tahun</h4>
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
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tahun as $t) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($t['id_tahun']); ?></td>
                                        <td><?= htmlspecialchars($t['tahun_rilis']); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edittahunModal<?= $t['id_tahun']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger shadow btn-xs sharp delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $t['id_tahun']; ?>">
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
        <?php foreach ($tahun as $t) : ?>
            <!-- Modal Edit tahun -->
            <div class="modal fade" id="edittahunModal<?= $t['id_tahun']; ?>" tabindex="-1" aria-labelledby="edittahunModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edittahunModalLabel">Edit tahun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="edittahunForm" action="<?= base_url('edit_tahun/') . $t['id_tahun']; ?>" method="post">
                                <input type="hidden" id="edittahunId" name="id_tahun">

                                <div class="mb-3">
                                    <label for="name" class="form-label">tahun</label>
                                    <input type="text" class="form-control" id="tahun_rilis" name="tahun_rilis" value="<?= $t['tahun_rilis']; ?>" required>
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
        <?php foreach ($tahun as $t) : ?>
            <div class="modal fade" id="deleteModal<?= $t['id_tahun']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteModal" action="<?= base_url('delete_tahun/') ?>" method="post">
                            <input type="hidden" id="hapustahunId" name="id_tahun">
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b><span id="tahunName"></span></b>?</p>
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
        <?php foreach ($tahun as $t) : ?>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('tambah_tahun'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Tahun</label>
                                    <input type="text" class="form-control" id="tahun_rilis" name="tahun_rilis" required>
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