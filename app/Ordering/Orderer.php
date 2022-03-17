<?php

namespace App\Ordering;

use Illuminate\Database\Eloquent\Model;

class Orderer
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function firstOrder()
    {
        return object_get($this->model->query()->select('order')->orderBy('order')->first(), 'order', 0) - 1;
    }
    public function lastOrder()
    {
        return object_get($this->model->query()->select('order')->orderByDesc('order')->first(), 'order', 0) + 1;
    }

    public function after(){
        $adjacent = $this->model->query()->select('order')->where('order', '>', $this->model->order)->orderBy('order')->first();
        if (!$adjacent){
            return $this->lastOrder();
        }
        return ($this->model->order + $adjacent->order) / 2;
    }

    public function before(){
        $adjacent = $this->model->query()->select('order')->where('order', '<', $this->model->order)->orderByDesc('order')->first();
        if (!$adjacent){
            return $this->firstOrder();
        }
        return ($this->model->order + $adjacent->order) / 2;
    }
}
