# Laravel SRI Ecuador 🇪🇨

Laravel SRI es un paquete que te permite generar, firmar y enviar documentos electrónicos (Factura, Guía de remisión, Nota crédito, Nota débito y Comprobante de retención) al SRI (Ecuador).

## Instalar

```bash
composer require dazza-dev/laravel-sri-ec
```

## Configurar

Publica el archivo de configuración:

```bash
php artisan vendor:publish --tag="laravel-sri-ec-config"
```

## Migraciones

Publica y ejecuta las migraciones:

```bash
php artisan vendor:publish --tag="laravel-sri-ec-migrations"
```

```bash
php artisan migrate
```

## Insertar los datos

```bash
php artisan sri-ec:install
```

## Variables de entorno

```bash
SRI_TEST=true # true o false
SRI_CERTIFICATE_PATH=ruta_del_certificado
SRI_CERTIFICATE_PASSWORD=clave_del_certificado
SRI_PATH=ruta_donde_se_guardaran_los_archivos
```

## Ejemplos

### Generar un documento electrónico

Para enviar un documento electrónico como Factura, Guía de remisión, Nota crédito, Nota débito o Comprobante de retención. primero debes pasar la estructura de datos que puedes encontrar en: [dazza-dev/sri-xml-generator](https://github.com/dazza-dev/sri-xml-generator).

```php
use DazzaDev\LaravelSriEc\Facades\LaravelSriEc;

$client = LaravelSriEc::getClient();

// Usar el valor en inglés de la tabla
$client->setDocumentType('invoice');

// Datos del documento
$client->setDocumentData($documentData);

// Enviar el documento
$document = $client->sendDocument();
```

### Tipos de documentos disponibles

| Documento                | Valor                 |
| ------------------------ | --------------------- |
| Factura                  | `invoice`             |
| Nota de crédito          | `credit-note`         |
| Nota de débito           | `debit-note`          |
| Guía de remisión         | `delivery-guide`      |
| Comprobante de retención | `withholding-receipt` |

### Obtener los listados

SRI tiene una lista de códigos que este paquete te pone a disposición para facilitar el trabajo de consultar esto en el anexo técnico:

```php
use DazzaDev\LaravelSriEc\Facades\LaravelSriEc;

// Obtener los listados disponibles
$listings = LaravelSriEc::getListings();

// Consultar los datos de un listado por tipo
$listingByType = LaravelSriEc::getListing('identification-types');
```

## Contribuciones

Las contribuciones son bienvenidas. Si encuentras algún error o tienes ideas para mejoras, por favor abre un issue o envía un pull request. Asegúrate de seguir las pautas de contribución.

## Autor

Laravel SRI Ecuador fue creado por [DAZZA](https://github.com/dazza-dev).

## Licencia

Este proyecto está licenciado bajo la [MIT License](https://opensource.org/licenses/MIT).
