<?php
/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */

namespace src\oop\app\src;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;
use src\oop\app\src\Transporters\TransportInterface;

class Scrapper
{
    private TransportInterface $transporter;
    private ParserInterface $parser;
    private Movie $movie;

    /**
     * @param TransportInterface $transporter
     * @param ParserInterface $parser
     * @param Movie $movie
     */
    public function __construct(TransportInterface $transporter, ParserInterface $parser, Movie $movie)
    {
        $this->transporter = $transporter;
        $this->parser = $parser;
        $this->movie = $movie;
    }

    /**
     * @param string $url
     * @return Movie
     */
    public function getMovie(string $url): Movie
    {
        $data = $this->parser->parseContent($this->transporter->getContent($url));

        $this->movie->setTitle($data['title']);
        $this->movie->setDescription($data['description']);
        $this->movie->setPoster($data['poster']);

        return $this->movie;
    }
}
