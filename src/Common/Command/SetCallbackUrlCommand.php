<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Command;

use SilverSite\WorkWave\Common\Exceptions\ValueEmptyException;

final class SetCallbackUrlCommand
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var bool
     */
    private $test;

    /**
     * SetCallbackUrl constructor.
     * @param string $url
     * @param bool $test
     * @throws ValueEmptyException
     */
    public function __construct(string $url, bool $test = false)
    {
        if (empty($url)) {
            throw ValueEmptyException::create('URL');
        }
        $this->url = $url;
        $this->test = $test;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function getTest(): bool
    {
        return $this->test;
    }
}
