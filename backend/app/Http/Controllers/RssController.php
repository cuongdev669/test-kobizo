<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RssService;

class RssController extends Controller
{
    protected $rssService;

    public function __construct(RssService $rssService)
    {
        $this->rssService = $rssService;
    }

    public function index(Request $request) {
        $url = $request->get("url") ?? "";
        $result = $this->rssService->lists($url);
        return view("rss", $result);
    }

    /**
     * API rss print
     */
    public function print(Request $request)
    {
        $url = $request->get("url") ?? "";
        $this->rssService->print($url);
    }
}
