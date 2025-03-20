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
                    <h4 class="card-title">Table User</h4>
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
                                    <th>Name</th>
                                    <th>Usia</th>
                                    <th>Email</th>
                                    <th>No. tlp</th>
                                    <th>Role</th>
                                    <th>Profile</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $u) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($u['id_user']); ?></td>
                                        <td><?= htmlspecialchars($u['nama']); ?></td>
                                        <td><?= htmlspecialchars($u['usia']); ?></td>
                                        <td><?= htmlspecialchars($u['email']); ?></td>
                                        <td><?= htmlspecialchars($u['nomor_tlp']); ?></td>
                                        <td><span class="badge bg-primary"><?= ucfirst(htmlspecialchars($u['role'])); ?></span></td>
                                        <td>
                                            <img src="<?= base_url('uploads/profiles/') . (!empty($u['profile']) ? htmlspecialchars($u['profile']) : 'default.png'); ?>"
                                                width="50" height="50" class="rounded-circle">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-primary shadow btn-xs sharp edit-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editUserModal<?= $u['id_user']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger shadow btn-xs sharp delete-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal<?= $u['id_user']; ?>">
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
        <?php foreach ($user as $u) : ?>
            <!-- Modal Edit User -->
            <div class="modal fade" id="editUserModal<?= $u['id_user']; ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editUserForm" action="<?= base_url('edit_user/') . $u['id_user']; ?>" method="post">
                                <input type="hidden" id="editUserId" name="id_user">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $u['nama']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $u['email']; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="nomor_tlp" class="form-label">No.tlp</label>
                                    <input type="number" class="form-control" id="nomor_tlp" name="nomor_tlp" value="<?= $u['nomor_tlp']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input type="number" class="form-control" id="usia" name="usia" value="<?= $u['usia']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="admin" <?= $u['role'] == 'admin' ? 'selected' : ''; ?>>admin</option>
                                        <option value="autor" <?= $u['role'] == 'autor' ? 'selected' : ''; ?>>autor</option>
                                        <option value="user" <?= $u['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
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
        <?php foreach ($user as $u) : ?>
            <div class="modal fade" id="deleteModal<?= $u['id_user']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="deleteModal" action="<?= base_url('delete_user/') . $u['id_user']; ?>" method="post">
                            <input type="hidden" id="hapusUserId" name="id_user">
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus <b><span id="userName"></span></b>?</p>
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
        <?php foreach ($user as $u) : ?>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('tambah_user'); ?>" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_tlp" class="form-label">No. tlp</label>
                                    <input type="text" class="form-control" id="nomor_tlp" name="nomor_tlp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="usia" class="form-label">Usia</label>
                                    <input type="number" class="form-control" id="usia" name="usia" required>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="admin">Admin</option>
                                        <option value="autor">Autor</option>
                                        <option value="user">User</option>
                                    </select>
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