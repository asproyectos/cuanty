<?php

use Illuminate\Database\Seeder;

class FormularioMercadeoYVentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 401,'nombre' => 'Mercadeo y ventas']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 401 ,'formulario_id' => 401, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Conociendo tu estado financiero'],
            ['id' => 402 ,'formulario_id' => 401, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Conociendo tu nomina'],
            ['id' => 403 ,'formulario_id' => 401, 'orden' => 3, 'codigo' => '3', 'nombre' => 'Analicemos los ingresos y egresos'],
            ['id' => 404 ,'formulario_id' => 401, 'orden' => 4, 'codigo' => '4', 'nombre' => ''],
            // ['id' => 405 ,'formulario_id' => 401, 'orden' => 5, 'codigo' => '5', 'nombre' => ''],
            // ['id' => 406 ,'formulario_id' => 401, 'orden' => 6, 'codigo' => '6', 'nombre' => 'ESTADOS FINANCIEROS'],
        ]);

        DB::table('preguntas')->insert([
            ['id' => 401, 'orden' => 1, 'grupo_pregunta_id' => 401, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un proceso para conocer el Tamaño del Mercado que atiende y el perfil de su cliente.'],
            ['id' => 402, 'orden' => 2, 'grupo_pregunta_id' => 401, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene clara su propuesta de valor'],
            ['id' => 403, 'orden' => 3, 'grupo_pregunta_id' => 401, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene definida su cadena de valor desde los proveedores hasta la entrega a satisfacción de su propuesta de valor.'],
            ['id' => 404, 'orden' => 4, 'grupo_pregunta_id' => 401, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa hace uso de una base de datos de sus clientes.'],
            ['id' => 405, 'orden' => 5, 'grupo_pregunta_id' => 401, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene establecida una estrategia comercial para la consecución de nuevos clientes.'],

            ['id' => 406, 'orden' => 1, 'grupo_pregunta_id' => 402, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con una estrategia establecida para lograr la fidelidad de los clientes.'],
            ['id' => 407, 'orden' => 2, 'grupo_pregunta_id' => 402, 'tipo_pregunta_id' => 1,'descripcion' => 'LLa empresa ha definido estrategias para la promoción de sus productos o servicios.'],
            ['id' => 408, 'orden' => 3, 'grupo_pregunta_id' => 402, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con imagen corporativa.'],
            ['id' => 409, 'orden' => 4, 'grupo_pregunta_id' => 402, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa maneja políticas de precios con base en costos de producción y precios de mercado.'],
            ['id' => 410, 'orden' => 5, 'grupo_pregunta_id' => 402, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con una estrategia de comparación de sus precios, calidad, imagen, instalaciones con los de la competencia'],

            ['id' => 411, 'orden' => 1, 'grupo_pregunta_id' => 403, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con una estrategia de diferenciación del producto de la competencia.'],
            ['id' => 412, 'orden' => 2, 'grupo_pregunta_id' => 403, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene un proceso de evaluación de la satisfacción del cliente con respecto a los productos y servicios ofrecidos'],
            ['id' => 413, 'orden' => 3, 'grupo_pregunta_id' => 403, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un proceso de mejora a la prestación del servicio o producto con base en las quejas, sugerencias y opiniones de los clientes.'],
            ['id' => 414, 'orden' => 4, 'grupo_pregunta_id' => 403, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa revisa y hace seguimiento periódicamente al resultado de la gestión de ventas'],
            ['id' => 415, 'orden' => 5, 'grupo_pregunta_id' => 403, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con una estrategia de mercadeo digital.'],

            ['id' => 416, 'orden' => 1, 'grupo_pregunta_id' => 404, 'tipo_pregunta_id' => 3,'descripcion' => 'Ventas promedio en pesos de la empresa en los últimos 12 meses'],
            ['id' => 417, 'orden' => 2, 'grupo_pregunta_id' => 404, 'tipo_pregunta_id' => 3,'descripcion' => 'No de clientes de la empresa en los últimos 6 meses'],
            ['id' => 418, 'orden' => 3, 'grupo_pregunta_id' => 404, 'tipo_pregunta_id' => 3,'descripcion' => 'No de clientes que representan el 80% de las ventas de la empresa actualmente'],
            ['id' => 419, 'orden' => 4, 'grupo_pregunta_id' => 404, 'tipo_pregunta_id' => 3,'descripcion' => 'No de segmentos de clientes que atiende la empresa actualmente'],
            ['id' => 420, 'orden' => 5, 'grupo_pregunta_id' => 404, 'tipo_pregunta_id' => 3,'descripcion' => 'No de canales de distribución que maneja la empresa actualmente'],
        ]);

        DB::table('opcions')->insert([
            ['id' => 4001, 'pregunta_id' => 401, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4002, 'pregunta_id' => 401, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4003, 'pregunta_id' => 401, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4004, 'pregunta_id' => 401, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4005, 'pregunta_id' => 401, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4006, 'pregunta_id' => 402, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4007, 'pregunta_id' => 402, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4008, 'pregunta_id' => 402, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4009, 'pregunta_id' => 402, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4010, 'pregunta_id' => 402, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4011, 'pregunta_id' => 403, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4012, 'pregunta_id' => 403, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4013, 'pregunta_id' => 403, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4014, 'pregunta_id' => 403, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4015, 'pregunta_id' => 403, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4016, 'pregunta_id' => 404, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4017, 'pregunta_id' => 404, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4018, 'pregunta_id' => 404, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4019, 'pregunta_id' => 404, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4020, 'pregunta_id' => 404, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4021, 'pregunta_id' => 405, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4022, 'pregunta_id' => 405, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4023, 'pregunta_id' => 405, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4024, 'pregunta_id' => 405, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4025, 'pregunta_id' => 405, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4026, 'pregunta_id' => 406, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4027, 'pregunta_id' => 406, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4028, 'pregunta_id' => 406, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4029, 'pregunta_id' => 406, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4030, 'pregunta_id' => 406, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4031, 'pregunta_id' => 407, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4032, 'pregunta_id' => 407, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4033, 'pregunta_id' => 407, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4034, 'pregunta_id' => 407, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4035, 'pregunta_id' => 407, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4036, 'pregunta_id' => 408, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4037, 'pregunta_id' => 408, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4038, 'pregunta_id' => 408, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4039, 'pregunta_id' => 408, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4040, 'pregunta_id' => 408, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4041, 'pregunta_id' => 409, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4042, 'pregunta_id' => 409, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4043, 'pregunta_id' => 409, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4044, 'pregunta_id' => 409, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4045, 'pregunta_id' => 409, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4046, 'pregunta_id' => 410, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4047, 'pregunta_id' => 410, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4048, 'pregunta_id' => 410, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4049, 'pregunta_id' => 410, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4050, 'pregunta_id' => 410, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4051, 'pregunta_id' => 411, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4052, 'pregunta_id' => 411, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4053, 'pregunta_id' => 411, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4054, 'pregunta_id' => 411, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4055, 'pregunta_id' => 411, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4056, 'pregunta_id' => 412, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4057, 'pregunta_id' => 412, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4058, 'pregunta_id' => 412, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4059, 'pregunta_id' => 412, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4060, 'pregunta_id' => 412, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4061, 'pregunta_id' => 413, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4062, 'pregunta_id' => 413, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4063, 'pregunta_id' => 413, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4064, 'pregunta_id' => 413, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4065, 'pregunta_id' => 413, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4066, 'pregunta_id' => 414, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4067, 'pregunta_id' => 414, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4068, 'pregunta_id' => 414, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4069, 'pregunta_id' => 414, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4070, 'pregunta_id' => 414, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 4071, 'pregunta_id' => 415, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 4072, 'pregunta_id' => 415, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 4073, 'pregunta_id' => 415, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 4074, 'pregunta_id' => 415, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 4075, 'pregunta_id' => 415, 'orden' => 5, 'nombre' => 'Se desconoce'],

        ]);
    }
}
