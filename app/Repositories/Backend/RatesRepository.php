<?php

namespace App\Repositories\Backend;
use App\Exceptions\GeneralException;
use App\Models\Rate;
use App\Repositories\BaseRepository;

class RatesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Rate::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id','option_name','upper_weight','lower_weight','upper_height','lower_height','upper_width','lower_width','price'
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
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_date';
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
                'id','option_name','upper_weight','lower_weight','upper_height','lower_height','upper_width','lower_width','price'
            ]);
    }
}
