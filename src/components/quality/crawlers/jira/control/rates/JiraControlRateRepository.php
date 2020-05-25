<?php
namespace extas\components\quality\crawlers\jira\control\rates;

use extas\components\repositories\Repository;
use extas\interfaces\quality\crawlers\jira\control\rates\IJiraControlRateRepository;

/**
 * Class JiraControlRateRepository
 *
 * @package extas\components\quality\crawlers\jira\control\rates
 * @author jeyroik@gmail.com
 */
class JiraControlRateRepository extends Repository implements IJiraControlRateRepository
{
    protected string $itemClass = JiraControlRate::class;
    protected string $name = 'jira_control_rates';
    protected string $pk = JiraControlRate::FIELD__MONTH;
    protected string $scope = 'extas';
}
