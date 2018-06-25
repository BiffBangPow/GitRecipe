<?php

namespace Deployer;

use Symfony\Component\Console\Input\InputOption;

option('tag', null, InputOption::VALUE_REQUIRED, 'Tag to deploy');
option('branch', null, InputOption::VALUE_REQUIRED, 'Branch to deploy');

task('git:checkout', function () {

    if (input()->hasOption('tag')) {
        $tag = input()->getOption('tag');
    }

    if (input()->hasOption('branch')) {
        $branch = input()->getOption('branch');
    }
    if (!is_null($tag) && !is_null($branch)) {
        writeln('You cannot specify both branch and tag');
        exit(1);
    }

    run(sprintf('cd %s && git fetch', get('deploy_path')));

    if (!is_null($tag)) {
        run(
            sprintf('cd %s && git checkout %s', get('deploy_path'), $tag)
        );
    } elseif (!is_null($branch)) {
        run(sprintf('cd %s && git checkout %s', get('deploy_path'), $branch));
        run(sprintf('cd %s && git reset --hard origin/%s', get('deploy_path'), $branch));
    }
});