<?php

namespace App\Services;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerService
{

    /**
     * @var Client
     */
    protected $_client;

    /**
     * CrawlerService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->_client = $client;
    }

    public function crawl($url)
    {
        // crawl from url
        $crawler = $this->_client->request('GET' , $url);


        // Traversing node want to crawl
        $dataCrawler = $crawler->filter('#news_home')->children()->each(function ($node) {
            /** @var Crawler $node */
            $dataChildren = [];

            // crawl title
            $dataChildren['title'] = [
                'text' => $node->filter('.title_news > .txt_link')->text(),
                'href' => $node->filter('.title_news > .txt_link')->attr('href')
            ];

            // crawl body
            $dataChildren['body'] = [
                'image'         => $node->filter('.title_news')->siblings()->filter('.thumb > a > img')->attr('src'),
                'description'   => $node->filter('.title_news')->siblings()->filter('.news_lead')->text(),
            ];

            return $dataChildren;
        });
        \Debugbar::info($dataCrawler);

        return $dataCrawler;
    }
}