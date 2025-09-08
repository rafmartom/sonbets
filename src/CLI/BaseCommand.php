<?php

namespace App\CLI;

use Symfony\Component\Console\Command\Command;

/**
 * An abstract command that automatically uses the child's PHPDoc
 * comment as its help text.
 */
abstract class BaseCommand extends Command
{
    public function __construct()
    {
        // Use PHP's Reflection API to inspect the child class that is extending thisone
        $reflection = new \ReflectionClass($this);

        if ($docComment = $reflection->getDocComment()) {
            // If a doc comment exists, clean it up to be used as help text.

            // 1. Remove the comment delimiters (/** and */)
            $helpText = substr($docComment, 3, -2);

            // 2. Remove the leading asterisk from each line.
            $helpText = preg_replace('/^\s*\*\s?/m', '', $helpText);

            // 3. Set the cleaned text as the command's help.
            $this->setHelp(trim($helpText));
        }

        // Finally, call the original parent constructor.
        parent::__construct();
    }
}
