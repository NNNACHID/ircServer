<?php

namespace App\Cli;

class IrcServer
{
    protected $ipAddress; // = '127.0.0.1';
    protected $networkPort = 9999;
    protected $socket;
    protected $socketRessources = [];
    protected $currentPid;
    protected $ppid;
    protected $ppids = [];
    /**
     * Creation of  the socket
     */
    public function __construct()
    {

    }
    
    /**
     * Cleaning
     */
    public function __destruct()
    {

    }


    /**
     * Initialization of the server
     */
    public function start()
    {

    }

    protected function manageMessage(): void
    {

    }

    protected function manageClients(): void
    {

    }

    protected function startClient(): void
    {

    }

    /**
     * Information log of the standard server output
     * @param string $message
     * @return void
     */
    protected function log(string $message): void
    {
        $prefix = $this->ppid === $this->currentPid ? '+' : '-';
        $date = date('Y-m-d H:i:s');
        printf("%s %s 6d -> %s\",)

    }
}