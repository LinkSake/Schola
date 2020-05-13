# 🎓 Schola
Administrador de maestros y cursos.
Repositorio para el 3er examen parcial de Programación para Internet II (ULSA Chihuahua).
<p align="center">
	<a href="https://github.com/LinkSake/Schola">
		<img src="https://img.shields.io/travis/carloscuesta/gitmoji/master?style=flat-square"
			 alt="Build Status">
	</a>
	<a href="https://gitmoji.carloscuesta.me">
		<img src="https://img.shields.io/badge/gitmoji-%20😜%20😍-FFDD67.svg?style=flat-square"
			 alt="Gitmoji">
	</a>
</p>

---

## Instalación
Dado a que el proyecto está basado en Laravel es necesario iniciarlo de la misma manera.
Favor de comporbar los [requisitos oficiales de Laravel](https://laravel.com/docs/7.x/installation) antes de comenzar.

### 1) Clonar el repositorio
```
$ git clone git@github.com:LinkSake/Schola.git
```
### 2) Instalar las dependencias
```
$ composer install
```
### 3) Añadir las credenciales de la BD en un env.
Se puede encontrar un ejemplo de un `.env` en el archivo `.env.example` dentro de este proyecto.
La conexión a la base de datos debe de quedar algo como lo siguente:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=schola
DB_USERNAME=root
DB_PASSWORD=password
```
### 4) Correr las migraciones y los seeders
```
$ php artisan migrate:fresh --seed
```
### 5) Encender el servidor local
```
$ php artisan serve
```

---

## Licencia
*The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).*
