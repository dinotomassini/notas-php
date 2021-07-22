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
  <h1>Notas de Dino</h1>

  <h2>
    <?php 
				echo "FUNCIONA PHP!!!"; 
				// COMENTARIO UNA SOLA LINEA
				/*
					COMENTARIO
					DE VARIAS
					LINEAS
				*/
			?>
  </h2>

  <h3>VARIABLES</h3>
  <h4>
    <?php 
				$texto = "string";
				$entero = 123;
				$flotante = 3.14;
				$booleano = true;

				echo "La variable texto vale $texto.<br />";
				echo "La variable entero vale $entero.<br />";
				echo "La variable flotante vale $flotante.<br />";
				echo "La variable booleano vale $booleano.<br />";
			?>
  </h4>

  <h3>CONSTANTES</h3>
  <h4>
    <?php 
				define("PI", 3.14);
				const OTRA_CONSTANTE = "Asi tambien se pueden definir constantes.";
				echo "La constante PI vale ".PI."<br />";
				echo OTRA_CONSTANTE;
			?>
  </h4>

  <h3>IF</h3>
  <h4>
    <?php
				$edad = 38;
				if ($edad > 18) {
					echo "Sos mayor de edad.";
				} else {
					echo "Sos menor de edad.";
				}
			?>
  </h4>

  <h3>SWITCH</h3>
  <h4>
    <?php 
				$opcion='Segunda';
				switch ($opcion) {
					case 'Primera':
						echo "Eligio la primera opcion.";
						break;
					case 'Segunda':
						echo "Eligio la segunda opcion.";
						break;
					case 'Tercera':
						echo "Eligio la tercera opcion.";
						break;
					default:
						echo "No eligio una opcion valida.";
				}	
			?>
  </h4>

  <h3>FOR</h3>
  <h4>
    <?php 
				for($i=0; $i<10; $i++) {
					echo "El valor de i es $i. <br />";
				}
			?>
  </h4>

  <h3>WHILE</h3>
  <h4>
    <?php 
				$numero = 0;
				while ($numero < 10) {
					echo "Estoy todavia en el ciclo $numero. <br />";
					$numero++;
				}
				echo "Ahora estoy afuera del ciclo con $numero"
			?>
  </h4>

  <h3>DO WHILE</h3>
  <h4>
    <?php 
				// revisar esta parte que no me esta imprimiendo el valor, pero funciona.
				// creo que cuando es false es igual a cero y no escribe nada en pantalla.
				/**
				 * la variable es booleana
				 * si el echo lo pongo en una linea sola y la variable es falsa, me muestra un espacio de texto vacio.
				 * si el echo lo pongo en una linea sola y con la ternaria, no muestra el texto aca pero si el de la variable.
				 */
				$login=false;
				$contador=0;
				echo "El login es ";
				echo $login? "verdadreo":"falso";
				echo ".<br />";
				do {
					echo "Todavia el login es ";
					echo $login? "verdadreo":"falso";
					echo ".<br />";
					$contador++;
					if ($contador = 10) {
						$login=true;
					}
				} while (! $login);
				echo "Ahora el login es ";
				echo $login? "verdadreo":"falso";
				echo ".<br />";
			?>
  </h4>

  <h3>ARRAYS</h3>
  <h4>
    <?php 
				$arreglo_vacio = array();

				$arreglo = array("esto", "es", "un", "array");
				var_dump($arreglo); // muestra el tipo de dato y el valor de la variable
				echo "<br />";
				print_r($arreglo); // muestra la cantidad de elementos del array y sus valores
				echo "<br />";
				echo "<br />";
				echo $arreglo[0]." ".$arreglo[1]." ".$arreglo[2]." ".$arreglo[3];
				echo "<br />";
				echo "<br />";

				// array asociativo(key:value , al estilo json)
				$persona = array(
					'nombre' => "Dino",
					'apellido' => "Tomassini",
					'edad' => 38
				); // toma como indice las claves que yo le pase
				var_dump($persona);
				echo "<br />";
				print_r($persona);
				echo "<br />";
				echo "<br />";
				echo "Mi nombre es ".$persona['nombre']." ".$persona['apellido']." y tengo ".$persona['edad']." años.";
				echo "<br />";
				echo "<br />";

				$cursos = array('python','javascript','php','html','css','java');
				echo "El arreglo tiene ".count($cursos)." elementos.<br />"; // devuelve la cantidad de elementos del arreglo (count($arreglo))
				echo "<br />";

				echo "El ultimo elemento es ".$cursos[count($cursos)-1];
				echo "<br />";

				echo "El penultimo elemento es ".$cursos[count($cursos)-2];
				echo "<br />";

				for($i=0;$i<count($cursos);$i++) {
					echo "El valor del indice $i es ".$cursos[$i]."<br />";
				}
				echo "<br />";

				// en el asort y rsort los indices se mantienen(como un id)
				echo "Arreglo orden ascendente:";
				asort($cursos);
				echo "<br />";
				print_r($cursos);
				echo "<br />";
				echo "Arreglo descendente:";
				rsort($cursos);
				echo "<br />";
				print_r($cursos);
				echo "<br />";
				echo "<br />";

				//divide el arreglo en las partes que le indiquemos, devuelve un array con mas array dentro
				echo "El array por partes:";
				echo "<br />";
				$partes = array_chunk($cursos,2);
				print_r($partes);
				echo "<br />";
				echo "<br />";

				// devuelve un nuevo arreglo con todos los elementos menos desde el inicio hatsta el elemento n(elimina desdes el inicio hasta el numero que le pasemos)
				echo "Una parte del array:";
				echo "<br />";
				$slice = array_slice($cursos,2);
				print_r($slice);
				echo "<br />";
				echo "<br />";

				// devuelve la concatenacion de varios arrays
				echo "Mezcla de arrays:";
				echo "<br />";
				$array1 = array(1,2,3,4);
				$array2 = array(5,6,7,8);
				$arrayMerge = array_merge($array1,$array2);
				print_r($arrayMerge);
				echo "<br />";
				echo "<br />";

				// elimina y devuelve el ultimo elemento del array
				echo "Eliminar el ultimio elemento de un array:";
				echo "<br />";
				$arrayPop = array_pop($array1);
				echo "Se elimino el elemento $arrayPop <br />";
				print_r($array1);
				echo "<br />";
				echo "<br />";

				// busca el valor del elemento y devuelve su indice
				echo "Buscar un elemento en un array:";
				echo "<br />";
				$buscar = array_search('javascript', $cursos);
				echo "El indice del elemento es $buscar y el valor es ".$cursos[$buscar]."<br />";
				echo "<br />";
				echo "<br />";

				// devuelve un arreglo invertido basandose en el array pasado
				echo "El array invertido:";
				echo "<br />";
				$arrayReverse = array_reverse($array1);
				echo "El array invertido es: ";
				print_r($arrayReverse);
				echo "<br />";
				echo "<br />";
			?>
  </h4>

  <h3>MATRICES</h3>
  <h4></h4>

  <h3>FOR EACH</h3>
  <h4>
    <?php 
				$futbol = array(
					'barcelona' => 'messi',
					'juventus' => 'ronaldo',
					'tottenham' => 'kane'
				);
				foreach ($futbol as $key => $value) {
					echo "En el equipo ".$key." juega ".$value.".<br />";	
				}
			?>
  </h4>

  <h3>FUNCIONES</h3>
  <h4>
    <?php 
				function estudiante($nombre, $apellido='Tomassini') {
					echo "Esto se ejecuta dentro de la funcion.<br />";
					return "Hola $nombre $apellido";
				}
				echo estudiante("Dino");
			?>
  </h4>

  <h3>SCOPE DE VARIABLES</h3>
  <h4>
    <?php 
				// si queremos usar una variable declarada fuera de una funcion, debemos dentro de la funcion decirle que queremos usar esa variable(global $variable).
				// a esta variable se le puede cambiar el valor dentro de la funcion y quedara con ese valor al salir de la misma.
				$edad = 20;
				$nombre = 'Dino';
				echo "Edad antes de la funcion: $edad<br />";
				echo "Nombre antes de la funcion: $nombre<br />";
				function funcionEdad() {
					global $edad; // se le dice que utilizaremos una variable ya declarada anteriormente, en caso de no poner la palabra reservada global, estaria creando una nueva variable que solo exista dentro de la funcion.
					$nombre = 'Luis Miguel';
					$edad=55; // al modificar la variable como le dijimos que era global, el valor cambiara para todo el programa.
					// para que no altere la variable externa, debemos quitar la palabra global, esto creara una variable nueva interna a la funcion.
					echo "Edad dentro de la funcion: $edad<br />";
					echo "Nombre dentro de la funcion: $nombre<br />";
				}
				funcionEdad();
				echo "Edad despues de la funcion: $edad<br />";
				echo "Nombre despues de la funcion: $nombre<br />";
			?>
  </h4>

  <h3>VARIABLES GLOBALES</h3>
  <h4>
    <?php 
				$n1 = 4;
				$n2 = 6;
				function sumar() {
					$GLOBALS['resultado'] = $GLOBALS['n1']+$GLOBALS['n2'];
				}
				sumar();
				echo "El resultado de $n1 + $n2 es $resultado";
				echo "<br />";
				echo "<br />";

				echo "Contenido de la variable reservada _SERVER es:<br />";
				foreach($_SERVER as $key => $value){
					echo "$key => $value<br />";
				}
				echo "<br />";
				echo "La ubicacion de este archivo es: ".$_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];
				echo "<br />";
				echo "<br />";

				// la variable _GET es para trabajar con formularios y traer los datos
				echo "Variable _GET: ";
				echo "<br />";
				print_r($_GET);
				echo "<br />";
				// tomando datos de un formulario html con get
				if (isset($_GET['name'])) {
					echo "El nombre ingresado es ".$_GET['name'];
				} else {
					echo "Todavia no se llenaron los datos del formulario.";
				}
				echo "<br />";

				// la variable _POST es para trabajar con formularios y traer los datos
				echo "Variable _POST: ";
				echo "<br />";
				print_r($_POST);
				echo "<br />";
				// tomando datos de un formulario html con post
				if (isset($_POST['lastname'])) {
					echo "El apellido ingresado es ".$_POST['lastname'];
				} else {
					echo "Todavia no se llenaron los datos del formulario.";
				}
				echo "<br />";
			?>
  </h4>

  <h3>Clases</h3>
  <h4>
    <?php 
				class Persona{
					public string $name;
					private string $lastName;
					protected int $age;

					function __construct($name, $lastName, $age){
						$this->name = $name;
						$this->lastName = $lastName;
						$this->age = $age;
					}

					public function getAllName(){
						echo "$this->name $this->lastName";
					}

					public function drinkChopp(){
						if($this->isAdult($this->age)){
							echo "Si puede tomar cerveza.";
						}else{
							echo "No puede tomar una cerveza tiene menos de 18 años.";
						}
					}

					private function isAdult($age){
						return ( $age >= 18);
					}
				}

				$Dino = new Persona("Dino", "Tomassini", 38, );
				$Roberto = new Persona("Roberto", "Robert", 16);
				$Dino->getAllName();
				echo "<br />";
				$Dino->drinkChopp();
				echo "<br />";
				$Roberto->getAllName();
				echo "<br />";
				$Roberto->drinkChopp();
				echo "<br />";
			?>
  </h4>

  <h3>Herencia</h3>
  <h4>
    <?php 
				class Usuario extends Persona{
					public string $userName;
					public string $pass;

					function __construct($name, $lastName, $age ,$userName,$pass){
						parent::__construct($name, $lastName, $age);
						$this->userName = $userName;
						$this->pass = $pass;
					}

					public function getData(){
						echo $this->getAllName()." tiene el usuario $this->userName con la contraseña $this->pass";
					}
				}

				$Usuario1 = new Usuario("Dino", "Tomassini", 38, "dtom", "123456");
				$Usuario2 = new Usuario("Roberto", "Robert", 16, "rob", "qwerty");
				$Usuario1->getData();
				echo "<br />";
				$Usuario2->getData();
				echo "<br />";
			?>
  </h4>

  <h3>Conexion BD</h3>
  <h4>
    <?php 
				class Conection{
					private string $DB_HOST="localhost";
					private string $DB_USER="root";
					private string $DB_PASS="";
					private string $DB_NAME="usuarios";

					private function dbConection(){
						$conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
						return $conn;
					}

					public function verDatos(){
						$db = $this->dbConection();
						$sql = "SELECT * FROM usuarios;";
						$prepare = mysqli_prepare($db, $sql);
						$result = mysqli_query($db, $prepare);//En la documentacion de PHP dice que execute esta obsoleto y sera removido
						echo mysqli_fetch_assoc($result);
					}

				}


			?>
  </h4>

  <h3></h3>
  <h4>
    <?php 
				
			?>
  </h4>
</body>

</html>