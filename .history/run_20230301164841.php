#!/usr/bin/env php
<?php

use App\Cli\IrcServer;

include 'IrcServer.php';

(new IrcServer())->start();