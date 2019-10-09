<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Bundle\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sonata\ClassificationBundle\Model\CollectionManagerInterface;


/**
 * Class LoadCollectionData
 *
 * @package Sonata\Bundle\EcommerceDemoBundle\DataFixtures\ORM
 *
 * @author  Hugo Briand <briand@ekino.com>
 */
class LoadCollectionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @var \Sonata\ClassificationBundle\Model\CollectionManagerInterface
     */
    protected $collectionManager;

    /**
     * LoadCategoryData constructor.
     * @param CollectionManagerInterface|null $collectionManager
     */
    public function __construct(CollectionManagerInterface $collectionManager = null)
    {
        $this->collectionManager = $collectionManager;
    }

    /**
     * Returns the Sonata MediaManager.
     *
     * @return \Sonata\ClassificationBundle\Model\CollectionManagerInterface
     */
    public function getCollectionManager()
    {
        return $this->collectionManager;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // PHP Fan collection
        $php = $this->getCollectionManager()->create();
        $php->setName("PHP Fan");
        $php->setSlug("php-fan");
        $php->setDescription("Everything a PHP Fan needs.");
        $php->setEnabled(true);
        $this->getCollectionManager()->save($php);

        $this->setReference('php_collection', $php);

        // Travels collection
        $travel = $this->getCollectionManager()->create();
        $travel->setName("Travels");
        $travel->setSlug("travels");
        $travel->setDescription("Every travels you want");
        $travel->setEnabled(true);
        $this->getCollectionManager()->save($travel);

        $this->setReference('travel_collection', $travel);

        // Dummy collection
        $dummy = $this->getCollectionManager()->create();
        $dummy->setName("Dummys");
        $dummy->setSlug("Dummys");
        $dummy->setDescription("Every dummys you want");
        $dummy->setEnabled(true);
        $this->getCollectionManager()->save($dummy);

        $this->setReference('dummy_collection', $dummy);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
