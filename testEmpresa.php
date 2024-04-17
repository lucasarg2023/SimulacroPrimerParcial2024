<?php
//cliente moto vetna empresa
 
include_once "D:\Lucas\Descargas\simulacro2.0\clases.php" ;

$objCliente1 = new Cliente ("juan", "perez" , true , "dni" , (int) 132551648) ;
$objCliente2 = new Cliente ("ana", "fuentes" , true , "dni" , (int) 156516485) ;
$colClientes = [$objCliente1, $objCliente2];


$objMoto1 = new Moto ((int) 11,  2230000 , (int) 2022 , "Benelli Imperiale 400" , 85 , true );
$objMoto2 = new Moto ((int) 12, 584000 , (int)2021 , "Zanella Zr 150 Ohc" , 70 , true );
$objMoto3 = new Moto ((int) 13, 999900 , (int) 2023 , "Zanella Patagonian Eagle 250" , 50 , false );
$colMotos = [$objMoto1, $objMoto2, $objMoto3];

$colVentasRealizadas = [] ;

/*4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[]*/
$objEmpresa = new Empresa ("Alta Gama", "AvArgenetina 123", $colMotos , $colClientes , $colVentasRealizadas ) ;



/*Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
*/

//extraigo los codigos mtos del objeto moto recorriendo cada arreglo
$colCodigosMoto = [];
foreach ($colMotos as $moto){
    $codigoMoto = $moto ->getcodigo();
    $colCodigosMoto [] =$codigoMoto ;
}





$resgistarVenta = $objEmpresa -> registrarVenta($colCodigosMoto, $objCliente2);
echo "precio venta " . $resgistarVenta . "\n";


$tipo = $objCliente1 -> gettipoDni () ;
$numDoc = $objCliente1 -> getnumDoc () ;
$objEmpresa -> retornarVentasXCliente ($tipo, $numDoc) ;


echo $objEmpresa;