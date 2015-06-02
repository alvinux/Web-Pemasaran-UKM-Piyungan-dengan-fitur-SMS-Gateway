<?php 
//input data provinsi
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"key: af4b20e8d614587e8da20ef9f1ddab56"
		),
	));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$responseArray = json_decode($response);
	$provinsi = $responseArray->rajaongkir->results;
	foreach($provinsi as $p):
		$idprov =  $p->province_id;
		$prov = $p->province;
		//modal untuk insert data provinsi
	endforeach;
}

//input data kabupaten
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => "http://rajaongkir.com/api/starter/city",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"key: 43682bb7d8fe7f657b942d33b443dbd3"
		),
	));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$responseArray = json_decode($response);
	$city = $responseArray->rajaongkir->results;
	foreach($city as $c):
		$idprov =  $c->province_id;
		$idkota = $c->city_id;
		$kota = $c->city_name;
		$type = $c->type;
		$kodepos = $c->postal_code;
		//modal untuk insert data kota
	endforeach;
}