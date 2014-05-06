<?php

Yii::import('ext.fpdf17.FPDF');

class PDF extends FPDF{

	public $col;

	// Cabecera de página
	function header()
	{
		/*Variables que forman el encabezado del documento*/
		$titulo = "Centro de acondicionamiento y preparacion fisica CAF";
		$mencion_comfenalco = "Comfenalco Quindio";
		$nit = "NIT 890.000.381-0";

	    // Logo
	    $this->Image('images/logocomfenalco.jpg', 5, 5, 33);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $this->Cell(80);
	    // Título
	    $this->Cell(30, 10, $titulo, 0, 0, 'C');
	    $this->Cell(-30, 20, $mencion_comfenalco, 0, 0, 'C');
	    $this->Cell(30, 30, $nit, 0, 0, 'C');
	    // Salto de línea
	    $this->Ln(40);
	}

	/*Funciona que define el titulo del documento*/
	function title( $title ){
		
		$this->SetXY( 90, 20 );
		$this->SetFont('Arial','B',13);		
		$this->Cell(30, 30, $title, 0, 0, 'C');
	}

	// Pie de página
	function footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

	/**
	 * @summary: Metodo que imprime dos cadenas seguidas al estilo 'etiqueta-valor'.
	 * Ubica los elementos dada una columna predefinida por el usuario
	 * @param  [int] $col   [Columna, Puede ser 1 o 2]
	 * @param  [string] $key   [Etiqueta a mostrar]
	 * @param  [string] $value [Valor de la etiqueta]
	 * @param  [string] $type [Tipo de salida. Unica o multiple]
	 * @return [type]        [description]
	 */
	public function printKeyValue( $col, $key, $value, $type = 'line' ){

		if( $col == 1 ){

			$this->SetX( 20 );
		}else{
			$this->SetX( 100 );
		}

		$this->SetFontSize( 11 );

		$this->SetFont( 'Times', 'B' );
		$this->Cell( 50, 0, $key );

		$this->SetFont( 'Times', '' );
		if( $type == 'multi' ){			
			$this->MultiCell( 0, 5, $value ? $value : '-');
		}else{
			$this->Cell( 0, 0, $value ? $value : '-' );
		}
		
	}

	/**
	 * @summary: Metodo que permite insertar un subtitulo en las coordenadas recibidas
	 * @param  [int] $x     [Coordenada en x]
	 * @param  [int] $y     [Coordenada en y]
	 * @param  [string] $texto [Texto del subtitulo]
	 * @return [type]        [description]
	 */
	public function subtitle( $x, $y, $texto ){

		$this->SetXY( $x, $y );
		$this->SetFont('Arial','',12);
		$this->SetFillColor(195, 217, 255);
		$this->Cell(0, 5, $texto, 0, 1, 'L', true);
		$this->ln();
	}

	/**
	 * @summary: Permite imprimir en el documento un texto de manera normal, eliminando estilos y demas.
	 * @param  [string] $texto [Texto a imprimir en el documento]
	 * @return Null
	 */
	public function textoNormal($texto){
		$this->SetFont('Arial','',9);
		$this->Cell(0, 0, $texto);
	}

	/*@sumamry: Permite tabular en columnas diferentes la informacion
	*param: int $col -> Indice de la columna, puede ser 0, 1 o 2
	*/
	public function setCol($col){
		// Establecer la posición de una columna dada
	    $this->col = $col;
	    $x = 10+$col*55;
	    $this->SetLeftMargin($x);
	    $this->SetX($x);
	}

	/**
	 * @summary: Imprime una porcion de un texto en una columna definida
	 * @param  [int] $col   [Indice de la columna, puede ser 0, 1 o 2]
	 * @param  [string] $texto [Texto a mostrar] 
	 * 
	 * @return Null
	 */
	public function mostrarEnCol($col, $texto){
		$this->setCol($col);
		$this->cell(0, 0, $texto);
	}
}
?>