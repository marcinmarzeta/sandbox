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

namespace Sonata\Bundle\DemoBundle\Provider;

use Sonata\Bundle\DemoBundle\Controller\GoodieController;
use Sonata\ProductBundle\Model\BaseProductProvider;

/**
 * This file has been generated by the EasyExtends bundle ( https://sonata-project.org/easy-extends ).
 *
 * References :
 *   custom repository : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en#querying:custom-repositories
 *   query builder     : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/query-builder/en
 *   dql               : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/dql-doctrine-query-language/en
 *
 * @author <yourname> <youremail>
 */
final class GoodieProductProvider extends BaseProductProvider
{
    public function getBaseControllerName(): string
    {
        return GoodieController::class;
    }

    public function getTemplatesPath(): string
    {
        return '@SonataDemo\Goodie';
    }
}
