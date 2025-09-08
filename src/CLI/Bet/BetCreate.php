<?php
namespace App\CLI\Bet;

use App\CLI\BaseCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Attribute\Option;

use App\Model\Bet;


/**
 * Creates a new Bet and registers it in the system.
 *
 * This command requires you to provide all the essential details of a bet,
 * such as the event, selection, odds, and stake. It will then output
 * a JSON object of the created bet.
 *
 * Usage Example:
 *   ./sonbets.php bet:create --event="Team A vs Team B" --selection="Team A" --odds=1.75 --stake="10.00" --date="2025-09-08" --bookmaker="BestBets"
 */
#[AsCommand(
    name: 'bet:create',
    description: 'Create a new bet'
)]
class BetCreate extends BaseCommand
{

    public function __invoke(
        OutputInterface $output,
        #[Option(description: 'Bets odds', shortcut: 'o')]
        float $odds = 2.00,
        #[Option(description: 'Bets event', shortcut: 'e')]
        string $event = 'Noevent',
        #[Option(description: 'Bets selection', shortcut: 's')]
        string $selection = 'Noselection',
        #[Option(description: 'Bets date', shortcut: 'd')]
        string $date = 'Nodate',
        #[Option(description: 'Bets bookmaker', shortcut: 'b')]
        string $bookmaker = 'Nobookmaker',
        #[Option(description: 'Bets stake', shortcut: 'S')]
        string $stake = 'Nostake',

    ): int
    {
        $agent = new Bet($odds, $event, $selection, $date, $bookmaker, $stake);

        $jsonString = json_encode($agent, JSON_PRETTY_PRINT);

        $output->writeln($jsonString);

        return Command::SUCCESS;
    }
}
