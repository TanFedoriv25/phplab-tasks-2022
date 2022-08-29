<?php

namespace src\oop\app\src\Parsers;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent): mixed
    {
        preg_match('/<h1.+?class=["\']name["\'].+?>(.+?)<\/h1>/us', $siteContent, $titleMatches);
        preg_match('/<meta.+?property.*?=.*?["\']og:image["\']\w*?\s*?content.*?=.*?["\'](.+?)["\'][^>].*?>/su', $siteContent, $posterMatches);
        preg_match('/<div\s*class\s*=\s*?["\']full-story["\']*?>(.+?)<\/div>/us', $siteContent, $descriptionMatches);

        $movie['title'] = $titleMatches[1];
        $movie['poster'] = $posterMatches[1];
        $movie['description'] = $descriptionMatches[1];

        return $movie;
    }
}