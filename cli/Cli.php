<?php
namespace cli;

class Cli {

    public function coreCommands()
    {
        return [
            'help' => 'cli\HelpController',
            // 'message' => 'cli\MessageController',
            'migrate' => 'cli\Migration',

            'init' => 'cli\Init',
            // 'serve' => 'cli\ServeController',
        ];
    }
}


