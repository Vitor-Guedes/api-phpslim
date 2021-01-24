<?php

namespace Api\Model;

class Clause
{
    protected $model;

    protected $params;

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function limit($value)
    {
        $this->model = $this->getModel()->limit($value);
        $this->params['limit'] = $value;
    }

    public function page($value, $limit = 1)
    {   
        $this->model = $this->getModel()->skip($value * $limit - 1);
        $this->params['page'] = $value;
    }

    public function desc($value)
    {
        $this->model = $this->getModel()->orderBy($value, 'desc');
        $this->params['desc'] = $value;
    }

    public function asc($value)
    {
        $this->model = $this->getModel()->orderBy($value, 'asc');
        $this->params['asc'] = $value;
    }

    public function fields($value)
    {
        $fields = current(array_keys($value));
        $fields = explode(",", $fields);
        $this->model = $this->getModel()->select($fields);
        $this->params['fields'] = $fields;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function findBy($column, $value)
    {
        if (is_integer($value)) {
            $this->model = $this->getModel()->where($column, $value);
        }

        if (is_float($value)) {
            $this->model = $this->getModel()->where($column, $value);
        }

        if (is_string($value)) {
            $this->model = $this->getModel()->where($column, 'like', "%$value%");
        }

        $this->params['filter'] = [
            $column => $value
        ];
    }

    public function filter($value)
    {   
        $filters = array_keys($value);
        foreach ($filters as $filter) {
            list($column, $op, $value) = explode(",", $filter);

            $this->model = $this->getModel()->where($column, $op, $value);

            $this->params['filter'][] = [
                'column' => $column,
                'operator' => $op,
                'value' => $value
            ];
        }
    }

    public function handle($query)
    {
        foreach ($query as $clause => $value) {
            if (!method_exists($this, $clause)) {
                if (in_array($clause, $this->getModel()->getFillable())) {
                    $this->findBy($clause, $value);
                }
                continue ;
            } else if ($clause == 'page' && isset($query['limit'])) {
                $this->$clause($value, $query['limit']);
            } else {
                $this->$clause($value);
            }

        }
    }

    /**
     * @todo:
     * Transformar: http://localhost/api/customers?idade=in[34,42]
     * em valores a ser filtrados,
     * tentar user regex para identificar o comando e valor
     */
}