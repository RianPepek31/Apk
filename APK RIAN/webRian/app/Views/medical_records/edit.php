<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rekam Medis</title>
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
            margin-bottom: 8px;
            display: block;
        }

        select, input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
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
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #1abc9c;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        a {
            color: #16a085;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Edit Rekam Medis</h1>

        <!-- Success/Error Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php elseif (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('medical_records/update/' . $doctor['doctor_id']) ?>" method="post">
            <!-- Patient ID -->
            <label for="patient_id">ID Pasien:</label>
            <input type="number" name="patient_id" id="patient_id" value="<?= $doctor['patient_id'] ?>" required>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('patient_id') . '</div>' : '' ?>

            <!-- Doctor ID -->
            <label for="doctor_id">ID Dokter:</label>
            <input type="number" name="doctor_id" id="doctor_id" value="<?= $doctor['doctor_id'] ?>" required>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('doctor_id') . '</div>' : '' ?>

            <!-- Details -->
            <label for="details">Detail Rekam Medis:</label>
            <textarea name="details" id="details" required><?= $record['details'] ?></textarea>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('details') . '</div>' : '' ?>

            <!-- Submit Button -->
            <button type="submit">Perbarui Rekam Medis</button>
        </form>

        <a href="<?= site_url('medical_records') ?>" class="button-back">Kembali ke Daftar Rekam Medis</a>
    </div>
</body>
</html>
