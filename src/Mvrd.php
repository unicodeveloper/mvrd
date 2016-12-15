<?php

/*
 * This file is part of the Mvrd PHP library.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Mvrd;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Unicodeveloper\Mvrd\Exceptions\IsNull;
use Unicodeveloper\Mvrd\Exceptions\IsEmpty;

class Mvrd {

    /**
     * lsmvaapvs.org API Base Url
     */
    const baseURL = 'http://www.lsmvaapvs.org';

    /**
     *  Response from requests made to lsmvaapvs.org
     * @var mixed
     */
    protected $response;

    /**
     * Instance of Guzzle Client
     * @var object
     */
    protected $client;

    /**
     * Constructor
     * @param $plateNumber string
     */
    public function __construct($plateNumber = null)
    {
        if (is_null($plateNumber)) {
            throw IsNull::create("Please input a valid plate number, Oga!!!");
        }

        $this->plateNumber = $plateNumber;
        $this->prepareRequest();
    }

    /**
     * Instantiate Guzzle Client and prepare request for http operations
     * @return none
     */
    private function prepareRequest()
    {
        $this->client = new Client(['base_uri' => self::baseURL]);
    }

    /**
     * Perform a GET request
     * @param  string $relativeUrl
     * @return none
     */
    private function performGetRequest($relativeUrl)
    {
        $this->response = $this->client->request('GET', $relativeUrl, []);
    }

    /**
     * Get Raw Data
     * @param  none
     * @return array
     */
    public function getData()
    {
        $this->performGetRequest('/search.php?vpn=' . $this->plateNumber);

        $html = (string) $this->response->getBody();

        $crawler = new Crawler($html);

        $nodeValues = $crawler->filter('table > tbody > tr')->each( function( $node, $i) {
                return $node->text();
        });

        return $nodeValues;
    }
}

