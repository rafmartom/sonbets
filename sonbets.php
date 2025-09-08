#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\CLI\Agent\AgentCreate;
use App\CLI\Bet\BetCreate;

// Create a custom help message
$help = <<<EOT
Is a Betting System, where you Register Agents, who place Bets for certain events, in which it has been given an oddUpdate, in different bookmakers.
It will help an admin keep the books of the whole system.
EOT;


// Create the Application
$application = new Application('sonbets', '1.0.0');

// Register your command(s)
$application->add(new AgentCreate());
$application->add(new BetCreate());

// Get the 'list' command object and set its help text.
$application->find('list')->setHelp($help);

// Run the application
$application->run();
