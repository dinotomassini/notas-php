<html>

<head>
  <title>Notas de PHP</title>
  <style>
  h2,
  h3 {
    background-color: black;
    color: white;
    text-align: center;
  }

  /* h4::after {
          content: '\A';
          white-space: pre;
        } */
  /* br { display: none; } --> esto elimina visualmente los saltos de linea */
  </style>
</head>

<body>
  <h1>Notas de Dino POO</h1>
  <!-- PHP 7.4.16 -->
  <h3>Clases</h3>
  <h4>
    <p>En PHP los objetos se pasan por referencia.</p>
    <?php 
      // definicion de una clase
      class Persona {
        const CONSTANTE = 'valor constante';
        private $nombre = "nombre";
        private $cedula = "cedula";

        // si a las propiedades o metodos no se les especifica el ambito, se declaran publicas por defecto
        
        // definicion del constructor de la clase
        // va con dos guiones porque hace una sobrecarga de metodos?? (__set, __get, __isset)
        function __construct($nombre, $cedula) {
          // asignacion a la propiedad de la clase
          $this->nombre = $nombre;
          $this->cedula = $cedula;
        }

        // metodo de la clase
        function verDatos() {
          $texto = "
            Mi nombre es: $this->nombre<br /> 
            Mi cedula es: $this->cedula<br />
            El valor de la constante desde el metodo verDatos(): ".self::CONSTANTE."<br />" // llama a la constante de la clase
          ;
          return $texto;
        }
      }

      // nueva instancia de un objeto
      $dino = new Persona("Dino Tomassini", "4235739-8");
          
      // ejecutando metodos(funciones) de la clase
      echo $dino->verDatos();

      // se accede a las propiedades(atributos o variables) segun scope de la misma
      // echo "La propiedad nombre del objeto: ".$dino->nombre;

      class Estudiante extends Persona {
        private $clase;
        private $anio;
        
        function __construct($nombre, $cedula, $clase, $anio) {
          // llama al constructor padre(es como el super de java)
          parent::__construct($nombre, $cedula);
          $this->clase = $clase;
          $this->anio = $anio;
        }

        function getEstudiante() {
          // llama a la funcion de la clase padre
          $textoPadre = parent::verDatos();
          $texto = $textoPadre."<br />           
           Clase: $this->clase<br />
           Año: $this->anio<br />
          ";
          return $texto;
        }
      }

      $dinoEst = new Estudiante("Dino Tomassini", "4235739-8", "IF", 3);
      echo $dinoEst->getEstudiante();

      echo "<br />
        La visibilidad de propiedades, metodos o constantes:<br />
        * public - se puede acceder desde donde sea
        <br />
        * protected - solo desde la misma clase, mediante clases heredadas o desde la clase padre
        <br />
        * private - unicamente se puede acceder desde la misma clase que los definio
        <br /><br />
      ";

      echo "Se permite la herencia y las subclases heredan todos los metodos publicos y protegidos de la clase padre, a menos que se sobreescriba algun metodo, este mantendra su funcionalidad original.<br />";

      echo "<br />El operador de resolucion de ambito ( :: ), permite acceder a elementos estaticos, constantes y sobrescibir propiedades o metodos de una clase.<br />";
      echo "Para usarlo desde fuera de la clase basta con poner: Nombre_de_la_clase::NOMBRE_CONSTANTE<br />";
      echo "<br />Pero para usarlo dentro de la clase hay que poner: self::NOMBRE_CONSTANTE<br />";

      // muestra el valor de la constante de la clase
      echo "<br />Llamado desde Persona::CONSTANTE: ".Persona::CONSTANTE."<br />";

      echo "Llamado desde dino::CONSTANTE: ".$dino::CONSTANTE."<br />";


			?>
  </h4>

  <h3>Try y Catch</h3>
  <h4>
    <?php 
      function tirarError() {
        throw new Exception("Error generado por gusto.<br />A este mensaje de error se accede desde el metodo getMessage() del objeto error.");
      }

      // en este caso se ejecuta la funcion que hacer generar un error para poder manejarlo con catch
      try {
        tirarError();
      } catch (Exception $error) {
        echo $error->getMessage()."<br />";
      }

			?>
  </h4>

  <h3>Metodos y atributos estaticos</h3>
  <h4>
    <?php
        echo "Estos metodos o propiedades estaticos se pueden llamar sin instanciar un objeto de la clase.<br />";
        
        class MetodoAtributoEstatico {
          public static $propiedadEstatica = "Hola soy un mensaje de una propiedad estaica.<br />";
          
          public static function metodoEstatico() {
            echo "Hola soy el mensaje dentro del metodo estatico.<br />";
          }
        }
        
        $claseEstatica = "MetodoAtributoEstatico";
        
        echo $claseEstatica::$propiedadEstatica;
        
        echo $claseEstatica::metodoEstatico();
			?>
  </h4>

  <h3>Clases abstractas</h3>
  <h4>
    <?php 
	    echo "Las clases abstractas no se pueden instanciar y si al menos un metodo de la clase es abstracto, esta deberia declararse como abstracta.<br />";
	    
	    echo "Los metodos abstractos solo declaran la firma(encabezado) del metodo, pero no pueden definir la implementacion.<br />";
	    
	    echo "Cuando se hereda de una clase abstracta, todos los metodos definidos como abstractos en la clase madre deben ser definidos en la clase hija, deben tener la misma o un nivel menos de visibilidad(si el metodo es protegido en la madre, en la clase hija debe ser definido como protegido o como publico, pero nunca como privado); el nombre del metodo y la cantidad de argumentos tambien debe ser el mismo(la clase hija puede agregar argumentos opcionales).<br /><br />";
	    
	    abstract class ClaseAbstracta {
	      abstract protected function getMensaje();
	      abstract protected function getOtroMensaje($msg);
	      
	      // METODO COMUN
	      public function imprimir() {
	        echo $this->getMensaje();
	      }
	    }
      
	    class Clase1 extends ClaseAbstracta {
	      protected function getMensaje() {
	        return "Mensaje de la clase 1<br />";
	      }
	      
	      public function getOtroMensaje($msg) {
	        return "$msg, desde la clase 1.<br />";
	      }
	    }
      
	    class Clase2 extends ClaseAbstracta {
	      public function getMensaje() {
	        return "Mensaje de la clase 2<br />";
	      }
	      
	      public function getOtroMensaje($msg) {
	        return "$msg, desde la clase 2.<br />";
	      }
	    }

	    $clase1 = new Clase1; // creo que no lleva parentesis por no tener un constructor definido manualmente ?????
	    $clase1->imprimir();
	    echo $clase1->getOtroMensaje("Y esto desde donde?")."<br />";
	    
	    $clase2 = new Clase2;
	    $clase2->imprimir();
	    echo $clase2->getOtroMensaje("Y esto desde donde?")."<br />";
	    
	    abstract class ClaseAbstracta1{
	      abstract protected function nombrePrefijo($nombre);
	    }
	    
	    class ClaseConcreta extends ClaseAbstracta1 {
	      public function nombrePrefijo($nombre, $separador=".") {
	        if ($nombre == "Pacman") {
	          $prefijo = "Mr";
	        } else if ($nombre == "Pacwoman") {
	          $prefijo = "Mrs";
	        } else {
	          $prefijo = "";
	        }
	        return "$prefijo$separador $nombre<br />";
	      }
	    }
	    
	    $clase = new ClaseConcreta;
	    echo $clase->nombrePrefijo("Pacman");
	    echo $clase->nombrePrefijo("Pacwoman");
			?>
  </h4>

  <h3>Interfaces</h3>
  <h4>
    <?php 
      echo "Las interfaces permiten crear codigo con el cual especificar que metodos deben ser implementados por una clase, sin tener que definir como son implementados, todos sus metodos deben ser publicos. Para implementar la interfazse debe agregar a la clase la palabra \"implements\", todos los metodos de la interfaz se deben implementar; una clase puede implementar mas de una interfaz.<br /><br />";

      
      interface iA {
        public function foo(); // no se implementa la funcino en la interface
      }
      
      interface iB {
        public function bar();
      }

      class Baz {}

      interface iC extends iA, iB {
        public function baz(Baz $baz);
      }

      class Interfaces implements iC {
        public function foo() {
          return "Clase Interface, metodo foo de la interfaz iA<br />";
        }
        
        public function bar() {
          return "Clase Interface, metodo bar de la interfaz iB<br />";
        }

        public function baz(Baz $baz) {
          return "Clase Interface, metodo baz de la interfaz iC, este espera un objeto del tipo Baz<br />";
        }
      }
      $baz = new Baz();
      $interfaz = new Interfaces;
      echo $interfaz::foo();
      echo $interfaz::bar();
      echo $interfaz::baz($baz);
			
			?>

  </h4>

  <h3>Iteracion de objetos</h3>
  <h4>
    <?php 
      echo "FOR EACH<br /><br />";
      class ClaseForEach { 
        public $var1 = "valor 1";
        public $var2 = "valor 2";
        public $var3 = "valor 3";

        protected $protected = "atributo protegido";
        private $private = "atributo privado";

        function iterateVisible() {
          echo "ClaseForEach::iterateVisible:<br />";
          foreach ($this as $key => $value) {
            echo "$key => $value<br />";
          }
        }
      }

      echo "Imprimiendo desde fuera del objeto<br />";
      $clase = new ClaseForEach();
      foreach($clase as $key => $value){
        echo "$key => $value<br />";
      }
      echo "<br />Si imprimo desde dentro de la clase con \"this\" puedo ver todos los atributos sin importar su ambito o alcanze<br />";

      echo "Imprimiendo desde dentro del objeto<br />";

      $clase->iterateVisible();
      
      echo "<br />Iterator ???<br /><br />";

      $iterator = new IteratorIterator();
			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 

			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 

			?>
  </h4>

  <h3>NOSE</h3>
  <h4></h4>

  <h3>NOSE</h3>
  <h4>
    <?php 

			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 

			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 

			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 
			
			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 
				
			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 
				
			?>
  </h4>

  <h3>NOSE</h3>
  <h4>
    <?php 
				
			?>
  </h4>

  <h3>Guardar Passwords</h3>
  <h4>
    <?php 
      echo "Para hashear la contraseña MI.contraseña<br />";
      $hashPassword = password_hash("MI.contraseña", PASSWORD_DEFAULT);
      echo "Este es el hash: $hashPassword<br />";

      echo "Ahora a la inversa, con el hash se comprueba la contraseña<br />";

      if (password_verify("MI.contraseña",$hashPassword)) {
        echo "La contraseña es correcta.<br />";
      } else {
        echo "La contraseña es incorrecta.<br />";
      }
				
			?>
  </h4>
</body>

</html>