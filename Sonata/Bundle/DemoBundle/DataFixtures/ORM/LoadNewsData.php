<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Bundle\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Sonata\MediaBundle\Model\GalleryManagerInterface;
use Sonata\MediaBundle\Model\MediaManagerInterface;
use Sonata\NewsBundle\Model\CommentInterface;

use Sonata\FormatterBundle\Formatter\PoolInterface;
use Sonata\ClassificationBundle\Model\TagManagerInterface;
use Sonata\ClassificationBundle\Model\CollectionManagerInterface;
use Sonata\NewsBundle\Model\PostManagerInterface;
use Sonata\NewsBundle\Model\CommentManagerInterface;
use Faker\Generator as Faker;


class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface
{
    private $container;

    function getOrder()
    {
        return 3;
    }

    protected $pool;
    protected $tagManager;
    protected $collectionManager;
    protected $postManager;
    protected $commentManager;
    protected $faker;
    
    public function __construct(PoolInterface $pool, TagManagerInterface $tagManager, 
                                CollectionManagerInterface $collectionManager, PostManagerInterface $postManager,
                                CommentManagerInterface $commentManager, Faker $faker
                            )
    {
        $this->pool = $pool;
        $this->tagManager = $tagManager;
        $this->collectionManager = $collectionManager;
        $this->postManager = $postManager;
        $this->commentManager = $commentManager;
        $this->faker = $faker;
    }

    public function getPoolFormatter()
    {
        return $this->pool;
    }

    public function getTagManager()
    {
        return $this->tagManager;
    }

    public function getCollectionManager()
    {
        return $this->collectionManager;
    }

    public function getPostManager()
    {
        return $this->postManager;
    }

    public function getCommentManager()
    {
        return $this->commentManager;
    }

    public function getFaker()
    {
        return $this->faker;
    }

    public function load(ObjectManager $manager)
    {
//        $userManager = $this->getUserManager();
        $postManager = $this->getPostManager();

        $faker = $this->getFaker();

        $tags = array(
            'symfony' => null,
            'form' => null,
            'general' => null,
            'web2' => null,
        );

        foreach($tags as $tagName => $null) {
            $tag = $this->getTagManager()->create();
            $tag->setEnabled(true);
            $tag->setName($tagName);

            $tags[$tagName] = $tag;
            $this->getTagManager()->save($tag);
        }

        $collection = $this->getCollectionManager()->create();
        $collection->setEnabled(true);
        $collection->setName('General');
        $this->getCollectionManager()->save($collection);

        foreach (range(1, 20) as $id) {
            $post = $postManager->create();
            $post->setAuthor($this->getReference('user-johndoe'));

            $post->setCollection($collection);
            $post->setAbstract($faker->sentence(30));
            $post->setEnabled(true);
            $post->setTitle($faker->sentence(6));
            $post->setPublicationDateStart($faker->dateTimeBetween('-30 days', '-1 days'));

            $id = $this->getReference('sonata-media-0')->getId();
/*
            $raw =<<<RAW
### Gist Formatter

Now a specific gist from github

<% gist '1552362', 'gistfile1.txt' %>

### Media Formatter

Load a media from a <code>SonataMediaBundle</code> with a specific format

<% media $id, 'big' %>

RAW
;
*/
            $raw = '';
            $raw .= sprintf("### %s\n\n%s\n\n### %s\n\n%s",
                $faker->sentence(rand(3, 6)),
                $faker->text(1000),
                $faker->sentence(rand(3, 6)),
                $faker->text(1000)
            );

            $post->setRawContent($raw);
            $post->setContentFormatter('markdown');

            $post->setContent($this->getPoolFormatter()->transform($post->getContentFormatter(), $post->getRawContent()));
            $post->setCommentsDefaultStatus(CommentInterface::STATUS_VALID);

            foreach($tags as $tag) {
                $post->addTags($tag);
            }

            foreach(range(1, $faker->randomDigit + 2) as $commentId) {
                $comment = $this->getCommentManager()->create();
                $comment->setEmail($faker->email);
                $comment->setName($faker->name);
                $comment->setStatus(CommentInterface::STATUS_VALID);
                $comment->setMessage($faker->sentence(25));
                $comment->setUrl($faker->url);

                $post->addComments($comment);
            }

            $postManager->save($post);
        }
    }
}
