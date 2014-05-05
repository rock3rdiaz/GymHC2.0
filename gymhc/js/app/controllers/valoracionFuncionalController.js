gymhc.controller( 'valoracionFuncionalController', ['$scope', '$http', 'Util', function( $scope, $http, util ) {

	$scope.appointment = {};
	$scope.user = {};

	/*Funcion que habilita los componentes que se capturaran en el back.*/
	$scope.enabledData = function(){
		util.enbabledData();
	};
 
 	/*@summary: Funcion que consulta y lista los datos de la cita y el paciente una vez se ha seleccionado 
 	*	una cita de la lista de citas programadas
 	*/
    $scope.updateDataForm = function() {

    	var response_promise = $http.get( 'index.php?r=fisio/valoracionFuncional/xHRGetAppointmentDataById',
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

    	} );

    	response_promise.error( function( data ){
    		console.log( 'error!' );
    	} );
    };

}]);