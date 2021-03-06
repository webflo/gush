<?php

/*
 * This file is part of Gush package.
 *
 * (c) 2013-2015 Luis Cordova <cordoval@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Gush\Tests\Fixtures\Adapter;

use Gush\Config;
use Gush\Factory\IssueTrackerFactory;
use Gush\Factory\RepositoryManagerFactory;
use Symfony\Component\Console\Helper\HelperSet;

final class TestAdapterFactory implements RepositoryManagerFactory, IssueTrackerFactory
{
    private $name;

    public function __construct($name = 'github')
    {
        $this->name = $name;
    }

    public function createConfigurator(HelperSet $helperSet)
    {
        return new TestConfigurator(
            'GitHub',
            'https://api.github.com/',
            'https://github.com'
        );
    }

    public function createIssueTracker(array $adapterConfig, Config $config)
    {
        return new TestAdapter($this->name);
    }

    public function createRepositoryManager(array $adapterConfig, Config $config)
    {
        return new TestAdapter($this->name);
    }
}
