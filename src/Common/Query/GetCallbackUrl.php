<?php
declare(strict_types=1);

namespace Silversite\WorWave\Common\Query;

use SilverSite\WorkWave\Common\Query\QueryAbstract;
use Silversite\WorWave\Common\ValueObject\Url;

final class GetCallbackUrl extends QueryAbstract
{
    protected const URI = 'callback';

    /**
     * @return Url
     */
    public function url(): Url
    {
        $response = $this->request([]);

        return new Url($response['url']);
    }
}