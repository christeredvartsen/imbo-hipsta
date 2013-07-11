<?php
/**
 * This file is part of the imbo-hipsta package.
 *
 * (c) Espen Hovlandsdal <espen@hovlandsdal.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return array(
    'imageTransformations' => array(
        'earlybird' => function (array $params) {
            return new ImboHipsta\Earlybird();
        },
        'inkwell' => function (array $params) {
            return new ImboHipsta\Inkwell();
        },
    ),
);
