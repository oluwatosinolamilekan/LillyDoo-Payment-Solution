<?php

declare(strict_types=1);

namespace App\Command;

use App\Helpers\ConvertChangeToCoins;
use App\Machine\Firmware\WorkingPrototypeFirmware;
use App\Machine\Purchase\Transaction;
use App\Machine\SnackMachine;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

final class PurchaseCommand extends Command
{
    protected static $defaultName = 'purchase';

    protected  function configure(): void
    {
        $this
            ->setDescription('Creates a new purchase from the vending machine.')
            ->addArgument('question', InputArgument::OPTIONAL, 'Enter the row number and column alphabet with question and price');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $question = new Question("enter your row and column with amount and quantity of your wished e.g 2a 2 10.00: ");

        $amount = $helper->ask($input, $output, $question);

        $acceptAmount = [5,10,20,50];

        if(count(explode(' ', $amount)) !== 3){
            throw new Exception('Row and column of item should be specified, also with amount and quantity');
        }

        [$column, $quantity, $amount] = explode(' ', $amount);

        if(strlen($column) != 2){
            throw new Exception('Please specified the row and column. eg 2a, 1a');
        }

        if(!in_array($amount, $acceptAmount)){
            throw new Exception('Can only accept 5,10,20,50 amount');
        }
        // Confirm
        $summary = "Row: {$column} | Quantity: {$quantity} | Amount: {$amount} ";


        $qMessage = 'Please review the information: ' . PHP_EOL . $summary . PHP_EOL .
            "Is this OK? Type 'yes' to continue: ";
        $confirm = new ConfirmationQuestion($qMessage, false);
        if (!$helper->ask($input, $output, $confirm)) {
            return 0;
        }

        $prototype = (new WorkingPrototypeFirmware('', '', $amount, $quantity));
        $transaction = (new Transaction());

         $snackMachine = (new SnackMachine($prototype))->execute($transaction);
         $rows = [];
         foreach ($snackMachine['changeCoins'] as $key => $value) {
             $rows[] = [$key, $value];
         }

        $output->writeLn("You bought 2 packs of M&M's for {$snackMachine['totalAmount']}€, each for {$snackMachine['amount']}€");
//        $output->writeLn("You bought 2 packs of M&M's for 5.98€, each for 2.99€");
        $output->writeLn("Your change is: {$snackMachine['change']}");
        $table = new Table($output);
        $table
            ->setHeaders(['Coins', 'Count'])
            ->setRows($rows);

        $table->render();

        return 0;
    }
}