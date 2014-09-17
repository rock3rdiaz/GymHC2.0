gymhc.controller('evaluacionMedicaController', ['$scope', '$http', 'Util', function( $scope, $http, util ) {

    //Modelo que representa los datos de la cita
	$scope.appointment = {};

    //Modelo que representa los datos del usuario
	$scope.user = { kind_contribution: 'beneficiario', eps_code: 1 };

    //Modelo que representa los datos de la HC
    $scope.sports_history = { yes_no: 'si' };

    $scope.reporoductive_background = { yes_no: 'si' };

    //Modelo que representa los datos del examen fisico.
    $scope.physical_examination = { 
        imc: $( '#MedidasFisicas_imc' ).val(),
        ta: $( '#MedidasFisicas_ta' ).val(),
        weight: $( '#MedidasFisicas_peso' ).val(),
    }

    /**
     * @summary: Metodo que calcula el IMC segun la formula imc = peso(kg)/estatura(m)^2
     * 
     * @return {[type]} [description]
     */
    $scope.setImc = function(){        
        $scope.physical_examination.imc = ( ( $scope.physical_examination.weight ) / 
                                            ( Math.pow( ( $scope.physical_examination.ta / 100 ), 2 ) ) ).toFixed( 2 );
    }; 

    /*Funcion que habilita los componentes que se capturaran en el back. Utiliza un medotodo del servicio*/
    $scope.enabledData = function(){       
       util.enabledData();
    };

	/*@summary: Funcion que consulta y lista los datos de la cita y el paciente una vez se ha seleccionado 
 	*	una cita de la lista de citas programadas
 	*/
    $scope.updateUserData = function() {

    	var response_promise = $http.get( 'index.php?r=medico/evaluacionMedica/xHRGetAppointmentDataById',
    							    { params: { id: $scope.appointment.id } }
    							);

    	response_promise.success( function( data ){

    		console.info( data );

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
    		
    		$scope.user.birth_place = data.extra_user_data.lugar_nacimiento;
    		$scope.user.marital_status = data.extra_user_data.estado_civil;
    		$scope.user.ocuppation = data.extra_user_data.ocupacion;
    		$scope.user.eps_code = data.extra_user_data.idEPS;
    		$scope.user.kind_contribution = data.extra_user_data.tipo_aporte;
    		$scope.user.companion = data.extra_user_data.acompaniante;
    		$scope.user.companion_relationship = data.extra_user_data.parentezco_acompaniante;
            $scope.user.extra_user_data_code = data.extra_user_data.idDatos_extra_usuario;//Codigo entidad 'DatosExtraUsuario'
    	
            
    	} );

    	response_promise.error( function( data ){
    		console.log( 'error!' );
    	} )
    };

    /**
     * @summary: Metodo que habilita/deshabilita los controles asociados a los antecedentes 
     * deportivos de la evaluacion. 
     * 
     */
    $scope.validateSportsHistory = function(){       

        return ( $scope.sports_history.yes_no == 'si' ) ? false : true;
    };

    /**
     * @summary: Metodo que habilita/deshabilita los controles asociados a los antecedentes 
     * ginecobstetricos de la evaluacion. 
     * 
     */
    $scope.validateReproductiveBackground = function(){       

        return ( $scope.reporoductive_background.yes_no == 'si' ) ? false : true;
    };
}]);