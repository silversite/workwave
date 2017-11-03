<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\CommandHandler;

use SilverSite\WorkWave\Command\OrderAddCommand;
use SilverSite\WorkWave\Common\CommandHandler\AbstractCommandHandler;
use SilverSite\WorkWave\ValueObject\OrderRequest;

final class OrderAddHandler extends AbstractCommandHandler
{
    protected const URI = 'territories/:territoryId/orders';

    public function handleOrderAddCommand(OrderAddCommand $command): void
    {
        /** @var OrderRequest $order */
        $order = $command->getOrder();

        $this->request(
            $order->jsonSerialize(),
            [
                ':territoryId' => (string)$command->getTerritoryId()
            ]
        );
    }
}
