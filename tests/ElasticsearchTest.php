<?php

namespace Tests;

use Elastic\Elasticsearch\ClientBuilder;
use PHPUnit\Framework\TestCase;

class ElasticsearchTest extends TestCase
{
    public function testElasticsearchConnection()
    {
        $client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();

        // Effectuer une requête simple pour vérifier la connexion
        $response = $client->info();

        // Vérifier que la réponse contient des informations sur le cluster
        $this->assertArrayHasKey('cluster_name', $response);
        $this->assertArrayHasKey('version', $response);
        $this->assertArrayHasKey('tagline', $response);
    }
}
