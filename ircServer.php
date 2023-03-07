<?php

namespace App\Cli;

use Exception;

class IrcServer
{
    protected $ipAddress; // = '127.0.0.1';
    protected $networkPort = 9999;
    protected $socket;
    protected $socketRessources = [];
    protected $pid;
    protected $ppid;
    protected $ppids = [];
    
    /**
     * Creation of  the socket
     */
    public function __construct()
    {
        $this->log('Creation of the network socket');
        $this->ipAddress = $this->ipAddress ?? gethostname();

        if(!($this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP))) {
            throw new Exception('Impossible de creer un socket');
        }
        if (!(socket_bind($this->socket, $this->ipAddress, $this->networkPort))){
            throw new Exception('Impossible de binder sur ' . $this->ipAddress . ':' . $this->networkPort);
        }
        if (!(socket_listen($this->socket, 5))){
            throw new Exception("Impossible d'ecouter depuis " . $this->ipAddress . ':' . $this->networkPort);
        }
        $this->log('Socket binder sur ' . $this->ipAddress . ':' . $this->networkPort);
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
        $this->log('Irc server startup...');
        $this->pid = posix_getpid();
        $this->ppid = $this->pid;

        $pid = pcntl_fork();
        if ($pid === -1){
            throw new Exception('Impossible de forker...');
        }
        else if ($pid) {
            $this->manageClients();

        }
        else {
            $this->pid = posix_getpid();
            $this->manageMessages();
        }
    }

    protected function manageMessages(): void
    {
        $this->log('Démarrage du gestionnaire de messages');
    }

    protected function manageClients(): void
    {
        $this->log('Démarrage du gestionnaire de clients');
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
        $prefix = $this->ppid === $this->pid ? '+' : '-';
        $date = date('Y-m-d H:i:s');
        printf("%s %s %' 6d -> %s\n", $prefix, $date, $this->pid, $message);

    }
}