<?php

use Illuminate\Database\Seeder;

class FormularioGestionTecnicaYProduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 501,'nombre' => 'Gestión técnica y producción']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 501 ,'formulario_id' => 501, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Gestión Técnica'],
            ['id' => 502 ,'formulario_id' => 501, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Analicemos mas profundamente'],
            ['id' => 503 ,'formulario_id' => 501, 'orden' => 3, 'codigo' => '3', 'nombre' => ''],
        ]);

        DB::table('preguntas')->insert([
            ['id' => 501, 'orden' => 1, 'grupo_pregunta_id' => 501, 'tipo_pregunta_id' => 1,'descripcion' => 'Conozcamos el estado de la empresa'],
            ['id' => 502, 'orden' => 2, 'grupo_pregunta_id' => 501, 'tipo_pregunta_id' => 1,'descripcion' => 'El proceso de elaboración del producto/servicio de la empresa cuenta con un nivel de estandarización y modularidad que facilita y agiliza su producción o su realización.'],
            ['id' => 503, 'orden' => 3, 'grupo_pregunta_id' => 501, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa ha aplicado innovación a sus procesos, productos y servicios'],
            ['id' => 504, 'orden' => 4, 'grupo_pregunta_id' => 501, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un esquema para tomar acciones preventivas y correctivas necesarias para eliminar causas y evitar que se presenten o se vuelvan a presentar fallas en la calidad del producto o servicio.'],
            ['id' => 505, 'orden' => 5, 'grupo_pregunta_id' => 501, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene un sistema de calidad para revisar o evaluar entre otros, procesos, materia prima, insumos, proveedores o personal contratado, e instalaciones que le permita asegurar una calidad estandarizada al cliente.'],

            ['id' => 506, 'orden' => 1, 'grupo_pregunta_id' => 502, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con indicadores de productividad para los principales procesos de la organización, con objetivo de medirlos y aplicar mejoramiento continuo.'],
            ['id' => 507, 'orden' => 2, 'grupo_pregunta_id' => 502, 'tipo_pregunta_id' => 1,'descripcion' => 'El proceso de producción / prestación del servicio de la empresa es flexible y permite cambios de acuerdo a las necesidades del cliente.'],
            ['id' => 508, 'orden' => 3, 'grupo_pregunta_id' => 502, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene establecida una metodología para recibir retroalimentación del cliente para el mejoramiento del producto y/o servicio'],
            ['id' => 509, 'orden' => 4, 'grupo_pregunta_id' => 502, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene establecida una ficha técnica o documentación descriptiva de los requisitos del producto o servicio.'],
            ['id' => 510, 'orden' => 5, 'grupo_pregunta_id' => 502, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con una estrategia para generar, capacitar y proteger el know-how propio.'],

            ['id' => 511, 'orden' => 1, 'grupo_pregunta_id' => 503, 'tipo_pregunta_id' => 4,'descripcion' => 'Numero de unidades de productos o servicios producidos en promedio por mes en el ultimo año'],
            ['id' => 512, 'orden' => 2, 'grupo_pregunta_id' => 503, 'tipo_pregunta_id' => 4,'descripcion' => 'Porcentaje de la capacidad instalada mensual que está utilizando actualmente'],
            ['id' => 513, 'orden' => 3, 'grupo_pregunta_id' => 503, 'tipo_pregunta_id' => 4,'descripcion' => 'La Capacidad productiva estimada en unidades de producción o servicios al mes'],
            ['id' => 514, 'orden' => 4, 'grupo_pregunta_id' => 503, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de nuevos productos o servicios en desarrollo.'],
            ['id' => 515, 'orden' => 5, 'grupo_pregunta_id' => 503, 'tipo_pregunta_id' => 4,'descripcion' => 'Numero de productos o servicios con fallas presentados en promedio por mes en el ultimo años']
        ]);

        DB::table('opcions')->insert([
            ['id' => 5001, 'pregunta_id' => 501, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5002, 'pregunta_id' => 501, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5003, 'pregunta_id' => 501, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5004, 'pregunta_id' => 501, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5005, 'pregunta_id' => 501, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5006, 'pregunta_id' => 502, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5007, 'pregunta_id' => 502, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5008, 'pregunta_id' => 502, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5009, 'pregunta_id' => 502, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5010, 'pregunta_id' => 502, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5011, 'pregunta_id' => 503, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5012, 'pregunta_id' => 503, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5013, 'pregunta_id' => 503, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5014, 'pregunta_id' => 503, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5015, 'pregunta_id' => 503, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5016, 'pregunta_id' => 504, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5017, 'pregunta_id' => 504, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5018, 'pregunta_id' => 504, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5019, 'pregunta_id' => 504, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5020, 'pregunta_id' => 504, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5021, 'pregunta_id' => 505, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5022, 'pregunta_id' => 505, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5023, 'pregunta_id' => 505, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5024, 'pregunta_id' => 505, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5025, 'pregunta_id' => 505, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5026, 'pregunta_id' => 506, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5027, 'pregunta_id' => 506, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5028, 'pregunta_id' => 506, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5029, 'pregunta_id' => 506, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5030, 'pregunta_id' => 506, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5031, 'pregunta_id' => 507, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5032, 'pregunta_id' => 507, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5033, 'pregunta_id' => 507, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5034, 'pregunta_id' => 507, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5035, 'pregunta_id' => 507, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5036, 'pregunta_id' => 508, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5037, 'pregunta_id' => 508, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5038, 'pregunta_id' => 508, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5039, 'pregunta_id' => 508, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5040, 'pregunta_id' => 508, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5041, 'pregunta_id' => 509, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5042, 'pregunta_id' => 509, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5043, 'pregunta_id' => 509, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5044, 'pregunta_id' => 509, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5045, 'pregunta_id' => 509, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 5046, 'pregunta_id' => 510, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 5047, 'pregunta_id' => 510, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 5048, 'pregunta_id' => 510, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 5049, 'pregunta_id' => 510, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 5050, 'pregunta_id' => 510, 'orden' => 5, 'nombre' => 'Se desconoce'],

        ]);
    }
}
