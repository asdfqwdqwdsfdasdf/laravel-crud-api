# 📝 Práctica Calificada: Sistema de Gestión de Proyectos y Tareas (ProjectFlow)

## 🎯 Objetivo

Desarrollar un sistema web completo para la gestión de proyectos, tareas y usuarios, integrando **HTML**, **CSS**, **Bootstrap**, **JavaScript**, **Laravel** y **MySQL**.  
El enfoque principal estará en el backend y las relaciones complejas de la base de datos.

---

## 🛠️ Tecnologías a utilizar

- **HTML5**: Estructura de las páginas.
- **CSS3**: Estilos personalizados.
- **Bootstrap 5**: Framework CSS para diseño responsivo.
- **JavaScript (Vanilla JS o jQuery)**: Interactividad del lado del cliente y solicitudes AJAX.
- **Laravel 10.x**: Backend (rutas, controladores, modelos, migraciones, Eloquent ORM, Seeders).
- **MySQL**: Base de datos relacional.

---

## 📌 Descripción del Proyecto

El sistema **ProjectFlow** permitirá:
- Gestionar proyectos.
- Asignar usuarios a roles específicos dentro de los proyectos.
- Crear tareas asociadas a los proyectos.
- Mantener un registro de etiquetas para organizar mejor las tareas.

---

## 🗃️ Estructura de la Base de Datos y Reglas de Negocio

Todas las tablas deben crearse usando **Laravel Migrations**.  
Se proponen 6 tablas principales y 2 tablas pivote:

### 1. `users` (Usuarios)

- **Propósito**: Almacena la información de los usuarios.
- **Campos**:
  - `id`, `name`, `email`, `password`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Email único y contraseña hasheada.
  - Un usuario puede crear múltiples proyectos (1:M).
  - Relación M:M con proyectos a través de `project_user`.
  - Un usuario puede tener múltiples tareas asignadas (1:M).

---

### 2. `projects` (Proyectos)

- **Propósito**: Contiene la información de los proyectos.
- **Campos**:
  - `id`, `title`, `description`, `status`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Título obligatorio.
  - Validación entre `start_date` y `end_date`.
  - 1 creador por proyecto (FK a `users`).
  - Relaciones: 1:M con `tasks`, M:M con `users` (vía `project_user`).

---

### 3. `roles` (Roles)

- **Propósito**: Define roles dentro de proyectos (ej. "Manager", "Developer").
- **Campos**:
  - `id`, `name`, `description`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Nombre único.
  - Relación M:M con `users` y `projects` a través de `project_user`.

---

### 4. `project_user` (Pivote M:M entre Proyectos, Usuarios y Roles)

- **Propósito**: Relaciona usuarios con proyectos y les asigna un rol.
- **Campos**:
  - `user_id`, `project_id`, `role_id`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Un usuario solo puede tener un rol por proyecto.
  - Clave compuesta `(user_id, project_id)`.
  - `onDelete('cascade')`.

---

### 5. `tasks` (Tareas)

- **Propósito**: Almacena tareas dentro de un proyecto.
- **Campos**:
  - `id`, `title`, `description`, `status`, `priority`, `due_date`, `project_id`, `assigned_to_user_id`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Cada tarea debe pertenecer a un proyecto.
  - El usuario asignado debe estar en ese proyecto.
  - M:M con `tags` a través de `task_tag`.

---

### 6. `tags` (Etiquetas)

- **Propósito**: Categorizar tareas (ej. "Frontend", "Bug").
- **Campos**:
  - `id`, `name`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Nombre único.
  - M:M con `tasks` a través de `task_tag`.

---

### 7. `task_tag` (Pivote M:M entre Tareas y Etiquetas)

- **Propósito**: Relaciona tareas con múltiples etiquetas.
- **Campos**:
  - `task_id`, `tag_id`, `created_at`, `updated_at`
- **Reglas de Negocio**:
  - Clave compuesta `(task_id, tag_id)`.
  - `onDelete('cascade')`.

---

## 🔧 Requisitos Funcionales y Técnicos

### 1. Backend (Laravel + MySQL)

#### 🏗️ Migraciones:
- Crear todas las tablas con claves foráneas y `onDelete('cascade')`.

#### 🧠 Modelos Eloquent:
- Crear modelos: `User`, `Project`, `Role`, `Task`, `Tag`.
- Definir relaciones: `hasMany`, `belongsTo`, `belongsToMany`.

#### 🌱 Seeders:
- Insertar datos de prueba en todas las tablas para testear relaciones.

#### 🚦 Controladores y Rutas:
- **Projects (CRUD)**:
  - Listar, crear, ver, actualizar y eliminar proyectos.
  - Asignar/desasignar usuarios a un proyecto con roles.
- **Tasks (CRUD)**:
  - Listar por proyecto, crear, ver, actualizar, eliminar.
  - Asignar/desasignar etiquetas.
- Usar Resource Controllers y API Resources para respuestas JSON.

#### ✔️ Validación de Datos:
- Implementar Laravel Request Validation.

---

### 2. Frontend (HTML, CSS, Bootstrap, JavaScript)

#### 🧭 Páginas Principales:

- **Dashboard de Proyectos**:
  - Lista de proyectos.
  - Crear nuevo proyecto.
  - Botón para ver detalles.

- **Detalle del Proyecto**:
  - Información completa del proyecto.
  - Lista de tareas y usuarios asignados.
  - Formulario para añadir tareas y usuarios.
  - Botones para editar/eliminar.

- **Gestión de Tareas**:
  - Modal o página para editar tareas.
  - Eliminar tarea.
  - Gestionar etiquetas.

#### 🔄 Interactividad (AJAX):
- Usar `fetch` o `$.ajax`.
- Actualizar la UI dinámicamente sin recargar la página.

#### 🎨 Diseño:
- Bootstrap 5 para diseño moderno y responsivo.
- Estilos CSS personalizados.

#### ⚠️ Errores y Notificaciones:
- Mostrar mensajes con librerías como SweetAlert2 o Toastr.
- Mostrar validaciones de Laravel en el frontend.

---

## 📊 Criterios de Evaluación

### 1. Modelo de Base de Datos y Migraciones (25%)
- Tablas correctamente definidas.
- Relaciones bien implementadas.
- Migrations y Seeders completos.
- Integridad referencial asegurada.

### 2. Backend (Laravel) (40%)
- Modelos y relaciones completas.
- CRUD de Proyectos y Tareas funcionales.
- Asignación de roles y etiquetas.
- Validación robusta.
- Estructura limpia y uso de Resource Controllers/API Resources.

### 3. Frontend (25%)
- UI completa y funcional.
- Diseño responsivo con Bootstrap.
- AJAX para interacciones.
- Manejo de errores adecuado.

### 4. Calidad del Código (10%)
- Código limpio y comentado.
- Buenas prácticas Laravel/PHP.
- Separación clara frontend/backend.

---

## 💡 Recomendaciones Adicionales

- **Autenticación/Autorización** (opcional pero recomendado):  
  Implementar Laravel Breeze o Jetstream, y reglas de acceso (ej. solo el creador puede editar un proyecto).

- **Soft Deletes**:  
  Usar en `Project` y `Task` para borrado lógico.

- **Paginación**:  
  Añadir si hay muchas tareas o proyectos.

---








 
## Preparación del entorno

### 1. Instala Laravel (ya corregiste las extensiones necesarias)

```bash
composer create-project laravel/laravel projectflow
cd projectflow
```

### 2. Crea el archivo `.env` (Laravel lo hace automáticamente)

Configura tu base de datos en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projectflow
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### 3. Crea la base de datos en MySQL

```sql
CREATE DATABASE projectflow;
```

---
 
# DEFINICION ESQUEMAS DE MIGRACION:
Aquí tienes **los esquemas completos y correctos** de cada migración para tu proyecto **ProjectFlow**, basados en las reglas de negocio y relaciones que mencionaste.

```php
php artisan make:migration create_projects_table
php artisan make:migration create_roles_table
php artisan make:migration create_project_user_table
php artisan make:migration create_tasks_table
php artisan make:migration create_tags_table
php artisan make:migration create_task_tag_table
```


---

## 🧩 1. Tabla `users` (ya existe en Laravel, solo asegúrate de esto)

```php
// database/migrations/xxxx_xx_xx_create_users_table.php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
}
```

---

## 🧩 2. Tabla `projects`

```php
// database/migrations/xxxx_xx_xx_create_projects_table.php
public function up()
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
        $table->date('start_date')->nullable();
        $table->date('end_date')->nullable();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // creador
        $table->timestamps();
    });
}
```

---

## 🧩 3. Tabla `roles`

```php
// database/migrations/xxxx_xx_xx_create_roles_table.php
public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
```

---

## 🧩 4. Tabla `project_user` (pivot con roles)

```php
// database/migrations/xxxx_xx_xx_create_project_user_table.php
public function up()
{
    Schema::create('project_user', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('project_id');
        $table->unsignedBigInteger('role_id');
        $table->timestamps();

        $table->primary(['user_id', 'project_id']);

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    });
}
```

---

## 🧩 5. Tabla `tasks`

```php
// database/migrations/xxxx_xx_xx_create_tasks_table.php
public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('status', ['todo', 'in_progress', 'done'])->default('todo');
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        $table->date('due_date')->nullable();
        $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
        $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->onDelete('set null');
        $table->timestamps();
    });
}
```

---

## 🧩 6. Tabla `tags`

```php
// database/migrations/xxxx_xx_xx_create_tags_table.php
public function up()
{
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->timestamps();
    });
}
```

---

## 🧩 7. Tabla `task_tag` (pivot entre tasks y tags)

```php
// database/migrations/xxxx_xx_xx_create_task_tag_table.php
public function up()
{
    Schema::create('task_tag', function (Blueprint $table) {
        $table->unsignedBigInteger('task_id');
        $table->unsignedBigInteger('tag_id');
        $table->timestamps();

        $table->primary(['task_id', 'tag_id']);

        $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
}
```

---

## ✅ Siguiente paso:

Una vez creadas todas las migraciones, ejecuta:

```bash
php artisan migrate:fresh
```

---

¿Quieres que te genere también todos los modelos Eloquent con sus relaciones (`hasMany`, `belongsToMany`, etc.) ya configuradas correctamente?


¡Perfecto! A continuación tienes la **guía completa y corregida** para crear y poblar tu base de datos en Laravel mediante _seeders_, basada en tu esquema de migraciones y considerando los errores corregidos como la omisión del `use DB`.

---

# Seeders de Datos

## 🎯 Objetivo

Poblar la base de datos con datos de prueba para:

- Verificar las relaciones entre las tablas.
    
- Probar funcionalidades en desarrollo.
    

---

## 🧪 1. Crear Seeders para cada tabla

Ejecuta los siguientes comandos en la terminal:

```bash
php artisan make:seeder RolesTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder ProjectsTableSeeder
php artisan make:seeder ProjectUserTableSeeder
php artisan make:seeder TasksTableSeeder
php artisan make:seeder TagsTableSeeder
php artisan make:seeder TaskTagTableSeeder
```

---

## 🛠️ 2. Edita cada seeder agregando `use DB` si usarás `DB::table(...)`

Agrega en la parte superior de cada archivo que use `DB::table`:

```php
use Illuminate\Support\Facades\DB;
```

---

## 📄 3. Ejemplos de contenido por seeder

### 🔹 `RolesTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Manager', 'description' => 'Project manager'],
            ['name' => 'Developer', 'description' => 'Software developer'],
            ['name' => 'Tester', 'description' => 'Quality assurance tester'],
        ]);
    }
}
```

---

### 🔹 `UsersTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => Hash::make('password')],
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => Hash::make('password')],
            ['name' => 'Charlie', 'email' => 'charlie@example.com', 'password' => Hash::make('password')],
        ]);
    }
}
```

---

### 🔹 `ProjectsTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Plataforma de E-learning',
                'description' => 'Sistema de gestión de aprendizaje',
                'status' => 'pending',
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'user_id' => 1,
            ],
            [
                'title' => 'App de Gestión de Tareas',
                'description' => 'Herramienta para equipos de trabajo',
                'status' => 'in_progress',
                'start_date' => now()->subDays(10),
                'end_date' => now()->addDays(20),
                'user_id' => 2,
            ],
        ]);
    }
}
```

---

### 🔹 `ProjectUserTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('project_user')->insert([
            ['user_id' => 1, 'project_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'project_id' => 1, 'role_id' => 2],
            ['user_id' => 3, 'project_id' => 1, 'role_id' => 3],
            ['user_id' => 2, 'project_id' => 2, 'role_id' => 1],
            ['user_id' => 3, 'project_id' => 2, 'role_id' => 2],
        ]);
    }
}
```

---

### 🔹 `TasksTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'title' => 'Diseñar base de datos',
                'description' => 'Estructura inicial del proyecto',
                'status' => 'todo',
                'priority' => 'high',
                'due_date' => now()->addDays(5),
                'project_id' => 1,
                'assigned_to_user_id' => 1,
            ],
            [
                'title' => 'Maquetar frontend',
                'description' => 'Diseño de interfaz',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(10),
                'project_id' => 1,
                'assigned_to_user_id' => 2,
            ],
            [
                'title' => 'Desarrollar API',
                'description' => 'Backend con Laravel',
                'status' => 'done',
                'priority' => 'high',
                'due_date' => now()->addDays(15),
                'project_id' => 2,
                'assigned_to_user_id' => 3,
            ],
        ]);
    }
}
```

---

### 🔹 `TagsTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Frontend'],
            ['name' => 'Backend'],
            ['name' => 'Base de datos'],
            ['name' => 'Bug'],
            ['name' => 'Feature'],
        ]);
    }
}
```

---

### 🔹 `TaskTagTableSeeder.php`

```php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTagTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('task_tag')->insert([
            ['task_id' => 1, 'tag_id' => 3], // Base de datos
            ['task_id' => 2, 'tag_id' => 1], // Frontend
            ['task_id' => 3, 'tag_id' => 2], // Backend
            ['task_id' => 3, 'tag_id' => 5], // Feature
        ]);
    }
}
```

---

## 🧩 4. Ejecutar todos los seeders

### Paso 1: Regístralos en `DatabaseSeeder.php`

```php
public function run(): void
{
    $this->call([
        RolesTableSeeder::class,
        UsersTableSeeder::class,
        ProjectsTableSeeder::class,
        ProjectUserTableSeeder::class,
        TasksTableSeeder::class,
        TagsTableSeeder::class,
        TaskTagTableSeeder::class,
    ]);
}
```

### Paso 2: Ejecutar migraciones + seeders

```bash
php artisan migrate:fresh --seed
```

---

## ✅ Resultado Esperado

- Usuarios creados con roles.
    
- Proyectos asignados a usuarios.
    
- Tareas asignadas con etiquetas.
    
- Relaciones M:M correctamente enlazadas (usuarios-proyectos, tareas-etiquetas).
    

---

 


Perfecto. A continuación te entrego **todos los modelos Eloquent necesarios** para tu proyecto **ProjectFlow**, **completamente configurados con sus relaciones** según las reglas de negocio que planteaste.

---

## 🧠 1. Modelo `User`

```php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    // 🔗 Relación: Un usuario puede crear muchos proyectos
    public function createdProjects()
    {
        return $this->hasMany(Project::class);
    }

    // 🔗 Relación: Usuarios que participan en muchos proyectos (M:M)
    public function projects()
    {
        return $this->belongsToMany(Project::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    // 🔗 Relación: Un usuario tiene muchos roles a través de proyectos
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'project_user')
                    ->withPivot('project_id')
                    ->withTimestamps();
    }

    // 🔗 Relación: Un usuario puede tener muchas tareas asignadas
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to_user_id');
    }
}
```

---

## 🧠 2. Modelo `Project`

```php
// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'start_date', 'end_date', 'user_id'];

    // 🔗 Creador del proyecto
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔗 Usuarios que participan en este proyecto
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    // 🔗 Tareas del proyecto
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // 🔗 Roles asignados a usuarios en este proyecto (a través de la tabla pivote)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'project_user')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }
}
```

---

## 🧠 3. Modelo `Role`

```php
// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // 🔗 Usuarios con este rol en proyectos
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user')
                    ->withPivot('project_id')
                    ->withTimestamps();
    }

    // 🔗 Proyectos donde se ha asignado este rol
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }
}
```

---

## 🧠 4. Modelo `Task`

```php
// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'priority',
        'due_date', 'project_id', 'assigned_to_user_id'
    ];

    // 🔗 Proyecto al que pertenece la tarea
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // 🔗 Usuario asignado a la tarea
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    // 🔗 Etiquetas asociadas a la tarea
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
```

---

## 🧠 5. Modelo `Tag`

```php
// app/Models/Tag.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // 🔗 Tareas que tienen esta etiqueta
    public function tasks()
    {
        return $this->belongsToMany(Task::class)->withTimestamps();
    }
}
```

---

✅ **Resumen de Relaciones Clave**:

| Modelo  | Relaciones Principales                                                                    |
| ------- | ----------------------------------------------------------------------------------------- |
| User    | `hasMany(Project)` creados, `belongsToMany(Project)` con roles, `hasMany(Task)` asignadas |
| Project | `belongsTo(User)` creador, `hasMany(Task)`, `belongsToMany(User)` con roles               |
| Role    | `belongsToMany(User)`, `belongsToMany(Project)`                                           |
| Task    | `belongsTo(Project)`, `belongsTo(User)` asignado, `belongsToMany(Tag)`                    |
| Tag     | `belongsToMany(Task)`                                                                     |

---

¿Quieres que también te genere los **Factorys + Seeders con datos de ejemplo** para probar las relaciones desde Tinker o con endpoints?





