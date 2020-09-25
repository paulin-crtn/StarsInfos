<?php

namespace Facade\FlareClient\Context;

class ContextContextDetector implements ContextDetectorInterface
{
    public function detectCurrentContext(): ContextInterface
    {
        if ($this->runningInConsole()) {
            return new ConsoleContext($_SERVER['argv'] ?? []);
        }

        return new RequestContext();
    }

    private function runningInConsole(): bool
    {
        if (isset($_ENV['APP_RUNNING_IN_CONSOLE'])) {
            return $_ENV['APP_RUNNING_IN_CONSOLE'] === 'true';
        }

        return in_array(php_sapi_name(), ['cli', 'phpdb']);
    }
}
