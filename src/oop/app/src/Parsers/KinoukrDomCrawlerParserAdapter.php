<?php

namespace src\oop\app\src\Parsers;

use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    private $crawler;

    /**
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent): mixed
    {
        $this->crawler->addHtmlContent($siteContent);
        $movie['title'] = $this->crawler->filter("h1")->text();
        $movie['poster'] = $this->crawler->filter("div.fposter > a")->attr('href');
        $movie['description'] = $this->crawler->filter("div#fdesc")->text();

        return $movie;
    }
}
