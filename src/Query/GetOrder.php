<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\Query;

use SilverSite\WorkWave\Collection\CustomFieldsCollection;
use SilverSite\WorkWave\Collection\ElementExistsException;
use SilverSite\WorkWave\Collection\OrderIdCollection;
use SilverSite\WorkWave\Collection\OrderResponseCollection;
use SilverSite\WorkWave\ValueObject\CustomField;
use SilverSite\WorkWave\ValueObject\Delivery;
use SilverSite\WorkWave\ValueObject\OrderId;
use SilverSite\WorkWave\ValueObject\OrderResponse;
use SilverSite\WorkWave\ValueObject\TerritoryId;

final class GetOrder extends QueryAbstract
{
    protected const URI = 'territories/:territoryId/orders?ids=:orderIds';

    public function findByIds(TerritoryId $territoryId, OrderIdCollection $orderIds): ?OrderResponseCollection
    {
        $uriParameters = [
            ':territoryId' => (string) $territoryId,
            ':orderIds'    => (string) $orderIds,
        ];
        $response = $this->request($uriParameters);

        if (! isset($response['orders']) || count($response['orders']) === 0) {
            return null;
        }

        $collection = new OrderResponseCollection();
        foreach ($response['orders'] as $orderId => $order) {
            $customFields = $this->createCustomFieldCollection($order['delivery']['customFields']);
            try {
                $collection->add(
                    new OrderResponse(
                        new OrderId($order['id']),
                        $order['name'],
                        new Delivery($customFields)
                    )
                );
            } catch (ElementExistsException $exception) {

            }
        }

        return $collection;
    }

    private function createCustomFieldCollection(array $customFields): CustomFieldsCollection
    {
        $collection = new CustomFieldsCollection();

        foreach ($customFields as $name => $value) {
            try {
                $collection->add(new CustomField($name, $value));
            } catch (ElementExistsException $exception) {

            }
        }

        return $collection;
    }
}
