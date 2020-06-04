<?php

// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Github\Client;
use Symfony\Component\Process\Process;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;


class UpdAppCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:upd-app';
    protected $filesystem;
    protected $gitclient;
    private $logger;
    private $client;

    public function __construct(bool $requirePassword = false,Filesystem $filesystem,LoggerInterface $logger,HttpClientInterface $client)
    {
        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor
        $this->requirePassword = $requirePassword;
        $this->filesystem =  new Filesystem();
        $this->gitclient = new \Github\Client();
        $this->client = $client;
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure()
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('Update Appp.')
        ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to update the app...')
        
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
{
    // outputs multiple lines to the console (adding "\n" at the end of each line)
    $output->writeln([
        'User Creator',
        '============',
        '',
    ]);

    // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
    // that generates and returns the messages with the 'yield' PHP keyword
    

    // outputs a message followed by a "\n"
    $output->writeln('Whoa!');

    // outputs a message without adding a "\n" at the end of the line
    $output->write('You are about to ');
    $output->write('create a user.');
    $commits = $this->gitclient->api('repo')->commits()->all('nicovernot', 'fap_aoi', array('sha' => 'master'));
    $message = $commits[0]["commit"]["message"];
    $author = $commits[0]["commit"]["author"]["name"];
    $output->write($message);

    
    $process = new Process(['git','log','-n','1']);
    $process->setWorkingDirectory('/app/myapp/');
    $process->run();
   
    $localbranch = $process->getOutput();
    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    
    $output->writeln('Username: '.$input->getArgument('username'));
    echo $process->getOutput();
    
    $response = $this->client->request('POST', 'https://eniybzrro26298t.m.pipedream.net', [
        'json' => ['message' => $message,'author' => $author,'branch'=>$localbranch],
    ]);
    
    $decodedPayload = $response; 
    if (preg_match("/tdtt/", $message) and preg_match("/dev/", $localbranch) )
    {
        $this->logger->debug("the url $message contains guru");
        $this->logger->debug($localbranch.date("Y-m-d h:i:sa") );
        // ...
        $this->logger->notice($author.date("Y-m-d h:i:sa") );
    }
    else
    {
        echo "the url $message does not contain guru";
    }
    // $this->filesystem->touch('file.txt');
   // $this->filesystem->dumpFile('file.txt', 'Hello World');

    return 0;
}
}