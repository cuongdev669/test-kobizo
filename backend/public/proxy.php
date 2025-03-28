<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$rss_url = isset($_GET['rss_url']) ? $_GET['rss_url'] : "https://rss.nytimes.com/services/xml/rss/nyt/World.xml";

if (!filter_var($rss_url, FILTER_VALIDATE_URL)) {
    echo json_encode(["error" => "URL RSS is invalid!"]);
    exit;
}

$rss_content = file_get_contents($rss_url);

if ($rss_content === false) {
    echo json_encode(["error" => "Can not get RSS feed"]);
    exit;
}

$xml = simplexml_load_string($rss_content);
$json = json_encode($xml);
echo $json;
