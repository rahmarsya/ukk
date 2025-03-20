<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #0c0f1a; /* Warna dongker */
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Profile Container */
        .profile-container {
            background: #1a1f2e; /* Warna form */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        /* Profile Image */
        .profile-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 15px;
        }

        /* Input Fields */
        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #444b5e;
            background: #2a2f3e;
            color: #ffffff;
            outline: none;
            font-size: 14px;
        }

        .form-input:focus {
            border-color: #007bff;
        }

        /* Buttons */
        .btn {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #444b5e;
            color: white;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #2a2f3e;
        }

        /* Upload Button */
        .upload-btn {
            display: block;
            margin: 10px auto;
            text-align: center;
            color: #007bff;
            cursor: pointer;
        }

        /* Hide file input */
        .file-input {
            display: none;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <h3>Edit Profile</h3>

        <!-- Profile Image -->
        <?php
        $profileImg = !empty($user['profile_picture']) ? base_url('uploads/' . $user['profile_picture']) : base_url('assets/img/default_profile.jpg');
        ?>
        <img src="<?= $profileImg; ?>" id="profilePreview" class="profile-img" alt="Profile Picture">

        <!-- Upload Button -->
        <label for="profilePicture" class="upload-btn">Ubah Foto Profil</label>
        <input type="file" id="profilePicture" class="file-input" accept="image/*">

        <!-- Profile Form -->
        <form action="<?= base_url('profile/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-input" id="nama" name="nama" value="<?= htmlspecialchars($user['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-input" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-input" id="role" name="role" value="<?= htmlspecialchars($user['role']); ?>" readonly>
            </div>

            <!-- Buttons -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('dashboard_user'); ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
        </form>
    </div>

    <script>
        // Preview Gambar Profil Saat Diupload
        document.getElementById('profilePicture').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>
