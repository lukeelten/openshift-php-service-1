<?php

namespace Tests\Functional;

class HealthTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testGetHomepageWithoutName()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains("application/json", $response->getHeaderLine("Content-Type"));

        $data = (string)$response->getBody();
        $this->assertTrue(substr($data, 0, 1) == "{");
        $this->assertTrue(substr($data, -1, 1) == "}");

        $json =json_decode($data, true);

        $this->assertEquals(true, $json["healthy"]);
    }

    /**
     * Test that the index route won't accept a post request
     */
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }
}