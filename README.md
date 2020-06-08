La idea del proyecto sería desarrollar una especie de tienda online de ropa. La página le mostraría a un "usuario" la ropa que esta "vende" y dicho usuario puede ver imagenes de los artículos y decidir comprar o no.

Habrá un usuario que será el "administrador" que sería el encargado de administrar la base de datos, cargando los productos a la página con una respectiva imagen para representarlos como también controlando el stock, etc. Este usuario tendría total control sobre la base de datos.

Luego habrá un usuario "cliente" que será el que visualice la "tienda" y decida comprar o no. En el caso de que decida comprar solamente se chequearía si hay stock de ese producto, en el caso que haya se le notificaría que pudo realizar la compra y en el caso que no se le dice que no hay stock del producto deseado.

Una entidad o tabla será el producto el cual tendrá asociado un nombre, un id que sería el nombre del modelo o el código del producto, un conjunto de imágenes (2-3) y una breve descripción de este.

Luego habrá otra tabla que tendrá los talles de los productos con el respectivo stock asociado a cada talle. Esta tabla se relacionará con la de los productos mediante el id de este.

También habrá una tabla de usuarios que mantenga el registro de todos los usuarios con su nombre de usuario, email y contraseña, la cual se utilizará para permitir el loggin a la página y en el caso de que un usuario desee recuperar su contraseña, enviarle un email con esta.
