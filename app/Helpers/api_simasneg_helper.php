<?php
//https://www.rumahcode.org/57/Codeigniter-4-Membuat-Helper-Sendiri
function pegawaiPerSKPD($skpd){
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://gsb.kulonprogokab.go.id/auth/simasneg/pegawai_per_skpd',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'field=sim%3Dsimasneg%26pass%3D15987532147%26aksi%3Dview%26skpd%3D'.$skpd.'%26user%3Dapisimasneg',
	  CURLOPT_HTTPHEADER => array(
	    'Authorization: Basic cG5zbWFpbDo2dGdyMzc0MzQy'
	  ),
	));

	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}