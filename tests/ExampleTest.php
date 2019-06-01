<?php

namespace Javoscript\PrepaidSubs\Tests;

use PHPUnit\Framework\TestCase;
use Javoscript\PrepaidSubs\Example;

/**
 * Class ExampleTest
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class ExampleTest extends TestCase
{

    public function test_it_returns_hello_when_greeted()
    {
        $example = new Example();

        $this->assertEquals("hello", $example->hello());
    }

}
