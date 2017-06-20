<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CrawlerService;

class CrawlerController extends Controller
{

    /**
     * @var CrawlerService
     */
    protected $_crawlerService;

    /**
     * CrawlerController constructor.
     * @param CrawlerService $crawlerService
     */
    public function __construct(CrawlerService $crawlerService)
    {
        $this->_crawlerService = $crawlerService;
    }

    public function index()
    {
        $dataCrawls = $this->_crawlerService->crawl('http://thethao.vnexpress.net/');

        return view('crawler/index', [
            'dataCrawls' => $dataCrawls
        ]);
    }
}
