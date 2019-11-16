<?php
namespace Pulsestorm\FactoryTest\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Testbed extends Command
{
    protected $testFactory;
    public function __construct(
        \Pulsestorm\FactoryTest\Model\TestFactory $testFactory,
        $name = null)
    {
        $this->testFactory = $testFactory;
        return parent::__construct($name);
    }
    protected function configure()
    {
        $this->setName("ps:factory-test");
        $this->setDescription("Demo of factoy arguments");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // plain blain PHP instantiation
        $object = new \Pulsestorm\FactoryTest\Model\Test(
            'foo', 'baz', 'bar'
        );
        var_dump(get_class($object));

        $object = $this->testFactory->create([
            'two'=>'dos',
            'one'=>'uno',
            'three'=>'tres',
        ]);
        // $output->writeln("Hello World");
    }
}
