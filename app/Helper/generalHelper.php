<?php

use App\Models\Booking;
use Haruncpi\LaravelIdGenerator\IdGenerator;

//invoice Id Generate
function fileNumber()
{
    return ;
} 

//invoice Id Generate
function orderNumber()
{
    return IdGenerator::generate([
        'table' => 'bookings',
        'field' => 'order_number',
        'length' => 16,
        'prefix' => 'DC_WEBINAR',
        'reset_on_prefix_change' => true,
    ]);
} 

function orderNumberHelper(){
    if(session()->has('order_number')){
        session()->forget('order_number');
    }
}

?>