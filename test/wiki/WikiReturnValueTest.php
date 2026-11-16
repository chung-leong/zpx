<?php declare(strict_types=1);

require_once __DIR__ . '/../ExtensionTestCase.php';

final class WikiReturnValueTest extends ExtensionTestCase
{   
    public function testStaticStringReturnValue(): void
    {
        $lines = $this->runTest("retval-string-static", "test.php");
        $this->assertSame(<<<OUTPUT
        string(11) "Hello world"
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testStringReturnValueWithLeak(): void
    {
        $lines = $this->runTest("retval-string-leak", "test.php");
        if (PHP_DEBUG) {
            $this->assertStringContainsString("1 memory leaks detected", implode(PHP_EOL, $lines));
        } else {
            $this->assertSame(<<<OUTPUT
            string(11) "Hello, Bob!"
            OUTPUT, implode(PHP_EOL, $lines));
        }
    }

    public function testStringReturnValue(): void
    {
        $lines = $this->runTest("retval-string", "test.php");
        $this->assertSame(<<<OUTPUT
        string(11) "Hello, Bob!"
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testFixedArrayReturnValue(): void
    {
        $lines = $this->runTest("retval-array-fixed", "test.php");
        $this->assertSame(<<<OUTPUT
        Array
        (
            [0] => 10
            [1] => 20
            [2] => 30
            [3] => 40
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testArrayReturnValue(): void
    {
        $lines = $this->runTest("retval-array", "test.php");
        $this->assertSame(<<<OUTPUT
        Array
        (
            [0] => 10
            [1] => 20
            [2] => 30
            [3] => 40
            [4] => 50
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testPlainObjectReturnValue(): void
    {
        $lines = $this->runTest("retval-stdclass", "test.php");
        $this->assertSame(<<<OUTPUT
        stdClass Object
        (
            [x] => 123
            [y] => 456
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testPlainObjectArrayReturnValue(): void
    {
        $lines = $this->runTest("retval-stdclass-array", "test.php");
        $this->assertSame(<<<OUTPUT
        Array
        (
            [0] => stdClass Object
                (
                    [name] => Joe Montana
                    [profession] => Football player
                )

            [1] => stdClass Object
                (
                    [name] => Joe DiMaggio
                    [profession] => Baseball player
                )

            [2] => stdClass Object
                (
                    [name] => Joe Frazier
                    [profession] => Boxer
                )

        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testIllegalPlainObjectReturnValue(): void
    {
        try {
            $this->runTest("retval-stdclass-illegal", "test.php");
            $this->fail();
        } catch (Exception $e) {
            $this->assertStringContainsString("has not been exported as a custom class", $e->getMessage());
        }
    }

    public function testCustomObjectReturnValue(): void
    {
        $lines = $this->runTest("retval-custom-object", "test.php");
        $this->assertSame(<<<OUTPUT
        opaque_ptr = 0xDEADBEEF
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testCustomObjectArrayReturnValue(): void
    {
        $lines = $this->runTest("retval-custom-object-array", "test.php");
        $this->assertSame(<<<OUTPUT
        Array
        (
            [0] => Point Object
                (
                    [x] => 0
                    [y] => 0
                )

            [1] => Point Object
                (
                    [x] => 1
                    [y] => 1
                )

            [2] => Point Object
                (
                    [x] => 2
                    [y] => 2
                )

            [3] => Point Object
                (
                    [x] => 3
                    [y] => 3
                )

            [4] => Point Object
                (
                    [x] => 4
                    [y] => 4
                )

        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testCustomObjectPointerReturnValue(): void
    {
        $lines = $this->runTest("retval-custom-object-preexisting", "test.php");
        $this->assertSame(<<<OUTPUT
        Point Object
        (
            [x] => 0
            [y] => 0
        )
        Point Object
        (
            [x] => 4
            [y] => 4
        )
        OUTPUT, implode(PHP_EOL, $lines));
        echo implode(PHP_EOL, $lines), "\n";
    }

    public function testTupleReturnValue(): void
    {
        $lines = $this->runTest("retval-tuple", "test.php");
        $this->assertSame(<<<OUTPUT
        string(11) "Hello world"
        int(1234)
        OUTPUT, implode(PHP_EOL, $lines));
    }
}