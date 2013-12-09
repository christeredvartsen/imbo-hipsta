<?php
/**
 * This file is part of the imbo-hipsta package.
 *
 * (c) Espen Hovlandsdal <espen@hovlandsdal.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ImboHipstaTest;

use ImboHipsta\Inkwell;

/**
 * Inkwell transformation test
 *
 * @covers ImboHipsta\Inkwell
 */
class InkwellTest extends TransformationTests {
    protected function getTransformation() {
        return new Inkwell();
    }
}
