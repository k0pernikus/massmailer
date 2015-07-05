<?php
namespace Kopernikus\MassMailer\Command;


use Kopernikus\MassMailer\Exception\SendMailFlagNotGivenExceoption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MailSendCommand
 * @package Kopernikus\MassMailer\Command
 */

class MailSendCommand extends AbstractMailerCommand
{
    protected function configure()
    {
        $this
            ->setName('mail:send')
            ->setDescription('Will send mails to the configured recievers.')
            ->addOption(
                'forceSendMails',
                'f',
                InputOption::VALUE_NONE,
                "Will send mails to all the users you defined in your mail.yml."
            );

    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $shouldSendMails = $input->getOption('forceSendMails');
        $recievers = $this
            ->getLiveMailRecievers()
            ->getRecievers();

        $this->printRecievers($output, $recievers);


        if (!$shouldSendMails) {
            throw new SendMailFlagNotGivenExceoption();
        }

        $this->sendMails($output, $recievers);
    }

}