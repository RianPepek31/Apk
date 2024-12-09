<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pembayaran</title>
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
            color: #ecf0f1;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #2c3e50;
            border: 1px solid #bdc3c7;
            color: #ecf0f1;
            font-size: 16px;
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

        a {
            display: inline-block;
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #1abc9c;
        }

        /* Responsivitas untuk Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            label, input, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Edit Pembayaran</h1>
        <form action="<?= site_url('payments/update/' . $payment['payment_id']) ?>" method="post">
            <label>ID Invoice:</label>
            <input type="number" name="invoice_id" value="<?= $payment['invoice_id'] ?>" required>
            
            <label>Tanggal Pembayaran:</label>
            <input type="date" name="payment_date" value="<?= $payment['payment_date'] ?>" required>
            
            <label>Jumlah Dibayar:</label>
            <input type="number" name="amount_paid" value="<?= $payment['amount_paid'] ?>" required>
            
            <button type="submit">Perbarui</button>
        </form>
        <a href="<?= site_url('payments') ?>">Kembali ke Daftar Pembayaran</a>
    </div>
</body>
</html>
