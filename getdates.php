<?php

// Get all the dates between range

function createDateRange($startDate, $endDate, $format = "Y-m-d")
{
    $begin = new DateTime($startDate);
    $end = new DateTime($endDate);

    $interval = new DateInterval('P30D'); // 1 Day
    $dateRange = new DatePeriod($begin, $interval, $end);

    $range = [];
    foreach ($dateRange as $date)
    {
        $range[] = $date->format($format);
    }

    return $range;
}

// Get the registration date of a given domain

function registration_date($domain)
{
    $domain = str_replace("http://", "", $domain);
    $domain = str_replace("https://", "", $domain);

    $domain = "https://who.is/whois/".$domain;

    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n" .
                    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36"
        ]
    ];
    
    $context = stream_context_create($opts);
    
    $html = file_get_contents($domain, false, $context);
    
    $values = explode("\n", trim($html));

    $value = $values[294];

    $value = strtolower(trim(str_replace(" ", "", $value)));
    $value = str_replace(strtolower('<divclass="col-md-8queryresponsebodyvalue">'), "", $value);
    $value = str_replace('</div>', '', $value);

    return $value;
}

function get_dates($domain)
{
    $dates = createDateRange(registration_date($domain), date("Y-m-d"));

    return $dates;
}

?>