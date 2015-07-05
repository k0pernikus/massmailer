<?php
namespace Kopernikus\MassMailer\Command;

use Kopernikus\MassMailer\Exception\NotYetImplementedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestmailSendCommand
 * @package Kopernikus\MassMailer\Command
 */
class TestmailSendCommand extends Command
{
    /**
     * Test mail send configuration
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName("testmail:send")
            ->setDescription("Will send a testmail using the the mail config.");
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        throw new NotYetImplementedException();
    }


}