<?php

namespace App\Cli;

class IrcServer
{
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
        $date = date('Y-m-d H:i:s');
        
    }
}