<?php declare(strict_types=1);

require_once __DIR__ . '/../ExtensionTestCase.php';

final class WikiClassTest extends ExtensionTestCase
{   
    public function testBareBoneClass(): void
    {
        $lines = $this->runTest("class-bare-bone", "test.php");
        if (PHP_MAJOR_VERSION > 8 or PHP_MINOR_VERSION >= 3) { 
            $this->assertSame(<<<OUTPUT
            Point Object
            (
            )
            OUTPUT, implode(PHP_EOL, $lines));
        } else {
            $this->assertSame(<<<OUTPUT
            Point Object
            OUTPUT, implode(PHP_EOL, $lines));
        }
    }

    public function testManualGetterSetter(): void
    {
        $lines = $this->runTest("class-getter-setter-manual", "test.php");
        $this->assertSame(<<<OUTPUT
        Point Object
        (
            [x] => 123
            [y] => 456
            [normal] => 472.29757568719
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testGetterSetter(): void
    {
        $lines = $this->runTest("class-getter-setter", "test.php");
        $this->assertSame(<<<OUTPUT
        Point Object
        (
            [x] => 123
            [y] => 456
            [normal] => 472.29757568719
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testAutoGetterSetter(): void
    {
        $lines = $this->runTest("class-getter-setter-auto", "test.php");
        $this->assertSame(<<<OUTPUT
        Point Object
        (
            [x] => 123
            [y] => 456
            [normal] => 472.29757568719
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectInit(): void
    {
        $lines = $this->runTest("class-object-init", "test.php");
        $this->assertSame(<<<OUTPUT
        init
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectInitSelf(): void
    {
        $lines = $this->runTest("class-object-init-self", "test.php");
        $this->assertSame(<<<OUTPUT
        initSelf
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectAutoInit(): void
    {
        $lines = $this->runTest("class-object-init-auto", "test.php");
        $this->assertSame(<<<OUTPUT
        Example Object
        (
            [number1] => 123
            [number2] => 456
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectIllegalInit(): void
    {
        $lines = $this->runTest("class-object-init-illegal", "test.php");
        $this->assertStringContainsString("not permitted", implode(PHP_EOL, $lines));
    }

    public function testObjectDeinit(): void
    {
        $lines = $this->runTest("class-object-deinit", "test.php");
        $this->assertSame(<<<OUTPUT
        deinit
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectAutoDeinit(): void
    {
        $lines = $this->runTest("class-object-deinit-auto", "test.php");
        $this->assertSame(<<<OUTPUT
        Example Object
        (
            [text] => Default text
        )
        Example Object
        (
            [text] => Hello world
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testObjectSemiautoDeinit(): void
    {
        $lines = $this->runTest("class-object-deinit-ignore", "test.php");
        $this->assertSame(<<<OUTPUT
        Example Object
        (
            [integers] => Array
                (
                    [0] => 1
                    [1] => 2
                    [2] => 3
                )

            [floats] => Array
                (
                )

        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testInstanceMethod(): void
    {
        $lines = $this->runTest("class-instance-method", "test.php");
        $this->assertSame(<<<OUTPUT
        x = 123, y = 456
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testFluentMethods(): void
    {
        $lines = $this->runTest("class-instance-method-fluent", "test.php");
        // $this->assertSame(<<<OUTPUT
        // x = 123, y = 456
        // OUTPUT, implode(PHP_EOL, $lines));
        echo implode(PHP_EOL, $lines), "\n";
    }

    public function testStaticMethod(): void
    {
        $lines = $this->runTest("class-static-method", "test.php");
        $this->assertSame(<<<OUTPUT
        Point Object
        (
            [x] => 10
            [y] => 10
        )
        Point Object
        (
            [x] => 15
            [y] => 15
        )
        Point Object
        (
            [x] => 20
            [y] => 20
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testStaticObjectInitialization(): void
    {
        $lines = $this->runTest("class-static-method-self-init", "test.php");
        $this->assertSame(<<<OUTPUT
        Molly the cat: meow meow
        OUTPUT, implode(PHP_EOL, $lines));
    }

    public function testExports(): void
    {
        $lines = $this->runTest("class-export", "test.php");
        $this->assertSame(<<<OUTPUT
        somewhere\\out\\there\\ThatClass Object
        (
        )
        somewhere\\out\\there\\ThatClass\\Child Object
        (
        )
        somewhere\\out\\there\\ThatClass\\Child\\Pet Enum:int
        (
            [name] => cat
            [value] => 0
        )
        string(35) "somewhere\\out\\there\\ThatClass\\Child"
        string(39) "somewhere\\out\\there\\ThatClass\\Child\\Pet"
        somewhere\\out\\there\\ThatClass\\Child Object
        (
        )
        somewhere\\out\\there\\ThatClass\\Child\\Pet Enum:int
        (
            [name] => dog
            [value] => 1
        )
        OUTPUT, implode(PHP_EOL, $lines));
    }
}