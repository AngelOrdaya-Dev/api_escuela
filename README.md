# ⚙️ CAMPUS ANGEL - Backend API (Laravel)

Esta es la API RESTful de mi proyecto **Campus Angel**, construida en **Laravel** para dar soporte y servir de backend a la aplicación cliente en React. Se encarga de procesar todas las operaciones CRUD y validaciones de base de datos de manera segura y en tiempo real.

---

## 🛠️ Tecnologías y Estructura del Servidor

*   **Framework**: Laravel (PHP).
*   **Base de Datos**: MySQL (con soporte local de XAMPP y conexión remota a base de datos gestionada en producción).
*   **Autenticación y CORS**: Middleware configurado para permitir peticiones seguras (`CORS`) desde la aplicación frontend en Vercel o localmente.
*   **ORM Eloquent**: Modelos relacionales complejos para el mapeo de tablas de la base de datos.

---

## 📋 Endpoints de la API

La API expone los siguientes recursos de acceso público:

| Recurso | Método | Endpoint | Descripción |
|---|---|---|---|
| **Alumnos** | `GET` | `/api/alumnos` | Obtener listado de aspirantes |
| | `POST` | `/api/alumnos` | Crear nuevo aspirante (valida DNI único) |
| | `GET` | `/api/alumnos/{id}` | Obtener detalles de un alumno |
| | `PUT` | `/api/alumnos/{id}` | Actualizar datos del alumno |
| | `DELETE` | `/api/alumnos/{id}` | Eliminar alumno de la base de datos |
| **Mentores** | `GET` | `/api/profesores` | Obtener listado de mentores |
| | `POST` | `/api/profesores` | Registrar nuevo mentor (valida DNI y correo) |
| | `PUT` | `/api/profesores/{id}` | Actualizar datos del mentor |
| | `DELETE` | `/api/profesores/{id}` | Eliminar mentor |
| **Programas** | `GET` | `/api/cursos` | Obtener catálogo de programas |
| | `POST` | `/api/cursos` | Crear nuevo programa |
| | `PUT` | `/api/cursos/{id}` | Actualizar programa |
| **Matrículas**| `POST` | `/api/matriculas` | Registrar una nueva matrícula VIP |

---

## 🚀 Despliegue en Producción

El backend y la base de datos están alojados en la nube:
*   **Servicio de Alojamiento**: **Railway**
*   **Base de Datos**: MySQL remota integrada en Railway.
*   **URL Base de Producción**: `https://apiescuela-production.up.railway.app/api`

---

## 👤 Autor
*   **Desarrollado por**: Angel Ordaya (AngelOrdaya-Dev)
*   **Frontend del Proyecto**: [Repositorio del Frontend](https://github.com/AngelOrdaya-Dev/Proyecto-React-)
