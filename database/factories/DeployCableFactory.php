<?php

namespace Database\Factories;

use App\Models\DeployCable;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeployCableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeployCable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name_pop'=> 'P5013',
            'plan_code'=> 'PPH.I.U.PP.020121.03',
            'request_day'=> '2021/01/16',
            'return_day'=> '2021/01/16',
            'send_file_opn'=> '2021/01/16',
            'take_invoice'=> '2021/01/16',
            'pay_money'=> '2021/01/16',
        ];
    }
}
// $table->string('name_pop');
//             $table->string('plan_code');
//             $table->timestamp('request_day')->nullable();
//             $table->timestamp('return_day')->nullable();
//             $table->timestamp('send_file_opn')->nullable();
//             $table->timestamp('take_invoice')->nullable();
//             $table->timestamp('pay_money')->nullable();