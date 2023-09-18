# StaffBoom Task Management App

Este repositorio contiene el código fuente de la aplicación web de gestión de tareas desarrollada para la prueba técnica
de StaffBoom Perú. La aplicación se ha construido utilizando el framework Laravel para el backend y Vue.js para el
frontend.

## Requisitos Previos

Antes de comenzar a ejecutar la aplicación localmente, asegúrate de tener instalados los siguientes requisitos previos:

- PHP (versión 8.1 o superior)
- Composer

## Configuración Inicial

Siga estos pasos para configurar la aplicación localmente:

1. Clona este repositorio en tu máquina local:

   ```bash
   git clone https://github.com/mmartinrm97/prueba-tecnica-staff-boom-frontend.git
    ```

2. Navega al directorio del proyecto:

   ```bash
   cd prueba-tecnica-staff-boom-frontend
   ```

3. Instala las dependencias del proyecto:

   ```bash
    composer install
    ```

4. Crea un archivo `.env` en la raíz del proyecto y copia el contenido del archivo `.env.example` en él:
   Luego, configura las variables de entorno en el archivo .env según tu entorno local (base de datos SQL Server, etc.). y la url del servidor de FrontEnd

   ```dotenv
    DB_CONNECTION=sqlsrv
    DB_HOST=127.0.0.1
    DB_PORT=1433
    DB_DATABASE=nombre_de_tu_basededatos
    DB_USERNAME=nombre_de_usuario
    DB_PASSWORD=contraseña
    FRONTEND_URL=http://localhost:3000
   ```


5. Genera una nueva clave de aplicación:

   ```bash
   php artisan key:generate
   ```

6. Ejecuta las migraciones de la base de datos para crear las tablas necesarias:

   ```bash
   php artisan migrate --seed
   ```

## Ejecutando la aplicación

1. Después de configurar la aplicación, puedes ejecutarla localmente con el siguiente comando:

```bash
php artisan serve
```

2. Esto iniciará un servidor de desarrollo en http://localhost:8000. Abre tu navegador web y navega a esta dirección para
acceder a la aplicación. Las credenciales son las siguientes:


    - Email: admin@example.com
    - Password: password

ó

    - Email: standard@example.com
    - Password: password

