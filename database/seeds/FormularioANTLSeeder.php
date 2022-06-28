<?php

use Illuminate\Database\Seeder;

class FormularioANTLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 601,'nombre' => 'Administración, normatividad y talento humano']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 601,'formulario_id' => 601, 'orden' => 1, 'codigo' => '1', 'nombre' => 'Conociendo tu empresa'],
            ['id' => 602,'formulario_id' => 601, 'orden' => 2, 'codigo' => '2', 'nombre' => 'Conociendo tu recurso humano'],
            ['id' => 603,'formulario_id' => 601, 'orden' => 3, 'codigo' => '3', 'nombre' => ''],
            ['id' => 604,'formulario_id' => 601, 'orden' => 4, 'codigo' => '4', 'nombre' => 'Miremos un poco la parte legal'],
            ['id' => 605,'formulario_id' => 601, 'orden' => 5, 'codigo' => '5', 'nombre' => ''],
            ['id' => 606,'formulario_id' => 601, 'orden' => 6, 'codigo' => '6', 'nombre' => ''],
            ['id' => 607,'formulario_id' => 601, 'orden' => 7, 'codigo' => '7', 'nombre' => '']
        ]);

        DB::table('preguntas')->insert([
            ['id' => 601, 'orden' => 1, 'grupo_pregunta_id' => 601, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un esquema de seguimiento y control del trabajo de los colaboradores que le permite tomar decisiones oportunas.'],
            ['id' => 602, 'orden' => 2, 'grupo_pregunta_id' => 601, 'tipo_pregunta_id' => 1,'descripcion' => 'Con el seguimiento y control del trabajo se establecen planes de mejoramiento en las competencias laborales de los colaboradores'],
            ['id' => 603, 'orden' => 3, 'grupo_pregunta_id' => 601, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un proceso para mejorar el ambiente de trabajo y las relaciones de los colaboradores'],
            ['id' => 604, 'orden' => 4, 'grupo_pregunta_id' => 601, 'tipo_pregunta_id' => 1,'descripcion' => 'Se tiene un proceso para el reclutamiento, selección, contratación e inducción de los colaboradores de la empresa.'],
            ['id' => 605, 'orden' => 5, 'grupo_pregunta_id' => 601, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un manual de perfiles, funciones y responsabilidades de los colaboradores.'],

            ['id' => 606, 'orden' => 1, 'grupo_pregunta_id' => 602, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa busca que los colaboradores desarrollen un sentido de pertenencia y compromiso activo'],
            ['id' => 607, 'orden' => 2, 'grupo_pregunta_id' => 602, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa estimula el trabajo en equipo a todos los niveles'],
            ['id' => 608, 'orden' => 3, 'grupo_pregunta_id' => 602, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con un sistema de gestión.'],
            ['id' => 609, 'orden' => 4, 'grupo_pregunta_id' => 602, 'tipo_pregunta_id' => 1,'descripcion' => 'La empresa cuenta con planes o programas para capacitar al equipo directivo y/o al personal de la empresa.'],
            ['id' => 610, 'orden' => 5, 'grupo_pregunta_id' => 602, 'tipo_pregunta_id' => 1,'descripcion' => 'Se tienen planificadas y organizadas las actividades bajo un esquema de procesos'],

            ['id' => 611, 'orden' => 1, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de empleados actuales con contrato a termino fijo o por labor'],
            ['id' => 612, 'orden' => 2, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de empleados actuales con contrato a termino indefinido'],
            ['id' => 613, 'orden' => 3, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número total de empleados con otro tipo de contrato'],
            ['id' => 614, 'orden' => 4, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número total de empleados sin ningún tipo de contrato'],
            ['id' => 615, 'orden' => 5, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número total de empleados actuales'],
            ['id' => 616, 'orden' => 6, 'grupo_pregunta_id' => 603, 'tipo_pregunta_id' => 4,'descripcion' => 'Número de empleados con pago de seguridad social'],

            ['id' => 617, 'orden' => 1, 'grupo_pregunta_id' => 604, 'tipo_pregunta_id' => 1,'descripcion' => 'Renovación matrícula mercantil el ultimo año'],
            ['id' => 618, 'orden' => 2, 'grupo_pregunta_id' => 604, 'tipo_pregunta_id' => 1,'descripcion' => 'RUT Actualizado'],
            ['id' => 619, 'orden' => 3, 'grupo_pregunta_id' => 604, 'tipo_pregunta_id' => 1,'descripcion' => 'Pago de IVA'],
            ['id' => 620, 'orden' => 4, 'grupo_pregunta_id' => 604, 'tipo_pregunta_id' => 1,'descripcion' => 'Pago de RETEFUENTE mensual'],
            ['id' => 621, 'orden' => 5, 'grupo_pregunta_id' => 604, 'tipo_pregunta_id' => 1,'descripcion' => 'Pago de RENTA Anual'],

            ['id' => 622, 'orden' => 1, 'grupo_pregunta_id' => 605, 'tipo_pregunta_id' => 1,'descripcion' => 'Registro INVIMA'],
            ['id' => 623, 'orden' => 2, 'grupo_pregunta_id' => 605, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencia Secretaria de Salud'],
            ['id' => 624, 'orden' => 3, 'grupo_pregunta_id' => 605, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencia o Resolución de Superintendencia o Ministerio correspondiente'],
            ['id' => 625, 'orden' => 4, 'grupo_pregunta_id' => 605, 'tipo_pregunta_id' => 1,'descripcion' => 'Sayco Acinpro'],
            ['id' => 626, 'orden' => 5, 'grupo_pregunta_id' => 605, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencia de Bomberos'],

            ['id' => 627, 'orden' => 1, 'grupo_pregunta_id' => 606, 'tipo_pregunta_id' => 1,'descripcion' => 'Corporación Autónoma Regional'],
            ['id' => 628, 'orden' => 2, 'grupo_pregunta_id' => 606, 'tipo_pregunta_id' => 1,'descripcion' => 'Registro de Marcas y Patentes'],
            ['id' => 629, 'orden' => 3, 'grupo_pregunta_id' => 606, 'tipo_pregunta_id' => 1,'descripcion' => 'Marquillas'],
            ['id' => 630, 'orden' => 4, 'grupo_pregunta_id' => 606, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencias de funcionamiento por entidad competente'],
            ['id' => 631, 'orden' => 5, 'grupo_pregunta_id' => 606, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencias de Importación.'],

            ['id' => 632, 'orden' => 1, 'grupo_pregunta_id' => 607, 'tipo_pregunta_id' => 1,'descripcion' => 'Licencias de Software'],
            ['id' => 633, 'orden' => 2, 'grupo_pregunta_id' => 607, 'tipo_pregunta_id' => 1,'descripcion' => 'Protección de Propiedad Intelectual'],
            ['id' => 634, 'orden' => 3, 'grupo_pregunta_id' => 607, 'tipo_pregunta_id' => 1,'descripcion' => 'Certificados de calibración de Equipos de medición']
        ]);

        DB::table('opcions')->insert([
            ['id' => 6001, 'pregunta_id' => 601, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6002, 'pregunta_id' => 601, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6003, 'pregunta_id' => 601, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6004, 'pregunta_id' => 601, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6005, 'pregunta_id' => 601, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6006, 'pregunta_id' => 602, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6007, 'pregunta_id' => 602, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6008, 'pregunta_id' => 602, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6009, 'pregunta_id' => 602, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6010, 'pregunta_id' => 602, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6011, 'pregunta_id' => 603, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6012, 'pregunta_id' => 603, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6013, 'pregunta_id' => 603, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6014, 'pregunta_id' => 603, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6015, 'pregunta_id' => 603, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6016, 'pregunta_id' => 604, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6017, 'pregunta_id' => 604, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6018, 'pregunta_id' => 604, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6019, 'pregunta_id' => 604, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6020, 'pregunta_id' => 604, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6021, 'pregunta_id' => 605, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6022, 'pregunta_id' => 605, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6023, 'pregunta_id' => 605, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6024, 'pregunta_id' => 605, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6025, 'pregunta_id' => 605, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6026, 'pregunta_id' => 606, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6027, 'pregunta_id' => 606, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6028, 'pregunta_id' => 606, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6029, 'pregunta_id' => 606, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6030, 'pregunta_id' => 606, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6031, 'pregunta_id' => 607, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6032, 'pregunta_id' => 607, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6033, 'pregunta_id' => 607, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6034, 'pregunta_id' => 607, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6035, 'pregunta_id' => 607, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6036, 'pregunta_id' => 608, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6037, 'pregunta_id' => 608, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6038, 'pregunta_id' => 608, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6039, 'pregunta_id' => 608, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6040, 'pregunta_id' => 608, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6041, 'pregunta_id' => 609, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6042, 'pregunta_id' => 609, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6043, 'pregunta_id' => 609, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6044, 'pregunta_id' => 609, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6045, 'pregunta_id' => 609, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6046, 'pregunta_id' => 610, 'orden' => 1, 'nombre' => 'Esta implementado y funciona adecuadamente'],
            ['id' => 6047, 'pregunta_id' => 610, 'orden' => 2, 'nombre' => 'Esta implementado en proceso de mejora'],
            ['id' => 6048, 'pregunta_id' => 610, 'orden' => 3, 'nombre' => 'Esta en proceso de implementación'],
            ['id' => 6049, 'pregunta_id' => 610, 'orden' => 4, 'nombre' => 'Se conoce pero no se ha implementado'],
            ['id' => 6050, 'pregunta_id' => 610, 'orden' => 5, 'nombre' => 'Se desconoce'],

            ['id' => 6051, 'pregunta_id' => 617, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6052, 'pregunta_id' => 617, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6053, 'pregunta_id' => 617, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6054, 'pregunta_id' => 618, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6055, 'pregunta_id' => 618, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6056, 'pregunta_id' => 618, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6057, 'pregunta_id' => 619, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6058, 'pregunta_id' => 619, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6059, 'pregunta_id' => 619, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6060, 'pregunta_id' => 620, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6061, 'pregunta_id' => 620, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6062, 'pregunta_id' => 620, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6063, 'pregunta_id' => 621, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6064, 'pregunta_id' => 621, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6065, 'pregunta_id' => 621, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6066, 'pregunta_id' => 622, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6067, 'pregunta_id' => 622, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6068, 'pregunta_id' => 622, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6069, 'pregunta_id' => 623, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6070, 'pregunta_id' => 623, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6071, 'pregunta_id' => 623, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6072, 'pregunta_id' => 624, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6073, 'pregunta_id' => 624, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6074, 'pregunta_id' => 624, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6075, 'pregunta_id' => 625, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6076, 'pregunta_id' => 625, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6077, 'pregunta_id' => 625, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6078, 'pregunta_id' => 626, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6079, 'pregunta_id' => 626, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6080, 'pregunta_id' => 626, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6081, 'pregunta_id' => 627, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6082, 'pregunta_id' => 627, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6083, 'pregunta_id' => 627, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6084, 'pregunta_id' => 628, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6085, 'pregunta_id' => 628, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6086, 'pregunta_id' => 628, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6087, 'pregunta_id' => 629, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6088, 'pregunta_id' => 629, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6089, 'pregunta_id' => 629, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6090, 'pregunta_id' => 630, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6091, 'pregunta_id' => 630, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6092, 'pregunta_id' => 630, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6093, 'pregunta_id' => 631, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6094, 'pregunta_id' => 631, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6095, 'pregunta_id' => 631, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6096, 'pregunta_id' => 632, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6097, 'pregunta_id' => 632, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6098, 'pregunta_id' => 632, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6099, 'pregunta_id' => 633, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6100, 'pregunta_id' => 633, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6101, 'pregunta_id' => 633, 'orden' => 3, 'nombre' => 'No aplica'],

            ['id' => 6102, 'pregunta_id' => 634, 'orden' => 1, 'nombre' => 'Cumple'],
            ['id' => 6103, 'pregunta_id' => 634, 'orden' => 2, 'nombre' => 'No cumple'],
            ['id' => 6104, 'pregunta_id' => 634, 'orden' => 3, 'nombre' => 'No aplica'],
        ]);
    }
}
