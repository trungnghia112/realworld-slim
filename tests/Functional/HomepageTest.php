<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route returns a 404 error
     */
    public function testRootReturns404()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertContains('Page Not Found', (string)$response->getBody());
    }
}