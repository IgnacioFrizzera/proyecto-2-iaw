# Idea del proyecto

La idea del proyecto sería desarrollar una especie de tienda online de ropa. La página le mostraría a un "usuario" la ropa que esta "vende" y dicho usuario puede ver imagenes de los artículos y decidir comprar o no.

Habrá un usuario que será el "administrador" que sería el encargado de administrar la base de datos, cargando los productos a la página con una respectiva imagen para representarlos como también controlando el stock, etc. Este usuario tendría total control sobre la base de datos.

Luego habrá un usuario "cliente" que será el que visualice la "tienda" y decida comprar o no. En el caso de que decida comprar solamente se chequearía si hay stock de ese producto, en el caso que haya se le notificaría que pudo realizar la compra y en el caso que no se le dice que no hay stock del producto deseado.

Una entidad o tabla será el producto el cual tendrá asociado un nombre, un id que sería el nombre del modelo o el código del producto, un conjunto de imágenes (2-3) y una breve descripción de este.

Luego habrá otra tabla que tendrá los talles de los productos con el respectivo stock asociado a cada talle. Esta tabla se relacionará con la de los productos mediante el id de este.

También habrá una tabla de usuarios que mantenga el registro de todos los usuarios con su nombre de usuario, email y contraseña, la cual se utilizará para permitir el loggin a la página y en el caso de que un usuario desee recuperar su contraseña, enviarle un email con esta.

# API
Se desarrollará una API que permita obtener la siguiente información de la página:
### Stock total de la página: cada entrada representará un producto con su respectivo código y el stock disponible en cada talle.
### Información de un producto específico: se brindará el código del producto a buscar a la API y esta retornará información de este.

## Uso de la API

### Registro:
La API puede ser usada tanto por usuarios registrados desde la página o usuarios registrados a traves de la URL de la API, la cual es la siguiente: https://mygenericshop.herokuapp.com/api/register. En el caso de utilizar la URL mencionada, se deberán completar los siguientes campos en la aplicación de Postman:

Primero que nada setear como una request POST y utilizar la URL: https://mygenericshop.herokuapp.com/api/register. Luego ir a la sección de body y hacer click sobre la opción de "form-data" luego completar los siguientes valores en la columna de key:
* name
* email
* password
* password_confirmation

Luego en la columna de values de cada elemento mencionado anteriormente completar con el valor deseado.

También es necesario ir a la sección Headers y completar lo siguiente: en la columna de key: "Accept" y en la de value: "application/json".

Una vez realizada la request se obtendrá un mensaje el cual podrá ser de error, en caso de que algun dato sea incorrecto o no respete con las reglas de validación propuestas por la API, o un mensaje que indique que se pudo registrar con exito, el cual será del siguiente estilo:

{

    "user": {
        "name": "api_testing_user",
        "email": "api_tester@tester.com",
        "updated_at": "2020-06-28T23:39:40.000000Z",
        "created_at": "2020-06-28T23:39:40.000000Z",
        "id": 3
    },
    "accessToken": "STRING PRIVADO DE CADA USUARIO"
    
}

Donde en el campo de accessToken figurará el código/token para poder utilizar las funcionalidades que provee la API y en el campo de name e email figurarán los campos completados por el usuario.

En el caso de que algun dato sea invalido figurará un mensaje del siguiente estilo:

{

    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ],
        "password": [
            "The password confirmation does not match."
        ]
    }
    
}

Donde este mensaje indica que se está queriendo registrar con un email que ya fue usado, y que el campo de password con el de password_confirmation no son iguales.

### Logeo:

Una vez registrado, se deberá proceder a logearse, en dicho caso se deberá utilizar la siguiente URL: https://mygenericshop.herokuapp.com/api/login.
En la aplicación de Postman haremos lo siguiente:

Primero que nada setear como una request POST y utilizar la URL: https://mygenericshop.herokuapp.com/api/login. Luego ir a la sección de body y hacer click sobre la opción de "form-data" luego completar los siguientes valores en la columna de key:  
* email
* password

Luego en las columnas de values irán los respectivos valores a completar.

Respecto a la sección de Headers realizar lo mismo que se mencionó en la explicación del **Registro**.

Una vez enviada la request pueden figurar dos tipos de mensaje, uno de error donde se indicará el tipo de error que ocurrió (puede ser de credenciales inválidas, etc.) y otro que indicará que se pudo logear con exito, en dicho caso debería figurar lo siguiente en Postman:

{

    "user": {
        "id": 1,
        "name": "api_testing_user",
        "email": "api_tester@tester.com",
        "email_verified_at": null,
        "type": "user",
        "created_at": null,
        "updated_at": null
    },
    "accessToken": "STRING PRIVADO DE CADA USUARIO"
    
}

Donde en el campo de accessToken figurará el código/token para poder utilizar las funcionalidades que provee la API y en el campo de name e email figurarán los datos del usuario que acaba de logear.

En el caso de que algun dato sea invalido figurará un mensaje del siguiente estilo:

{

    "message": "Invalid login data"

}

### Utilización:
Todo lo mencionada en estas secciones se podrá utilizar una vez se haya realizado el logeo en la API (lo explicado anteriormente).
#### Obtención del stock de la tienda:
Para realizar esta función se deberá utilizar la siguiente URL: https://mygenericshop.herokuapp.com/api/stock.

A lo que es la aplicación Postman vamos a tener que crear una request de tipo GET y utilizar la URL mencionada anteriormente. 

Una vez hecho esto, debemos dirigirnos a la sección de **"Authorization"** e ir a donde dice **"Type"** hacer click en esto y seleccionar la opción de **"Bearer Token" es crucial seleccionar esta forma de autorización para poder utilizar la API**. Una vez seleccionado esto figurara un campo de **"Token"** a la derecha donde aquí completaremos con el **"accessToken"** obtenido de tanto realizar el **Logeo** como el **Registro** en la API.

Luego iremos a la sección de **"Headers"** y completaremos con lo mismo que completamos tanto en la sección de **Logeo** como de **Registro**.

Una vez hecho esto hacemos click en Send y obtendremos el stock de nuestra tienda. Es importante setear la opción de **pretty**, ya que la tienda devuelve la información en este formato lo cual permite visualizarla de una mejor manera. Los resultados que obtendremos se verán de la siguiente manera:

[

    {
        
        "product_code": "NHBW1220",
        "s_stock": 1,
        "m_stock": 2,
        "l_stock": 2,
        "xl_stock": 0
    },
    
    {
        más productos...
    }    
    
]

#### Obtención de la información de un producto específico:
Para realizar esta función se deberá utilizar la siguiente URL: https://mygenericshop.herokuapp.com/api/product-info/.
A lo que es la aplicación Postman vamos a tener que crear una request de tipo GET y utilizar la URL mencionada anteriormente, una vez hecho procederemos a realizar lo mismo que se realizo en la sección de **"Authorization"** que se menciona en la sección de **Obtención del stock de la tienda**.

Luego iremos a la sección de **"Headers"** y completaremos con lo mismo que completamos tanto en la sección de **Logeo** como de **Registro** y de **Obtención del stock de la tienda**.

Una vez hecho esto modificaremos la URL que mencione anteriormente agregandole el **código** del producto a buscar, es decir la URL sería algo de la siguiente forma:
https://mygenericshop.herokuapp.com/api/product-info/ProductCode, donde si nuestro código fuera **XBY111** la URL se transformaría en lo siguiente: https://mygenericshop.herokuapp.com/api/product-info/XBY111.

Una vez modificada la URL con el código del producto hacemos click en Send y obtendremos la información del producto deseado. Es importante setear la opción de **pretty**, ya que la tienda devuelve la información en este formato lo cual permite visualizarla de una mejor manera. Los resultados que obtendremos se verán de la siguiente manera:

[

    {
        "name": "Nike Hoodie AB-1",
        "price": "79.99",
        "s_stock": 1,
        "m_stock": 2,
        "l_stock": 2,
        "xl_stock": 0
    }
    
]

En el caso que se busque con un código de un producto que no existe se mostrará el siguiente mensaje:

{

    "message": "No products where found with that code"

}

Indicando que no se encontraron productos con el código enviado.











