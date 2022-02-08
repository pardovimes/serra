<?php

declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;

class DomainFilesSerraTest extends TestCase
{
    private string $serra;

    protected function setUp(): void
    {
        $this->serra = dirname(__FILE__) . '/../../src/serra';
    }

    /**
     * @test
     */
    public function invalid_file_from_domain_with_application_use(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Domain/domainFileWithApplicationUse.php';

        exec('sudo php '. $this->serra . " -f ". $stubFile, $output, $result);

        $this->assertEquals(1, count($output));
        $this->assertEquals(1, $result);
    }

    /**
     * @test
     */
    public function valid_file_from_domain(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Domain/domainFileWithPhpUsage.php';

        exec('sudo php '. $this->serra . " -f ". $stubFile, $output, $result);

        $this->assertEquals(0, count($output));
        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function valid_file_from_domain_with_exception_class_from_config(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Domain/domainFileWithInvalidUsageMarkedAsValid.php';
        $configFile = dirname(__FILE__) . '/../stubs/Domain/domainFileWithInvalidUsageMarkedAsValidConfig.json';

        exec('sudo php '. $this->serra . " -f ". $stubFile . " -c " . $configFile, $output, $result);

        $this->assertEquals(0, count($output));
        $this->assertEquals(0, $result);
    }
}
