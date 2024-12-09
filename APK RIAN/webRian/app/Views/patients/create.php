<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styling Umum */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Styling Konten */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #34495e;
        }

        h1 {
            font-size: 30px;
            color: #ecf0f1;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            color: #ecf0f1;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #bdc3c7;
            background-color: #34495e;
            color: #ecf0f1;
        }

        .button-back, .button-submit {
            display: inline-block;
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-align: center;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .button-back:hover, .button-submit:hover {
            background-color: #1abc9c;
        }

        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Tambah Pasien Baru</h1>
        
        <!-- Menampilkan pesan error jika ada -->
        <?php if (isset($validation)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Formulir untuk tambah pasien -->
        <form action="<?= site_url('patients/store') ?>" method="POST">
            <label for="name">Nama Pasien</label>
            <input type="text" id="name" name="name" value="<?= old('name') ?>" required>

            <label for="dob">Tanggal Lahir</label>
            <input type="date" id="dob" name="dob" value="<?= old('dob') ?>" required>

            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" value="<?= old('address') ?>" required>

            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" value="<?= old('phone') ?>" required>

            <button type="submit" class="button-submit">Simpan Pasien</button>
        </form>

        <a href="<?= site_url('patients') ?>" class="button-back">Kembali ke Daftar Pasien</a>
    </div>
</body>
</html>
