### **Descripción del Sistema Desarrollado**

El sistema desarrollado es una aplicación web basada en el patrón **MVC (Modelo-Vista-Controlador)** diseñada para gestionar un **registro de movimientos financieros**. Este sistema permite a los usuarios registrar, visualizar, editar y eliminar transacciones financieras, como ingresos y egresos, con la finalidad de llevar un control organizado y detallado de sus movimientos.

#### **Funcionalidades principales:**
1. **Registro de Movimientos:**
   - Los usuarios pueden agregar nuevos movimientos financieros proporcionando detalles como la fecha, número de factura, descripción, montos en las columnas "Debe" y "Haber", y el saldo resultante.
   
2. **Visualización de Movimientos:**
   - Los movimientos se muestran en una tabla ordenada por fecha, permitiendo al usuario ver un historial claro y organizado de todas las transacciones.

3. **Edición de Movimientos:**
   - Los usuarios pueden modificar cualquier movimiento existente, actualizando los datos según sea necesario.

4. **Eliminación de Movimientos:**
   - Los usuarios tienen la opción de eliminar movimientos que ya no sean relevantes o que hayan sido registrados incorrectamente.

5. **Filtrado por Rango de Fechas:**
   - El sistema incluye un filtro que permite visualizar movimientos dentro de un rango de fechas específico, facilitando la búsqueda de transacciones en períodos determinados.

6. **Exportación de Datos:**
   - Los usuarios pueden exportar los datos de la tabla a formatos como **Excel**, **PDF** o imprimirlos directamente desde la interfaz, gracias a la integración con la biblioteca **DataTables**.

7. **Cálculo Automático de Totales:**
   - El sistema calcula automáticamente los totales de las columnas "Debe" y "Haber" para la página actual de la tabla, proporcionando una visión rápida del balance financiero.

8. **Modo Oscuro/Claro:**
   - El sistema ahora incluye un botón en la esquina inferior derecha que permite a los usuarios alternar entre el modo oscuro y claro. Esta funcionalidad mejora la experiencia del usuario, especialmente en entornos con poca luz, y se mantiene la preferencia del usuario incluso después de recargar la página.

9. **Alertas Interactivas con SweetAlert2:**
   - Se integró **SweetAlert2** para mostrar alertas interactivas y amigables al realizar acciones como guardar, actualizar o eliminar movimientos. Esto mejora la retroalimentación visual y la experiencia del usuario.

---

### **Herramientas Utilizadas para el Desarrollo**

El desarrollo del sistema se realizó utilizando tecnologías modernas y herramientas ampliamente adoptadas en la industria del desarrollo web. A continuación, se detalla el stack tecnológico utilizado:

#### **1. Lenguajes de Programación:**
- **PHP:** Se utilizó PHP como lenguaje principal del backend para manejar la lógica del sistema, interactuar con la base de datos y procesar las solicitudes del usuario.
- **HTML/CSS/JavaScript:** Para la interfaz de usuario, se emplearon HTML para estructurar las páginas, CSS para estilizarlas y JavaScript para agregar interactividad y funcionalidades dinámicas.

#### **2. Frameworks y Bibliotecas:**
- **Bootstrap 4:** Se utilizó Bootstrap para crear una interfaz responsive y moderna, asegurando que el sistema sea accesible desde dispositivos móviles y de escritorio.
- **jQuery:** Se integró jQuery para simplificar la manipulación del DOM y mejorar la interacción con elementos dinámicos, como los botones de filtrado y exportación.
- **DataTables:** Esta biblioteca de JavaScript se empleó para mejorar la funcionalidad de las tablas, permitiendo la paginación, búsqueda, ordenamiento y exportación de datos.
- **SweetAlert2:** Se integró SweetAlert2 para mostrar alertas interactivas y mejorar la experiencia del usuario al realizar acciones críticas como guardar, actualizar o eliminar movimientos.

#### **3. Base de Datos:**
- **MySQL:** La base de datos fue implementada utilizando MySQL, un sistema de gestión de bases de datos relacional ampliamente utilizado. La tabla `movimientos` almacena todos los registros financieros, incluyendo campos como `id`, `fecha`, `factura`, `descripcion`, `debe`, `haber` y `saldo`.

#### **4. Patrón de Diseño:**
- **MVC (Modelo-Vista-Controlador):** El sistema sigue el patrón MVC para separar la lógica de negocio (Modelo), la presentación (Vista) y el manejo de solicitudes (Controlador). Esto garantiza un código limpio, modular y fácil de mantener.

#### **5. Herramientas de Desarrollo:**
- **XAMPP:** Se utilizó XAMPP como entorno de desarrollo local para ejecutar el servidor Apache y MySQL.
- **Git:** Git se empleó para el control de versiones, permitiendo gestionar cambios en el código fuente y colaborar de manera eficiente.
- **GitHub/GitLab:** El repositorio del proyecto se alojó en GitHub o GitLab para facilitar la administración del código y su despliegue.

#### **6. Dependencias y Librerías Adicionales:**
- **JSZip:** Para generar archivos comprimidos (como Excel).
- **PDFMake:** Para generar informes en formato PDF.
- **Font Awesome:** Para agregar íconos a los botones y mejorar la experiencia visual.

---

### **Estructura del Proyecto**

La estructura del proyecto sigue una organización clara basada en el patrón MVC:

```
/libro_registro
    /app
        /controllers       -> Contiene la lógica de controladores (MovimientoController.php)
        /models            -> Contiene la lógica de acceso a datos (MovimientoModel.php)
        /views             -> Contiene las vistas (movimientos.php, edit_movimiento.php)
    /config                -> Archivos de configuración (database.php)
    /public
        /css               -> Archivos CSS (styles.css, bootstrap.min.css)
        /js                -> Archivos JavaScript (scripts.js, DataTables, jQuery)
        index.php          -> Punto de entrada principal del sistema
    /vendor                -> Dependencias instaladas con Composer
    .htaccess              -> Configuración de redirecciones y permisos
    composer.json          -> Archivo de dependencias de Composer
```

---

### **Nuevas Características y Mejoras**

1. **Modo Oscuro/Claro:**
   - Se agregó un botón en la esquina inferior derecha que permite a los usuarios alternar entre el modo oscuro y claro. Esta funcionalidad mejora la experiencia del usuario, especialmente en entornos con poca luz, y se mantiene la preferencia del usuario incluso después de recargar la página.

2. **Alertas Interactivas con SweetAlert2:**
   - Se integró **SweetAlert2** para mostrar alertas interactivas y amigables al realizar acciones como guardar, actualizar o eliminar movimientos. Esto mejora la retroalimentación visual y la experiencia del usuario.

3. **Mejoras en la Interfaz de Usuario:**
   - Se optimizaron los estilos CSS para garantizar que los botones y otros elementos mantengan sus colores originales en ambos modos (oscuro y claro), mejorando la coherencia visual.

4. **Persistencia del Modo Oscuro/Claro:**
   - La preferencia del usuario respecto al modo oscuro o claro se guarda en el `localStorage` del navegador, lo que permite que la configuración se mantenga incluso después de recargar la página.

---

### **Conclusión**

Este sistema de registro de movimientos financieros es una solución práctica y eficiente para gestionar transacciones de manera organizada. Gracias a su diseño modular basado en el patrón MVC y el uso de tecnologías modernas como PHP, MySQL, Bootstrap, DataTables y SweetAlert2, el sistema es escalable, fácil de mantener y adaptable a futuras mejoras. Las nuevas características, como el modo oscuro/claro y las alertas interactivas, mejoran significativamente la experiencia del usuario y hacen que el sistema sea más intuitivo y amigable.



![image](https://github.com/user-attachments/assets/61184420-b41c-4d0d-a14f-8a028cb2d9f6)

![image](https://github.com/user-attachments/assets/ea50490d-3bfd-4b05-b26a-629928967604)



