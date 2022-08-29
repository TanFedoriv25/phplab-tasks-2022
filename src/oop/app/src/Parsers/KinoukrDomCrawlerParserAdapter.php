<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent): mixed
    {
        $crawler = new Crawler($siteContent);

        $movie = new Movie();
        $movie['title'] = $crawler->filter("h1")->text();
        $movie['poster'] = $crawler->filter("div.fposter > a")->attr('href');
        $movie['description'] = $crawler->filter("div#fdesc")->text();

        return $movie;
    }
}