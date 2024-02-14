# practicaBackEnd
practica para backEnd en php Laravel
Nota: se trabajo sobre el php de xampp con la configuracion por defecto de usuario root para la creacion de Bd
para esta practica se empleo php por medio del framework laravel.
para ejecutar esta practica primero se debe realizar la migracion con el comando 

php artisan migrate
este comando creara las tablas necesarias, no es necesario crear antes la base de datos ya que este comando detecta si existe la bd si no existe la crea automaticamente y crea las tablas

posterior a la migracion debemos realizar la insercion de las semillas(registros) por medio del comando php artisan db:seed

una vez realizado esto ya es posible correr la aplicacion por medio de php artisan serve
