gymhc.controller( 'valoracionFuncionalController', ['$scope', '$http', 'Util', function( $scope, $http, util ) {

    //Modelo que representa los datos de la cita
	$scope.appointment = {};

    //Modelo que representa los datos del usuario
	$scope.user = {};

    //Modelo que representa los datos del examen fisico.
    $scope.physical_examination = { 
        imc: $( '#MedidasAntropometricas_imc' ).val(),
        ta: $( '#MedidasAntropometricas_talla' ).val(),
        weight: $( '#MedidasAntropometricas_peso_actual' ).val(),
    }

    //Modelo que representa las evaluaciones medicas que posee el usuario
    $scope.medical_evaluations = {
        count: 0,
        url_pdf: 'index.php?r=secretaria/report/pdf',
        elements: new Array()
    };

    $scope.medidas_antropometricas = {};

	/*Funcion que habilita los componentes que se capturaran en el back.*/
	$scope.enabledData = function(){
		util.enabledData();
	};

    /**
     * @summary: Metodo que calcula el IMC segun la formula imc = peso(kg)/estatura(m)^2
     * 
     * @return {[type]} [description]
     */
    $scope.setImc = function(){        
        $scope.physical_examination.imc = ( ( $scope.physical_examination.weight ) / 
                                            ( Math.pow( ( $scope.physical_examination.ta / 100 ), 2 ) ) ).toFixed( 2 );
    }; 
 
 	/*@summary: Funcion que consulta y lista los datos de la cita y el paciente una vez se ha seleccionado 
 	*	una cita de la lista de citas programadas
 	*/
    $scope.updateDataForm = function() {

    	var response_promise = $http.get( 'index.php?r=fisio/valoracionFuncional/xHRGetAppointmentDataById',
    							    { params: { id: $scope.appointment.id } }
    							);

    	response_promise.success( function( data ){

    		//console.info( data );

    		$scope.appointment.reason = data.appointment.motivo;
    		$scope.appointment.datetime = data.appointment.fecha;

    		$scope.user.code = data.user.id_usuarios;
    		$scope.user.name = data.user.primer_nombre;
    		$scope.user.identification = data.user.identificacion;
    		$scope.user.sex = data.user.sexo;
    		$scope.user.date_of_birth = data.user.fecha_nac;
    		$scope.user.category = data.user.categoria;
    		$scope.user.cell = data.user.celular;
    		$scope.user.email = data.user.mail;
    		$scope.user.clinic_history = data.clinic_history.idHistoria_GYM;
    		$scope.user.age = util.getAge( $scope.user.date_of_birth );

            $scope.getMedicalEvaluations( $scope.user.code );

    	} );

    	response_promise.error( function( data ){
    		console.log( 'error!' );
    	} );
    };

    /**
     * @summary: Funcion que obtiene todas las evaluaciones medicas que han sido realizadas al usuario
     * recibido como argumento.
     * @param [int] id_user [Codigo del usuario]
     * @return {[type]} [description]
     */
    $scope.getMedicalEvaluations = function( id_user ){

        var hxr = $http.get(
                    'index.php?r=fisio/evaluacionMedica/getHistory',
                    { params: { user_code: id_user } }
                );

        hxr.success( function( data ){

           if( data ){

                $scope.medical_evaluations.elements = [];

                $scope.medical_evaluations.count = data.length;

                angular.forEach( data, function( i ){
                    $scope.medical_evaluations.elements.push( i );
                } );
           }

           console.info( $scope.medical_evaluations );
        } );
    };

    /**
     * @summary: Funcion que permite calcular el valor de entrenamiento 1. 
     * Calculos basados en formula medica proporcionada por la fisioterapeuta
     * @return {[type]} [description]
     */
    $scope.setValPorc1 = function(){

        $scope.medidas_antropometricas.val_porc_e1 = [ ( $scope.medidas_antropometricas.fcm - $scope.medidas_antropometricas.fcr ) * $scope.medidas_antropometricas.porc_e1 ] - $scope.medidas_antropometricas.fcr
    }

    /**
     * @summary: Funcion que permite calcular el valor de entrenamiento 2. 
     * Calculos basados en formula medica proporcionada por la fisioterapeuta
     * @return {[type]} [description]
     */
    $scope.setValPorc2 = function(){

        $scope.medidas_antropometricas.val_porc_e2 = [ ( $scope.medidas_antropometricas.fcm - $scope.medidas_antropometricas.fcr ) * $scope.medidas_antropometricas.porc_e2 ] - $scope.medidas_antropometricas.fcr
    }

}]);