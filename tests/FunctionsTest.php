<?php declare(strict_types=1);

namespace ApiClients\Tests\Foundation\ValueObjects;

use function ApiClients\Foundation\ValueObjects\preheat;
use PHPUnit_Framework_TestCase;

class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testPreheat()
    {
        $count = count(get_declared_classes());

        preheat();

        $this->assertTrue($count < count(get_declared_classes()));
    }
}
