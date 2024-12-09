<?php
// Include atau require file Mahasiswa.php
require_once 'Mahasiswa.php';

// Membuat instance dari kelas Mahasiswa
$mahasiswa1 = new Mahasiswa("123456", "John Doe", "Teknik Informatika");

// Memanggil metode dari kelas Mahasiswa
echo "NIM: " ;
$mahasiswa1->getNim();        // Gabungkan dengan string
echo "<br>";

echo "Nama: " . $mahasiswa1->getNama();      // Gabungkan dengan string
echo "<br>";

echo "Jurusan: " ;
 $mahasiswa1->getJurusan(); // Gabungkan dengan string
echo "<br>";
