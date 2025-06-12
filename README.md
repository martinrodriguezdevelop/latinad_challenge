# LatinAD Challenge

## Tabla de Contenido

1. [Configuración](#configuración)
2. [Acceso al Contenedor](#acceso-al-contenedor)
3. [Coleccion POSTMAN](#postman)
3. [Ejecución de Pruebas](#ejecución-de-pruebas)
5. [Ejecutar PHPCS](#ejecutar-phpcs)

## Configuración

1. Clona el repositorio
```
git clone git@github.com:martinrodriguezdevelop/latinad_challenge.git
cd latinad_challenge

```

2. Duplica el archivo `.env.example` y renómbralo como `.env`:

```
cp .env.example .env
```

3. Asegúrate de tener Docker Desktop instalado en tu máquina. ([Descargar Docker Desktop](https://www.docker.com/products/docker-desktop))

4. Crea la carpeta 'data' en el root
```
mkdir data
```

5. Construye y ejecuta los contenedores de Docker utilizando `docker-compose`:

```
docker-compose build
docker-compose up -d
```

## Acceso al Contenedor

Para acceder al contenedor de la aplicación, ejecuta el siguiente comando:

```
docker exec -it latinad /bin/bash
```

Una vez dentro del contenedor, puedes instalar dependencias y migrar la base de datos:

```
composer install
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate --seed
```

Agrega la siguiente línea en tu archivo de hosts para que el dominio latinad.vm apunte a tu máquina local:

```
127.0.0.1 latinad.vm
```

## POSTMAN

La colección de POSTMAN se encuentra adjunta en el root con el nombre de archivo 
```
Insomnia_2025-06-11.yaml (LOCAL)
Insomnia_PROD_2025-06-12.yaml (PRODUCCION)
```

## Ejecución de Pruebas

Puedes ejecutar pruebas para la aplicación utilizando el siguiente comando:

```
php artisan test
```

# Documentación del API

La documentación completa del API se encuentra generada utilizando Swagger UI. Puedes acceder a la documentación en formato interactivo visitando las siguientes URLs:

```
http://latinad.vm/api/documentation (LOCAL)
https://8to7apvmqj.execute-api.us-east-1.amazonaws.com/api/documentation (PRODUCCION)
```

## Ejecutar PHPCS

Para ejecutar PHP CodeSniffer (PHPCS) y verificar el cumplimiento de los estándares de codificación, sigue estos pasos:

1. Asegúrate de haber instalado todas las dependencias ejecutando `composer install`.

2. Ejecuta el siguiente comando para verificar el código con PHPCS:

```bash
./vendor/bin/phing phpcs
```

Este comando analizará y corregira el código según el estándar definido en el archivo `tools/ruleset.xml` y mostrará los resultados en la consola.
