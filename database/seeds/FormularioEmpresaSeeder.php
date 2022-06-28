<?php

use Illuminate\Database\Seeder;

class FormularioEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 1,'nombre' => 'Empresa']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 1,'formulario_id' => 1, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Cuéntanos sobre tu empresa', 'subtitulo' => 'Es importante conocer cada aspecto de tu empresa'],
            ['id' => 2,'formulario_id' => 1, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Miremos tus planes de acción', 'subtitulo' => 'La empresa cuenta con planes de acción en curso para lograr los objetivos empresariales establecidos.'],
            ['id' => 3,'formulario_id' => 1, 'orden' => 3, 'codigo' => '3', 'nombre' => '', 'subtitulo' => ''],
            ['id' => 4,'formulario_id' => 1, 'orden' => 4, 'codigo' => '4', 'nombre' => 'Ingresos por ventas de los últimos meses de la empresa', 'subtitulo' => ''],
            ['id' => 5,'formulario_id' => 1, 'orden' => 5, 'codigo' => '5', 'nombre' => 'Remuneración que recibe el emprendedor líder', 'subtitulo' => ''],
            ['id' => 6,'formulario_id' => 1, 'orden' => 6, 'codigo' => '6', 'nombre' => 'ORGANIGRAMA', 'subtitulo' => '']
        ]);

        DB::table('preguntas')->insert([
            ['id' => 1, 'orden' => 1, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 4,'descripcion' => 'Nombre de la empresa'],
            ['id' => 2, 'orden' => 2, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 1,'descripcion' => 'Tipo de empresa'],
            ['id' => 3, 'orden' => 3, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 4,'descripcion' => 'CC o NIT'],
            ['id' => 4, 'orden' => 4, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 5,'descripcion' => 'Fecha de inicio de actividades'],
            ['id' => 5, 'orden' => 5, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 6,'descripcion' => 'Correo Electrónico'],
            ['id' => 6, 'orden' => 6, 'grupo_pregunta_id' => 1, 'tipo_pregunta_id' => 7,'descripcion' => 'Contraseña'],

            ['id' => 7, 'orden' => 1, 'grupo_pregunta_id' => 2, 'tipo_pregunta_id' => 4,'descripcion' => 'Por favor describa que hace su empresa y cuáles son sus principales productos/servicios'],
            ['id' => 8, 'orden' => 2, 'grupo_pregunta_id' => 2, 'tipo_pregunta_id' => 4,'descripcion' => 'Describa la necesidad que tienen sus clientes y como su empresa lo soluciona. Por favor responda en menos de 100 palabras.'],

            ['id' => 9, 'orden' => 1, 'grupo_pregunta_id' => 3, 'tipo_pregunta_id' => 4,'descripcion' => '¿Cómo sus productos y/o servicios se diferencian de los de su competencia?'],
            ['id' => 10, 'orden' => 2, 'grupo_pregunta_id' => 3, 'tipo_pregunta_id' => 4,'descripcion' => '¿Cómo es la forma de monetización o el modelo de ingresos de la empresa?'],
            ['id' => 11, 'orden' => 3, 'grupo_pregunta_id' => 3, 'tipo_pregunta_id' => 4,'descripcion' => 'Ingresos por ventas de los últimos meses de la empresa'],

            ['id' => 12, 'orden' => 1, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 1'],
            ['id' => 13, 'orden' => 2, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 2'],
            ['id' => 14, 'orden' => 3, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 3'],
            ['id' => 15, 'orden' => 4, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 4'],
            ['id' => 16, 'orden' => 5, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 5'],
            ['id' => 17, 'orden' => 6, 'grupo_pregunta_id' => 4, 'tipo_pregunta_id' => 3,'descripcion' => 'Valor mes 6'],

            ['id' => 18, 'orden' => 1, 'grupo_pregunta_id' => 5, 'tipo_pregunta_id' => 1,'descripcion' => ''],

            ['id' => 19, 'orden' => 1, 'grupo_pregunta_id' => 6, 'tipo_pregunta_id' => 8,'descripcion' => 'Organigrama']
        ]);

        DB::table('opcions')->insert([
            ['id' => 1, 'pregunta_id' => 2, 'orden' => 1, 'nombre' => 'Empresa Unipersonal'],
            ['id' => 2, 'pregunta_id' => 2, 'orden' => 2, 'nombre' => 'Sociedades Anónimas S.A.'],
            ['id' => 3, 'pregunta_id' => 2, 'orden' => 3, 'nombre' => 'Sociedades por Acciones Simplificadas - S.A.S.'],
            ['id' => 4, 'pregunta_id' => 2, 'orden' => 4, 'nombre' => 'Sociedad de Responsabilidad Limitada - LTDA'],

            ['id' => 5, 'pregunta_id' => 18, 'orden' => 1, 'nombre' => 'De 0 a 1 SMMLV'],
            ['id' => 6, 'pregunta_id' => 18, 'orden' => 2, 'nombre' => 'De 1 a 2 SMMLV'],
            ['id' => 7, 'pregunta_id' => 18, 'orden' => 3, 'nombre' => 'De 2 a 3 SMMLV'],
            ['id' => 8, 'pregunta_id' => 18, 'orden' => 4, 'nombre' => 'De 3 a 4 SMMLV'],
            ['id' => 9, 'pregunta_id' => 18, 'orden' => 5, 'nombre' => 'Mas de 4 SMMLV'],
        ]);
    }
}
