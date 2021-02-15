<?php
function curl($url, $ua, $data = null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cok.txt');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);
	return $result;

}

function getcok($url, $ua = null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cok.txt');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	return $result;
}
function token($url, $ua = null){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cok.txt');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	return $result;
}
function random($length)
{
    $str        = "";
    $characters = 'eriualmnbcoif';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}
$ua = array(
"User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; SM-J500G Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Mobile Safari/537.36",
"Content-Type: application/x-www-form-urlencoded",
"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
"Referer: http://investasirupiah.com/auth/register.php",
);
echo "Reff:  ";
$reff = trim(fgets(STDIN));
echo "Mau Brapa: ";
$brp = trim(fgets(STDIN));
for ($a=0; $a<$brp; $a++){
$nam = file_get_contents("https://api.namefake.com/indonesian-indonesia/");
$j = json_decode($nam, TRUE);
$nama = $j['name'];
$ang = rand(00,99);
$fp = fopen("invest.txt", 'a');
fputs($fp, "$nama$ang|akunweb123\n");
fclose($fp);
$hasil = "$nama$ang";
$cok = getcok("http://investasirupiah.com/auth/register.php", $ua);
$data = "nama=$nama$ang&username=$nama$ang&password=akunweb123&email=$nama$ang%40gmail.com&invite=$reff&login=";
$send = curl("http://investasirupiah.com/auth/register.php", $ua, $data);
echo "[$a]\nBerhasil Daftar [$hasil]\n";
sleep(2);
$logdat = "username=$nama$ang&password=akunweb123&login=Login";
$login = curl("http://investasirupiah.com/auth/login.php", $ua, $logdat);
echo "Berhasil Login [$hasil]\n";
sleep(2);
$datinvest = "username=$nama$ang&plan=Master&jumlah=20000&bronze=";
$vest = curl("http://investasirupiah.com/user/investasi.php", $ua, $datinvest);
echo "Berhasil Invest [$hasil]\n\n";
sleep(2);
}
?>
