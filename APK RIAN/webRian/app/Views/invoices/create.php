<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Faktur</title>
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
            font-size: 18px;
            color: #ecf0f1;
        }

        input, select {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            width: 100%;
            border: 1px solid #bdc3c7;
            border-radius: 6px;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        button {
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1abc9c;
        }

        a {
            color: #16a085;
            text-decoration: none;
            font-size: 18px;
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

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Tambah Faktur</h1>
        <form action="<?= site_url('invoices/store') ?>" method="post">
            <label for="patient_id">Pasien:</label>
            <select name="patient_id" id="patient_id" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient['patient_id'] ?>">
                        <?= $patient['patient_id'] ?> - <?= $patient['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="total_amount">Jumlah Total:</label>
            <input type="text" name="total_amount" id="total_amount" required>
            <br>
            <label for="invoice_date">Tanggal Faktur:</label>
            <input type="date" name="invoice_date" id="invoice_date" required>
            <br>
            <button type="submit">Simpan</button>
        </form>
        <br>
        <a href="<?= site_url('invoices') ?>">Kembali ke Daftar Faktur</a>
    </div>
</body>
</html>
