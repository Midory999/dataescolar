# Sistema Escolar

## Integrantes

- Yasmín Gallo
- José _______

## Tutores

- **Proyecto**: Elsa Fandiño
- **Coodinador**: Emerson Navarro
- **Sistema**: Francisco Berrios y <a href="https://github.com/fadrian06" target="_blank">
	Franyer Sánchez
</a>

## Requisitos del Sistema

- <a href="https://php.net" target="_blank">PHP</a> >= 8.1
- MySQL para persistencia de datos en producción.
- SQLite 3 para persistencia de datos en desarrollo.
- Apache >= 2.54 como servidor HTTP.
- <a href="https://getcomposer.org/download/" target="_blank">Composer</a>
para la instalación de dependencias.
- <a href="https://nodejs.org" target="_blank">NodeJS</a>
opcional para verificación de código en desarrollo.

## Instalación

1. Asegúrate que la carpeta del proyecto se encuentre dentro de los directorios raíz de Apache.
_(www)_ para WAMPP y <a href="https://laragon.org/download" target="_blank">Laragon</a> y
_(htdocs)_ para <a href="https://www.apachefriends.org/es/download.html" target="_blank">XAMPP</a>

2. Inicia una consola en la carpeta del sistema y ejecuta el siguiente comando:

```bash
composer install --no-dev
```

> Nota: si quieres instalar todas las dependencias (incluyendo las de desarrollo) ejecuta el siguiente
comando:
```bash
composer install
```

> Nota: si quieres instalar los verificadores de código definidos en el _package.json_ ejecuta el
siguiente comando:
```bash
npm install
```

3. Asegúrate de tener los servicios de **Apache** y **MySQL** encendidos y funcionando,
abre un navegador y accede a la URL **`localhost/dataescolar`** y verifica el funcionamiento
correcto del sistema.
