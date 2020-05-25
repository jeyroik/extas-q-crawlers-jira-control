<?php
namespace extas\components\plugins;

use extas\components\quality\crawlers\jira\control\rates\JiraControlRate;
use extas\interfaces\quality\crawlers\jira\control\rates\IJiraControlRateRepository;

/**
 * Class PluginInstallJiraControlRates
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallJiraControlRates extends PluginInstallDefault
{
    protected string $selfUID = JiraControlRate::FIELD__MONTH;
    protected string $selfRepositoryClass = IJiraControlRateRepository::class;
    protected string $selfSection = 'jira_control_rates';
    protected string $selfName = 'jira control rate';
    protected string $selfItemClass = JiraControlRate::class;
}
