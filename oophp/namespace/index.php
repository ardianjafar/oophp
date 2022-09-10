<?php

require_once 'App/init.php';
// var_dump('App/init.php');

// $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
// $produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);

// echo $cetakProduk->cetak(); 

use App\Service\User as UserService;
new UserService();
echo "\n";
use App\Produk\User as ServiceUser;
new ServiceUser();