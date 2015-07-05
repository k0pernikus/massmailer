<?php
namespace Kopernikus\MassMailer\Command;

use Kopernikus\MassMailer\Exception\NotYetImplementedException;
use Kopernikus\MassMailer\Service\EdenMailerFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestmailSendCommand
 * @package Kopernikus\MassMailer\Command
 */
class TestmailSendCommand extends AbstractConfigAwareCommand
{
    /**
     * Test mail.yml send configuration
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName("testmail:send")
            ->setDescription("Will send a testmail using the the mail.yml config.");
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
        $smpt = (new EdenMailerFactory($this->getMailAccountConfig()))
            ->getSmtpInstance();


        $recievers = $this->getTestMailRecievers()->getRecievers();

        $output->writeln("RECIEVVERS:");

        $contentConfig = $this->getContentConfig();

        foreach ($recievers as $reciever) {
            $smpt->connect();

            $output->writeln("Sending mail to: " . $reciever->getEmail());

            $smpt
                ->setBody($contentConfig->getContent())
                ->setSubject($contentConfig->getSubject())
                ->addTo($reciever->getEmail(), $reciever->getFullName());

            $smpt->send();

            $smpt->reset();
        }
    }
}