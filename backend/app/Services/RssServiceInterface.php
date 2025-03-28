<?php

namespace App\Services;

interface RssServiceInterface
{
    public function lists($url);
    public function print($url): string;
}
