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
        DB::table('users')->insert([
            ['name' => 'Administrador AltoSentido',
            'email' => 'admin@altosentido.net',
            'identificacion' => '123456',
            'rol_id' => '1',
            'password' => Hash::make('admin')],
        ]);
        DB::table('rols')->insert([
            [ 'id' => '1', 'codigo' => '1', 'nombre' => 'Administrador' ],
            [ 'id' => '2', 'codigo' => '2', 'nombre' => 'operador de campo' ],
            [ 'id' => '3', 'codigo' => '3', 'nombre' => 'operador de sala de control' ],
            [ 'id' => '4', 'codigo' => '4', 'nombre' => 'jefe de operación' ],
        ]);
        DB::table('tipo_preguntas')->insert([
            [ 'id' => '1', 'nombre' => 'Opción múltiple - única respuesta', 'activo' => '1' ],
            [ 'id' => '2', 'nombre' => 'Opción múltiple - varias respuestas', 'activo' => '0' ],
            [ 'id' => '3', 'nombre' => 'Numérico', 'activo' => '1' ],
            [ 'id' => '4', 'nombre' => 'Texto', 'activo' => '1' ],
            [ 'id' => '5', 'nombre' => 'Fecha', 'activo' => '1' ],
            [ 'id' => '6', 'nombre' => 'Correo', 'activo' => '1' ],
            [ 'id' => '7', 'nombre' => 'Contraseña', 'activo' => '1' ],
            [ 'id' => '8', 'nombre' => 'Archivos', 'activo' => '1' ],
        ]);

        $this->call([
            // AuxiliaresTableSeeder::class,
            FormularioEmpresaSeeder::class,
            FormularioPerfilEmprendedoresSeeder::class,
            FormularioDireccionamientoEstrategicoSeeder::class,
            FormularioFinancieroSeeder::class,
            FormularioMercadeoYVentasSeeder::class,
            FormularioGestionTecnicaYProduccionSeeder::class,
            FormularioANTLSeeder::class,
        ]);
        //DB::unprepared(file_get_contents('database/migrations/especies.sql'));
    }
}
