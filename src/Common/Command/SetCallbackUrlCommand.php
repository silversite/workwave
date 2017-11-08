<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Command;

use SilverSite\WorkWave\Common\Exceptions\ValueEmptyException;

class SetCallbackUrlCommand
{
    /**
     * @var string
     */
    private $url;

    /**
     * SetCallbackUrl constructor.
     * @param string $url
     * @throws ValueEmptyException
     */
    public function __construct(string $url)
    {
        if (empty($url)) {
            throw ValueEmptyException::create('URL');
        }
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
