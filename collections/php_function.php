<!--  
name  : php_function.php
desc  : kumpulan function yang sering digunakan pada aplikasi berbasis PHP
-->

<?php

function status_pengajuan(){

}

function kecamatan(){

}

function kelurahan($data){
    
}

function jenis_kelamin($data){
    if($data == 1){
        return "Laki-laki";
    }
    elseif($data == 2){
        return "Perempuan";
    }
    else{
        return "Belum tentukan";
    }
}

function agama($data){
    if($data == 1){
        return "Islam";
    }
    elseif($data == 2){
        return "Kristen";
    }
    else{
        return "Belum tentukan";
    }
}

function time_date($data){
    return date('m/d/Y', $data);
}

function date_indo(){

}

?>
