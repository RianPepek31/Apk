<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rumah Sakit</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styling Umum */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #2c3e50;
            color: #ecf0f1;
            height: 100vh;
            transition: background-color 0.3s ease;
        }

        /* Styling Sidebar */
        nav {
            width: 240px;
            height: 100vh;
            background: linear-gradient(135deg, #34495e, #2c3e50);
            position: fixed;
            top: 0;
            left: 0;
            color: white;
            padding-top: 40px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav .menu-title {
            font-size: 22px;
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ecf0f1;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        nav ul li:last-child {
            border-bottom: none;
        }

        nav ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 16px;
            border-radius: 6px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        nav ul li a .icon {
            font-size: 20px;
            margin-right: 12px;
        }

        nav ul li a:hover {
            background-color: #1abc9c;
            transform: translateX(5px);
            box-shadow: 0 2px 10px rgba(26, 188, 156, 0.3);
        }

        /* Styling Area Konten */
        .content {
            margin-left: 240px;
            padding: 30px;
            flex: 1;
            background-color: #34495e;
            transition: margin-left 0.3s ease;
            position: relative;
        }

        h1 {
            font-size: 30px;
            color: #ecf0f1;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .card {
            background-color: #2c3e50;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 24px;
            color: #16a085;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .card p {
            font-size: 18px;
            color: #bdc3c7;
            line-height: 1.6;
        }

        /* Tombol Logout */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
            box-shadow: 0 2px 10px rgba(231, 76, 60, 0.5);
        }

        /* Responsivitas Mobile */
        @media (max-width: 768px) {
            nav {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }
        }

        @media (max-width: 480px) {
            nav {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 20px;
            }

            .content {
                margin-left: 0;
            }

            nav ul li {
                text-align: center;
            }

            nav .menu-title {
                font-size: 20px;
                margin-bottom: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .card {
                padding: 15px;
            }

            .logout-btn {
                top: 10px;
                right: 10px;
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="menu-title">Menu</div>
        <ul>
            <li><a href="<?= site_url('dashboard/patients') ?>"><i class="fas fa-procedures icon"></i> Pasien</a></li>
            <li><a href="<?= site_url('dashboard/doctors') ?>"><i class="fas fa-user-md icon"></i> Dokter</a></li>
            <li><a href="<?= site_url('dashboard/departments') ?>"><i class="fas fa-hospital-alt icon"></i> Departemen</a></li>
            <li><a href="<?= site_url('dashboard/appointments') ?>"><i class="fas fa-calendar-check icon"></i> Jadwal</a></li>
            <li><a href="<?= site_url('dashboard/invoices') ?>"><i class="fas fa-file-invoice-dollar icon"></i> Tagihan</a></li>
            <li><a href="<?= site_url('dashboard/payments') ?>"><i class="fas fa-credit-card icon"></i> Pembayaran</a></li>
            <li><a href="<?= site_url('dashboard/medicalRecords') ?>"><i class="fas fa-file-medical-alt icon"></i> Rekam Medis</a></li>
            <li><a href="<?= site_url('dashboard/medications') ?>"><i class="fas fa-pills icon"></i> Obat</a></li>
            <li><a href="<?= site_url('dashboard/rooms') ?>"><i class="fas fa-bed icon"></i> Ruangan</a></li>
            <li><a href="<?= site_url('dashboard/staff') ?>"><i class="fas fa-users icon"></i> Staf</a></li>
        </ul>
    </nav>

    <div class="content">
        <button class="logout-btn" onclick="window.location.href='<?= site_url('logout') ?>'">Logout</button>
        <h1>Selamat Datang di Dashboard Rumah Sakit</h1>
        <div class="card">
            <h3>Update Terbaru</h3>
            <p>Ikuti perkembangan terbaru dan kelola berbagai aspek operasional rumah sakit, mulai dari data pasien, jadwal dokter, hingga administrasi lainnya. Kelola semuanya dengan mudah!</p>
        </div>
    </div>
</body>
</html>
