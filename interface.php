<?php 
// <!-- Accessor method berkaitan erat dengan visibility -->
interface InfoProduk{
    function getInfoProduk();
}
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

    // abstract function getInfoProduk(); 
    
    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

    function getDiskon(){
        return $this->harga;
    }

}


class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {

        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


class Game extends Produk implements InfoProduk {
    public $waktuMain;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0 ) {
        parent::__construct( $judul, $penulis, $penerbit, $harga );

        $this->waktuMain = $waktuMain;
    }

    public function setDiskon( $diskon ) {
        $this->diskon = $diskon;
    }

    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk){
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : \n";

        foreach($this->daftarProduk as $p){
            $str .= " - {$p->getInfoProduk()} \n";
        } 
        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();