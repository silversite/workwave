<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Common\CommandHandler;

use SilverSite\WorkWave\Common\Command\SetCallbackUrlCommand;

final class SetCallbackUrlHandler extends AbstractCommandHandler
{
    /**
     * @var string
     */
    protected $endpointUri = 'callback';

    /**
     * @param SetCallbackUrlCommand $command
     */
    public function handle(SetCallbackUrlCommand $command): void
    {
        $url = $command->getUrl();
        $response = $this->request(['url' => $url]);

        if (isset($response['url']) && $url !== $response['url']) {
            throw new \DomainException('Response URL is not equal to requested URL');
        }
    }
}
