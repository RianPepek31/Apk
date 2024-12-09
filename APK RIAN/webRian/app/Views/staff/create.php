<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Staf</title>
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

        label {
            font-size: 16px;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #2c3e50;
            color: #ecf0f1;
            border: 1px solid #bdc3c7;
            border-radius: 6px;
        }

        button {
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1abc9c;
        }

        .button-back {
            display: inline-block;
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-align: center;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }

        .button-back:hover {
            background-color: #1abc9c;
        }

        /* Responsivitas untuk Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            label, input, select {
                font-size: 14px;
            }

            .button-back {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Tambah Staf</h1>
        <form action="<?= site_url('staff/store') ?>" method="post">
            <label>ID Departemen:</label>
            <input type="text" name="department_id" required>

            <label>Nama:</label>
            <input type="text" name="name" required>

            <label>Posisi:</label>
            <input type="text" name="position" required>

            <label>Telepon:</label>
            <input type="text" name="phone" required>

            <button type="submit">Simpan</button>
        </form>

        <a href="<?= site_url('staff') ?>" class="button-back">Kembali ke Staf</a>
    </div>
</body>
</html>
