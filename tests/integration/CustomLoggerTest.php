<?php

namespace Unish;

class CustomLoggerTest extends UnishIntegrationTestCase
{
    public function testCustomLogger()
    {
        // Uses standard Drush logger.
        $this->drush('version', [], ['debug' => true]);
        $this->assertStringContainsString('sec', $this->getErrorOutputRaw());

        // sut:simple has been hooked so that a custom logger is use. It doesn't show timing information during --debug.
        $this->drush('sut:simple', [], ['debug' => true, 'simulate' => true]);
        $this->assertStringNotContainsString('sec', $this->getOutput());
    }
}
