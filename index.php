<?php
header("Content-Type: application/json; charset=UTF-8");
require __DIR__ . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

if(empty($_GET['kurir']) || empty($_GET['resi'])){
    echo "Nothing Here!";die;
}

$client = new Client();
$cekResi = $client->post(
    'https://pluginongkoskirim.com/cek-tarif-ongkir/front/resi-amp',
    array(
        'form_params' => array(
            'kurir' => $_GET['kurir'],
            'resi' => $_GET['resi'],
        )
    )
);

$contents = $cekResi->getBody()->getContents();
echo $contents;