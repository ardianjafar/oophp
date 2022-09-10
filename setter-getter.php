<?php 
// <!-- Accessor method berkaitan erat dengan visibility -->

class Produk {
    private $judul, 
            $penulis,
            $penerbit,
            $harga;

    protected $diskon = 0;
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0 ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
 
    function setJudul($judul){
        if( !is_string($judul)){
            throw new Exception("Judul harus string");
        }
        $this->judul = $judul;
    }
    function getJudul() {
        return $this->judul;
    }

    function setPenulis($penulis){
        $this->penulis = $penulis;
    }

    function getPenulis() {
        return $this->penulis;
    }

    function setPenerbit($penerbit){
        $this->penerbit = $penerbit;
    }

    function getPenerbit(){
        return $this->penerbit; 
    }
    
    function setHarga($harga){
        $this->harga = $harga;
    }
    
    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100 );
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

    function getDiskon(){
        return $this->harga;
    }

}


class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {

        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


class Game extends Produk {
    public $waktuMain;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0 ) {
        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->waktuMain = $waktuMain;
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }

    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "\n";
echo $produk2->getInfoProduk();
echo "\n";
// echo "<hr/>";
echo $produk2->setDiskon(50);
echo $produk2->getHarga();
echo "\n";
echo $produk1->setPenulis("Ardian Jafar");
echo $produk1->getPenulis();