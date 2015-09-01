<?php
/**
 * Modified date: 8/27/2015
 * Modified by: Duy Huynh
 */

namespace Gemuni\ElasticBundle\Lib\Elasticsearch;


class Client {
    private $client = null;

    public function __construct()
    {
        $this->client = new \Elasticsearch\Client(Configuration::getConfig());
    }

    public function search()
    {

    }

    public function index()
    {

    }

    public function indexing()
    {

    }

    public function delete()
    {

    }
}