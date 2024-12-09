<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
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
            transition: margin-left 0.3s ease;
        }

        h1 {
            font-size: 30px;
            color: #ecf0f1;
            margin-bottom: 20px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        input, select {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #2c3e50;
            border: 1px solid #bdc3c7;
            color: #ecf0f1;
            border-radius: 6px;
        }

        button {
            padding: 12px 24px;
            background-color: #16a085;
            color: white;
            font-size: 18px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1abc9c;
        }

        a {
            color: #16a085;
            text-decoration: none;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsivitas untuk Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            input, select, button {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Tambah Ruangan</h1>
        <form action="<?= site_url('rooms/store') ?>" method="post">
            <label>Nomor Ruangan:</label>
            <input type="text" name="room_number" required>
            
            <label for="depart_id">Pilih ID Departemen:</label>
            <select name="depart_id" id="depart_id" required>
                <option value="">-- Pilih ID Departemen --</option>
                <?php foreach ($departemen as $record): ?>
                    <option value="<?= $record['depart_id'] ?>">
                        <?= $record['depart_id'] ?> - <?= $record['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Kapasitas:</label>
            <input type="number" name="capacity" required>
            
            <button type="submit">Simpan</button>
        </form>
        <br>
        <a href="<?= site_url('rooms') ?>" class="button-back">Kembali ke Daftar Ruangan</a>
    </div>
</body>
</html>
