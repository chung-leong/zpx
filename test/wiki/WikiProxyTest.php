<?php declare(strict_types=1);

require_once __DIR__ . '/../ExtensionTestCase.php';

final class WikiProxyTest extends ExtensionTestCase
{   
    public function testArrayListProxy(): void
    {
        $lines = $this->runTest("proxy-array-list", "test.php");
        // $this->assertSame(<<<OUTPUT
        // OUTPUT, implode(PHP_EOL, $lines));
        echo implode(PHP_EOL, $lines), "\n";
    }
}