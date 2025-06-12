Perfecto, si estás trabajando con un **proyecto Laravel recién creado** mediante:

```bash
composer create-project laravel/laravel proyecto-laravel-sesion10
```

y **no necesitas conexión a base de datos**, entonces los pasos para levantarlo en local son aún más simples.

---

### ✅ Pasos para levantar tu proyecto Laravel sin base de datos:

1. **Entra al directorio del proyecto**

```bash
cd proyecto-laravel-sesion10
```

2. **Copia el archivo `.env.example` a `.env`**

```bash
cp .env.example .env
```

3. **Genera la clave de la aplicación**

```bash
php artisan key:generate
```

4. **Levanta el servidor local de Laravel**

```bash
php artisan serve
```

Esto iniciará el servidor en:

```
http://127.0.0.1:8000
```

---

### 🧩 Notas:

* Aunque no uses base de datos, Laravel necesita el archivo `.env` y la clave de la aplicación para funcionar correctamente.
* Puedes empezar a crear rutas, vistas y controladores sin tocar nada de la base de datos.

¿Quieres un ejemplo simple de ruta + controlador para ver algo en pantalla?



