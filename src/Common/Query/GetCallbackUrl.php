<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\Query;

use SilverSite\WorkWave\Common\ViewObject\CallbackUrl;

final class GetCallbackUrl extends QueryAbstract
{
    protected const URI = 'callback';

    /**
     * @return CallbackUrl
     */
    public function url(): CallbackUrl
    {
        $response = $this->request();

        return new CallbackUrl($response['url']);
    }
}
