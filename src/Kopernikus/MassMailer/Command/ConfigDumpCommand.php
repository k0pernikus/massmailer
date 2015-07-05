<?php
namespace Kopernikus\MassMailer\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigDumpCommand extends Command
{
    protected function configure()
    {
        $this->setName('config:dump');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln(phpinfo());
    }


}