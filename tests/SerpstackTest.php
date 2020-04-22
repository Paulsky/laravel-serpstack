<?php

namespace WDevs\LaravelSerpstack\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Http\Client\RequestException;
use Orchestra\Testbench\TestCase;
use WDevs\LaravelSerpstack\LaravelSerpstack;
use WDevs\LaravelSerpstack\Providers\LaravelSerpstackServiceProvider;

class SerpstackTest extends TestCase
{

    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('serpstack.api_key', env('SERPSTACK_API_KEY'));
        $app['config']->set('serpstack.secure', env('SERPSTACK_SECURE'));
    }


    protected function getPackageProviders($app)
    {
        return [LaravelSerpstackServiceProvider::class];
    }


    /**
     * @test
     */
    function it_should_be_able_to_call_the_search_endpoint()
    {
        $api = new LaravelSerpstack();
        try {
            $response = $api->search()->searchFor('mcdonald');

            $this->assertTrue($response['request']['success']);

        } catch (RequestException $e) {
            $this->assertEquals(true, false);
        }
    }


    /**
     * @test
     */
    function it_should_be_able_to_call_the_location_endpoint()
    {
        $api = new LaravelSerpstack();
        try {
            $response = $api->location()->locationFor('Groningen');

            $this->assertEquals(10, count($response));

        } catch (RequestException $e) {
            $this->assertEquals(true, false);
        }
    }
}
