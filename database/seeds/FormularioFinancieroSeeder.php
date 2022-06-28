<?php

use Illuminate\Database\Seeder;

class FormularioFinancieroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 301,'nombre' => 'Financiero']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 301 ,'formulario_id' => 301, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Conociendo tu estado financiero'],
            ['id' => 302 ,'formulario_id' => 301, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Conociendo tu nomina'],
            ['id' => 303 ,'formulario_id' => 301, 'orden' => 3, 'codigo' => '3', 'nombre' => 'Analicemos los ingresos y egresos'],
            ['id' => 304 ,'formulario_id' => 301, 'orden' => 4, 'codigo' => '4', 'nombre' => ''],
            ['id' => 305 ,'formulario_id' => 301, 'orden' => 5, 'codigo' => '5', 'nombre' => ''],
            ['id' => 306 ,'formulario_id' => 301, 'orden' => 6, 'codigo' => '6', 'nombre' => 'ESTADOS FINANCIEROS'],
        ]);

        DB::table('preguntas')->insert([
            ['id' => 301, 'orden' => 1, 'grupo_pregunta_id' => 301, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un proceso para organizar y mantener al día los libros contables y de seguimiento de cuentas.'],
            ['id' => 302, 'orden' => 2, 'grupo_pregunta_id' => 301, 'tipo_pregunta_id' => 1,'descripcion' => 'El sistema de contabilidad y costos ofrece información confiable y oportuna para la toma de decisiones.'],
            ['id' => 303, 'orden' => 3, 'grupo_pregunta_id' => 301, 'tipo_pregunta_id' => 1,'descripcion' => 'Se cuenta con una herramienta de seguimiento que indica el nivel de liquidez requerido para el normal funcionamiento de la empresa.'],
            ['id' => 304, 'orden' => 4, 'grupo_pregunta_id' => 301, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene una política definida para el manejo de su cartera y la mantiene controlada.'],
            ['id' => 305, 'orden' => 5, 'grupo_pregunta_id' => 301, 'tipo_pregunta_id' => 1,'descripcion' => 'Cuenta con la herramienta para identificar cómo se componen sus ingresos y analiza su comportamiento para tomar decisiones'],

            ['id' => 306, 'orden' => 1, 'grupo_pregunta_id' => 302, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa conoce el proceso para identificar su capacidad de endeudamiento.'],
            ['id' => 307, 'orden' => 2, 'grupo_pregunta_id' => 302, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa hace seguimiento al flujo de caja para cumplir oportunamente con los compromisos adquiridos'],
            ['id' => 308, 'orden' => 3, 'grupo_pregunta_id' => 302, 'tipo_pregunta_id' => 1,'descripcion' => 'Realiza análisis financiero mensualmente (periodicamente)'],
            ['id' => 309, 'orden' => 4, 'grupo_pregunta_id' => 302, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa tiene centros de costos separados para las diferentes líneas de negocio.'],
            ['id' => 310, 'orden' => 5, 'grupo_pregunta_id' => 302, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa conoce su punto de equilibrio.'],

            ['id' => 311, 'orden' => 1, 'grupo_pregunta_id' => 303, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa conoce su necesidad de capital de trabajo y lo genera a través de los ingresos.'],
            ['id' => 312, 'orden' => 2, 'grupo_pregunta_id' => 303, 'tipo_pregunta_id' => 1,'descripcion' => 'Conoce los productos financieros que pueden ayudar al desarrollo del negocio (leasing, compra de cartera, sobregiros, entre otros)'],
            ['id' => 313, 'orden' => 3, 'grupo_pregunta_id' => 303, 'tipo_pregunta_id' => 1,'descripcion' => 'Tiene identificado qué tipos de entidades le pueden prestar apoyo económico en el sector financiero y conoce que requisitos se piden.'],
            ['id' => 314, 'orden' => 4, 'grupo_pregunta_id' => 303, 'tipo_pregunta_id' => 1,'descripcion' => 'Posee un buen historial crediticio (ha solicitado créditos a nombre de la empresa en el pasado, no se encuentra reportado en centrales de riesgo)'],
            ['id' => 315, 'orden' => 5, 'grupo_pregunta_id' => 303, 'tipo_pregunta_id' => 1,'descripcion' => 'Tiene identificada plenamente cuales son las necesidades de financiación que tiene la empresa para afrontar el crecimiento esperado de la empresa.'],

            ['id' => 316, 'orden' => 1, 'grupo_pregunta_id' => 304, 'tipo_pregunta_id' => 4,'descripcion' => 'Cual es el régimen de impuesto a las ventas al que pertenece.'],
            ['id' => 317, 'orden' => 2, 'grupo_pregunta_id' => 304, 'tipo_pregunta_id' => 4,'descripcion' => 'En este momento cual es el monto total de las deudas financieras de la empresa'],
            ['id' => 318, 'orden' => 3, 'grupo_pregunta_id' => 304, 'tipo_pregunta_id' => 4,'descripcion' => 'A cuanto ascienden sus activos.'],
            ['id' => 319, 'orden' => 4, 'grupo_pregunta_id' => 304, 'tipo_pregunta_id' => 4,'descripcion' => 'Cual es el valor promedio de la rotación de inventarios en dias.'],

            ['id' => 320, 'orden' => 1, 'grupo_pregunta_id' => 305, 'tipo_pregunta_id' => 4,'descripcion' => 'Cual es el monto promedio de rotación de cartera.'],
            ['id' => 321, 'orden' => 2, 'grupo_pregunta_id' => 305, 'tipo_pregunta_id' => 4,'descripcion' => 'Cuales el monto de su capital de trabajo.'],
            ['id' => 322, 'orden' => 3, 'grupo_pregunta_id' => 305, 'tipo_pregunta_id' => 4,'descripcion' => 'Cual es la utilidad promedio mensual de su negocio en el último año'],
            ['id' => 323, 'orden' => 4, 'grupo_pregunta_id' => 305, 'tipo_pregunta_id' => 4,'descripcion' => 'Cual es el régimen de impuesto a las ventas al que pertenece.'],

            ['id' => 324, 'orden' => 1, 'grupo_pregunta_id' => 306, 'tipo_pregunta_id' => 8,'descripcion' => 'Estados financieros']
        ]);

        DB::table('opcions')->insert([
            ['id' => 3001, 'pregunta_id' => 301, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3002, 'pregunta_id' => 301, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3003, 'pregunta_id' => 301, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3004, 'pregunta_id' => 301, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3005, 'pregunta_id' => 301, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3006, 'pregunta_id' => 302, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3007, 'pregunta_id' => 302, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3008, 'pregunta_id' => 302, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3009, 'pregunta_id' => 302, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3010, 'pregunta_id' => 302, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3011, 'pregunta_id' => 303, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3012, 'pregunta_id' => 303, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3013, 'pregunta_id' => 303, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3014, 'pregunta_id' => 303, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3015, 'pregunta_id' => 303, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3016, 'pregunta_id' => 304, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3017, 'pregunta_id' => 304, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3018, 'pregunta_id' => 304, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3019, 'pregunta_id' => 304, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3020, 'pregunta_id' => 304, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3021, 'pregunta_id' => 305, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3022, 'pregunta_id' => 305, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3023, 'pregunta_id' => 305, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3024, 'pregunta_id' => 305, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3025, 'pregunta_id' => 305, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3026, 'pregunta_id' => 306, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3027, 'pregunta_id' => 306, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3028, 'pregunta_id' => 306, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3029, 'pregunta_id' => 306, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3030, 'pregunta_id' => 306, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3031, 'pregunta_id' => 307, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3032, 'pregunta_id' => 307, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3033, 'pregunta_id' => 307, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3034, 'pregunta_id' => 307, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3035, 'pregunta_id' => 307, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3036, 'pregunta_id' => 308, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3037, 'pregunta_id' => 308, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3038, 'pregunta_id' => 308, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3039, 'pregunta_id' => 308, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3040, 'pregunta_id' => 308, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3041, 'pregunta_id' => 309, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3042, 'pregunta_id' => 309, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3043, 'pregunta_id' => 309, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3044, 'pregunta_id' => 309, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3045, 'pregunta_id' => 309, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3046, 'pregunta_id' => 310, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3047, 'pregunta_id' => 310, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3048, 'pregunta_id' => 310, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3049, 'pregunta_id' => 310, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3050, 'pregunta_id' => 310, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3051, 'pregunta_id' => 311, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3052, 'pregunta_id' => 311, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3053, 'pregunta_id' => 311, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3054, 'pregunta_id' => 311, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3055, 'pregunta_id' => 311, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3056, 'pregunta_id' => 312, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3057, 'pregunta_id' => 312, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3058, 'pregunta_id' => 312, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3059, 'pregunta_id' => 312, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3060, 'pregunta_id' => 312, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3061, 'pregunta_id' => 313, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3062, 'pregunta_id' => 313, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3063, 'pregunta_id' => 313, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3064, 'pregunta_id' => 313, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3065, 'pregunta_id' => 313, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3066, 'pregunta_id' => 314, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3067, 'pregunta_id' => 314, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3068, 'pregunta_id' => 314, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3069, 'pregunta_id' => 314, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3070, 'pregunta_id' => 314, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 3071, 'pregunta_id' => 315, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 3072, 'pregunta_id' => 315, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 3073, 'pregunta_id' => 315, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 3074, 'pregunta_id' => 315, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 3075, 'pregunta_id' => 315, 'orden' => 5, 'nombre' => 'Se desconoce'],
        ]);
    }
}
