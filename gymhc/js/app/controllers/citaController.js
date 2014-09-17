gymhc.controller( 'citaController', ['$scope', '$http', function( $scope, $http ) {
	
	//Inicializamos los atributos del modelo de los elementos que genera el framework desde el back
    $scope.user = {  
        identification: $( '#VUsuarios_identificacion' ).val(), 
        full_name: $( '#VUsuarios_primer_nombre' ).val(),
        user_code: $( '#Cita_idVUsuario' ).val(),       
    };
	
 
 	/*@summary: Funcion que busca los datos de un usuario dada su identificacion. 
    * Realiza una peticion ajax al servidor
 	*/
    $scope.searchUser = function() {

    	var response_promise = $http.get( 'index.php?r=secretaria/cita/xHRGetUserByIdentification',
    							    { params: { identification: $scope.user.identification } }
    							);

    	response_promise.success( function( data ){

    		console.info( data );

            if( ! data.primer_nombre ){
                
                $scope.user.full_name = '-- Usuario no encontrado :( --';
                $scope.user.user_code = '';
            }else{
                
                $scope.user.full_name = data.primer_nombre + ' ' + data.segundo_nombre + ' ' + data.primer_apellido 
                                    + ' ' + data.segundo_apellido;     
                $scope.user.user_code = data.id_usuarios;
            }

    	} );

    	response_promise.error( function( data ){
    		console.log( 'error!' );
    	} );
    };

}]);