<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\CommandHandler;

use Doctrine\ORM\EntityManagerInterface;
use SilverSite\WorkWave\Collection\OrderIdCollection;
use SilverSite\WorkWave\Command\OrderAddCommand;
use SilverSite\WorkWave\Command\OrderDeleteCommand;
use SilverSite\WorkWave\Service\Client;
use SilverSite\WorkWave\ValueObject\OrderRequest;

final class OrderDeleteHandler extends AbstractCommandHandler
{
    protected const URI = 'territories/:territoryId/orders/:orderId';

    public function handleOrderDeleteCommand(OrderDeleteCommand $command): void
    {
        $this->request(
            [],
            [
                ':territoryId' => (string) $command->getTerritoryId(),
                ':orderId'     => (string) $command->getOrderId(),
            ],
            Client::REQUEST_METHOD_DELETE
        );
    }
}
