<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Carriers\CarrierCreated;
use App\Events\Backend\Carriers\CarrierDeleted;
use App\Events\Backend\Carriers\CarrierUpdated;
use App\Exceptions\GeneralException;
use App\Models\Carrier;
use App\Repositories\BaseRepository;

class CarriersRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Carrier::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'partner_name',
        'partner_email',
        'carrier_name',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                'id',
                'partner_name',
                'partner_email',
                'carrier_name',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {

        if ($carrier = Carrier::create($input)) {
            event(new CarrierCreated($carrier));

            return $carrier;
        }

        throw new GeneralException(__('exceptions.backend.carriers.create_error'));
    }

    /**
     * @param \App\Models\Carrier $carrier
     * @param array $input
     */
    public function update(Carrier $carrier, array $input)
    {

        if ($carrier->update($input)) {
            event(new CarrierUpdated($carrier));

            return $carrier->fresh();
        }

        throw new GeneralException(__('exceptions.backend.carriers.update_error'));
    }

    /**
     * @param \App\Models\Carrier $carrier
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Carrier $carrier)
    {
        if ($carrier->delete()) {
            event(new CarrierDeleted($carrier));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.carriers.delete_error'));
    }
}
