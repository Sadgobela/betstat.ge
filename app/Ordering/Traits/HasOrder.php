<?php

namespace App\Ordering\Traits;

use App\Ordering\Orderer;
use Illuminate\Http\Request;

trait HasOrder
{
    public function ordering(): Orderer
    {
        return new Orderer($this);
    }

    public static function getOrder(Request $request)
    {
        if ($request->get('order')){
            $adjacent = self::whereId($request->get('order'))->first();
            if ($adjacent){
                if ($request['order_type'] == 'next'){
                    return $adjacent->ordering()->after();
                }else{
                    return $adjacent->ordering()->before();
                }
            }
        }
        return null;
    }
}
