<?php
Abstract class Produk {
    private $judul, 
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;
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