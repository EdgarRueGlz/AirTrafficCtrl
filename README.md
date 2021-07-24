## Contenidos
1. [Informacion General](#general-info)
2. [Tecnolgoias](#technologies)
3. [Configuracion](#config)
4. [Notas][#notes]
5. [Errores Conocidos](#know-errors)

### Informacion general
***
Ejercicio de desarrollo de una aplicacion para el control de trafico utilizando laravel y javascript.

### Tecnologias
***
- Laravel 8

### Configuracion
***

1. Instalar el proyecto con ' composer install '
2. Configurar la base de datos en el archivo .env
3. Generar la APP Key con ' php artisan key:generate '
4. Borar el cache y reiniciar la configuracion ' php artisan cofig:cache'
5. Correr las migraciones ' php artisan migrate'
6. Correr los seeders ' php artisan seeder '
7. Iniciar el servidor con ' php artisan serve'


### Notas
***
- Las credenciales para pruebas son : 
    Mail:    admin@test.com
    Contraseña:  password


### Errores conocidos
***
- Existe un error con la compatibilidad de laravel 8 y mysql8 en el cual es neceario cambiar la configuracion de autentificacion del usuario a legacy para que laravel pueda acceder a la base de datos
