<?php


use Encore\Admin\View\HasProperties;
use PHPUnit\Framework\TestCase;

class TraitHasPropertiesTest extends TestCase
{
    use HasProperties;

    public function testProperty()
    {
        $name = "key";
        $val = "value";
        $this->setProperty($name, $val);

        $this->assertSame($val, $this->getProperty($name));
    }

    public function testHasProperty()
    {
        $name = "key";
        $val = "value";
        $this->setProperty($name, $val);

        $this->assertTrue($this->hasProperty($name));
        $this->assertFalse($this->hasProperty($val));
    }

}
