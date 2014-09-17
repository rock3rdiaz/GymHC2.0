CREATE TABLE [antecedentes_deportivos] (

[idAntecedentes_deportivos] int NOT NULL IDENTITY (1,1),

[frecuencia_practica] nvarchar(20) NULL DEFAULT NULL,

[lateralidad] nvarchar(15) NOT NULL,

[tipo_practica] nvarchar(15) NULL DEFAULT NULL,

[practica_si_no] nvarchar(10) NOT NULL,

[posicion_juego] nvarchar(20) NULL DEFAULT NULL,

[observaciones] nvarchar(100) NULL DEFAULT NULL,

[idDeporte] int NULL DEFAULT NULL,

[idEvaluacion_medica] int NOT NULL,

CONSTRAINT [PK__antecede__55CD3E457F60ED59] PRIMARY KEY ([idAntecedentes_deportivos]) 

)

GO



CREATE INDEX [RefDeporte19_idx] ON [antecedentes_deportivos] ([idDeporte]  ASC)

GO

CREATE INDEX [RefEvaluacion_medica57_idx] ON [antecedentes_deportivos] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [antecedentes_ginecobstetricos] (

[idAntecedentes_ginecobstetricos] int NOT NULL IDENTITY (1,1),

[ciclo] nvarchar(20) NULL DEFAULT NULL,

[menarquia] int NULL DEFAULT NULL,

[pf] nvarchar(20) NULL DEFAULT NULL,

[otros] nvarchar(45) NULL DEFAULT NULL,

[idEvaluacion_medica] int NOT NULL,

[aplica_si_no] nvarchar(5) NOT NULL,

CONSTRAINT [PK__antecede__88C63CDD07F6335A] PRIMARY KEY ([idAntecedentes_ginecobstetricos]) 

)

GO



CREATE INDEX [RefEvaluacion_medica58_idx] ON [antecedentes_ginecobstetricos] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [antecedentes_patologicos] (

[idAntecedentes_patologicos] int NOT NULL IDENTITY (1,1),

[habito] nvarchar(10) NOT NULL,

[medicacion_actual] nvarchar(60) NULL DEFAULT NULL,

[antecedentes_importantes] nvarchar(100) NULL DEFAULT NULL,

[idEvaluacion_medica] int NOT NULL,

CONSTRAINT [PK__antecede__276E642E0F975522] PRIMARY KEY ([idAntecedentes_patologicos]) 

)

GO



CREATE INDEX [RefEvaluacion_medica59_idx] ON [antecedentes_patologicos] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [antecedentes_patologicos_has_enfermedad] (

[Antecedentes_patologicos_idAntecedentes_patologicos] int NOT NULL IDENTITY (1,1),

[Enfermedad_idEnfermedad] int NOT NULL,

CONSTRAINT [PK__antecede__9E90EB6A15502E78] PRIMARY KEY ([Antecedentes_patologicos_idAntecedentes_patologicos], [Enfermedad_idEnfermedad]) 

)

GO



CREATE INDEX [fk_Antecedentes_patologicos_has_Enfermedad_Enfermedad1_idx] ON [antecedentes_patologicos_has_enfermedad] ([Enfermedad_idEnfermedad]  ASC)

GO

CREATE INDEX [fk_Antecedentes_patologicos_has_Enfermedad_Antecedentes_pat_idx] ON [antecedentes_patologicos_has_enfermedad] ([Antecedentes_patologicos_idAntecedentes_patologicos]  ASC)

GO



CREATE TABLE [antecedentes_trauma_lesion] (

[idAntecedentes_trauma_lesion] int NOT NULL IDENTITY (1,1),

[otros] nvarchar(45) NULL DEFAULT NULL,

[idEvaluacion_medica] int NOT NULL,

[contusion] nvarchar(100) NULL DEFAULT NULL,

[distension] nvarchar(100) NULL DEFAULT NULL,

[esguince] nvarchar(100) NULL DEFAULT NULL,

[luxacion] nvarchar(100) NULL DEFAULT NULL,

[fractura] nvarchar(100) NULL DEFAULT NULL,

[quirurgico] nvarchar(100) NULL DEFAULT NULL,

CONSTRAINT [PK__antecede__EE31377B1920BF5C] PRIMARY KEY ([idAntecedentes_trauma_lesion]) 

)

GO



CREATE INDEX [RefEvaluacion_medica62_idx] ON [antecedentes_trauma_lesion] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [antecedentes_usuario] (

[idAntecedentes_usuario] int NOT NULL IDENTITY (1,1),

[postura] nvarchar(45) NOT NULL,

[estabilidad_core] nvarchar(20) NOT NULL,

[idValoracion_funcional] int NOT NULL,

CONSTRAINT [PK__antecede__0EF628A1239E4DCF] PRIMARY KEY ([idAntecedentes_usuario]) 

)

GO



CREATE INDEX [fk_Antecedentes_usuario_Valoracion_funcional1_idx] ON [antecedentes_usuario] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [caracteristicas_fisicas] (

[idCaracteristicas_fisicas] int NOT NULL IDENTITY (1,1),

[cabeza] nvarchar(20) NOT NULL,

[ojos] nvarchar(20) NOT NULL,

[orl] nvarchar(20) NOT NULL,

[cuello] nvarchar(20) NOT NULL,

[cp] nvarchar(20) NOT NULL,

[abdomen] nvarchar(20) NOT NULL,

[osteoarticular] nvarchar(20) NOT NULL,

[muscular] nvarchar(20) NOT NULL,

[piel_faneras] nvarchar(120) NOT NULL,

[postura] nvarchar(20) NOT NULL,

CONSTRAINT [PK__caracter__A27D8664276EDEB3] PRIMARY KEY ([idCaracteristicas_fisicas]) 

)

GO



CREATE TABLE [cargo] (

[idCargo] int NOT NULL IDENTITY (1,1),

[nombre] nvarchar(50) NOT NULL,

CONSTRAINT [PK__cargo__3D0E29B82B3F6F97] PRIMARY KEY ([idCargo]) 

)

GO



CREATE TABLE [cita] (

[idCita] int NOT NULL IDENTITY (1,1),

[tipo] nvarchar(20) NOT NULL,

[fecha] datetime2(7) NOT NULL,

[motivo] nvarchar(20) NOT NULL,

[Empleado_idEmpleado] int NOT NULL,

[estado] nvarchar(15) NOT NULL,

[idVUsuario] int NOT NULL,

CONSTRAINT [PK__cita__814F31262F10007B] PRIMARY KEY ([idCita]) 

)

GO



CREATE INDEX [fk_Cita_Empleado1_idx] ON [cita] ([Empleado_idEmpleado]  ASC)

GO



CREATE TABLE [clases_grupales] (

[idClases_grupales] int NOT NULL IDENTITY (1,1),

[aerobicos_instructor] char(2) NOT NULL,

[aerobicos_basico] char(2) NOT NULL,

[localidad_abd] char(2) NOT NULL,

[mancuerna] char(2) NOT NULL,

[fit_cross] char(2) NOT NULL,

[flexibilidad] char(2) NOT NULL,

[step] char(2) NOT NULL,

[gap] char(2) NOT NULL,

[danzika] char(2) NOT NULL,

[master_class] char(2) NOT NULL,

[ciclismo_bajo_techo] char(2) NOT NULL,

[pilates] char(2) NOT NULL,

[idPlan_entrenamiento] int NOT NULL,

CONSTRAINT [PK__clases_g__0BFBC3265629CD9C] PRIMARY KEY ([idClases_grupales]) 

)

GO



CREATE TABLE [datos_extra_usuario] (

[idDatos_extra_usuario] int NOT NULL IDENTITY (1,1),

[tipo_aporte] nvarchar(15) NOT NULL,

[idEPS] int NOT NULL,

[estado_civil] nvarchar(15) NOT NULL,

[lugar_nacimiento] nvarchar(20) NOT NULL,

[acompaniante] nvarchar(45) NULL DEFAULT NULL,

[ocupacion] nvarchar(45) NULL DEFAULT NULL,

[idVUsuario] int NOT NULL,

[parentezco_acompaniante] nvarchar(45) NULL DEFAULT NULL,

CONSTRAINT [PK__datos_ex__5BE704EA32E0915F] PRIMARY KEY ([idDatos_extra_usuario]) 

)

GO



CREATE INDEX [RefEPS8_idx] ON [datos_extra_usuario] ([idEPS]  ASC)

GO



CREATE TABLE [deporte] (

[idDeporte] int NOT NULL IDENTITY (1,1),

[nombre] nvarchar(20) NOT NULL,

CONSTRAINT [PK__deporte__51D36C59398D8EEE] PRIMARY KEY ([idDeporte]) 

)

GO



CREATE TABLE [ejercicio] (

[idEjercicio] int NOT NULL IDENTITY (1,1),

[seccion_trabajo] varchar(35) NOT NULL,

[descripcion] varchar(100) NULL,

CONSTRAINT [PK__ejercici__1FCA8EFF5DCAEF64] PRIMARY KEY ([idEjercicio]) 

)

GO



CREATE TABLE [empleado] (

[idEmpleado] int NOT NULL IDENTITY (1,1),

[nombres] nvarchar(45) NOT NULL,

[apellidos] nvarchar(45) NOT NULL,

[idCargo] int NOT NULL,

[Profesion_idProfesion] int NOT NULL,

[login] nvarchar(45) NOT NULL,

[pass] nvarchar(45) NOT NULL,

CONSTRAINT [PK__empleado__5295297C3D5E1FD2] PRIMARY KEY ([idEmpleado]) 

)

GO



CREATE INDEX [RefCargo74_idx] ON [empleado] ([idCargo]  ASC)

GO

CREATE INDEX [fk_Empleado_Profesion1_idx] ON [empleado] ([Profesion_idProfesion]  ASC)

GO



CREATE TABLE [enfermedad] (

[idEnfermedad] int NOT NULL IDENTITY (1,1),

[descripcion] nvarchar(65) NOT NULL,

[tipo] nvarchar(25) NULL,

CONSTRAINT [PK__enfermed__E8DAA00A412EB0B6] PRIMARY KEY ([idEnfermedad]) 

)

GO



CREATE TABLE [eps] (

[idEPS] int NOT NULL IDENTITY (1,1),

[nombre] nvarchar(20) NOT NULL,

CONSTRAINT [PK__eps__3F08E1EE44FF419A] PRIMARY KEY ([idEPS]) 

)

GO



CREATE TABLE [evaluacion_medica] (

[idEvaluacion_medica] int NOT NULL IDENTITY (1,1),

[enfermedad_actual] nvarchar(45) NOT NULL,

[fecha_hora] datetime2(7) NOT NULL,

[idHistoria_GYM] int NOT NULL,

CONSTRAINT [PK__evaluaci__BD85720048CFD27E] PRIMARY KEY ([idEvaluacion_medica]) 

)

GO



CREATE INDEX [RefHistoria_GYM71_idx] ON [evaluacion_medica] ([idHistoria_GYM]  ASC)

GO



CREATE TABLE [examen] (

[idExamen] int NOT NULL IDENTITY (1,1),

[descripcion] nvarchar(100) NOT NULL,

[resultado] nvarchar(100) NULL DEFAULT NULL,

[fecha_realizacion] date NOT NULL,

[idEvaluacion_medica] int NULL,

[fecha_expedicion] date NULL,

CONSTRAINT [PK__examen__E569399B4CA06362] PRIMARY KEY ([idExamen]) 

)

GO



CREATE INDEX [fk_Examen_Impresion_diagnostica1_idx] ON [examen] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [examen_fisico] (

[idExamen_fisico] int NOT NULL IDENTITY (1,1),

[observaciones] nvarchar(100) NULL DEFAULT NULL,

[estado_general] nvarchar(10) NOT NULL,

[conciente] nvarchar(5) NOT NULL,

[alerta] nvarchar(5) NOT NULL,

[hidratado] nvarchar(5) NULL DEFAULT NULL,

[idMedidas_fisicas] int NOT NULL,

[idCaracteristicas_fisicas] int NOT NULL,

[idEvaluacion_medica] int NOT NULL,

CONSTRAINT [PK__examen_f__662961D45165187F] PRIMARY KEY ([idExamen_fisico]) 

)

GO



CREATE INDEX [RefMedidas_fisicas40_idx] ON [examen_fisico] ([idMedidas_fisicas]  ASC)

GO

CREATE INDEX [RefCaracteristicas_fisicas41_idx] ON [examen_fisico] ([idCaracteristicas_fisicas]  ASC)

GO

CREATE INDEX [RefEvaluacion_medica61_idx] ON [examen_fisico] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [frecuencia_entrenamiento] (

[idFrecuencia_entrenamiento] int NOT NULL IDENTITY (1,1),

[sesiones_semana] tinyint NOT NULL,

[tiempo_entrenamiento] tinyint NOT NULL,

[idValoracion_funcional] int NOT NULL,

[habitos_nutricionales] nvarchar(100) NOT NULL,

CONSTRAINT [PK__frecuenc__EFF4146C571DF1D5] PRIMARY KEY ([idFrecuencia_entrenamiento]) 

)

GO



CREATE INDEX [RefValoracion_funcional68_idx] ON [frecuencia_entrenamiento] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [historia_gym] (

[idHistoria_GYM] int NOT NULL IDENTITY (1,1),

[estado] nvarchar(20) NOT NULL,

[idVUsuario] int NOT NULL,

CONSTRAINT [PK__historia__B00D7CCB5AEE82B9] PRIMARY KEY ([idHistoria_GYM]) 

)

GO



CREATE TABLE [impresion_diagnostica] (

[idImpresion_diagnostica] int NOT NULL IDENTITY (1,1),

[riesgo_cardiovascular] nvarchar(20) NOT NULL,

[riesgo_osteomuscular] nvarchar(20) NOT NULL,

[peso] nvarchar(20) NOT NULL,

[conducta] nvarchar(100) NOT NULL,

[observaciones] nvarchar(65) NULL DEFAULT NULL,

[idEvaluacion_medica] int NOT NULL,

[recomendaciones_nutricionales] nvarchar(100) NOT NULL,

[tipo_actividad_fisica] nvarchar(15) NOT NULL,

[justificacion_actividad_fisica] nvarchar(100) NOT NULL,

CONSTRAINT [PK__impresio__A6B125D55EBF139D] PRIMARY KEY ([idImpresion_diagnostica]) 

)

GO



CREATE INDEX [RefEvaluacion_medica63_idx] ON [impresion_diagnostica] ([idEvaluacion_medica]  ASC)

GO



CREATE TABLE [medidas_antropometricas] (

[idMedidas_antropometricas] int NOT NULL IDENTITY (1,1),

[porc_entrenamiento1] decimal(8,2) NOT NULL,

[porc_entrenamiento2] decimal(8,2) NOT NULL,

[frecuencia_cardiaca_reposo] decimal(8,2) NOT NULL,

[frecuencia_cardiaca_maxima] decimal(8,2) NOT NULL,

[talla] decimal(8,2) NOT NULL,

[peso_actual] decimal(8,2) NOT NULL,

[peso_saludable] decimal(8,2) NOT NULL,

[imc] decimal(8,2) NOT NULL,

[idValoracion_funcional] int NOT NULL,

[valor_porc_entrenamiento1] decimal(8,2) NOT NULL,

[valor_porc_entrenamiento2] decimal(8,2) NOT NULL,

CONSTRAINT [PK__medidas___63F6CB1D6383C8BA] PRIMARY KEY ([idMedidas_antropometricas]) 

)

GO



CREATE INDEX [RefValoracion_funcional64_idx] ON [medidas_antropometricas] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [medidas_fisicas] (

[idMedidas_fisicas] int NOT NULL IDENTITY (1,1),

[ta] decimal(8,2) NOT NULL,

[fc] decimal(8,2) NOT NULL,

[fr] decimal(8,2) NOT NULL,

[peso] decimal(8,2) NOT NULL,

[talla] decimal(8,2) NOT NULL,

[imc] decimal(8,2) NOT NULL,

[peso_ideal] decimal(8,2) NOT NULL,

[gasto_basal_energia] decimal(8,2) NOT NULL,

CONSTRAINT [PK__medidas___F2D4C2C3693CA210] PRIMARY KEY ([idMedidas_fisicas]) 

)

GO



CREATE TABLE [perimetro] (

[idPerimetro] int NOT NULL,

[triceps] decimal(8,2) NOT NULL,

[cintura] decimal(8,2) NOT NULL,

[pectoral] decimal(8,2) NOT NULL,

[abdominal] decimal(8,2) NOT NULL,

[cadera] decimal(8,2) NOT NULL,

[muslo] decimal(8,2) NOT NULL,

[pantorrilla] decimal(8,2) NOT NULL,

[idValoracion_funcional] int NOT NULL IDENTITY (1,1),

CONSTRAINT [PK__perimetr__C136E7866D0D32F4] PRIMARY KEY ([idPerimetro]) 

)

GO



CREATE INDEX [RefValoracion_funcional66_idx] ON [perimetro] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [plan_entrenamiento] (

[idPlan_entrenamiento] int NOT NULL IDENTITY (1,1),

[fecha_creacion] date NOT NULL,

[objetivo] varchar(100) NOT NULL,

[tipo_trabajo] varchar(45) NOT NULL,

[saludable] varchar(60) NULL,

[recomendaciones] varchar(1000) NOT NULL,

[idValoracion_funcional] int NOT NULL,

[idEmpleado] int NULL,

CONSTRAINT [PK__plan_ent__0E778F39656C112C] PRIMARY KEY ([idPlan_entrenamiento]) 

)

GO



CREATE TABLE [pliegue] (

[idPliegues] int NOT NULL IDENTITY (1,1),

[triceps] decimal(8,2) NOT NULL,

[sub_escapular] decimal(8,2) NOT NULL,

[suprailiaco] decimal(8,2) NOT NULL,

[abdominal] decimal(8,2) NOT NULL,

[muslo] decimal(8,2) NOT NULL,

[pantorrilla] decimal(8,2) NOT NULL,

[porc_grasa] decimal(8,2) NOT NULL,

[idValoracion_funcional] int NOT NULL,

CONSTRAINT [PK__pliegue__D5F20B8570DDC3D8] PRIMARY KEY ([idPliegues]) 

)

GO



CREATE INDEX [RefValoracion_funcional65_idx] ON [pliegue] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [profesion] (

[idProfesion] int NOT NULL IDENTITY (1,1),

[nombre] nvarchar(50) NOT NULL,

CONSTRAINT [PK__profesio__4AE7B98874AE54BC] PRIMARY KEY ([idProfesion]) 

)

GO



CREATE TABLE [programa_ejercicios] (

[idPrograma_ejercicios] int NOT NULL IDENTITY (1,1),

[fecha_realizacion] date NOT NULL,

[observaciones] varchar(1000) NOT NULL,

[idPlan_entrenamiento] int NOT NULL,

CONSTRAINT [PK__programa__43AE28C659FA5E80] PRIMARY KEY ([idPrograma_ejercicios]) 

)

GO



CREATE TABLE [rutina] (

[idRutina] int NOT NULL IDENTITY (1,1),

[Programa_ejercicios_idPrograma_ejercicios] int NOT NULL,

[Ejercicio_idEjercicios] int NOT NULL,

[dia] varchar(20) NOT NULL,

[series] int NOT NULL,

[repeticiones] int NOT NULL,

CONSTRAINT [PK__programa__E04190DD619B8048] PRIMARY KEY ([idRutina]) 

)

GO



CREATE TABLE [test_funcional] (

[idTest_funcional] int NOT NULL IDENTITY (1,1),

[resistencia_cardiorespiratoria] decimal(8,2) NOT NULL,

[fuerza_abdominal] nvarchar(15) NOT NULL,

[resistencia_flexion_brazo] nvarchar(15) NOT NULL,

[resistencia_brazo_mancuerna] decimal(8,2) NOT NULL,

[resistencia_fuerza_sentadilla] decimal(8,2) NOT NULL,

[fuerza_pierna_100] decimal(8,2) NOT NULL,

[flexibilidad] int NOT NULL,

[idValoracion_funcional] int NOT NULL,

CONSTRAINT [PK__test_fun__BEA386F7787EE5A0] PRIMARY KEY ([idTest_funcional]) 

)

GO



CREATE INDEX [RefValoracion_funcional67_idx] ON [test_funcional] ([idValoracion_funcional]  ASC)

GO



CREATE TABLE [trabajo_cardiovascular] (

[idTrabajo_cardiovascular] int NOT NULL IDENTITY (1,1),

[continuo] int NOT NULL,

[intervalo] int NOT NULL,

[circuito_estaciones] varchar(100) NULL,

[categoria] char(15) NOT NULL,

[idPlan_entrenamiento] int NOT NULL,

CONSTRAINT [PK__trabajo___93097DD952593CB8] PRIMARY KEY ([idTrabajo_cardiovascular]) 

)

GO



CREATE TABLE [trabajo_estiramiento] (

[idTrabajo_estiramiento] int NOT NULL IDENTITY (1,1),

[nivel] char(15) NOT NULL,

[retracciones_musculares] varchar(65) NULL,

[idPlan_entrenamiento] int NOT NULL,

[series] int NOT NULL,

[segundos] int NOT NULL,

CONSTRAINT [PK__trabajo___82EEDFBE4E88ABD4] PRIMARY KEY ([idTrabajo_estiramiento]) 

)

GO



CREATE TABLE [valoracion_funcional] (

[idValoracion_funcional] int NOT NULL IDENTITY (1,1),

[objetivo_ejercicio] nvarchar(45) NOT NULL,

[observaciones] nvarchar(3000) NULL DEFAULT NULL,

[fecha_hora] datetime2(7) NOT NULL,

[programa_entrenamiento] nvarchar(50) NOT NULL,

[idHistoria_GYM] int NOT NULL,

CONSTRAINT [PK__valoraci__AF3BC7977C4F7684] PRIMARY KEY ([idValoracion_funcional]) 

)

GO



CREATE INDEX [RefHistoria_GYM70_idx] ON [valoracion_funcional] ([idHistoria_GYM]  ASC)

GO





ALTER TABLE [antecedentes_deportivos] ADD CONSTRAINT [RefDeporte19] FOREIGN KEY ([idDeporte]) REFERENCES [deporte] ([idDeporte])

GO

ALTER TABLE [antecedentes_deportivos] ADD CONSTRAINT [RefEvaluacion_medica57] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [antecedentes_ginecobstetricos] ADD CONSTRAINT [RefEvaluacion_medica58] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [antecedentes_patologicos] ADD CONSTRAINT [RefEvaluacion_medica59] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [antecedentes_patologicos_has_enfermedad] ADD CONSTRAINT [fk_Antecedentes_patologicos_has_Enfermedad_Antecedentes_patol1] FOREIGN KEY ([Antecedentes_patologicos_idAntecedentes_patologicos]) REFERENCES [antecedentes_patologicos] ([idAntecedentes_patologicos])

GO

ALTER TABLE [antecedentes_patologicos_has_enfermedad] ADD CONSTRAINT [fk_Antecedentes_patologicos_has_Enfermedad_Enfermedad1] FOREIGN KEY ([Enfermedad_idEnfermedad]) REFERENCES [enfermedad] ([idEnfermedad])

GO

ALTER TABLE [antecedentes_trauma_lesion] ADD CONSTRAINT [RefEvaluacion_medica62] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [antecedentes_usuario] ADD CONSTRAINT [fk_Antecedentes_usuario_Valoracion_funcional1] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [cita] ADD CONSTRAINT [fk_Cita_Empleado1] FOREIGN KEY ([Empleado_idEmpleado]) REFERENCES [empleado] ([idEmpleado])

GO

ALTER TABLE [clases_grupales] ADD CONSTRAINT [fk_clases_grupales_plan_entrenamiento_2] FOREIGN KEY ([idPlan_entrenamiento]) REFERENCES [plan_entrenamiento] ([idPlan_entrenamiento])

GO

ALTER TABLE [datos_extra_usuario] ADD CONSTRAINT [RefEPS80] FOREIGN KEY ([idEPS]) REFERENCES [eps] ([idEPS])

GO

ALTER TABLE [empleado] ADD CONSTRAINT [fk_Empleado_Profesion1] FOREIGN KEY ([Profesion_idProfesion]) REFERENCES [profesion] ([idProfesion])

GO

ALTER TABLE [empleado] ADD CONSTRAINT [RefCargo74] FOREIGN KEY ([idCargo]) REFERENCES [cargo] ([idCargo])

GO

ALTER TABLE [evaluacion_medica] ADD CONSTRAINT [RefHistoria_GYM71] FOREIGN KEY ([idHistoria_GYM]) REFERENCES [historia_gym] ([idHistoria_GYM])

GO

ALTER TABLE [examen] ADD CONSTRAINT [fk_examen_evaluacion_medica_1] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [examen_fisico] ADD CONSTRAINT [RefCaracteristicas_fisicas41] FOREIGN KEY ([idCaracteristicas_fisicas]) REFERENCES [caracteristicas_fisicas] ([idCaracteristicas_fisicas])

GO

ALTER TABLE [examen_fisico] ADD CONSTRAINT [RefEvaluacion_medica61] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [examen_fisico] ADD CONSTRAINT [RefMedidas_fisicas40] FOREIGN KEY ([idMedidas_fisicas]) REFERENCES [medidas_fisicas] ([idMedidas_fisicas])

GO

ALTER TABLE [frecuencia_entrenamiento] ADD CONSTRAINT [RefValoracion_funcional68] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [impresion_diagnostica] ADD CONSTRAINT [RefEvaluacion_medica63] FOREIGN KEY ([idEvaluacion_medica]) REFERENCES [evaluacion_medica] ([idEvaluacion_medica])

GO

ALTER TABLE [medidas_antropometricas] ADD CONSTRAINT [RefValoracion_funcional64] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [perimetro] ADD CONSTRAINT [RefValoracion_funcional66] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [plan_entrenamiento] ADD CONSTRAINT [fk_plan_entrenamiento_valoracion_funcional_1] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [pliegue] ADD CONSTRAINT [RefValoracion_funcional65] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [programa_ejercicios] ADD CONSTRAINT [fk_programa_ejercicios_plan_entrenamiento_2] FOREIGN KEY ([idPlan_entrenamiento]) REFERENCES [plan_entrenamiento] ([idPlan_entrenamiento])

GO

ALTER TABLE [rutina] ADD CONSTRAINT [fk_programa_ejercicios_has_enfermedad_ejercicio_1] FOREIGN KEY ([Ejercicio_idEjercicios]) REFERENCES [ejercicio] ([idEjercicio])

GO

ALTER TABLE [rutina] ADD CONSTRAINT [fk_programa_ejercicios_has_enfermedad_programa_ejercicios_1] FOREIGN KEY ([Programa_ejercicios_idPrograma_ejercicios]) REFERENCES [programa_ejercicios] ([idPrograma_ejercicios])

GO

ALTER TABLE [test_funcional] ADD CONSTRAINT [RefValoracion_funcional67] FOREIGN KEY ([idValoracion_funcional]) REFERENCES [valoracion_funcional] ([idValoracion_funcional])

GO

ALTER TABLE [trabajo_cardiovascular] ADD CONSTRAINT [fk_trabajo_cardiovascular_plan_entrenamiento_1] FOREIGN KEY ([idPlan_entrenamiento]) REFERENCES [plan_entrenamiento] ([idPlan_entrenamiento])

GO

ALTER TABLE [trabajo_estiramiento] ADD CONSTRAINT [fk_trabajo_estiramiento_plan_entrenamiento_1] FOREIGN KEY ([idPlan_entrenamiento]) REFERENCES [plan_entrenamiento] ([idPlan_entrenamiento])

GO

ALTER TABLE [valoracion_funcional] ADD CONSTRAINT [RefHistoria_GYM70] FOREIGN KEY ([idHistoria_GYM]) REFERENCES [historia_gym] ([idHistoria_GYM])

GO

ALTER TABLE [plan_entrenamiento] ADD CONSTRAINT [fk_plan_entrenamiento_empleado_1] FOREIGN KEY ([idEmpleado]) REFERENCES [empleado] ([idEmpleado])

GO



