<?php
declare(strict_types=1);

namespace SilverSite\WorkWave\ValueObject;

use SilverSite\WorkWave\Collection\ElementExistsException;
use SilverSite\WorkWave\Collection\OrderDeliveryStatusCollection;
use SilverSite\WorkWave\Collection\OrderIdCollection;

final class CaptureResponse
{
    /**
     * @var RequestId
     */
    private $requestId = null;

    /**
     * @var TerritoryId
     */
    private $territoryId;

    /**
     * @var ResponseData
     */
    private $data;

    /**
     * CaptureResponse constructor.
     *
     * @param array $response
     *
     * @throws \Exception
     */
    public function __construct(array $response)
    {

        if (null !== $response['requestId']) {
            $this->requestId = new RequestId($response['requestId']);
        }

        $this->territoryId = new TerritoryId($response['territoryId']);
        $this->data = new ResponseData($response['data']);
    }

    public function territoryId(): TerritoryId
    {
        return $this->territoryId;
    }

    public function requestId(): ?RequestId
    {
        return $this->requestId;
    }

    public function data(): ResponseData
    {
        return $this->data;
    }
}
