<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\CommandHandler;

use Doctrine\ORM\EntityManagerInterface;
use SilverSite\WorkWave\Command\OrderAddCommand;
use SilverSite\WorkWave\Service\Client;
use SilverSite\WorkWave\ValueObject\OrderRequest;

final class OrderAddHandler extends AbstractCommandHandler
{
    protected const URI = 'territories/:territoryId/orders';

    private $entityManager;

    public function __construct(Client $client, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct($client);
    }

    public function handleOrderAddCommand(OrderAddCommand $command): void
    {
        /** @var OrderRequest $order */
        $order = $command->getOrder();

        $response = $this->request(
            $order->jsonSerialize(),
            [
                ':territoryId' => (string)$command->getTerritoryId()
            ]
        );

        $entity = $command->getOrderEntity();
        $entity->setWorkWaveRequestId($response['requestId']);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}
