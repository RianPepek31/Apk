<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
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
        <h1>Tambah Rekam Medis</h1>

        <!-- Success/Error Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
        <?php elseif (session()->getFlashdata('error')): ?>
            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form action="<?= site_url('medical_records/store') ?>" method="post">
            <!-- Patient Dropdown -->
            <label for="patient_id">Pasien:</label>
            <select name="patient_id" id="patient_id" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?= $patient['patient_id'] ?>">
                        <?= $patient['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('patient_id') . '</div>' : '' ?>

            <!-- Doctor Dropdown -->
            <label for="doctor_id">Dokter:</label>
            <select name="doctor_id" id="doctor_id" required>
                <option value="">-- Pilih Dokter --</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['doctor_id'] ?>">
                        <?= $doctor['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('doctor_id') . '</div>' : '' ?>

            <!-- Diagnosis -->
            <label for="diagnosis">Diagnosa:</label>
            <input type="text" name="diagnosis" id="diagnosis" required>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('diagnosis') . '</div>' : '' ?>

            <!-- Treatment -->
            <label for="treatment">Pengobatan:</label>
            <textarea name="treatment" id="treatment" required></textarea>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('treatment') . '</div>' : '' ?>

            <!-- Record Date -->
            <label for="record_date">Tanggal Rekam Medis:</label>
            <input type="date" name="record_date" id="record_date" required>
            <?= isset($validation) ? '<div class="error">' . $validation->getError('record_date') . '</div>' : '' ?>

            <!-- Submit Button -->
            <button type="submit">Simpan Rekam Medis</button>
        </form>

        <a href="<?= site_url('medical_records') ?>" class="button-back">Kembali ke Daftar Rekam Medis</a>
    </div>
</body>
</html>
