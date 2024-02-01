<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hai Info", ["user" => "irfan_em"]);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "balqis_fa"]);

        Log::info("Hai Info");
        Log::error("Hai Error !");

        self::assertTrue(true);
    }

    public function testWithChannel()
    {
        $hasilLog = Log::channel("slack");
        $hasilLog->error("Hai Error, kamu g boleh dateng !");

        Log::info("Log info ini akan melewati jalur default");

        self::assertTrue(true);
    }
}
