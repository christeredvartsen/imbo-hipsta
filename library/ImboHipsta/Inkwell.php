<?php
/**
 * This file is part of the imbo-hipsta package.
 *
 * (c) Espen Hovlandsdal <espen@hovlandsdal.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ImboHipsta;

use Imbo\Exception\TransformationException,
    Imbo\Image\Transformation\Transformation,
    Imbo\EventListener\ListenerInterface,
    Imagick,
    ImagickException;

/**
 * Inkwell transformation
 *
 * @author Espen Hovlandsdal <espen@hovlandsdal.com>
 */
class Inkwell extends Transformation implements ListenerInterface {
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents() {
        return array(
            'image.transformation.inkwell' => 'transform',
        );
    }

    /**
     * Transform the image
     *
     * @param EventInterface $event The event instance
     */
    public function transform(EventInterface $event) {
        try {
            $this->imagick->modulateImage(100, 0, 100);

            $original = clone $this->imagick;

            $this->imagick->clear();
            $this->imagick->newPseudoImage(1, 1000, 'gradient:');
            $this->imagick->rotateImage('#fff', 90);
            $this->imagick->sigmoidalContrastImage(true, 1.6, 50);
            $this->imagick->sigmoidalContrastImage(false, 0.333333333, 0);
            $this->imagick->clutImage($original);

            $event->getArgument('image')->hasBeenTransformed(true);
        } catch (ImagickException $e) {
            throw new TransformationException($e->getMessage(), 400, $e);
        }
    }
}
