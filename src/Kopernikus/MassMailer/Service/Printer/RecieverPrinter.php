<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 9:41 PM
 */

namespace Kopernikus\MassMailer\Service\Printer;


use Kopernikus\MassMailer\Service\Config\Reciever;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class RecieverPrinter
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var Table
     */
    private $table;

    function __construct(OutputInterface $output)
    {
        $this->output = $output;
        $this->table = new Table($output);
    }

    /**
     * @param Reciever[] $recievers
     */
    public function printRecievers(array $recievers)
    {

        $this->table->setHeaders([
            'name',
            'email',
        ]);

        $rows = [];


        foreach ($recievers as $reciever) {
            $rows[] = [
                $reciever->getFullName(),
                $reciever->getEmail(),
            ];
        }

        $this->table->setRows($rows);
        $this->table->render();
        $this->table->setRows([]);
    }
}