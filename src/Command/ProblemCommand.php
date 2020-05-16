<?php

namespace App\Command;

use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\SerializerInterface;

class ProblemCommand extends Command
{
    protected static $defaultName = 'app:problem';
    /**
     * @var SerializerInterface
     */
    private $defaultSerializer;
    /**
     * @var SerializerInterface
     */
    private $customSerializer;

    public function __construct(SerializerInterface $defaultSerializer, SerializerInterface $customSerializer)
    {
        parent::__construct();
        $this->defaultSerializer = $defaultSerializer;
        $this->customSerializer = $customSerializer;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $data = ['time' => new DateTime()];

        $default = $this->defaultSerializer->serialize($data, 'json');
        $custom = $this->customSerializer->serialize($data, 'json');

        $io->section('Default');
        $io->text($default);
        $io->section('Custom');
        $io->text($custom);

        return 0;
    }
}
