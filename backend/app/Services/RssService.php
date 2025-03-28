<?php

namespace App\Services;

class RssService implements RssServiceInterface
{
    public function lists($url)
    {
        $rss_url = request()->get('rss_url') ?? "https://rss.nytimes.com/services/xml/rss/nyt/World.xml";
        $error = [];
        try {
            if (!filter_var($rss_url, FILTER_VALIDATE_URL)) {
                throw new Exception("URL RSS is invalid!");
            }

            $options = [
                "http" => [
                    "timeout" => 10
                ]
            ];
            $context = stream_context_create($options);

            $rss_content = @file_get_contents($rss_url, false, $context);

            if ($rss_content === false) {
                $error = error_get_last();
                if (strpos($error['message'], 'failed to open stream') !== false) {
                    throw new Exception("Can not connect to the RSS feed or RSS server is down");
                }
                throw new Exception("Can not get RSS feed");
            }


            $xml = simplexml_load_string($rss_content);
            if ($xml === false) {
                throw new Exception("Invalid XML format in RSS feed");
            }
            $result = $xml;
        } catch (Exception $e) {
            $error = json_encode(["error" => "Error processing the XML: " . $e->getMessage()]);
            $result = false;
        }
        return [
            "error" => $error,
            "result" => $result
        ];
    }

    public function print($url): string
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            echo "Invalid URL";
            exit;
        }

        $options = [
            "http" => [
                "timeout" => 10
            ]
        ];
        $context = stream_context_create($options);

        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            $error = error_get_last();
            if (strpos($error['message'], 'failed to open stream') !== false) {
                echo "Can not connect to the URL or the server is down";
            } else {
                echo "Error retrieving content from URL";
            }
            exit;
        }
        echo $response;
    }
}
