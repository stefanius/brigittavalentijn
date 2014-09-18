<?php

namespace Stef\StringManipulation\Tests\Manipulators;

use Stef\StringManipulation\Manipulators\FullpathSlugManipulator;
use Stef\StringManipulation\Manipulators\SlugManipulator;

class FullpathSlugManipulatorTest extends \PHPUnit_Framework_TestCase{

    /**
     * @dataProvider provider
     */
    public function testSlugManipulator($string, $expected) {
        $manipulator = new FullpathSlugManipulator(new SlugManipulator());

        $result = $manipulator->manipulate($string);

        $this->assertEquals($expected, $result);
    }

    public function provider() {
        return [
            ["The Black Lazy Brown Fox!", "the-black-lazy-brown-fox"],
            ["my-fake-email@domain.com", "my-fake-email-domain-com"],
            ["/The Black Lazy Brown Fox!", "the-black-lazy-brown-fox"],
            ["/my-blog/my-fake-email@domain.com", "my-blog/my-fake-email-domain-com"],
            ["/joe / the plumber / and the 100$ /my-fake-email@domain.com", "joe/the-plumber/and-the-100/my-fake-email-domain-com"],
        ];
    }
}
