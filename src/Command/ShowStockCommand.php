<?php

declare(strict_types=1);

namespace App\Command;

use App\Machine\Firmware\WorkingPrototypeFirmware;
use App\Machine\SnackMachine;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

final class ShowStockCommand extends Command
{
    protected static $defaultName = 'show-stock';

    protected  function configure(): void
    {
        $this
            ->setDescription('Show All Available Items in Stocks')
            ->setHelp('This command show all items in stocks')
            ->addArgument('row', InputArgument::OPTIONAL, 'Input the number of row')
            ->addArgument('column', InputArgument::OPTIONAL, 'Input the number of column');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*
            $helper = $this->getHelper('question');
            $qColumn = new Question("Input numbers of column e.g 3: ", '3');
            $qRow = new Question("Input numbers of rows  e.g 2: ", '2');

            //Get Input
            $row = $helper->ask($input, $output, $qRow);
            if(empty($row)){
                throw new Exception('Input should start from atleast one');
            }
            $column = $helper->ask($input, $output, $qColumn);
            if(empty($column)){
                throw new Exception('Input should start from atleast one');
            }
         */
        $snackMachine = (new SnackMachine(new WorkingPrototypeFirmware("3", "3")))->loadMachine();

        $table = new Table($output);
        $table->setHeaders($snackMachine['header'])
              ->setRows($snackMachine['data']);

        $table->render();

        return 0;
    }
}
