<?php

use Illuminate\Database\Seeder;

class FormularioDireccionamientoEstrategicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 201,'nombre' => 'Direccionamiento Estratégico']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 201 ,'formulario_id' => 201, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Cuentanos sobre tu empresa'],
            ['id' => 202 ,'formulario_id' => 201, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Miremos tus planes de acción'],
            ['id' => 203 ,'formulario_id' => 201, 'orden' => 3, 'codigo' => '3', 'nombre' => ''],
            ['id' => 204 ,'formulario_id' => 201, 'orden' => 4, 'codigo' => '4', 'nombre' => 'ORGANIGRAMA'],
        ]);

        DB::table('preguntas')->insert([
            ['id' => 201, 'orden' => 1, 'grupo_pregunta_id' => 201, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene identificada, escrita y socializada su misión, visión y valores corporativos.'],
            ['id' => 202, 'orden' => 2, 'grupo_pregunta_id' => 201, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un diagnóstico DOFA actualizado que sirve para determinar objetivos.'],
            ['id' => 203, 'orden' => 3, 'grupo_pregunta_id' => 201, 'tipo_pregunta_id' => 1,'descripcion' => 'En la empresa se analiza la competencia, el entorno en general y los grupos de interés para establecer estrategias empresariales.'],
            ['id' => 204, 'orden' => 4, 'grupo_pregunta_id' => 201, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene identificados los principales objetivos empresariales.'],
            ['id' => 205, 'orden' => 5, 'grupo_pregunta_id' => 201, 'tipo_pregunta_id' => 1,'descripcion' => 'La estructura y organización interna de la empresa favorece la implementación de estrategias y planes de trabajo definidos.'],

            ['id' => 206, 'orden' => 1, 'grupo_pregunta_id' => 202, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con planes de acción en curso para lograr los objetivos empresariales establecidos.'],
            ['id' => 207, 'orden' => 2, 'grupo_pregunta_id' => 202, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un proceso para medir el cumplimiento de los objetivos empresariales mediante indicadores clave del negocio.'],
            ['id' => 208, 'orden' => 3, 'grupo_pregunta_id' => 202, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene un proceso para comunicar a sus colaboradores los roles que deben desempeñar para alcanzar los objetivos empresariales.'],
            ['id' => 209, 'orden' => 4, 'grupo_pregunta_id' => 202, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un sistema de información y de manejo de documentos efectivo para la toma de decisiones.'],
            ['id' => 210, 'orden' => 5, 'grupo_pregunta_id' => 202, 'tipo_pregunta_id' => 1,'descripcion' => 'En la empresa se utilizan: gráficos, histogramas y/o diagramas para medir como se hace el trabajo.'],

            ['id' => 211, 'orden' => 1, 'grupo_pregunta_id' => 203, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de objetivos empresariales que la empresa está trabajando actualmente.'],
            ['id' => 212, 'orden' => 2, 'grupo_pregunta_id' => 203, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de indicadores que mide la gestión de la empresa.'],
            ['id' => 213, 'orden' => 3, 'grupo_pregunta_id' => 203, 'tipo_pregunta_id' => 4,'descripcion' => 'Porcentaje de avance del plan estratégico de la empresa.'],
            ['id' => 214, 'orden' => 4, 'grupo_pregunta_id' => 203, 'tipo_pregunta_id' => 4,'descripcion' => 'El Número de veces que se hace seguimiento al plan estratégico en el semestre.'],

            ['id' => 215, 'orden' => 1, 'grupo_pregunta_id' => 204, 'tipo_pregunta_id' => 8,'descripcion' => 'Organigrama']
        ]);

        DB::table('opcions')->insert([
            ['id' => 2001, 'pregunta_id' => 201, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2002, 'pregunta_id' => 201, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2003, 'pregunta_id' => 201, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2004, 'pregunta_id' => 201, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2005, 'pregunta_id' => 201, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2006, 'pregunta_id' => 202, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2007, 'pregunta_id' => 202, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2008, 'pregunta_id' => 202, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2009, 'pregunta_id' => 202, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2010, 'pregunta_id' => 202, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2011, 'pregunta_id' => 203, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2012, 'pregunta_id' => 203, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2013, 'pregunta_id' => 203, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2014, 'pregunta_id' => 203, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2015, 'pregunta_id' => 203, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2016, 'pregunta_id' => 204, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2017, 'pregunta_id' => 204, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2018, 'pregunta_id' => 204, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2019, 'pregunta_id' => 204, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2020, 'pregunta_id' => 204, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2021, 'pregunta_id' => 205, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2022, 'pregunta_id' => 205, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2023, 'pregunta_id' => 205, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2024, 'pregunta_id' => 205, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2025, 'pregunta_id' => 205, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2026, 'pregunta_id' => 206, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2027, 'pregunta_id' => 206, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2028, 'pregunta_id' => 206, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2029, 'pregunta_id' => 206, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2030, 'pregunta_id' => 206, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2031, 'pregunta_id' => 207, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2032, 'pregunta_id' => 207, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2033, 'pregunta_id' => 207, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2034, 'pregunta_id' => 207, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2035, 'pregunta_id' => 207, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2036, 'pregunta_id' => 208, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2037, 'pregunta_id' => 208, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2038, 'pregunta_id' => 208, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2039, 'pregunta_id' => 208, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2040, 'pregunta_id' => 208, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2041, 'pregunta_id' => 209, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2042, 'pregunta_id' => 209, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2043, 'pregunta_id' => 209, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2044, 'pregunta_id' => 209, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2045, 'pregunta_id' => 209, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 2046, 'pregunta_id' => 210, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 2047, 'pregunta_id' => 210, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 2048, 'pregunta_id' => 210, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 2049, 'pregunta_id' => 210, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 2050, 'pregunta_id' => 210, 'orden' => 5, 'nombre' => 'Se desconoce'],
        ]);
    }
}
