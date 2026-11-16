<?php declare(strict_types=1);

require_once __DIR__ . '/../ExtensionTestCase.php';

final class WikiIniTest extends ExtensionTestCase
{   
    public function testBasicIniEntries(): void
    {
        $lines = $this->runTest("ini-basic", "test.php");
        $this->assertSame(<<<OUTPUT
        boolean = true
        integer = 1234
        float = 3.1415926535898
        string = Hello world
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testAutoIniEntries(): void
    {
        $lines = $this->runTest("ini-auto", "test.php");
        $this->assertSame(<<<OUTPUT
        boolean = true
        integer = 1234
        float = 3.1415926535898
        string = Hello world
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testIniEntryVerification(): void
    {
        $lines = $this->runTest("ini-verify", "test.php");
        $this->assertStringContainsString("too long", implode(PHP_EOL, $lines));
    }

    public function testIniEntryRestriction(): void
    {
        $lines = $this->runTest("ini-restricted", "test.php");
        $this->assertSame(<<<OUTPUT
        could not set string
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testEnumIniEntries(): void
    {
        $lines = $this->runTest("ini-enum", "test.php");
        $this->assertSame(<<<OUTPUT
        speed = .fastest
        flags = .{ .is_good = true, .is_fast = false, .is_cheap = true }
        OUTPUT, implode(PHP_EOL, $lines));
    }    
}