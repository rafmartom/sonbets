#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\CLI\HelloCommand;
use App\CLI\ByeCommand; // Import the ByeCommand

// Create the Application
$application = new Application('sonbets', '1.0.0');

// Register your command(s)
$application->add(new HelloCommand());
$application->add(new ByeCommand()); // Add the ByeCommand

// Run the application
$application->run();
