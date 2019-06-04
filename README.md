# 💰 Laravel MercadoPago Prepaid Subscriptions 💰

Dado que la sección sobre *suscripciones* (o *pagos recurrentes*) fue removida recientemente de la documentación de MercadoPago para desarrolladores, fue necesario crear una **alternativa**.

La funcionalidad de este paquete no es exactamente igual a la de las suscripciones típicas. En cambio, provee la lógica necesaria para implementar **suscripciones prepagas** dentro de una aplicación desarrollada en [Laravel](https://laravel.com).

## ¿Qué son las *suscripciones prepagas*?

TODO: completar

## Instalación

Instalar el paquete con `composer`

```bash
composer require javoscript/laravel-mercadopago-prepaid-subscriptions

```

Correr las migraciones
```bash
php artisan migrate
```

Publicar la configuración
```bash
php artisan vendor:publish --provider="Javoscript\PrepaidSubs\PrepaidSubsServiceProvider" --tag=config
```

(Opcional) Publicar las vistas para customizarlas
```bash
php artisan vendor:publish --provider="Javoscript\PrepaidSubs\PrepaidSubsServiceProvider" --tag=views
```


## Configuración

### Variables de entorno
Agregar las variables de entorno en el archivo .env:
```
MP_PUBLIC_KEY=
MP_ACCESS_TOKEN=
MP_SANDBOX_PUBLIC_KEY=
MP_SANDBOX_ACCESS_TOKEN=
```

Estas se pueden obtener de [MercadoPago](https://www.mercadopago.com/mla/account/credentials).

### Configuración del paquete

Editar el archivo publicado (ver sección de instalación: publicar config) en `config/prepaid-subs.php`:

* `route_prefix`: indica el prefijo que se usarán para las rutas utilizadas por el paquete
* `free_trial`: tiempo del free trial
* `sandbox_mode`: variable que indica si la integración de MercadoPago se realiza en modo de prueba
* `plans`: planes que ofrece el paquete (respetar formato)

#### Estructura de Planes en la configuración
TODO: completar

## Uso

### Estructura general
TODO: completar

### Clase `Javoscript\PrepaidSubs\PrepaidPlan`
* `$plan->getId()`
* etc...

### Facade
TODO: completar

#### Cuentas
TODO: completar

#### Planes
TODO: completar

### Trait
(Opcional) El paquete incluye un Trait que se puede agregar a los modelos que se quieran relacionar con las cuentas de suscripciones
TODO: completar

### Views
El paquete incluye dos vistas a modo de ejemplo para la implementación del lado del frontend.
TODO: completar

#### Planes
TODO: compoletar

#### Payments
TODO: completar


## Licencia

MIT License (MIT). Ver [Licencia](LICENSE.md) para más información.
