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

namespace Sonata\Bundle\DemoBundle\Model;

use Sonata\Component\Delivery\BaseServiceDelivery;

/**
 * Class TakeAwayDelivery.
 *
 * Custom delivery class example
 *
 * @author Hugo Briand <briand@ekino.com>
 */
final class TakeAwayDelivery extends BaseServiceDelivery
{
    public function isAddressRequired(): bool
    {
        return false;
    }

    public function getCode(): string
    {
        return 'take_away';
    }
}
