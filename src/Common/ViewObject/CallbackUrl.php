<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\ViewObject;

final class CallbackUrl
{
    /**
     * @var string
     */
    private $url;

    /**
     * Url constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }
}
