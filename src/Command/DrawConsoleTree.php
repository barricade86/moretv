<?php

namespace App\Command;

use App\Component\Tree\ConsoleTree;
use App\Component\Tree\Context;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Команда на рисование дерева в консоли
 * 
 * @author Kirill Shilov
 */
class DrawConsoleTree extends Command
{
    protected static $defaultName = 'app:draw-tree';

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $json=file_get_contents("php://stdin", "r");
        $context = new Context(new ConsoleTree($json));
        $result = $context->createTree();
        $output->writeln($result);

        return Command::SUCCESS;
    }
}
