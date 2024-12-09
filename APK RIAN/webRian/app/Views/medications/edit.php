<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
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
            margin-top: 20px;
        }

        label {
            font-weight: 500;
        }

        select, input, textarea, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #bdc3c7;
            background-color: #2c3e50;
            color: #ecf0f1;
            border-radius: 6px;
        }

        button {
            background-color: #16a085;
            color: white;
            cursor: pointer;
            font-weight: bold;
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

            select, input, textarea, button {
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
        <h1>Edit Obat</h1>

        <form action="<?= site_url('medications/update/' . $medication['medication_id']) ?>" method="post">
            <!-- Record ID -->
            <label for="record_id">Record ID:</label>
            <input type="number" name="record_id" id="record_id" value="<?= $medication['record_id'] ?>" required>

            <!-- Medication Name -->
            <label for="medication_name">Nama Obat:</label>
            <input type="text" name="medication_name" id="medication_name" value="<?= $medication['medication_name'] ?>" required>

            <!-- Dosage -->
            <label for="dosage">Dosis:</label>
            <input type="text" name="dosage" id="dosage" value="<?= $medication['dosage'] ?>" required>

            <!-- Update Button -->
            <button type="submit">Perbarui</button>
        </form>

        <a href="<?= site_url('medications') ?>" class="button-back">Kembali ke Daftar Obat</a>
    </div>
</body>
</html>
