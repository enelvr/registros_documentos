# CRUD Registro de Documentos

Registro documento es un CRUD desarrollado, siguiendo el patron mvc, usando los lenguajes PHP, HTML, JAVASCRIPT, con el apoyo de algunas librerias como JQUERY, DATATABLE, BOOTSTRAP y el uso de paquetes como COMPOSER entre otros.

# Requisitos

- Servidor web "Apache2"
- PHP 7.3
- Mysql 5
- Composer
- Sistema operativo linux u otro

## Como hacer copia de este proyecto

Puedes acceder y descargar el código desde la URL:

`https://github.com/enelvr/registros_documentos.git`


O también puedes clonar el repositorio

`$ git clone https://github.com/enelvr/registros_documentos.git`

Ya clonado tu proyecto deberas alojar en tu servidor

## Cómo se instalan las dependencias

Ejecuta los comandos desde la terminal

`$ composer install`
`$ composer dump-autoload`

## Cómo configurar

  Si tu servidor es local deberas configurar tu apache para el correcto funcionamiento

##### - Configurar hostVirtual

Ejecuta los comandos:

```sh $ cd /etc/apache2/sites-available/

$ sudo cp 000-default.conf registros_documentos.conf

$ sudo nano registros_documentos.conf

```

Personalizar el archivo registros_documentos así:

```sh
  <VirtualHost *:80>

	ServerName registros_documentos.local

	ServerAdmin webmaster@localhost

	DocumentRoot /var/www/html/registros_documentos

	<Directory /var/www/html/registros_documentos>
		Options Indexes FollowSymlinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
 </VirtualHost>
```

Guardas los cambios

```sh
  sudo a2ensite registros_documentos.conf
  sudo gedit /etc/hosts
```
Modificamos el archivo hosts de la siguiente manera

>127.0.0.1	localhost
>127.0.0.1	registros_documentos.local

Reescribimos y reseteamos apache

```sh
  sudo a2enmod rewrite
  sudo service apache2 restart
```
## Configurar base de datos

Dentro de la carpeta *config* se encuenta el archivo *database.php* donde podras modificar con las credenciales de tu servidor de base de datos

```sh
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'registros_documentos',
  'username'  => 'root',
  'password'  => 123456,
```

Dentro la capeta SQL se encuentra el archivo *tablas.sql* el cual es un script que deberas importar en tu base de datos para cargar las tablas

### Ya puedes acceder al CRUD
```sh
http://registros_documentos.local
```

## Licencia

MIT

**Enel Villafranca - enelv.com!**
