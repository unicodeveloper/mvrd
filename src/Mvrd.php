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
        $rawVehicleData = [];

        $nodeValues = $crawler->filter('table > tbody > tr')->each( function( $node, $i) {
                // Remove double spaces, and newline(s)
                $formData = trim(preg_replace('/\s+/', ' ', $node->text()));

                return $this->processData($formData);
                 
        });

        // Strip multi-dimensional data array into simple associative array.
        $vehicleData = [];
        foreach ($nodeValues as $index => $value) {
            foreach ($value as $key => $carData) {
                $vehicleData[$key] = $carData;
            }
        }

        return $vehicleData;
    }


     /**
     * Process vehicle data to make it possible to store them as key-value pairs in an array.
     * @param  $data (string to be processed)
     * @return array
     */
    public function processData($data)
    {
                // Prepare data to be stored as key=>value pairs
                $string = explode(' ', $data, 3);   

                // Use the number of spaces in the string as a requisite to determine how to handle them.
                // e.g Color field(1 space) contains less spaces than Plate Number(2 spaces) e.t.c
                if (substr_count($data, ' ') > 1) {

                    // Check if the string holds Vehicle Model data as this needs to be stored differently.
                    $isModelPresent = ($string[0] == 'Model') ? true : false;

                    if ($isModelPresent) {
                        $rawVehicleData[$string[0]] = $string[1] .' '. $string[2];
                    }else{
                        /*  An error on the host website (lsmvaapvs.org) sees 'Issue' misspelt as 'Isssue'
                            we try to fix this by detecting that string and correcting it before handling the data.
                        */
                        $string[0] = $string[0] == 'Isssue' ? 'Issue' : $string[0];
                        $rawVehicleData[$string[0].$string[1]] =  $string[2];
                    }

                }else{
                    $rawVehicleData[$string[0]] =  $string[1];
                }
                
                return $rawVehicleData;         
    }
}

