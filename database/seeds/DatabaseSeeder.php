<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $ignorar = array("/", ".", "$");

        DB::table('tipo_usuarios')->insert([
            'cod' => '001',
            'descripcion' => 'Admin',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        DB::table('tipo_usuarios')->insert([
            'cod' => '002',
            'descripcion' => 'Farmaceutico',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        DB::table('tipo_usuarios')->insert([
            'cod' => '003',
            'descripcion' => 'Courier',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        DB::table('tipo_usuarios')->insert([
            'cod' => '004',
            'descripcion' => 'Cliente',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        //usuarios        $ignorar = array("/", ".", "$");
        //usuarios
        DB::table('users')->insert([
            'idtipo'  =>  '1',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'cedula' => '0000000000',
            'celular' => '0000000000',
            'password' => bcrypt('adminadmin'),
            'password2' => 'adminadmin',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);

        DB::table('estado_ventas')->insert([
            'cod' => '001',
            'descripcion' => 'solicitud',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        DB::table('estado_ventas')->insert([
            'cod' => '002',
            'descripcion' => 'en_proceso',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);
        DB::table('estado_ventas')->insert([
            'cod' => '003',
            'descripcion' => 'finalizado',
            'nome_token' => str_replace($ignorar,"",bcrypt(Str::random(10))),
        ]);

    }

}
