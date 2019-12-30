<?php

declare(strict_types=1);

/*
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Bundle\DemoBundle\Entity;

use Sonata\MediaBundle\Model\MediaInterface;

class MediaPreview
{
    protected $media;

    public function setMedia(MediaInterface $media)
    {
        $this->media = $media;
    }

    /**
     * @return \Sonata\MediaBundle\Model\MediaInterface
     */
    public function getMedia()
    {
        return $this->media;
    }
}
