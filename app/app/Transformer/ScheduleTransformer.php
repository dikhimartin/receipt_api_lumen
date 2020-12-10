<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Schedule;

class ScheduleTransformer extends TransformerAbstract
{
    function transform(Schedule $schedule){
        return[
            'id' =>$schedule->id,
            'title' => $schedule->title,
            'start'=>$schedule->start,
            'end'=>$schedule->end

        ];
    }
}