<?php
                            /* included in index.php (GLOBAL TABLE) */

$data= json_decode(file_get_contents('../back/GlobalCases.json'),true); // either create a json file or comment the followig and use the comment below instead "$url"
//$url="https://raw.githubusercontent.com/pomber/covid19/master/docs/timeseries.json";
//$json=file_get_contents($url);
//$json= json_decode(file_get_contents($url));
//$data=json_encode($json);




$days_count = 0;
$days_count_prev = 0;
foreach ($data as $key => $value) {
    $days_count = count($value) - 1; // to get the last value
    $days_count_prev = $days_count - 1;
}
$total_conf = 0;
$total_rec = 0;
$total_death = 0;
foreach ($data  as $key => $value) {
    $total_conf += $value[$days_count]['confirmed'];
    $total_rec += $value[$days_count]['recovered'];
    $total_death += $value[$days_count]['deaths'];
}

?>


