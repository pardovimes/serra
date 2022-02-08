<?php

declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;

class ApplicationFilesSerraTest extends TestCase
{
    private string $serra;

    protected function setUp(): void
    {
        $this->serra = dirname(__FILE__) . '/../../src/serra';
    }

    /**
     * @test
     */
    public function invalid_file_from_application_with_infrastructure_use(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Application/applicationFileWithInfrastructureUse.php';

        exec('sudo php '. $this->serra . " -f ". $stubFile, $output, $result);

        $this->assertEquals(1, count($output));
        $this->assertEquals(1, $result);
    }

    /**
     * @test
     */
    public function valid_file_from_application(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Application/applicationFileWithPhpUsage.php';

        exec('sudo php '. $this->serra . " -f ". $stubFile, $output, $result);

        $this->assertEquals(0, count($output));
        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function valid_file_from_application_with_exception_class_from_config(): void
    {
        $stubFile = dirname(__FILE__) . '/../stubs/Application/applicationFileWithInvalidUsageMarkedAsValid.php';
        $configFile = dirname(__FILE__) . '/../stubs/Application/applicationFileWithInvalidUsageMarkedAsValidConfig.json';

        exec('sudo php '. $this->serra . " -f ". $stubFile . " -c " . $configFile, $output, $result);

        $this->assertEquals(0, count($output));
        $this->assertEquals(0, $result);
    }
}
