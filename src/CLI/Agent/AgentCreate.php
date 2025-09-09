<?php
namespace App\CLI\Agent;

use App\CLI\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Attribute\Option;

use App\Model\Agent;

/**
 * Creates a new Agent in the system.
 *
 * This command allows you to register a new agent by providing
 * their personal details as command-line options. The command will
 * output a JSON object representing the newly created agent.
 *
 * Usage Example:
 *   ./sonbets.php agent:create --name="John" --family-name="Doe" --uid=003 --nick-name="jDoe" --email="john.doe@example.com"
 */
#[AsCommand(
    name: 'agent:create',
    description: 'Create a new Agent'
)]
class AgentCreate extends BaseCommand
{

    public function __invoke(
        OutputInterface $output,
        #[Option(description: 'Agents Name', shortcut: 'N')]
        string $name = 'Noname',
        #[Option(description: 'Family Name', shortcut: 'f')]
        string $familyName = 'Nofamily',
        #[Option(description: 'UID', shortcut: 'u')]
        int $uid = 0,
        #[Option(description: 'Agents NickName', shortcut: 'i')]
        string $nickName = 'Nonick',
        #[Option(description: 'Agents Email address', shortcut: 'e')]
        string $email = 'no@email.com'
    ): int
    {
        $agent = new Agent($name, $familyName, $uid, $nickName, $email);

        $jsonString = json_encode($agent, JSON_PRETTY_PRINT);

        $output->writeln($jsonString);

        return Command::SUCCESS;
    }
}
