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
    function __construct($judul, $penulis, $penerbit, $harga)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    function getLabel(){
        return "{$this->penulis}, \n Penerbit | {$this->penerbit},";
    }
}

class CetakInfoProduk{
    function cetak(Produk $produk) {
        $str = "Komik | {$produk->judul} \n Penulis | {$produk->getLabel()} \n | Harga satuan Rp. {$produk->harga}";
        return $str;
    }
}
$komik = new Produk("Naruto","Masashi Kishimoto", "Shonen Jump", 30000);
$game = new Produk("PES2021","Konami", "EA Games", 40000);

// echo "KOMIK : " . $komik->getLabel();
// echo "\n";
// echo "GAME : " . $game->getLabel();
// echo "Komik : {$komik->judul} di tulis oleh {$komik->penulis} di terbitkan oleh ({$komik->penerbit} dengan harga Rp. {$komik->harga}";)

// Cetak Info Produk
$infoProduk = new CetakInfoProduk();
echo $infoProduk->cetak($komik);