<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #bdc3c7;
        }

        table th {
            background-color: #16a085;
            color: #fff;
        }

        table td {
            background-color: #2c3e50;
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

        .button-add {
            display: inline-block;
            background-color: #16a085;
            color: white;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .button-add:hover {
            background-color: #1abc9c;
        }

        /* Responsivitas untuk Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            table th, table td {
                font-size: 14px;
            }

            .button-back, .button-add {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Daftar Pembayaran</h1>
        <a href="<?= site_url('payments/create') ?>" class="button-add">Tambah Pembayaran</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Invoice</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah Dibayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><?= $payment['payment_id'] ?></td>
                        <td><?= $payment['invoice_id'] ?></td>
                        <td><?= $payment['payment_date'] ?></td>
                        <td><?= $payment['amount_paid'] ?></td>
                        <td>
                            <a href="<?= site_url('payments/edit/' . $payment['payment_id']) ?>">Edit</a> |
                            <form action="<?= site_url('payments/delete/' . $payment['payment_id']) ?>" method="post" style="display:inline;">
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= site_url('dashboard') ?>" class="button-back">Kembali ke Dashboard</a>
    </div>
</body>
</html>
