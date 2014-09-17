/**
 * @author: rocker
 *
 * @summay: Archivo de inicio de la aplicacion front de 'GymHC'. 
 * Se definen caracteristicas base que seran utilizados por los diferentes controladores por medio de 
 * una fabrica. Se declara tambien el modulo principal de la apliacion.
 * 
 * http://stackoverflow.com/questions/18939709/angularjs-when-to-use-service-instead-of-factory
 *
 * Dios bendiga herramientas como angularjs :)
 */

var gymhc = angular.module('gymhc', []);


gymhc.factory( 'Util', function(){	

	return{

		/*@summary: Metodo que retorna la edad del paciente a partir del fecha de naciminento recibida como argumento*/
	   	getAge: function( date_of_birth ){

			const base_year = 1900;//Constante definida como punto base
			
			
			var data_birth_day = date_of_birth.split('/');
			
			/*Variable que almacenara un objeto que nos permite obtener los datos de la fecha actual*/
			var today = new Date();		
			
			var year = today.getFullYear();//Capturamos el anio
			var month =  today.getMonth() + 1;//Obtenemos el mes
			var day = today.getDate();//Obtenemos el dia
			
			var days_num = ((year - base_year) * 365) + (month * 30) + day;
			var num_user_day = ((parseInt(data_birth_day[0]) - base_year) * 365) + (parseInt(data_birth_day[1]) * 30) + parseInt(data_birth_day[2]);
					
			return parseInt((days_num - num_user_day) / 365);
		},

		/*Funcion que habilita los componentes que se capturaran en el back. Solo son utilizados el codigo
		* de la historia clinica y el codigo del usuario :)
		*/
    	enabledData: function(){
	        $( '#user_clinic_history' ).removeAttr( 'disabled' );
	        $( '#user_code' ).removeAttr( 'disabled' );
    	},
	}
} );