

## - Tecnologías, librerías

`PHP v.7.1`: Lenguaje base utilizado del lado del servidor.
`JavaScript`: Lenguaje utilizado para las interaciones en el front-end.
`VueJs`: Framework progresivo con el cual se construyeron interfaces de usuario y validaciones front-end.
`Axios`: Libreria de JavaScript para realizar las peticiones al servidor de forma asincrona.
`Framework`: Laravel v.5.6.
`Base de Datos`: MySQL.


## - Estilos

`Blade`: Motor de Platilla de laravel para las vistas.
`Font Awesome`: Framework utilizado para los iconos vectoriales y estilos css.
`Bootstrap 4`: Framework para el diseño web de todas las vistas.
`CSS`: Lenguaje utilizado para los estilos.


## - Otras herramientas utilizadas

`Git`: Gestor de Versiones.
`CKEditor`: Editor wiziwig para crear los contenidos en todos los modulos.
`Laravel-dompdf`: Paquete para convertir archivo HTML a PDF/`https://github.com/barryvdh/laravel-dompdf`


## - Base de Datos

##### Servidor
`Nombre`: elearning_palmer

##### Local
`Nombre`: elearning_palmera

##### Tablas en local y servidor

  `answers`: Almacena las respuestas correctas de cada una de las preguntas por evaluacion creada.
  `brands`: Guarda todas las marcas creadas de un cliente
  `brand_news`: Se almacenan las noticias creadas por marca.
  `categories`: Guarda todas las categorias.
  `cities`: Almacena todas las ciudades por estado/provincia
  `contents`: Guarda los contenidos creados para mostrarse en la informacion de los productos.
  `countries`: Almacena todos los paises.
  `downloads`: En esta tabla se guardan todos los archivos que pertenecen al modulo de descargables.
  `evaluations`: posee toda la informacion relacionada a una evaluacion.
  `incentive_plans`: guarda toda la informacion creada referente en el modulo Plan de Incentivos
  `migrations`: esta tabla almacena las migraciones que se realizan con laravel.
  `modules`: se guardan todos los modulos que debe poseer el sistema
  `password_resets`: no se esta haciendo uso de esta tabla.
  `products`: Guarda toda la informacion referente a un producto.
  `questions`: esta tabla almacena las preguntas por evaluacion.
  `roles`: guarda la informacion referente a roles junto con los permisos correspondientes
  `sales`: se guardan las ventas de cada usuario
  `states`: almacena los estados/provincias ascociados a un pais
  `stores`: guarda las tiendas por estados
  `users`: posee toda la informacion referente a un usuario
  `user_answers`: almacena las respuestas de los usuarios por cadas evaluaciones
  `user_evaluations`: se guarda la informacion de las evaluaciones de los usuarios

## - Pasos para la instalacion del proyecto de modo local

1- Crear una base de datos llamada elearning_palmera y hacer la configuracion correspondiente a la BD y credenciales en el archivo .env que se ubica en la raiz del proyecto.
```
APP_NAME="E-learning PalmERA"
APP_ENV=local
APP_KEY=base64:L6QzTZI0HlQmz3FSXR9k+1I50qr8f95p5JBqXHCjEq8=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=elearning_palmera
DB_USERNAME=root
DB_PASSWORD=
```

El campo APP_KEY ubicada en la segunda linea del codigo anterior, se autogenera con el siuiente comando por consola: 

  `php artisan key:generate`

2- Luego de configurar el archivo .env y agregar las credenciales correspondiestes a la BD local, debe ingresar al directorio del proyecto por consola y colocar el siguiente comando para generar las migraciones, las cuales crearan las tablas en la BD:

  `php artisan migrate`

3- Al tener todas las tablas en la base de datos, ejecuatar el siguiente comando:

  `php artisan db:seed`

Este comando creara una data en la BD establecida en los seeds del proyecto.

## - Credenciales

Las credenciales iniciales para hacer login en el sistema son las siguientes:

correo: palmera@palmera.marketing
clave: zxcvbnm

Estas credenciales pueden ser modificadas en el siguiente directorio del proyecto:

`database/seeds/UsersTableSeeder.php`

## Estructura para la creacion de modulos en el sistema

1- Si se hará uso del sistema solamente con las credenciales del super admin, no es necesario el primer paso, de lo contrario, seguir lo que se indica:

    * Crear Rol administrador y asignarle los permisos correspondientes a cada modulo
    * Crear una marca
    * Crear país, estado/provincia y ciudad que se utilizará para la la marca creada
    * Crear un usuario asociado a la marca y rol creados.
    * Ingresar en el sistema con las credenciales del Administrador creado
    * Crear productos
    * Crear contenidos para los productos
    * Crear evaluaciones en base a los productos
    * Agregar preguntas a las evaluaciones
    * Ir a catálogo, escoger el producto al cual le creó  una evaluación
    * Presentar evaluación

Nota: el resto de los modulos no dependen de otros.

## - Vistas en los cuales se implementó VueJs

##### Catalog (catálogo):
  `/js/vueJs/catalog/filter.js`
  `/js/vueJs/catalog/tabs.js`

##### City (ciudad):
  `/js/vueJs/city/create.js`
  `/js/vueJs/city/filter.js`

##### Elearning (entrenamiento):
  `/js/vueJs/elearning/filter.js`

##### Encentive_plan (plan de incentivo):
  `/js/vueJs/incentive_plan/validation.js`
  `/js/vueJs/incentive_plan/validation_edit.js`

##### Layouts (diseño):
  `/js/vueJs/menu/menu.js`

##### Module (modulo):
  `/js/vueJs/city/create.js`

##### Permission (permiso):
  `/js/vueJs/role/permission.js`

##### Role (rol):
  `/js/vueJs/role/permission.js`

##### State (estado):
  `/js/vueJs/state/create.js`
  `/js/vueJs/state/filter.js`

##### Store (tienda):
  `/js/vueJs/city/create.js`

##### User (usuario):
  `/js/vueJs/city/create.js`


## - Directorio del proyecto en el servidor

`palmera.marketing/prueba_elearning`


## - Estructura del proyecto en el servidor

##### En la raiz del proyecto deben estar las siguientes carpetas y archivos:

  - app (carpeta)
  - bootstrap (carpeta)
  - config (carpeta)
  - database (carpeta)
  - node_modules (carpeta)
  - resources (carpeta)
  - routes (carpeta)
  - storage (carpeta)
  - tests (carpeta)
  - vendor (carpeta)
  - .env (archivo)
  - .env.example (archivo)
  - .gitattributes
  - .gitignore (archivo)
  - .htaccess (archivo)
  - artisan (archivo)
  - composer.json (archivo)
  - composer.lock (archivo)
  - error_log (archivo)
  - favicon.ico (archivo)
  - index.php (archivo)
  - package-lock.json (archivo)
  - package.json (archivo)
  - phpunit.xml (archivo)
  - readme.md (archivo)
  - robots.txt (archivo)
  - server.php (archivo)
  - web.config (archivo)
  - webpack.mix.js (archivo)

##### De las carpetas que estan en public deben estar en la raiz las siguientes:

  - css
  - fontawesome
  - img
  - js

  Solo se deja en la carpeta storage dentro de public.

##### Nota: en el servidor, los archivos e imagenes se almacenarán en el siguiente directorio:

    `storage/app/public`

## - Rutas

Todas las rutas estan en el siguiente directorio:

  `routes/web`

## - Configuraciones

  * En el directorio public/js, estan los archivos configGlobal.js y configGlobalLocal.js donde se creó una variable de configuracion para las peticiones con axios, las cuales se usan segun el ambiente en el cual este el proyecto.

  * En el archivo app/PalmLib/SettingVariables.php, estan las variables de configuracion del sistema, se utiliza para obtener el color de la marca.

  #####  Forma de hacer uso de las variables de configuracion
      {{ \App\PalmLib\SettingVariables::getSettings('navbar_color') }}