<?php

/**
 *  @author: rocker
 *  @summary: Generador del archivo PDF
 */

$pdf = new PDF();
$pdf->AddPage();

$pdf->title( 'VALORACION FUNCIONAL' );

/****************** Datos generales *******************************************************/
$pdf->subtitle( 10, 50, 'Paciente: ' . strtoupper( $usuario ) );

$str = explode(' ', $model->fecha_hora );
$pdf->printKeyValue( 1, 'Fecha realizacion valoracion', $str[0] );
$pdf->printKeyValue( 2, 'Codigo historia CAF', $model->idHistoria_GYM );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Objetivo ejercicio', $model->objetivo_ejercicio );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Programa entrenamiento', $model->programa_entrenamiento );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Observaciones', $model->observaciones, 'multi' );
/*****************************************************************************************/


/************************ Medidas antropometricas ***********************************************/
$pdf->subtitle( 10, 100, 'Medidas antropometricas' );

$pdf->printKeyValue( 1, 'Peso actual (kg)', $model->medidasAntropometricases[0]->peso_actual );
$pdf->printKeyValue( 2, 'Talla', $model->medidasAntropometricases[0]->talla );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Peso saludable (kg)', $model->medidasAntropometricases[0]->peso_saludable );
$pdf->printKeyValue( 2, 'IMC', $model->medidasAntropometricases[0]->imc );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Frecuencia cardicaca reposo', $model->medidasAntropometricases[0]->frecuencia_cardiaca_reposo );
$pdf->printKeyValue( 2, 'Frecuencia cardicaca maxima', $model->medidasAntropometricases[0]->frecuencia_cardiaca_maxima );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Porc. entrenamiento 1', $model->medidasAntropometricases[0]->porc_entrenamiento1 );
$pdf->printKeyValue( 2, 'Valor porc. entrenamiento 1', $model->medidasAntropometricases[0]->valor_porc_entrenamiento1 );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Porc. entrenamiento 2', $model->medidasAntropometricases[0]->porc_entrenamiento2 );
$pdf->printKeyValue( 2, 'Valor porc. entrenamiento 2', $model->medidasAntropometricases[0]->valor_porc_entrenamiento2 );

/*****************************************************************************************/



/************************ Pliegues **************************************************************/
$pdf->subtitle( 10, 140, 'Pliegues (medidas en cm)' );

$pdf->printKeyValue( 1, 'Triceps', $model->pliegues[0]->triceps );
$pdf->printKeyValue( 2, 'Sub Escapular', $model->pliegues[0]->sub_escapular );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Suprailiaco', $model->pliegues[0]->suprailiaco );
$pdf->printKeyValue( 2, 'Abdominal', $model->pliegues[0]->abdominal );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Muslo', $model->pliegues[0]->muslo );
$pdf->printKeyValue( 2, 'Pantorrilla', $model->pliegues[0]->pantorrilla );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Porcentaje grasa', $model->pliegues[0]->porc_grasa );
/*****************************************************************************************/


/************************ Perimetros **************************************************************/
$pdf->subtitle( 10, 175, 'Perimetros (medidas en cm)' );

$pdf->printKeyValue( 1, 'Triceps', $model->perimetros[0]->triceps );
$pdf->printKeyValue( 2, 'Cintura', $model->perimetros[0]->cintura );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Pectoral', $model->perimetros[0]->pectoral );
$pdf->printKeyValue( 2, 'Abdominal', $model->perimetros[0]->abdominal );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Cadera', $model->perimetros[0]->cadera );
$pdf->printKeyValue( 2, 'Muslo', $model->perimetros[0]->muslo );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Pantorrilla', $model->perimetros[0]->pantorrilla );
/*****************************************************************************************/


/************************ Test funcionales **************************************************************/
$pdf->subtitle( 10, 210, 'Test funcionales' );

$pdf->printKeyValue( 1, 'Resistencia cardiorespiratoria', $model->testFuncionals[0]->resistencia_cardiorespiratoria );
$pdf->printKeyValue( 2, 'Fuerza abdominal', $model->testFuncionals[0]->fuerza_abdominal );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Resistencia flexion brazo', $model->testFuncionals[0]->resistencia_flexion_brazo );
$pdf->printKeyValue( 2, 'Resistencia brazo mancuerna', $model->testFuncionals[0]->resistencia_brazo_mancuerna );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Resistencia fuerza sentadilla', $model->testFuncionals[0]->resistencia_fuerza_sentadilla );
$pdf->printKeyValue( 2, 'Fuerza pierna', $model->testFuncionals[0]->fuerza_pierna_100 );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Flexibilidad', $model->testFuncionals[0]->flexibilidad );
/*****************************************************************************************/


/************************ Frecuencia entrenamiento - Antecedentes usuario ********************/
$pdf->subtitle( 10, 250, 'Frecuencia entrenamiento y antecedentes del usuario' );

$pdf->printKeyValue( 1, 'Sesiones por semana', $model->frecuenciaEntrenamientos[0]->sesiones_semana );
$pdf->printKeyValue( 2, 'Min. entrenamiento', $model->frecuenciaEntrenamientos[0]->tiempo_entrenamiento );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Habitos nutricionales', $model->frecuenciaEntrenamientos[0]->habitos_nutricionales );
$pdf->printKeyValue( 2, 'Postura', $model->antecedentesUsuarios[0]->postura );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Estabilidad CORE', $model->antecedentesUsuarios[0]->estabilidad_core );
/*****************************************************************************************/

$pdf->Output();

?>