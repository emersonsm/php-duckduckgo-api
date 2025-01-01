<?php

namespace DuckDuckGo;

use DuckDuckGo\Misc;
use GuzzleHttp\Client as Http;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

Class Api
{
    /**
     * Api endpoint url.
     * 
     * @var string
     */
    protected string $endpoint;

    /**
     * DuckDuckGo Api constructor.
     */
    public function __construct(string $endpoint = "api.duckduckgo.com/")
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Perform a query against the DuckDuckGo API.
     * 
     * @param  string $query
     * @throws \Exception
     * @return array
     */
    public function zeroClickQuery(string $query): array
    {
        $url = $this->buildUrl($query);
        $http = new Http();

        try {
            $response = $http->request("GET", $url);
            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            throw new Exception($e->getResponse()->getBody(), $e->getResponse()->getStatusCode());
        } catch (ServerException $e) {
            throw new Exception("Could not retrieve API result.", 503);
        }
    }

    /**
     * Build a url with config parameters and query.
     * 
     * @param string $query
     * @return string
     */
    public function BuildUrl(string $query): string
    {
        $misc = new Misc();

        $parameters = [
            "q" => $query,
            "format" => $misc->getConfig("format"),
            "no_html" => $misc->getConfig("html"),
            "no_redirect" => 1,
            "skip_disambig" => $misc->getConfig("disambiguations"),
        ];

        $url = ($misc->getConfig("https")) 
            ? "https://".$this->endpoint."?"
            : "http://".$this->endpoint."?";

        $url .= http_build_query($parameters);

        return $url;
    }
}
