# Grupo SARA-CONNOR21

Bienvenido al proyecto SARA-CONNOR21, una aplicación web para gestionar las mesas y las salas de un restaurante.


## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

Mira **Deployment** (Despliegue) para conocer como desplegar el proyecto.


### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas._

_Para poder llevar a cabo este proyecto necesitarás algún software de edición de código como los que dejaré a continuación:_


* [Visual estudio code](https://code.visualstudio.com/)

* [Sublime text](https://www.sublimetext.com/)

* [Atom](https://atom.io/)

_Por otra parte para poder ver los lenguajes de servidor como php y consultas BBDD, necesitarás de un servidor, ya sea en un hosting o descargar un servidor(XAMPP):_

* [XAMPP](https://www.apachefriends.org/es/index.html)

* [Hosting](https://www.ionos.com/)


### Instalación 🔧

_Una serie de ejemplos paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutandose_

_Posterior a la instalación de alguno de los softwares de edición de código en caso de haber seleccionado XAMPP(Recomendable) ya que puedes ver los cambios que efectuas en cada momento_

_Instalación de XAMPP:_

* [Manual de instalación completo](https://www.ionos.es/digitalguide/servidores/herramientas/instala-tu-servidor-local-xampp-en-unos-pocos-pasos/)

### Instalación en Local🔧
_Breve explicación de como desplegar el proyecto de manera local_

* Posterior a haber cumplido los prerequisitos, de manera rápida y eficaz, en una carpeta en local, tras haber abierto un terminal en la misma carpeta deberás pegar la url del  proyecto actual [En el terminal](Git clone https://github.com/blumal/PR1_M8.git), posterior a ejecutar esto se generará toda la estructura de directorias del proyecto.

* Por otra parte en caso de error, recuerda modificar los ficheros de conexión con la BBDD tal como lo tengas, si no obtendrás errores de conexión

### Instalación en Hosting🔧
_Breve explicación configuración en un hosting_

* Este apartado es algo más complejo y largo, por eso debajo se dejan más puntos a tener en cuenta, para tener un despligue correcto del proyecto, uno de los puntos más importantes a la hora de subir el proyecto es comprobar si la estructura está tal cual la tenías en local, ya que las redirecciones fallarían, por otra parte necesitaríamos modificar los usuarios, base de datos, y contraseña de la conexión ya que por defecto el hosting te crea uno.

* No elimines ningúna carpeta desconocida

* Cualquier tipo de cambio, compruébalo tanto en la búsqueda normal como en la privada, esto solventa muchos errores (Esta opción es viable tanto en el desarrollo local como en hosting)

* Cambiar la configuración de la DB, usuario, password, y DB Incluirla los parámetros de conf a la página de conection define()... Comprobar que en totas las páginas con sesiones añadir al principio del fichero ob_start(); y debajo de cada header(location) ob_end_flush();

* Esto $stmp="mysql:dbname=".BD.";host=";SERVIDOR; cambiarlo por esto $stmp="mysql:dbname=".BD.";host=".SERVIDOR; en caso de.

### Y las pruebas de estilo de codificación ⌨️

_A partir de aquí continuamos con la implementación de la web en 000Webhost, por lo que habrá que tener varios aspectos a tener en cuenta._

* [Recomendaciones a comprobar](https://www.hostinger.es/tutoriales/subir-sitio-web)


_User of login (admin)_
````
user: blumal@fje.edu
password: 1234
````
_User of login (waiter)_
````
user: martinisa@cam.com
password: 1234
````

* [Web](https://myrestaurantapp23.000webhostapp.com)

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Visual estudio code](https://code.visualstudio.com/)- Software de edición de código.
* [XAMPP](https://www.apachefriends.org/es/index.html) - Servidor que soportará nuestro lenguaje PHP, y consultas BBDD.
* [XAMPP(PhpMyAdmin)](https://www.phpmyadmin.net/docs/)- Usado para generar, testear, visualizar la BBDD.
* [Hosting](https://www.000webhost.com/?__cf_chl_jschl_tk__=_e8b7QHZCLUBjphESPSnHpvTGZ5XTFDjPSJ7WKejWnI-1637165745-0-gaNycGzNByU)- Usado para poder subir nuestra web a internet y poder acceder desde cualquier dispositivo en cualquier momento.
* [Github](https://github.com/)- Usado para gestionar el trabajo de cada desarrollador, controlar las tarear, control el tiempo de trabajo y gestionar el progreso del proyecto.

## Contribuyendo 🖇️

Por favor lee el [CONTRIBUTING.md](https://gist.github.com/villanuevand/xxxxxx) para detalles de nuestro código de conducta, y el proceso para enviarnos pull requests.

## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/tu/proyecto/wiki)

## Versionado 📌

* [tags en este repositorio](https://github.com/blumal/PR1_M8/releases).

## Autores ✒️

_Menciona a todos aquellos que ayudaron a levantar el proyecto desde sus inicios_

* **Alfredo Blum Torres** - *Trabajo Inicial*

También puedes mirar la lista de todos los [contribuyentes](https://github.com/your/project/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕ a alguien del equipo. 
* Da las gracias públicamente 🤓.
* etc.
