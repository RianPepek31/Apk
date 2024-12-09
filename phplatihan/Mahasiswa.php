<?php
class Mahasiswa
{
    var string $nim;
    var string $nama;
    var string $jurusan;


  public  function __construct($nim,$nama,$jurusan)
    {
    $this->nim = $nim;          // Inisialisasi properti
    $this->nama = $nama;        // Inisialisasi properti
    $this->jurusan = $jurusan;  // Inisialisasi properti
    }
    
    public function getNim(){
        echo $this->nim ;
    }
    public function getJurusan(){
        return $this->jurusan;
    }
    public function getNama(){
        echo"$this->nama";
    }


    // var string $nim;      // Gunakan 'string' dengan huruf kecil
    // var string $nama;     // Gunakan 'string' dengan huruf kecil
    // var string $jurusan;  // Gunakan 'string' dengan huruf kecil

    // public function __construct($nim, $nama, $jurusan)
    // {
    //     $this->nim = $nim;          // Inisialisasi properti
    //     $this->nama = $nama;        // Inisialisasi properti
    //     $this->jurusan = $jurusan;  // Inisialisasi properti
    // }
    
    // public function getNim(){
    //     return $this->nim;          // Menggunakan 'return' daripada 'echo'
    // }
    
    // public function getJurusan(){
    //     return $this->jurusan;      // Menggunakan 'return' daripada 'echo'
    // }
    
    // public function getNama(){
    //     return $this->nama;         // Menggunakan 'return' daripada 'echo'
    // }



}
