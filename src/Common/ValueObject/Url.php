<?php
declare(strict_types=1);

namespace Silversite\WorWave\Common\ValueObject;

use Silversite\WorWave\Exceptions\ValueEmptyException;

final class Url
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
        if (empty($url)) {
            throw ValueEmptyException::create('$url');
        }
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->url;
    }
}