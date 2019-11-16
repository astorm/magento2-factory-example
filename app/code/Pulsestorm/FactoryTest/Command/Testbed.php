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
        \Pulsestorm\FactoryTest\Model\Test2Factory $test2Factory,
        $name = null)
    {
        $this->testFactory = $testFactory;
        $this->test2Factory = $test2Factory;
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
//         $object = new \Pulsestorm\FactoryTest\Model\Test(
//             'foo', 'baz', 'bar'
//         );
//         var_dump(get_class($object));

        // factory whose object has named contructor params
//         $object = $this->testFactory->create([
//             'two'=>'dos',
//             'one'=>'uno',
//             'three'=>'tres',
//         ]);

        // factory whose object is a DataObject
        $object = $this->test2Factory->create([
            'foo'=>'baz',
            'zip'=>'zap',
        ]);

        // this doesn't seem to work -- returns an
        // empty data object
        var_dump($object->getData());
    }
}
