<?php declare(strict_types=1);

require_once __DIR__ . '/../ExtensionTestCase.php';

final class WikiErrorTest extends ExtensionTestCase
{   
    public function testFactorialError(): void
    {
        $lines = $this->runTest("error-factorial", "test.php");
        $this->assertSame(<<<OUTPUT
        120
        too large
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testFactorialDetailedError(): void
    {
        $lines = $this->runTest("error-factorial-detailed", "test.php");
        $this->assertSame(<<<OUTPUT
        !21 would result in a number larger than the maximum value of u64, which is 18446744073709551615
        OUTPUT, implode(PHP_EOL, $lines));
    }
}