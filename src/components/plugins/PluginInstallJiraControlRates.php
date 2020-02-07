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
    protected $selfUID = JiraControlRate::FIELD__MONTH;
    protected $selfRepositoryClass = IJiraControlRateRepository::class;
    protected $selfSection = 'jira_control_rates';
    protected $selfName = 'jira control rate';
    protected $selfItemClass = JiraControlRate::class;
}
