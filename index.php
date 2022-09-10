<?php
class Produk
{
    // property 
    /*
        * public        => bisa di akses dimanapun
        * protected     => bisa di akses di kelas yang di inisialisasi kelasnya
        * private       => hanya bisa di akses di kelas tersebut tidak bisa di panggil di kelas yang lain

    */
    public $judul, $penulis, $penerbit, $harga;

    // method
    function sayHello()
    {
        return "{$this->penulis}, {$this->penerbit}";
    }
}


$komik = new Produk();
$komik->judul = "Naruto";
$komik->penulis = "Mashakimoto";
$komik->penerbit = "Shonen Jump";
$komik->harga = 30000;
echo "Komik : {$komik->judul} di tulis oleh {$komik->penulis} di terbitkan oleh {$komik->penerbit} dengan harga Rp. {$komik->harga}";
