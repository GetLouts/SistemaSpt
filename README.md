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

## Crear Base de dato
_Ejecutar el comando para migrar la bbdd._

* `php artisan migrate:fresh --seed` Migracion de toda la base de datos

## Iniciar el servidor
_Ejecutar el comando para poner el proyecto online._
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

## Fotos del sistema

* `Login`
![SuperatecLogin](https://github.com/GetLouts/SistemaSpt/assets/87172222/bc9349e8-ccfe-47c0-a309-8be02bb723d2)

* `Panel de Control`
![PanelDeControlSPT](https://github.com/GetLouts/SistemaSpt/assets/87172222/41f272d0-daac-43b7-bf58-82093eab73a5)

* `Roles Y Mas`
![RolesYMas](https://github.com/GetLouts/SistemaSpt/assets/87172222/9b0b0994-c4d1-4206-86d0-17c4513d5feb)

* `Cronograma`
![Cronograma](https://github.com/GetLouts/SistemaSpt/assets/87172222/b6f192c8-27d1-4b59-a394-48640ef80a4f)