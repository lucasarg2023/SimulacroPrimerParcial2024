<?php

/*
En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. 

Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/


class Cliente {


    private $nombre ;
    private $apellido;
    private $dadoBaja;
    private $tipoDni;
    private $numDoc;



    public function __construct ($nombre , $apellido, $dadoBaja,  $tipoDni,  $numDoc ){
        $this -> nombre = $nombre ;
        $this -> apellido = $apellido ;
        $this -> dadoBaja = $dadoBaja ;
        $this -> tipoDni = $tipoDni ;
        $this -> numDoc = $numDoc ;
    }

    // gets
    public function getnombre (){
        return $this -> nombre ;
    }
    public function getpapellido (){
        return $this -> apellido ;
    }
    public function getdadoBaja (){
        return $this -> dadoBaja ;
    }
    public function gettipoDni (){
        return $this -> tipoDni ;
    }
    public function getnumDoc (){
        return $this -> numDoc ;
    }

    // sets
    public function setnombre ($nombre){
        $this -> nombre = $nombre ;
    }
    public function setapellido ($apellido){
        $this -> apellido = $apellido ;
    }
    public function setdadoBaja ($dadoBaja){
        $this -> dadoBaja = $dadoBaja ;
    }
    public function settipoDni ($tipoDni){
        $this -> tipoDni = $tipoDni ;
    }
    public function setnumDoc ($numDoc){
        $this -> numDoc = $numDoc ;
    }
 

    public function __toString (){
    $cadena1 = "Nombre cliente : " . $this->getnombre() . "\n" .
              "Apellido : " . $this->getpapellido() . "\n" .
              "estado del cliente?: " .  ($this->getdadoBaja() ? "Dado de baja" : "Activo").
              " Tipo de Documento: " . $this->gettipoDni() . "\n" .
              "numero documento: " . $this->getnumDoc() . "\n" ;
             
    
    return $cadena1;
    }

}




/*En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
*/

class Moto {


    private $codigo ;
    private $costo;
    private $anioFabr;
    private $descrip;
    private $porcentAnual;
    private $activa; // moto disponible o no disponble



    public function __construct ($codigo , $costo, $anioFabr,  $descrip,  $porcentAnual, $activa ){
        $this -> codigo = $codigo ;
        $this -> costo = $costo ;
        $this -> anioFabr = $anioFabr ;
        $this -> descrip = $descrip ;
        $this -> porcentAnual = $porcentAnual ;
        $this -> activa = $activa ;
    }

    // gets
    public function getcodigo (){
        return $this -> codigo ;
    }
    public function getcosto (){
        return $this -> costo ;
    }
    public function getanioFabr (){
        return $this -> anioFabr ;
    }
    public function getdescrip (){
        return $this -> descrip ;
    }
    public function getporcentAnual (){
        return $this -> porcentAnual ;
    }
    public function getactiva (){
        return $this -> activa ;
    }
  

    // sets
    public function setcodigo ($codigo){
        $this -> codigo = $codigo ;
    }
    public function setcosto ($costo){
        $this -> costo = $costo ;
    }
    public function setanioFabr ($anioFabr){
        $this -> anioFabr = $anioFabr ;
    }
    public function setdescrip ($descrip){
        $this -> descrip = $descrip ;
    }
    public function setporcentAnual($porcentAnual){
        $this -> porcentAnual = $porcentAnual ;
    }
    public function setactiva ($activa){
        $this -> activa = $activa ;
    }


    // 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
    public function __toString (){
        $cadena2 = "codigo de moto : " . $this->getcodigo() . "\n" .
                "costo de moto : " . $this->getcosto() .  "\n" .
                "Año de fabricacion : " . $this->getanioFabr() . "\n" .
                "descripcion: " . $this->getdescrip() . "\n" .
                "porcentaje anual: " . $this->getporcentAnual() . "\n" .
                "stock?: " . ($this->getactiva() ? "si" : "no") . "\n"  ;
        
        return $cadena2;
    }

/*5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
*/



    public function darPrecioVenta () {
        if (!$this->getactiva()) {
            $precioventa = -1 ;
        }else{
            $anioActual = date ("Y") ;
            $anio= $anioActual- $this ->getanioFabr ();
            $precioventa = $this->getcosto()  +$this->getcosto()  * ($anio*$this->getporcentAnual());
        }
        return  $precioventa  ;

    }
}

/************************************************************************************************************************ */

/*En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario */

class Venta {


    private $numero ;
    private $fecha;
    private $refVentClien;
    private $refArrayColMot;
    private $precioFinal;
 



    public function __construct ($numero, $fecha, $refVentClien, $refArrayColMot, $precioFinal, ){
        $this -> numero = $numero ;
        $this -> fecha = $fecha ;
        $this -> refVentClien = $refVentClien ;
        $this -> refArrayColMot = $refArrayColMot ;
        $this -> precioFinal = $precioFinal ;
        
    }

    // gets
    public function getnumero (){
        return $this ->numero ;
    }
    public function getfecha (){
        return $this ->fecha ;
    }
    public function getrefVentClien (){
        return $this -> refVentClien  ;
    }
    public function getrefArrayColMot (){
        return $this -> refArrayColMot  ;
    }
    public function getprecioFinal (){
        return $this -> precioFinal ;
    }
   
  

    // sets
    public function setnumero ($numero){
        $this -> numero  = $numero ;
    }
    public function setfecha ($fecha){
        $this -> fecha  = $fecha ;
    }
    public function setrefVentClien ($refVentClien){
        $this -> refVentClien  = $refVentClien ;
    }
    public function setrefArrayColMot ($refArrayColMot){
        $this -> refArrayColMot  = $refArrayColMot ;
    }
    public function setprecioFinal ($precioFinal){
        $this -> precioFinal  = $precioFinal ;
    }


    public function __toString (){
        $cadena3 = "num de venta : " . $this->getnumero() . "\n" .
                  "fecha de venta : " . $this->getfecha() .  "\n" .
                  "referencia al cliente : " . $this->getrefVentClien() . "\n" .
                  "referencia coleccion motos: " . $this->getrefArrayColMot() . "\n" .
                  "precio final: " . $this->getprecioFinal() . "\n" ;
                  
        
        return $cadena3;
    }
    


/*
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario */
    public function incorporarMoto($objMoto){
        // Verificar si el precio de venta de la moto es mayor que cero
        if ($objMoto->darPrecioVenta() > 0) {
            // Agregar la moto a la colección de motos de la venta
            $this->getrefArrayColMot()[] = $objMoto;
            // Actualizar el precio final de la venta
            $this->precioFinal  += $objMoto->darPrecioVenta();     // si pongo $this->getprecioFinal se pone en rojo
        }



    }

}
/*
En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/


class Empresa {


    private $denominacion ;
    private $direccion;
    private $arrayColClient;
    private $arrayColMotos;
    private $arraycolVentas;
 



    public function __construct ($denominacion , $direccion, $arrayColClient, $arrayColMotos, $arraycolVentas ){
        $this -> denominacion = $denominacion ;
        $this -> direccion = $direccion ;
        $this -> arrayColClient = $arrayColClient ;
        $this -> arrayColMotos = $arrayColMotos ;
        $this -> arraycolVentas = $arraycolVentas ;
    
    }

    // gets
    public function getdenominacion (){
        return $this -> denominacion ;
    }
    public function getdireccion (){
        return $this -> direccion  ;
    }
    public function getarrayColClient (){
        return $this -> arrayColClient ;
    }
    public function getarrayColMotos (){
        return $this -> arrayColMotos ;
    }
    public function getarraycolVentas (){
        return $this ->arraycolVentas  ;
    }
  
  

    // sets
    public function setdenominacion ($denominacion){
        $this ->denominacion  = $denominacion ;
    }
    public function setdireccion ($direccion){
        $this ->direccion  = $direccion ;
    }
    public function setarrayColClient ($arrayColClient){
        $this ->arrayColClient  = $arrayColClient ;
    }
    public function setarrayColMotos ($arrayColMotos){
        $this -> arrayColMotos = $arrayColMotos ;
    }
    public function setarraycolVentas ($arraycolVentas){
        $this ->arraycolVentas  = $arraycolVentas ;
    }
  
    public function __toString (){
        $cadena4 = "denominacion: " . $this->getdireccion() . "\n" .
                  "direccion: " . $this->getdireccion() .  "\n" .
                  "arrayColClient: " . $this->getarrayColClient() . "\n" .
                  " coleccion motos: " . $this->getarrayColMotos() . "\n" .
                  "coleccion de ventas: " . $this->getarraycolVentas() . "\n" ;
                  
        
        return $cadena4;
    }


    /* 5.  Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro */

    public function retornarMoto($codigoMoto) {
        foreach ($this->getarrayColMotos() as $objMoto) {
            if ($objMoto->getcodigo() == $codigoMoto) {
                return $objMoto;
            }
        }
        // Si no se encuentra ninguna moto con el código proporcionado, se devuelve null
        return null;
    }
    



    /* 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. 
    */

    public function registrarventa($colCodigosMoto, $objCliente) {
    $i=0;
    $motoRetornada=null;
    $arrayMotos=[];
    $numVenta = count($this->getarraycolVentas())+1;
    $fecha= date("Y");
    $preFin=0;
    $nuevaVenta = new Venta ($numVenta, $fecha, $objCliente, $arrayMotos, 0);
    $arrayMotosVenta=$this->getarrayColMotos();
    // compara cada codigo de la coleccion con cada moto de la coleccion de motos while ($i<count($colColigosMoto) && ($motoRetornada==null)) {
    while  ($i < count ($colCodigosMoto)&& ($motoRetornada=null)){
    $motoRetornada=$this-> retornarMoto ($colCodigosMoto [$i]);
    if ($motoRetornada!=null) {
        if ($motoRetornada->getActiva()==true && $objCliente->getdadoBaja () ==false) {
        $arrayMotos= $nuevaVenta->getrefArrayColMot();
        $precioVentaMoto= $motoRetornada-> darPrecioVenta();
        $preFin= $nuevaVenta->getprecioFinal()+$precioVentaMoto;
        $nuevaVenta->setPrecioFinal($preFin);
    
        }
        }
        $i++;
        }
        if($nuevaVenta->getprecioFinal()>0){
             $arraycolVentas = $this ->getarraycolVentas();
            $arraycolVentas []= $nuevaVenta;
             $this ->setarraycolVentas($arraycolVentas);
            }
            return $nuevaVenta -> getprecioFinal() ;
        }



    /*7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */
    public function retornarVentasXCliente($tipoDni, $numDoc) {
        // Inicializar una colección de ventas asociadas al cliente
        $colVentasCliente = [];
    
        // Obtener la colección de ventas de la empresa
        $ventas = $this->getarraycolVentas(); 
        foreach($ventas as $venta) {// Recorrer la colección de ventas
            // Verificar si el número de documento del cliente de la venta coincide con el número de documento proporcionado
            if ($venta->getarrayColClient()->gettipoDni() == $tipoDni) {
                if ($venta->getarrayColClient()->getnumDoc() == $numDoc)
                $colVentasCliente[] = $venta;// Agregar la venta a la colección de ventas del cliente
            }
        }
        return $colVentasCliente; // Retornar la colección de ventas asociadas al cliente
    }

}


