<?php

use Illuminate\Database\Seeder;

class FormularioPerfilEmprendedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formularios')->insert([
            ['id' => 101,'nombre' => 'Perfil Emprendedores']
        ]);

        DB::table('grupo_preguntas')->insert([
            ['id' => 101,'formulario_id' => 101, 'orden' => 1, 'codigo' => '1', 'nombre' => ''],
            ['id' => 102,'formulario_id' => 101, 'orden' => 2, 'codigo' => '2', 'nombre' => ''],
            ['id' => 103,'formulario_id' => 101, 'orden' => 3, 'codigo' => '3', 'nombre' => ''],
            ['id' => 104,'formulario_id' => 101, 'orden' => 4, 'codigo' => '4', 'nombre' => ''],
            ['id' => 105,'formulario_id' => 101, 'orden' => 5, 'codigo' => '5', 'nombre' => ''],
            ['id' => 106,'formulario_id' => 101, 'orden' => 6, 'codigo' => '6', 'nombre' => '']
        ]);

        DB::table('preguntas')->insert([
            ['id' => 101, 'orden' => 1, 'grupo_pregunta_id' => 101, 'tipo_pregunta_id' => 1,'descripcion' => 'Analiza situaciones definiendo el contexto y los factores causales.'],
            ['id' => 102, 'orden' => 2, 'grupo_pregunta_id' => 101, 'tipo_pregunta_id' => 1,'descripcion' => 'Asume bien los fracasos y saca el mejor provecho de ellos.'],
            ['id' => 103, 'orden' => 3, 'grupo_pregunta_id' => 101, 'tipo_pregunta_id' => 1,'descripcion' => 'Asume compromisos claros con sus clientes y los cumple con eficiencia.'],
            ['id' => 104, 'orden' => 4, 'grupo_pregunta_id' => 101, 'tipo_pregunta_id' => 1,'descripcion' => 'Busca conocer otras opiniones y puntos de vista.'],
            ['id' => 105, 'orden' => 5, 'grupo_pregunta_id' => 101, 'tipo_pregunta_id' => 1,'descripcion' => 'Con su personalidad inspira a los demás.'],

            ['id' => 106, 'orden' => 1, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Cuando recibe quejas de su producto o servicio, lo asume y corrige para mejorar.'],
            ['id' => 107, 'orden' => 2, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Cuando se enfrenta a situaciones complejas, controla sus emociones, trasmite confianza y comunica efectivamente.'],
            ['id' => 108, 'orden' => 3, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Cuando tiene un problema utiliza uno o varios métodos de análisis.'],
            ['id' => 109, 'orden' => 4, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Desarrolla sus proyectos y labores potencializando sus fortalezas.'],
            ['id' => 110, 'orden' => 5, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Es para usted fácil salirse de un marco de acción.'],
            ['id' => 111, 'orden' => 6, 'grupo_pregunta_id' => 102, 'tipo_pregunta_id' => 1,'descripcion' => 'Explora información de otros entornos relacionados con su campo de acción.'],

            ['id' => 112, 'orden' => 1, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Explora nuevas y diferentes formas de hacer las cosas'],
            ['id' => 113, 'orden' => 2, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Frente a cada situación es consciente de sus emociones'],
            ['id' => 114, 'orden' => 3, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Frente a las diferentes situaciones visualiza diversas formas de afrontarlas.'],
            ['id' => 115, 'orden' => 4, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Frente a situaciones difíciles, tiene la capacidad de sobreponerse y continuar.'],
            ['id' => 116, 'orden' => 5, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Hace un plan integral de desarrollo de vida'],
            ['id' => 117, 'orden' => 6, 'grupo_pregunta_id' => 103, 'tipo_pregunta_id' => 1,'descripcion' => 'Le agrada hablar en un publico'],

            ['id' => 118, 'orden' => 1, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Le agrada hablar en un publico'],
            ['id' => 119, 'orden' => 2, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Le motivan los grandes riesgos.'],
            ['id' => 120, 'orden' => 3, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Para la toma de decisiones tiene en cuenta el plan de desarrollo de su ciudad/departamento.'],
            ['id' => 121, 'orden' => 4, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Percibe con facilidad factores/aspectos o situaciones que muchos otros no.'],
            ['id' => 122, 'orden' => 5, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Personas cercanas a usted, lo catalogan como una persona que sabe escuchar.'],
            ['id' => 123, 'orden' => 6, 'grupo_pregunta_id' => 104, 'tipo_pregunta_id' => 1,'descripcion' => 'Posee un marco claro de sus principios y valores y los aplica en su proyecto emprendedor.'],

            ['id' => 124, 'orden' => 1, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Produce ideas que lleva a acciones y resultados'],
            ['id' => 125, 'orden' => 2, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Proyecta y planea contemplando diferentes escenarios'],
            ['id' => 126, 'orden' => 3, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Reconoce sus fortalezas y sus debilidades y hace un plan para mejorarlas.'],
            ['id' => 127, 'orden' => 4, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Se le facilita coordinar y dirigir a otros, sin generar conflictos.'],
            ['id' => 128, 'orden' => 5, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Se le facilita generar contactos y redes en su entorno'],
            ['id' => 129, 'orden' => 6, 'grupo_pregunta_id' => 105, 'tipo_pregunta_id' => 1,'descripcion' => 'Se le facilita percibir los diferentes aspectos e impactos de un problema'],

            ['id' => 130, 'orden' => 1, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Se mantiene atento e informado de los cambios en su entorno'],
            ['id' => 131, 'orden' => 2, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Su plan de trabajo habitual, contempla un que, un como, cuando, resultados, riesgos, etc.'],
            ['id' => 132, 'orden' => 3, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Sus expectativas se ven colmadas al cumplir sus objetivos.'],
            ['id' => 133, 'orden' => 4, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Tiene la capacidad de enfrentar variados e inusuales problemas al mismo tiempo.'],
            ['id' => 134, 'orden' => 5, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Transmite al equipo de trabajo constantemente los objetivos y logra que los alcancen.'],
            ['id' => 135, 'orden' => 6, 'grupo_pregunta_id' => 106, 'tipo_pregunta_id' => 1,'descripcion' => 'Visualiza más oportunidades que amenazas.4']
        ]);

        DB::table('opcions')->insert([
            ['id' => 1001, 'pregunta_id' => 101, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1002, 'pregunta_id' => 101, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1003, 'pregunta_id' => 101, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1004, 'pregunta_id' => 101, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1005, 'pregunta_id' => 101, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1006, 'pregunta_id' => 102, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1007, 'pregunta_id' => 102, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1008, 'pregunta_id' => 102, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1009, 'pregunta_id' => 102, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1010, 'pregunta_id' => 102, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1011, 'pregunta_id' => 103, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1012, 'pregunta_id' => 103, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1013, 'pregunta_id' => 103, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1014, 'pregunta_id' => 103, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1015, 'pregunta_id' => 103, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1016, 'pregunta_id' => 104, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1017, 'pregunta_id' => 104, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1018, 'pregunta_id' => 104, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1019, 'pregunta_id' => 104, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1020, 'pregunta_id' => 104, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1021, 'pregunta_id' => 105, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1022, 'pregunta_id' => 105, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1023, 'pregunta_id' => 105, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1024, 'pregunta_id' => 105, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1025, 'pregunta_id' => 105, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1026, 'pregunta_id' => 106, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1027, 'pregunta_id' => 106, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1028, 'pregunta_id' => 106, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1029, 'pregunta_id' => 106, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1030, 'pregunta_id' => 106, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1031, 'pregunta_id' => 107, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1032, 'pregunta_id' => 107, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1033, 'pregunta_id' => 107, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1034, 'pregunta_id' => 107, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1035, 'pregunta_id' => 107, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1036, 'pregunta_id' => 108, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1037, 'pregunta_id' => 108, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1038, 'pregunta_id' => 108, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1039, 'pregunta_id' => 108, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1040, 'pregunta_id' => 108, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1041, 'pregunta_id' => 109, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1042, 'pregunta_id' => 109, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1043, 'pregunta_id' => 109, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1044, 'pregunta_id' => 109, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1045, 'pregunta_id' => 109, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1046, 'pregunta_id' => 110, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1047, 'pregunta_id' => 110, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1048, 'pregunta_id' => 110, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1049, 'pregunta_id' => 110, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1050, 'pregunta_id' => 110, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1051, 'pregunta_id' => 111, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1052, 'pregunta_id' => 111, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1053, 'pregunta_id' => 111, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1054, 'pregunta_id' => 111, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1055, 'pregunta_id' => 111, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1056, 'pregunta_id' => 112, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1057, 'pregunta_id' => 112, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1058, 'pregunta_id' => 112, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1059, 'pregunta_id' => 112, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1060, 'pregunta_id' => 112, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1061, 'pregunta_id' => 113, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1062, 'pregunta_id' => 113, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1063, 'pregunta_id' => 113, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1064, 'pregunta_id' => 113, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1065, 'pregunta_id' => 113, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1066, 'pregunta_id' => 114, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1067, 'pregunta_id' => 114, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1068, 'pregunta_id' => 114, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1069, 'pregunta_id' => 114, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1070, 'pregunta_id' => 114, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1071, 'pregunta_id' => 115, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1072, 'pregunta_id' => 115, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1073, 'pregunta_id' => 115, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1074, 'pregunta_id' => 115, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1075, 'pregunta_id' => 115, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1076, 'pregunta_id' => 116, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1077, 'pregunta_id' => 116, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1078, 'pregunta_id' => 116, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1079, 'pregunta_id' => 116, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1080, 'pregunta_id' => 116, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1081, 'pregunta_id' => 117, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1082, 'pregunta_id' => 117, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1083, 'pregunta_id' => 117, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1084, 'pregunta_id' => 117, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1085, 'pregunta_id' => 117, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1086, 'pregunta_id' => 118, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1087, 'pregunta_id' => 118, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1088, 'pregunta_id' => 118, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1089, 'pregunta_id' => 118, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1090, 'pregunta_id' => 118, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1091, 'pregunta_id' => 119, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1092, 'pregunta_id' => 119, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1093, 'pregunta_id' => 119, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1094, 'pregunta_id' => 119, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1095, 'pregunta_id' => 119, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1096, 'pregunta_id' => 120, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1097, 'pregunta_id' => 120, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1098, 'pregunta_id' => 120, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1099, 'pregunta_id' => 120, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1100, 'pregunta_id' => 120, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1101, 'pregunta_id' => 121, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1102, 'pregunta_id' => 121, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1103, 'pregunta_id' => 121, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1104, 'pregunta_id' => 121, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1105, 'pregunta_id' => 121, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1106, 'pregunta_id' => 122, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1107, 'pregunta_id' => 122, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1108, 'pregunta_id' => 122, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1109, 'pregunta_id' => 122, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1110, 'pregunta_id' => 122, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1111, 'pregunta_id' => 123, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1112, 'pregunta_id' => 123, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1113, 'pregunta_id' => 123, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1114, 'pregunta_id' => 123, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1115, 'pregunta_id' => 123, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1116, 'pregunta_id' => 124, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1117, 'pregunta_id' => 124, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1118, 'pregunta_id' => 124, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1119, 'pregunta_id' => 124, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1120, 'pregunta_id' => 124, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1121, 'pregunta_id' => 125, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1122, 'pregunta_id' => 125, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1123, 'pregunta_id' => 125, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1124, 'pregunta_id' => 125, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1125, 'pregunta_id' => 125, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1126, 'pregunta_id' => 126, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1127, 'pregunta_id' => 126, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1128, 'pregunta_id' => 126, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1129, 'pregunta_id' => 126, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1130, 'pregunta_id' => 126, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1131, 'pregunta_id' => 127, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1132, 'pregunta_id' => 127, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1133, 'pregunta_id' => 127, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1134, 'pregunta_id' => 127, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1135, 'pregunta_id' => 127, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1136, 'pregunta_id' => 128, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1137, 'pregunta_id' => 128, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1138, 'pregunta_id' => 128, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1139, 'pregunta_id' => 128, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1140, 'pregunta_id' => 128, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1141, 'pregunta_id' => 129, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1142, 'pregunta_id' => 129, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1143, 'pregunta_id' => 129, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1144, 'pregunta_id' => 129, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1145, 'pregunta_id' => 129, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1146, 'pregunta_id' => 130, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1147, 'pregunta_id' => 130, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1148, 'pregunta_id' => 130, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1149, 'pregunta_id' => 130, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1150, 'pregunta_id' => 130, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1151, 'pregunta_id' => 131, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1152, 'pregunta_id' => 131, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1153, 'pregunta_id' => 131, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1154, 'pregunta_id' => 131, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1155, 'pregunta_id' => 131, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1156, 'pregunta_id' => 132, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1157, 'pregunta_id' => 132, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1158, 'pregunta_id' => 132, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1159, 'pregunta_id' => 132, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1160, 'pregunta_id' => 132, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1161, 'pregunta_id' => 133, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1162, 'pregunta_id' => 133, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1163, 'pregunta_id' => 133, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1164, 'pregunta_id' => 133, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1165, 'pregunta_id' => 133, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1166, 'pregunta_id' => 134, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1167, 'pregunta_id' => 134, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1168, 'pregunta_id' => 134, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1169, 'pregunta_id' => 134, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1170, 'pregunta_id' => 134, 'orden' => 5, 'nombre' => 'Nunca'],

            ['id' => 1171, 'pregunta_id' => 135, 'orden' => 1, 'nombre' => 'Siempre'],
            ['id' => 1172, 'pregunta_id' => 135, 'orden' => 2, 'nombre' => 'Casi siempre'],
            ['id' => 1173, 'pregunta_id' => 135, 'orden' => 3, 'nombre' => 'Alguna vez'],
            ['id' => 1174, 'pregunta_id' => 135, 'orden' => 4, 'nombre' => 'Rara vez'],
            ['id' => 1175, 'pregunta_id' => 135, 'orden' => 5, 'nombre' => 'Nunca'],
        ]);

    }
}
