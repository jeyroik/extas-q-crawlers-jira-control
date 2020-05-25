<?php
namespace extas\components\plugins\quality\crawlers;

use extas\components\quality\crawlers\Crawler;
use extas\components\quality\crawlers\jira\control\rates\JiraControlRate;
use extas\components\SystemContainer;
use extas\interfaces\quality\crawlers\ICrawler;
use extas\interfaces\quality\crawlers\jira\control\rates\IJiraControlRate;
use extas\interfaces\quality\crawlers\jira\control\rates\IJiraControlRateRepository;
use extas\interfaces\quality\crawlers\jira\reactions\rates\IJiraReactionRate;
use extas\interfaces\quality\crawlers\jira\reactions\rates\IJiraReactionRateRepository;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CrawlerJiraControl
 *
 * @package extas\components\plugins\quality\crawlers
 * @author jeyroik@gmail.com
 */
class CrawlerJiraControl extends Crawler
{
    protected string $title = '[Jira] Issues rate';
    protected string $description = 'Calculate issues total and done rates.';

    /**
     * @param OutputInterface $output
     * @return ICrawler
     */
    public function __invoke(OutputInterface &$output): ICrawler
    {
        /**
         * @var $controlRepo IJiraControlRateRepository
         * @var $exist IJiraControlRate
         * @var $reactionRepo IJiraReactionRateRepository
         * @var $reaction IJiraReactionRate
         */
        $month = (int) date('Ym');
        $controlRepo = SystemContainer::getItem(IJiraControlRateRepository::class);
        $reactionRepo = SystemContainer::getItem(IJiraReactionRateRepository::class);
        $reaction = $reactionRepo->one([IJiraReactionRate::FIELD__MONTH => $month]);
        $exist = $controlRepo->one([IJiraControlRate::FIELD__MONTH => $month]);

        if ($reaction) {
            $rate = round(30 / (1 + $reaction->getCountTotal()),2);
            $output->writeln([
                'Rate: ' . $rate
            ]);
            if ($exist) {
                $exist->setRate($rate)->setTimestamp(time());
                $controlRepo->update($exist);
                $output->writeln(['<info>Rate updated</info>']);
            } else {
                $exist = new JiraControlRate();
                $exist->setRate($rate)->setTimestamp(time())->setMonth($month);
                $controlRepo->create($exist);
                $output->writeln(['<info>Rate created</info>']);
            }
        } else {
            $output->writeln([
                '<comment>There is no reaction total issues count yet.</comment>',
                'Please, run reaction crawler first.'
            ]);
        }

        return $this;
    }
}
