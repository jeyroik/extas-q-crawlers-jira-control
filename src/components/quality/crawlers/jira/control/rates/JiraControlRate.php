<?php
namespace extas\components\quality\crawlers\jira\control\rates;

use extas\components\Item;
use extas\components\quality\crawlers\jira\THasMonth;
use extas\components\quality\crawlers\jira\THasRate;
use extas\components\quality\crawlers\jira\THasTimestamp;
use extas\interfaces\quality\crawlers\jira\control\rates\IJiraControlRate;

/**
 * Class JiraControlRate
 *
 * @package extas\components\quality\crawlers\jira\control\rates
 * @author jeyroik@gmail.com
 */
class JiraControlRate extends Item implements IJiraControlRate
{
    use THasRate;
    use THasMonth;
    use THasTimestamp;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
