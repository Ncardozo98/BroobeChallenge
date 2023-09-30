<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Broobe Challenge

1. Requisitos
2. Instalación

## Requisitos
> De Software

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/laravel/laravel?style=for-the-badge) ![Packagist Version](https://img.shields.io/packagist/v/laravel/laravel?style=for-the-badge)

1. un terminal
- [ ] la del sistema operativo
- [ ] Git Bash <https://git-scm.com/>
- [ ] cmDer <https://cmder.net/>
- [ ] Cygwin <https://www.cygwin.com/>

2. PHP 8.1^ <img alt="Packagist PHP Version Support" src="https://img.shields.io/packagist/php-v/laravel/laravel?style=flat-square" valign="middle">
 
3. Composer
   Composer es un administrador de dependencias en PHP.  
   <https://getcomposer.org/>  
   <https://getcomposer.org/Composer-Setup.exe>

## Instalación

>Primero hay que descargar el proyecto existente usando git 

    git clone https://github.com/Ncardozo98/BroobeChallenge.git

> Una vez descargado, vamos a obtener los componetes necesorios para que funcione el framework 
> No olvidemos primero posicionarnos dentro del directorio del proyecto.

    cd BroobeChallenge
    composer update

> Cuando haya terminado de descargar y querramos iniciar el proyecto, va a parecer que esta todo funcionando bien, pero aun falta algo.  
> Al intentar editar el archivo de configuración  ".env" nos damos cuenta que no está- sin embargo, hay un archivo. ".env.example"  
> Entonces vamos a generar nuetro archivo ".env" renombrando o compiando este archivo.

> Ahora si, el último paso es genear la key del proyecto.  
> Esto se logra con el comando

    php artisan key:generate

> Ahora ya tenemos nuestro proyecto listo!