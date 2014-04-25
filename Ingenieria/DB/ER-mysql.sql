CREATE TABLE `antecedentes_deportivos` (
`idAntecedentes_deportivos` int NOT NULL AUTO_INCREMENT,
`frecuencia_practica` varchar(20) NULL DEFAULT NULL,
`lateralidad` varchar(15) NOT NULL,
`tipo_practica` varchar(15) NULL DEFAULT NULL,
`practica_si_no` varchar(10) NOT NULL,
`posicion_juego` varchar(20) NULL DEFAULT NULL,
`observaciones` varchar(100) NULL DEFAULT NULL,
`idDeporte` int NULL DEFAULT NULL,
`idEvaluacion_medica` int NOT NULL,
PRIMARY KEY (`idAntecedentes_deportivos`) ,
INDEX `RefDeporte19_idx` (`idDeporte`),
INDEX `RefEvaluacion_medica57_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `antecedentes_ginecobstetricos` (
`idAntecedentes_ginecobstetricos` int NOT NULL AUTO_INCREMENT,
`ciclo` varchar(20) NULL DEFAULT NULL,
`menarquia` int NULL DEFAULT NULL,
`pf` varchar(20) NULL DEFAULT NULL,
`otros` varchar(45) NULL DEFAULT NULL,
`idEvaluacion_medica` int NOT NULL,
`aplica_si_no` varchar(5) NOT NULL,
PRIMARY KEY (`idAntecedentes_ginecobstetricos`) ,
INDEX `RefEvaluacion_medica58_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `antecedentes_patologicos` (
`idAntecedentes_patologicos` int NOT NULL AUTO_INCREMENT,
`habito` varchar(10) NOT NULL,
`medicacion_actual` varchar(60) NULL DEFAULT NULL,
`antecedentes_importantes` varchar(100) NULL DEFAULT NULL,
`idEvaluacion_medica` int NOT NULL,
PRIMARY KEY (`idAntecedentes_patologicos`) ,
INDEX `RefEvaluacion_medica59_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `antecedentes_patologicos_has_enfermedad` (
`Antecedentes_patologicos_idAntecedentes_patologicos` int NOT NULL,
`Enfermedad_idEnfermedad` int NOT NULL,
PRIMARY KEY (`Antecedentes_patologicos_idAntecedentes_patologicos`, `Enfermedad_idEnfermedad`) ,
INDEX `fk_Antecedentes_patologicos_has_Enfermedad_Enfermedad1_idx` (`Enfermedad_idEnfermedad`),
INDEX `fk_Antecedentes_patologicos_has_Enfermedad_Antecedentes_pat_idx` (`Antecedentes_patologicos_idAntecedentes_patologicos`)
);

CREATE TABLE `antecedentes_trauma_lesion` (
`idAntecedentes_trauma_lesion` int NOT NULL AUTO_INCREMENT,
`otros` varchar(45) NULL DEFAULT NULL,
`idEvaluacion_medica` int NOT NULL,
`contusion` varchar(100) NULL DEFAULT NULL,
`distension` varchar(100) NULL DEFAULT NULL,
`esguince` varchar(100) NULL DEFAULT NULL,
`luxacion` varchar(100) NULL DEFAULT NULL,
`fractura` varchar(100) NULL DEFAULT NULL,
`quirurgico` varchar(100) NULL DEFAULT NULL,
PRIMARY KEY (`idAntecedentes_trauma_lesion`) ,
INDEX `RefEvaluacion_medica62_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `antecedentes_usuario` (
`idAntecedentes_usuario` int NOT NULL AUTO_INCREMENT,
`postura` varchar(45) NOT NULL,
`estabilidad_core` varchar(20) NOT NULL,
`idValoracion_funcional` int NOT NULL,
PRIMARY KEY (`idAntecedentes_usuario`) ,
INDEX `fk_Antecedentes_usuario_Valoracion_funcional1_idx` (`idValoracion_funcional`)
);

CREATE TABLE `caracteristicas_fisicas` (
`idCaracteristicas_fisicas` int NOT NULL AUTO_INCREMENT,
`cabeza` varchar(20) NOT NULL,
`ojos` varchar(20) NOT NULL,
`orl` varchar(20) NOT NULL,
`cuello` varchar(20) NOT NULL,
`cp` varchar(20) NOT NULL,
`abdomen` varchar(20) NOT NULL,
`osteoarticular` varchar(20) NOT NULL,
`muscular` varchar(20) NOT NULL,
`piel_faneras` varchar(120) NOT NULL,
`postura` varchar(20) NOT NULL,
PRIMARY KEY (`idCaracteristicas_fisicas`) 
);

CREATE TABLE `cargo` (
`idCargo` int NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
PRIMARY KEY (`idCargo`) 
);

CREATE TABLE `cita` (
`idCita` int NOT NULL AUTO_INCREMENT,
`tipo` varchar(20) NOT NULL,
`fecha` datetime NOT NULL,
`motivo` varchar(20) NOT NULL,
`Empleado_idEmpleado` int NOT NULL,
`estado` varchar(15) NOT NULL,
`idVUsuario` int NOT NULL,
PRIMARY KEY (`idCita`) ,
INDEX `fk_Cita_Empleado1_idx` (`Empleado_idEmpleado`)
);

CREATE TABLE `clases_grupales` (
`idClases_grupales` int NOT NULL AUTO_INCREMENT,
`aerobicos_instructor` char(2) NOT NULL,
`aerobicos_basico` char(2) NOT NULL,
`localidad_abd` char(2) NOT NULL,
`mancuerna` char(2) NOT NULL,
`fit_cross` char(2) NOT NULL,
`flexibilidad` char(2) NOT NULL,
`step` char(2) NOT NULL,
`gap` char(2) NOT NULL,
`danzika` char(2) NOT NULL,
`master_class` char(2) NOT NULL,
`ciclismo_bajo_techo` char(2) NOT NULL,
`pilates` char(2) NOT NULL,
`idPlan_entrenamiento` int NOT NULL,
PRIMARY KEY (`idClases_grupales`) 
);

CREATE TABLE `datos_extra_usuario` (
`idDatos_extra_usuario` int NOT NULL AUTO_INCREMENT,
`tipo_aporte` varchar(15) NOT NULL,
`idEPS` int NOT NULL,
`estado_civil` varchar(15) NOT NULL,
`lugar_nacimiento` varchar(20) NOT NULL,
`acompaniante` varchar(45) NULL DEFAULT NULL,
`ocupacion` varchar(45) NULL DEFAULT NULL,
`idVUsuario` int NOT NULL,
`parentezco_acompaniante` varchar(45) NULL DEFAULT NULL,
PRIMARY KEY (`idDatos_extra_usuario`) ,
INDEX `RefEPS8_idx` (`idEPS`)
);

CREATE TABLE `deporte` (
`idDeporte` int NOT NULL AUTO_INCREMENT,
`nombre` varchar(20) NOT NULL,
PRIMARY KEY (`idDeporte`) 
);

CREATE TABLE `ejercicio` (
`idEjercicio` int NOT NULL AUTO_INCREMENT,
`seccion_trabajo` varchar(35) NOT NULL,
`descripcion` varchar(100) NULL,
PRIMARY KEY (`idEjercicio`) 
);

CREATE TABLE `empleado` (
`idEmpleado` int NOT NULL AUTO_INCREMENT,
`nombres` varchar(45) NOT NULL,
`apellidos` varchar(45) NOT NULL,
`idCargo` int NOT NULL,
`Profesion_idProfesion` int NOT NULL,
`login` varchar(45) NOT NULL,
`pass` varchar(45) NOT NULL,
PRIMARY KEY (`idEmpleado`) ,
INDEX `RefCargo74_idx` (`idCargo`),
INDEX `fk_Empleado_Profesion1_idx` (`Profesion_idProfesion`)
);

CREATE TABLE `enfermedad` (
`idEnfermedad` int NOT NULL AUTO_INCREMENT,
`descripcion` varchar(65) NOT NULL,
`tipo` varchar(25) NULL,
PRIMARY KEY (`idEnfermedad`) 
);

CREATE TABLE `eps` (
`idEPS` int NOT NULL AUTO_INCREMENT,
`nombre` varchar(20) NOT NULL,
PRIMARY KEY (`idEPS`) 
);

CREATE TABLE `evaluacion_medica` (
`idEvaluacion_medica` int NOT NULL AUTO_INCREMENT,
`enfermedad_actual` varchar(45) NOT NULL,
`fecha_hora` datetime NOT NULL,
`idHistoria_GYM` int NOT NULL,
PRIMARY KEY (`idEvaluacion_medica`) ,
INDEX `RefHistoria_GYM71_idx` (`idHistoria_GYM`)
);

CREATE TABLE `examen` (
`idExamen` int NOT NULL AUTO_INCREMENT,
`descripcion` varchar(100) NOT NULL,
`resultado` varchar(100) NULL DEFAULT NULL,
`fecha_realizacion` date NOT NULL,
`idEvaluacion_medica` int NULL,
`fecha_expedicion` date NULL,
PRIMARY KEY (`idExamen`) ,
INDEX `fk_Examen_Impresion_diagnostica1_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `examen_fisico` (
`idExamen_fisico` int NOT NULL AUTO_INCREMENT,
`observaciones` varchar(100) NULL DEFAULT NULL,
`estado_general` varchar(10) NOT NULL,
`conciente` varchar(5) NOT NULL,
`alerta` varchar(5) NOT NULL,
`hidratado` varchar(5) NULL DEFAULT NULL,
`idMedidas_fisicas` int NOT NULL,
`idCaracteristicas_fisicas` int NOT NULL,
`idEvaluacion_medica` int NOT NULL,
PRIMARY KEY (`idExamen_fisico`) ,
INDEX `RefMedidas_fisicas40_idx` (`idMedidas_fisicas`),
INDEX `RefCaracteristicas_fisicas41_idx` (`idCaracteristicas_fisicas`),
INDEX `RefEvaluacion_medica61_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `frecuencia_entrenamiento` (
`idFrecuencia_entrenamiento` int NOT NULL AUTO_INCREMENT,
`sesiones_semana` tinyint NOT NULL,
`tiempo_entrenamiento` tinyint NOT NULL,
`idValoracion_funcional` int NOT NULL,
`habitos_nutricionales` varchar(100) NOT NULL,
PRIMARY KEY (`idFrecuencia_entrenamiento`) ,
INDEX `RefValoracion_funcional68_idx` (`idValoracion_funcional`)
);

CREATE TABLE `historia_gym` (
`idHistoria_GYM` int NOT NULL AUTO_INCREMENT,
`estado` varchar(20) NOT NULL,
`idVUsuario` int NOT NULL,
PRIMARY KEY (`idHistoria_GYM`) 
);

CREATE TABLE `impresion_diagnostica` (
`idImpresion_diagnostica` int NOT NULL AUTO_INCREMENT,
`riesgo_cardiovascular` varchar(20) NOT NULL,
`riesgo_osteomuscular` varchar(20) NOT NULL,
`peso` varchar(20) NOT NULL,
`conducta` varchar(100) NOT NULL,
`observaciones` varchar(65) NULL DEFAULT NULL,
`idEvaluacion_medica` int NOT NULL,
`recomendaciones_nutricionales` varchar(100) NOT NULL,
`tipo_actividad_fisica` varchar(15) NOT NULL,
`justificacion_actividad_fisica` varchar(100) NOT NULL,
PRIMARY KEY (`idImpresion_diagnostica`) ,
INDEX `RefEvaluacion_medica63_idx` (`idEvaluacion_medica`)
);

CREATE TABLE `medidas_antropometricas` (
`idMedidas_antropometricas` int NOT NULL AUTO_INCREMENT,
`porc_entrenamiento1` decimal(8,2) NOT NULL,
`porc_entrenamiento2` decimal(8,2) NOT NULL,
`frecuencia_cardiaca_reposo` decimal(8,2) NOT NULL,
`frecuencia_cardiaca_maxima` decimal(8,2) NOT NULL,
`talla` decimal(8,2) NOT NULL,
`peso_actual` decimal(8,2) NOT NULL,
`peso_saludable` decimal(8,2) NOT NULL,
`imc` decimal(8,2) NOT NULL,
`idValoracion_funcional` int NOT NULL,
`valor_porc_entrenamiento1` decimal(8,2) NOT NULL,
`valor_porc_entrenamiento2` decimal(8,2) NOT NULL,
PRIMARY KEY (`idMedidas_antropometricas`) ,
INDEX `RefValoracion_funcional64_idx` (`idValoracion_funcional`)
);

CREATE TABLE `medidas_fisicas` (
`idMedidas_fisicas` int NOT NULL AUTO_INCREMENT,
`ta` decimal(8,2) NOT NULL,
`fc` decimal(8,2) NOT NULL,
`fr` decimal(8,2) NOT NULL,
`peso` decimal(8,2) NOT NULL,
`talla` decimal(8,2) NOT NULL,
`imc` decimal(8,2) NOT NULL,
`peso_ideal` decimal(8,2) NOT NULL,
`gasto_basal_energia` decimal(8,2) NOT NULL,
PRIMARY KEY (`idMedidas_fisicas`) 
);

CREATE TABLE `perimetro` (
`idPerimetro` int NOT NULL AUTO_INCREMENT,
`triceps` decimal(8,2) NOT NULL,
`cintura` decimal(8,2) NOT NULL,
`pectoral` decimal(8,2) NOT NULL,
`abdominal` decimal(8,2) NOT NULL,
`cadera` decimal(8,2) NOT NULL,
`muslo` decimal(8,2) NOT NULL,
`pantorrilla` decimal(8,2) NOT NULL,
`idValoracion_funcional` int NOT NULL,
PRIMARY KEY (`idPerimetro`) ,
INDEX `RefValoracion_funcional66_idx` (`idValoracion_funcional`)
);

CREATE TABLE `plan_entrenamiento` (
`idPlan_entrenamiento` int NOT NULL AUTO_INCREMENT,
`fecha_creacion` date NOT NULL,
`objetivo` varchar(100) NOT NULL,
`tipo_trabajo` varchar(45) NOT NULL,
`saludable` varchar(60) NULL,
`recomendaciones` text NOT NULL,
`idValoracion_funcional` int NOT NULL,
`idEmpleado` int NULL,
PRIMARY KEY (`idPlan_entrenamiento`) 
);

CREATE TABLE `pliegue` (
`idPliegues` int NOT NULL AUTO_INCREMENT,
`triceps` decimal(8,2) NOT NULL,
`sub_escapular` decimal(8,2) NOT NULL,
`suprailiaco` decimal(8,2) NOT NULL,
`abdominal` decimal(8,2) NOT NULL,
`muslo` decimal(8,2) NOT NULL,
`pantorrilla` decimal(8,2) NOT NULL,
`porc_grasa` decimal(8,2) NOT NULL,
`idValoracion_funcional` int NOT NULL,
PRIMARY KEY (`idPliegues`) ,
INDEX `RefValoracion_funcional65_idx` (`idValoracion_funcional`)
);

CREATE TABLE `profesion` (
`idProfesion` int NOT NULL AUTO_INCREMENT,
`nombre` varchar(50) NOT NULL,
PRIMARY KEY (`idProfesion`) 
);

CREATE TABLE `programa_ejercicios` (
`idPrograma_ejercicios` int NOT NULL AUTO_INCREMENT,
`fecha_realizacion` date NOT NULL,
`observaciones` text NOT NULL,
`idPlan_entrenamiento` int NOT NULL,
PRIMARY KEY (`idPrograma_ejercicios`) 
);

CREATE TABLE `rutina` (
`idRutina` int NOT NULL,
`Programa_ejercicios_idPrograma_ejercicios` int NOT NULL,
`Ejercicio_idEjercicios` int NOT NULL,
`dia` varchar(20) NOT NULL,
`series` int NOT NULL,
`repeticiones` int NOT NULL,
PRIMARY KEY (`idRutina`) 
);

CREATE TABLE `test_funcional` (
`idTest_funcional` int NOT NULL AUTO_INCREMENT,
`resistencia_cardiorespiratoria` decimal(8,2) NOT NULL,
`fuerza_abdominal` varchar(15) NOT NULL,
`resistencia_flexion_brazo` varchar(15) NOT NULL,
`resistencia_brazo_mancuerna` decimal(8,2) NOT NULL,
`resistencia_fuerza_sentadilla` decimal(8,2) NOT NULL,
`fuerza_pierna_100` decimal(8,2) NOT NULL,
`flexibilidad` int NOT NULL,
`idValoracion_funcional` int NOT NULL,
PRIMARY KEY (`idTest_funcional`) ,
INDEX `RefValoracion_funcional67_idx` (`idValoracion_funcional`)
);

CREATE TABLE `trabajo_cardiovascular` (
`idTrabajo_cardiovascular` int NOT NULL AUTO_INCREMENT,
`continuo` int NOT NULL,
`intervalo` int NOT NULL,
`circuito_estaciones` varchar(100) NULL,
`categoria` char(15) NOT NULL,
`idPlan_entrenamiento` int NOT NULL,
PRIMARY KEY (`idTrabajo_cardiovascular`) 
);

CREATE TABLE `trabajo_estiramiento` (
`idTrabajo_estiramiento` int NOT NULL AUTO_INCREMENT,
`nivel` char(15) NOT NULL,
`retracciones_musculares` varchar(65) NULL,
`idPlan_entrenamiento` int NOT NULL,
`series` int NOT NULL,
`segundos` int NOT NULL,
PRIMARY KEY (`idTrabajo_estiramiento`) 
);

CREATE TABLE `valoracion_funcional` (
`idValoracion_funcional` int NOT NULL AUTO_INCREMENT,
`objetivo_ejercicio` varchar(45) NOT NULL,
`observaciones` text NULL,
`fecha_hora` datetime NOT NULL,
`programa_entrenamiento` varchar(50) NOT NULL,
`idHistoria_GYM` int NOT NULL,
PRIMARY KEY (`idValoracion_funcional`) ,
INDEX `RefHistoria_GYM70_idx` (`idHistoria_GYM`)
);


ALTER TABLE `antecedentes_deportivos` ADD CONSTRAINT `RefDeporte19` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`);
ALTER TABLE `antecedentes_deportivos` ADD CONSTRAINT `RefEvaluacion_medica57` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `antecedentes_ginecobstetricos` ADD CONSTRAINT `RefEvaluacion_medica58` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `antecedentes_patologicos` ADD CONSTRAINT `RefEvaluacion_medica59` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `antecedentes_patologicos_has_enfermedad` ADD CONSTRAINT `fk_Antecedentes_patologicos_has_Enfermedad_Antecedentes_patol1` FOREIGN KEY (`Antecedentes_patologicos_idAntecedentes_patologicos`) REFERENCES `antecedentes_patologicos` (`idAntecedentes_patologicos`);
ALTER TABLE `antecedentes_patologicos_has_enfermedad` ADD CONSTRAINT `fk_Antecedentes_patologicos_has_Enfermedad_Enfermedad1` FOREIGN KEY (`Enfermedad_idEnfermedad`) REFERENCES `enfermedad` (`idEnfermedad`);
ALTER TABLE `antecedentes_trauma_lesion` ADD CONSTRAINT `RefEvaluacion_medica62` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `antecedentes_usuario` ADD CONSTRAINT `fk_Antecedentes_usuario_Valoracion_funcional1` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `cita` ADD CONSTRAINT `fk_Cita_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`);
ALTER TABLE `clases_grupales` ADD CONSTRAINT `fk_clases_grupales_plan_entrenamiento_2` FOREIGN KEY (`idPlan_entrenamiento`) REFERENCES `plan_entrenamiento` (`idPlan_entrenamiento`);
ALTER TABLE `datos_extra_usuario` ADD CONSTRAINT `RefEPS80` FOREIGN KEY (`idEPS`) REFERENCES `eps` (`idEPS`);
ALTER TABLE `empleado` ADD CONSTRAINT `fk_Empleado_Profesion1` FOREIGN KEY (`Profesion_idProfesion`) REFERENCES `profesion` (`idProfesion`);
ALTER TABLE `empleado` ADD CONSTRAINT `RefCargo74` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`);
ALTER TABLE `evaluacion_medica` ADD CONSTRAINT `RefHistoria_GYM71` FOREIGN KEY (`idHistoria_GYM`) REFERENCES `historia_gym` (`idHistoria_GYM`);
ALTER TABLE `examen` ADD CONSTRAINT `fk_examen_evaluacion_medica_1` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `examen_fisico` ADD CONSTRAINT `RefCaracteristicas_fisicas41` FOREIGN KEY (`idCaracteristicas_fisicas`) REFERENCES `caracteristicas_fisicas` (`idCaracteristicas_fisicas`);
ALTER TABLE `examen_fisico` ADD CONSTRAINT `RefEvaluacion_medica61` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `examen_fisico` ADD CONSTRAINT `RefMedidas_fisicas40` FOREIGN KEY (`idMedidas_fisicas`) REFERENCES `medidas_fisicas` (`idMedidas_fisicas`);
ALTER TABLE `frecuencia_entrenamiento` ADD CONSTRAINT `RefValoracion_funcional68` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `impresion_diagnostica` ADD CONSTRAINT `RefEvaluacion_medica63` FOREIGN KEY (`idEvaluacion_medica`) REFERENCES `evaluacion_medica` (`idEvaluacion_medica`);
ALTER TABLE `medidas_antropometricas` ADD CONSTRAINT `RefValoracion_funcional64` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `perimetro` ADD CONSTRAINT `RefValoracion_funcional66` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `plan_entrenamiento` ADD CONSTRAINT `fk_plan_entrenamiento_valoracion_funcional_1` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `pliegue` ADD CONSTRAINT `RefValoracion_funcional65` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `programa_ejercicios` ADD CONSTRAINT `fk_programa_ejercicios_plan_entrenamiento_2` FOREIGN KEY (`idPlan_entrenamiento`) REFERENCES `plan_entrenamiento` (`idPlan_entrenamiento`);
ALTER TABLE `rutina` ADD CONSTRAINT `fk_programa_ejercicios_has_enfermedad_ejercicio_1` FOREIGN KEY (`Ejercicio_idEjercicios`) REFERENCES `ejercicio` (`idEjercicio`);
ALTER TABLE `rutina` ADD CONSTRAINT `fk_programa_ejercicios_has_enfermedad_programa_ejercicios_1` FOREIGN KEY (`Programa_ejercicios_idPrograma_ejercicios`) REFERENCES `programa_ejercicios` (`idPrograma_ejercicios`);
ALTER TABLE `test_funcional` ADD CONSTRAINT `RefValoracion_funcional67` FOREIGN KEY (`idValoracion_funcional`) REFERENCES `valoracion_funcional` (`idValoracion_funcional`);
ALTER TABLE `trabajo_cardiovascular` ADD CONSTRAINT `fk_trabajo_cardiovascular_plan_entrenamiento_1` FOREIGN KEY (`idPlan_entrenamiento`) REFERENCES `plan_entrenamiento` (`idPlan_entrenamiento`);
ALTER TABLE `trabajo_estiramiento` ADD CONSTRAINT `fk_trabajo_estiramiento_plan_entrenamiento_1` FOREIGN KEY (`idPlan_entrenamiento`) REFERENCES `plan_entrenamiento` (`idPlan_entrenamiento`);
ALTER TABLE `valoracion_funcional` ADD CONSTRAINT `RefHistoria_GYM70` FOREIGN KEY (`idHistoria_GYM`) REFERENCES `historia_gym` (`idHistoria_GYM`);
ALTER TABLE `plan_entrenamiento` ADD CONSTRAINT `fk_plan_entrenamiento_empleado_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

