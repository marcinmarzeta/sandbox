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

namespace Tests\Sonata\Bundle\QABundle;

class SonataNotificationStartCommandTest extends CommandTestCase
{
    public function testRefresh()
    {
        $client = self::createClient();

        $output = $this->runCommand($client, 'sonata:notification:start');

        $this->assertStringContainsString('done!', $output);

        foreach (self::getConsumerList() as $def) {
            list($name) = $def;

            $this->assertStringContainsString($name, $output);
        }
    }
}
