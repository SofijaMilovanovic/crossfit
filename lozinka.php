<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.passwordrandom.com/query?command=password");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$podatak = curl_exec($ch);
curl_close($ch);
echo $podatak;