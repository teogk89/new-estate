<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('address')->insert([
            'id'=>1,
            'suite'=>'#123',
            'street'=>'200',
            'street_name'=>'Dawes Rd',
            'city'=>'East York',
            'province'=> "ON",
            'postal'=>'M4C 5M8',
            'type'=>'client'


        ]);

        DB::table('address')->insert([
            'id'=>2,
            'suite'=>'#123',
            'street'=>'108-106',
            'street_name'=>'Goodwood Park Ct',
            'city'=>'East York',
            'province'=> "ON",
            'postal'=>'M4C 2C9',
             'type'=>'client'

        ]);

        DB::table('address')->insert([
            'id'=>3,
            'suite'=>'#123',
            'street'=>'433-485 ',
            'street_name'=>'Kingswood Rd',
            'city'=>'Toronto',
            'province'=> "ON",
            'postal'=>'M4E 3P4',
             'type'=>'client'


        ]);

        DB::table('address')->insert([
            'id'=>4,
            'suite'=>'#123',
            'street'=>'2461',
            'street_name'=>'Gerrard St E',
            'city'=>'Toronto',
            'province'=> "ON",
            'postal'=>'M4E 2G3',
             'type'=>'transaction'


        ]);

        DB::table('users')->insert([
        	'id'=>1,
            'Fname' => str_random(10),
            'Lname' => str_random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' =>'admin'
        ]);

        DB::table('users')->insert([
        	'id'=>2,
            'Fname' => str_random(10),
            'Lname' => str_random(10),
            'email' => 'teogk89@gmail.com',
            'password' => bcrypt('123456'),
            'role' =>'user'
        ]);


        for($k = 3; $k <= 50; $k++){

            DB::table('users')->insert([
                'id'=>$k,
                'Fname' => str_random(10),
                'Lname' => str_random(10),
                'email' => str_random(5).time().'@gmail.com',
                'password' => bcrypt('123456'),
                'role' =>'user'
            ]);




        }


        DB::table('client')->insert([
            'id'=>1,
            'Fname' => "John",
            'Lname' => "Snow",
            'email' => str_random(10).'@gmail.com',
           
            'role' =>'client',
            'phone'=>'232-323-3222',
            'address_id'=>1,
            'user_id'=>2

        ]);


        DB::table('client')->insert([
            'id'=>2,
            'Fname' => "Charles",
            'Lname' => "Ticker",
            'email' => str_random(10).'@gmail.com',
           
            'role' =>'lawyer',
            'phone'=>'232-323-3222',
            'address_id'=>1,
            'user_id'=>2

        ]);

        DB::table('client')->insert([
            'id'=>3,
            'Fname' => "Charles",
            'Lname' => "Ticker",
            'email' => str_random(10).'@gmail.com',
           
            'role' =>'sale',
            'phone'=>'232-323-3222',
            'address_id'=>2,
            'user_id'=>2

        ]);



        DB::table('client')->insert([
            'id'=>5,
            'Fname' => "Henry",
            'Lname' => "Oscar",
            'email' => str_random(10).'@gmail.com',
           
            'role' =>'referral',
            'phone'=>'232-323-3222',
            'address_id'=>3,
            'user_id'=>2

        ]);

        
        DB::table("my_event")->insert([
            'id'=>1,
            'name'=>'test',
            'when'=>'2018-08-25 00:00:00',
            'require'=>"test",
            'des'=>"test"
        ]);

        
        DB::table('event_attend')->insert([
            'id'=>1,
            'user_id'=>2,
            'event_id'=>1
        ]);







    }
}
