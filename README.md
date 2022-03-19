
Credenciales de Admin.
Correo: dianalouvp@gmail.com
Contraseña: password

Endpoint Sucursales:
http://localhost:8000/api/branches
Parametros: ninguno

Endpoint Pizzas:
http://localhost:8000/api/pizzas
Parametros: ninguno

Endpoint Especialidades:
http://localhost:8000/api/blends
Parametros: ninguno

Enpoint Ingredientes:
http://localhost:8000/api/ingredients
Parametros: ninguno

Endpoint Ordenes:
http://localhost:8000/api/purchases?email=diana@gmail.com
Parametros: email

Endpoint Agregar Pizzas:
http://localhost:8000/api/purchases-store?email=diana@gmail.com&pizza_id=1&amount=1&type=2
Parametros: email, pizza_id, amount, type (se refiere al tipo de pizza, 1 para un ingrediente, 2 para especialidad)

Endpoint Finalizar Compra:
http://localhost:8000/api/purchases-complete?email=diana@gmail.com&name=Diana
Parametros: email, name

Para data de prueba ejecutar el comando:
	php artisan db:seed