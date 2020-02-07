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
    protected $itemClass = JiraControlRate::class;
    protected $name = 'jira_control_rates';
    protected $pk = JiraControlRate::FIELD__MONTH;
    protected $scope = 'extas';
    protected $idAs = '';
}
