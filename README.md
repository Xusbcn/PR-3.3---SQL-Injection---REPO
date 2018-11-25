# PR 3.3 - SQL Injection - REPO


Usuaris:  jordi  	Contrasenya: jordi123
Usuaris: jesus  	Contrasenya: jesus123
Usuaris:  flama  	Contrasenya: flama123


Para hacer las comprobaciones:

a) No segura: introducir usuario y contrasenya para comprobar que el usuario esta en la base de datos. Para ver la vulnerabilidad, introducir en el campo "Nombre"   jordi' or 1=1; -- lala' 
y se podra observar que nos devuelve el listado de todos los usuarios.

B) SEGURA: Si probamos lo mismo en la pagina segura con PDO veremos que nos sladra un memsaje de error.