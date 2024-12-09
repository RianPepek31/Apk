<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Departemen</title>
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

        /* Responsivitas untuk Mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            table th, table td {
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
        <h1>Daftar Departemen</h1>
        <a href="<?= site_url('departments/create') ?>" class="button-back">Tambah Departemen</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department): ?>
                    <tr>
                        <td><?= $department['depart_id'] ?></td>
                        <td><?= $department['name'] ?></td>
                        <td><?= $department['location'] ?></td>
                        <td>
                            <a href="<?= site_url('departments/edit/' . $department['depart_id']) ?>">Edit</a> | 
                            <form action="<?= site_url('departments/delete/' . $department['depart_id']) ?>" method="post" style="display:inline;">
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
