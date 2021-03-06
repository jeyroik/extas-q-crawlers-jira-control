<?php
namespace extas\interfaces\quality\crawlers\jira\control\rates;

use extas\interfaces\IItem;
use extas\interfaces\quality\crawlers\jira\IHasMonth;
use extas\interfaces\quality\crawlers\jira\IHasRate;
use extas\interfaces\quality\crawlers\jira\IHasTimestamp;

/**
 * Interface IJiraControlRate
 *
 * @package extas\interfaces\quality\crawlers\jira\control\rates
 * @author jeyroik@gmail.com
 */
interface IJiraControlRate extends IItem, IHasMonth, IHasTimestamp, IHasRate
{
    public const SUBJECT = 'extas.quality.crawler.jira.control';
}
