<?php

namespace App\Core;

abstract class AbstractApplication
{
    protected function initialize(): void
    {
        $this->initializeSentry();
        $this->initializeEnvironment();
        $this->initializeConfig();
    }

    protected function initializeSentry(): void
    {
        // @todo Implement Sentry
    }

    private function initializeEnvironment(): void
    {
        // @todo load environment variables
    }

    abstract public static function startup();

    abstract protected function initializeConfig();

    abstract public function getApp();
}
