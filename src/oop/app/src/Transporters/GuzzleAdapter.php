<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody();
    }
}