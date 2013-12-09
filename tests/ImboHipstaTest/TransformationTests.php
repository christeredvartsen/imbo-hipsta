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

use Imbo\EventManager\Event,
    Imbo\Model\Image,
    Imagick;

/**
 * Image transformation tests
 */
abstract class TransformationTests extends \PHPUnit_Framework_TestCase {
    /**
     * Fetch an image transformation to test
     *
     * @return mixed
     */
    abstract protected function getTransformation();

    /**
     * Simple test that just assure no errors occur when transforming an image
     */
    public function testCanTransformAnImage() {
        $image = new Image();

        $event = new Event();
        $event->setArgument('image', $image);

        $imagick = new Imagick();
        $imagick->readImageBlob(file_get_contents(__DIR__ . '/../../vendor/imbo/imbo/tests/Imbo/Fixtures/1024x1024.png'));

        // Trigger transformation
        $this->getTransformation()->setImagick($imagick)->transform($event);
    }
}
