<?php

namespace code\models;

use code\models\Base\ChatsQuery as BaseChatsQuery;


class ChatsQuery extends BaseChatsQuery
{

    /**
     * 
     * @param int $page
     * @param int $maxPerPage
     * @param string $order
     * @param string $orderBy
     * @param array $filters
     * @return array
     */
    public function listLast($page = 1, $maxPerPage = 10, string $order = "desc", string $orderBy = "last_message_at", $filters = []) {
        $query = $this->buildQuery($filters);
        if (!empty($orderBy)) {
            $query->orderBy($orderBy, $order);
        }
        return $query->paginate($page, $maxPerPage)->getResults()->toArray();
    }

    /**
     * 
     * @param array $filters
     * @return int
     */
    public function getCount($filters = []) {
        $query = $this->buildQuery($filters);
        return $query->count();
    }
    
    /**
     * 
     * @param string $order
     * @param string $orderBy
     * @param array $filters
     */
    protected function buildQuery($filters = []) {
        $query = $this->create()->filterByDeletedAt()->setIgnoreCase(true);
        if (count($filters)) {
            $criteria = new Criteria();
            foreach ($filters as $filter) {

                if (!empty($filter->value)) {
                    $criteria->addOr($filter->field, $filter->value . "%", Criteria::ILIKE);
                }
            }
            $query->mergeWith($criteria);
        }
        return $query;
    }
}
