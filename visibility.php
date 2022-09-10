<?php
class Produk
{
    // property 
    /*
        * public        => bisa di akses dimanapun
        * protected     => bisa di akses di kelas yang di inisialisasi kelasnya
        * private       => hanya bisa di akses di kelas tersebut tidak bisa di panggil di kelas yang lain
    */
    public $judul, $penulis, $penerbit, $jmlHalaman, $waktuMain;
    private $harga;
    protected $diskon;
    // method
    function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }
    
    function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100) ;
    }
    function getLabel(){
        return "{$this->penulis},{$this->penerbit},";
    }

    function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()} {(Rp. {$this->harga})}";
        return $str;
    }
}   

class Komik extends Produk {
    // public $jmlHalaman;
    public function getInfoProduk(){
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class Game extends Produk {
    public $waktuMain;
    
    function setDiskon($diskon) {
        $this->diskon = $diskon;
    }
    
    function getInfoProduk(){
        $str = "Game : ". parent::getInfoProduk() . " ~ {$this->waktuMain} Jam";
        return $str;
    }
}

$komik = new Komik("Naruto","Masashi Kishimoto", "Shonen Jump", 30000, 100 , 0);
$game = new Game("PES2021","Konami", "EA Games", 40000, 0, 50);

echo $komik->getInfoProduk();
echo "\n";
echo $game->getInfoProduk();
echo "<br/>";
echo $game->diskon = 90;
// $infoProduk = new CetakInfoProduk();
// echo $infoProduk->cetak($komik);