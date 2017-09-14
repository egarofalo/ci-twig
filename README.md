# Twigniter
Librería de CodeIgniter 3 para utilizar Twig como motor de plantillas.

# Requisitos
Twigniter necesita Twig 2.x y PHP 7.x para poder ser ejecutado.

# Instalación manual
Descargue la librería desde el repositorio y copie el archivo Twigniter.php a la carpeta <code>application/libraries</code> de CodeIgniter.

# Carga automática de la libreria
Para cargar la librería automaticamente, abra el archivo <code>application/config/autoload.php</code> y agregue la libreria al array <code>$autoload['libraries']</code>.

# Utilizar el Form Helper de CodeIgniter en Twig
Para poder utilizar las funciones <code>form_open()</code>, <code>form_close()</code>, <code>form_error()</code>, <code>set_value()</code>, <code>set_select()</code>, <code>set_checkbox()</code>, <code>set_radio()</code> y <code>validation_errors()</code> del Form Helper, abra el archivo <code>application/config/autoload.php</code> y agregue al array <code>$autoload['helpers']</code> el string <code>'form'</code>.

# Utilizar el URL Helper de CodeIgniter en Twig
Para poder utilizar las funciones <code>site_url()</code>, <code>base_url()</code>, <code>current_url()</code> y <code>uri_string()</code> del URL Helper, abra el archivo <code>application/config/autoload.php</code> y agregue al array <code>$autoload['helpers']</code> el string <code>'url'</code>.

# Comenzando a desarrollar con Twigniter
- Para comenzar a utilizar Twig en cualquier método de un controlador debe agregarla al array <code>$autoload['libraries']</code> o cargarla de forma manual en el constructor del controlador o en una acción del mismo justo antes de utilizarla. Para cargar la librería de forma manual se debe ejecutar <code>$this->load->library('twigniter')</code> (se recomienda utilizar la carga automática).
- Para enviar una vista al navegador se debe ejecutar <code>$this->twigniter->display('archivo', $params)</code> donde el parametro <code>'archivo'</code> es un archivo con extension <code>twig</code> ubicado en la carpeta <code>application/views</code> y el parametro <code>$params</code> es un array con pares <code>'clave' => valor</code> donde <code>clave</code> es el nombre de la variable disponible a utilizar en el archivo twig y <code>valor</code> es el valor de dicha variable.
- Para retornar el resultado de una vista en twig y guardarlo en una variable y hacer con ello lo que desean se debe ejecutar el método <code>$this->twigniter->render('archivo', $params)</code>. Los parámetros son los mismos que los del método <code>display()</code>.

# Extendiendo Twig


# Modo desarrollo y producción


