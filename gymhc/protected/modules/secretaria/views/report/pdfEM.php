<?php

/**
 *  @author: rocker
 *  @summary: Generador del archivo PDF
 */

$pdf = new PDF();
$pdf->AddPage();

$pdf->title( 'EVALUACION MEDICA' );

/************************* Datos generales *******************************************************/
$pdf->subtitle( 10, 50, 'Paciente: ' . strtoupper( $usuario ));

$str = explode(' ', $model->fecha_hora );
$pdf->printKeyValue( 1, 'Fecha realizacion evaluacion', $str[0] );
$pdf->printKeyValue( 2, 'Codigo historia CAF', $model->idHistoria_GYM );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Enfermedad actual', $model->enfermedad_actual );
/*****************************************************************************************/


/****************************** Impresion diagnostica ***********************************************/
$pdf->subtitle( 10, 75, 'Impresion diagnostica' );

$pdf->printKeyValue( 1, 'Peso', $model->impresionDiagnosticas[0]->peso );
$pdf->printKeyValue( 2, 'Riego cardiovascular', $model->impresionDiagnosticas[0]->riesgo_cardiovascular );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Riesgo osteomuscular', $model->impresionDiagnosticas[0]->riesgo_osteomuscular );
$pdf->printKeyValue( 2, 'Tipo actividad fisica', $model->impresionDiagnosticas[0]->tipo_actividad_fisica );

$pdf->ln( 5 );

$pdf->printKeyValue( 1, 'Conducta', $model->impresionDiagnosticas[0]->conducta, 'multi' );


$pdf->ln( 5 );

$pdf->printKeyValue( 1, 'Justificacion actividad fisica', $model->impresionDiagnosticas[0]->justificacion_actividad_fisica, 'multi' );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Recomendacion nutricional', $model->impresionDiagnosticas[0]->recomendaciones_nutricionales, 'multi' );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Observaciones', $model->impresionDiagnosticas[0]->observaciones, 'multi' );
/*****************************************************************************************/

/****************************** Antecedentes patologicos ***********************************************/
$pdf->subtitle( 10, 150, 'Antecedentes patologicos' );

$pdf->printKeyValue( 1, 'Medicacion actual', $model->antecedentesPatologicos[0]->medicacion_actual );
$pdf->printKeyValue( 2, 'Habito', $model->antecedentesPatologicos[0]->habito );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Antecedentes importantes', $model->antecedentesPatologicos[0]->antecedentes_importantes );
/*****************************************************************************************/


/****************************** Examen fisico ***********************************************/
$pdf->subtitle( 10, 170, 'Examen fisico' );

$pdf->printKeyValue( 1, 'Estado general', $model->examenFisicos[0]->estado_general );
$pdf->printKeyValue( 2, 'Conciente', $model->examenFisicos[0]->conciente );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Alerta', $model->examenFisicos[0]->alerta );
$pdf->printKeyValue( 2, 'Hidratado', $model->examenFisicos[0]->hidratado );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'TA', $model->examenFisicos[0]->idMedidasFisicas->ta );
$pdf->printKeyValue( 2, 'FC', $model->examenFisicos[0]->idMedidasFisicas->fc );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'FR', $model->examenFisicos[0]->idMedidasFisicas->fr );
$pdf->printKeyValue( 2, 'Peso', $model->examenFisicos[0]->idMedidasFisicas->peso );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Talla', $model->examenFisicos[0]->idMedidasFisicas->talla );
$pdf->printKeyValue( 2, 'IMC', $model->examenFisicos[0]->idMedidasFisicas->imc );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Peso ideal', $model->examenFisicos[0]->idMedidasFisicas->peso_ideal );
$pdf->printKeyValue( 2, 'Gasto basal energia', $model->examenFisicos[0]->idMedidasFisicas->gasto_basal_energia );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Cabeza', $model->examenFisicos[0]->idCaracteristicasFisicas->cabeza );
$pdf->printKeyValue( 2, 'Ojos', $model->examenFisicos[0]->idCaracteristicasFisicas->ojos );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'ORL', $model->examenFisicos[0]->idCaracteristicasFisicas->orl );
$pdf->printKeyValue( 2, 'Cuello', $model->examenFisicos[0]->idCaracteristicasFisicas->cuello );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'CP', $model->examenFisicos[0]->idCaracteristicasFisicas->cp );
$pdf->printKeyValue( 2, 'Abdomen', $model->examenFisicos[0]->idCaracteristicasFisicas->abdomen );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Osteoarticular', $model->examenFisicos[0]->idCaracteristicasFisicas->osteoarticular );
$pdf->printKeyValue( 2, 'Muscular', $model->examenFisicos[0]->idCaracteristicasFisicas->muscular );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Piel faneras', $model->examenFisicos[0]->idCaracteristicasFisicas->piel_faneras );
$pdf->printKeyValue( 2, 'Postura', $model->examenFisicos[0]->idCaracteristicasFisicas->postura );

$pdf->ln(5);
/*****************************************************************************************/


/****************************** Examen fisico ***********************************************/
$pdf->subtitle( 10, 240, 'Antecedentes deportivos' );

$pdf->printKeyValue( 1, 'Practica deporte', $model->antecedentesDeportivoses[0]->practica_si_no );
$pdf->printKeyValue( 2, 'Frecuencia practica', $model->antecedentesDeportivoses[0]->frecuencia_practica );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Tipo practica', $model->antecedentesDeportivoses[0]->tipo_practica );
$pdf->printKeyValue( 2, 'Lateralidad', $model->antecedentesDeportivoses[0]->lateralidad );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Posicion juego', $model->antecedentesDeportivoses[0]->posicion_juego );
$pdf->printKeyValue( 2, 'Deporte practicado', $model->antecedentesDeportivoses[0]->idDeporte0->nombre );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Observaciones', $model->antecedentesDeportivoses[0]->observaciones );
/*****************************************************************************************/


/****************************** Antecedentes trauma lesion ***********************************************/
$pdf->subtitle( 10, 275, 'Antecedentes de trauma y lesiones' );

$pdf->printKeyValue( 1, 'Constusiones', $model->antecedentesTraumaLesions[0]->contusion );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Distensiones', $model->antecedentesTraumaLesions[0]->distension );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Esguinces', $model->antecedentesTraumaLesions[0]->esguince );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Fracturas', $model->antecedentesTraumaLesions[0]->fractura );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Cirugias', $model->antecedentesTraumaLesions[0]->quirurgico );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Luxaciones', $model->antecedentesTraumaLesions[0]->luxacion );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Otros', $model->antecedentesTraumaLesions[0]->otros );
/*****************************************************************************************/


/****************************** Antecedentes Ginecobstetricos ***********************************************/
$pdf->subtitle( 10, 95, 'Antecedentes Ginecobstetricos' );

$pdf->printKeyValue( 1, 'Aplica', $model->antecedentesGinecobstetricoses[0]->aplica_si_no );
$pdf->printKeyValue( 2, 'Ciclo', $model->antecedentesGinecobstetricoses[0]->ciclo );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Menarquia', $model->antecedentesGinecobstetricoses[0]->menarquia );
$pdf->printKeyValue( 2, 'PF', $model->antecedentesGinecobstetricoses[0]->pf );

$pdf->ln(5);

$pdf->printKeyValue( 1, 'Otros', $model->antecedentesGinecobstetricoses[0]->otros );
/*****************************************************************************************/

$pdf->Output();

?>