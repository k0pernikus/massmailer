<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 9:51 PM
 */

namespace Kopernikus\MassMailer\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MailSendCommand extends AbstractMailerCommand
{
    protected function configure()
    {
        $this
            ->setName('mail:send')
            ->setDescription('Will send mails to the configured recievers.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }


}