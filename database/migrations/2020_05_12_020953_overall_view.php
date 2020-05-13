<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OverallView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        DROP VIEW IF EXISTS vistaGeneral;

        CREATE 
            ALGORITHM = UNDEFINED 
        VIEW `schola`.`vistaGeneral` AS
            SELECT 
                `r`.`idMaestroCurso` AS `idMaestroCurso`,
                `cu`.`nombreCurso` AS `nombreCurso`,
                `cu`.`vigente` AS `vigenciaCurso`,
                `d`.`idMaestro` AS `idMaestro`,
                `d`.`nombre` AS `nombreMaestro`,
                `d`.`paterno` AS `paternoMaestro`,
                `d`.`materno` AS `maternoMaestro`,
                `d`.`matricula` AS `matriculaMaestro`,
                `c`.`gradoAcademico` AS `gradoAcademico`
            FROM
                (((`schola`.`catGradoAcademico` `c`
                JOIN `schola`.`datMaestro` `d` ON ((`c`.`idGradoAca` = `d`.`idGradoAca`)))
                JOIN `schola`.`relMaestroCurso` `r` ON ((`d`.`idMaestro` = `r`.`idMaestro`)))
                JOIN `schola`.`catCursos` `cu` ON ((`r`.`idCurso` = `cu`.`idCurso`)))
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW IF EXISTS vistaGeneral;');
    }
}
