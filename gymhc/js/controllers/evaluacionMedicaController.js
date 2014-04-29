gymhc.controller('evaluacionMedicaController', ['$scope', '$http', 'Util', function( $scope, $http, util ) {

	$scope.appointment = {};
	$scope.user = {};

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

    		/*Realizamos estas asignaciones si el usuario a evaluar posee datos relacionados con una visita previa*/
    		if( data.extra_user_data ){

    			$scope.user.birth_place = data.extra_user_data.lugar_nacimiento;
    			$scope.user.marital_status = data.extra_user_data.estado_civil;
    			$scope.user.ocuppation = data.extra_user_data.ocupacion;
    			$scope.user.eps_code = data.extra_user_data.idEPS;
    			$scope.user.kind_contribution = data.extra_user_data.tipo_aporte;
    			$scope.user.companion = data.extra_user_data.acompaniante;
    			$scope.user.companion_relationship = data.extra_user_data.parentezco_acompaniante;
    		}    		

    	} );

    	response_promise.error( function( data ){
    		console.log( 'error!' );
    	} )
    };

}]);