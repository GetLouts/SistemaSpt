# Sistema de gestion

Prueba tecnica.

## Pre requisitos
_Para levantar el proyecto es necesario contar con_

* npm
* composer

## Configuracion
_Ejecutar los comandos para poner el proyecto a funcionar._

* `composer install` Instalacion de libreria necesarias
* `php artisan key:generate` Crear la clave de la aplicacion
* `php artisan migrate:fresh --seed`
* `php artisan serve` Activar el servidor para pruebas

## Credenciales de prueba

* `Administrador` 
**Correo:**     = admin@admin.com
**Contraseña:** = administrador


## Para hacer instalar el paquete de excel
## Requiremientos
* `PHP: ^7.2\|^8.0`
* `Laravel: ^5.8`
* `PhpSpreadsheet: ^1.21`  `composer require phpoffice/phpspreadsheet "^1.8.0"`
* `psr/simple-cache: ^1.0` `composer require psr/simple-cache:^1.0 maatwebsite/excel`

* `composer require maatwebsite/excel`
* `Además, si usa xampp , asegúrese de que estas extensiones estén habilitadas en el archivo C:\xampp\php\php.  ini antes de intentar instalar la biblioteca.
extension=mbstring
extension=fileinfo
extension=gd`

* `php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config`
