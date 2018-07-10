<?php

/**
 * Reglas de validacion para formularios
 */
$config = array(
	/**
	 * add_formulario
	 * */

	'update_info'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[150]|min_length[2]'),
		array('field' => 'ruc', 'label' => 'RUC', 'rules' => 'required|numeric|trim|exact_length[11]'),
		array('field' => 'direccion', 'label' => 'Dirección', 'rules' => 'required|is_string|trim|max_length[200]|min_length[8]'),
		array('field' => 'telefono', 'label' => 'Telefono de contacto', 'rules' => 'required|numeric|trim|max_length[15]|min_length[6]'),
		array('field' => 'correo', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'presentacion', 'label' => 'Presentación', 'rules' => 'required|is_string|trim'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),

	'login'
        => array(
            array('field' => 'correo','label' => 'Correo ','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'pass','label' => 'Contraseña','rules' => 'required|is_string|trim'), 
    ),
     
	'contacto'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'name', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[255]|min_length[2]'),
		array('field' => 'phone', 'label' => 'Telefono de contacto', 'rules' => 'required|numeric|trim|max_length[15]|min_length[6]'),
		array('field' => 'correo', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'mensaje', 'label' => 'Presentación', 'rules' => 'required|is_string|trim'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	/**
	 * elefante
	 * */
	'tareas'
	=> array(
		array('field' => 'servicio_id', 'label' => 'Servicio al que pertenece el proyecto', 'rules' => 'required|numeric|trim'),
		array('field' => 'tarea', 'label' => 'Nombre de Tarea', 'rules' => 'required|is_string|trim|min_length[4]|max_length[200]'),
	),

	'reporte_usuario'
	=> array(
		array('field' => 'user_id', 'label' => 'Usuario', 'rules' => 'required|numeric'),
		array('field' => 'date1', 'label' => 'Fecha de Inicio', 'rules' => 'required'),
		array('field' => 'date2', 'label' => 'Fecha de fin', 'rules' => 'required'),
	),
	
	'store_customer'
	=> array(
		array('field' => 'cliente', 'label' => 'Cliente', 'rules' => 'required|is_string|trim|max_length[200]|min_length[2]'),
		array('field' => 'web', 'label' => 'Página web', 'rules' => 'valid_url'),
	),

	'store_proyect'
	=> array(
		array('field' => 'servicio_id', 'label' => 'Servicio al que pertenece el proyecto', 'rules' => 'required|numeric|trim'),
		array('field' => 'nombre', 'label' => 'Nombre del Proyecto', 'rules' => 'required|is_string|trim|min_length[5]'),
		array('field' => 'slug', 'label' => 'Slug', 'rules' => 'required|is_string|trim|min_length[5]|max_length[255]'),
		array('field' => 'tipo', 'label' => 'Estado del proyecto', 'rules' => 'required|in_list[proceso,concluido]'),
		array('field' => 'cliente_id', 'label' => 'Cliente al que se realizó el proyecto', 'rules' => 'required|numeric|trim'),
		array('field' => 'fecha', 'label' => 'Fecha de inicio del proyecto', 'rules' => 'required'),
		array('field' => 'descripcion', 'label' => 'Descripción del Proyecto', 'rules' => 'required|is_string|trim|min_length[5]'),

	),

	'slides'
	=> array(
		array('field' => 'titulo', 'label' => 'Título', 'rules' => 'required|is_string|trim|max_length[100]|min_length[3]'),
		array('field' => 'subtitulo', 'label' => 'Subtítulo', 'rules' => 'required|is_string|trim|max_length[200]|min_length[3]'),
	),

	'edit_filosofia'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'historia', 'label' => 'Historia', 'rules' => 'required|is_string|trim|min_length[10]'),
		array('field' => 'mision', 'label' => 'Misión', 'rules' => 'required|is_string|trim|min_length[10]'),
		array('field' => 'vision', 'label' => 'Visión', 'rules' => 'required|is_string|trim|min_length[10]'),
		array('field' => 'valores', 'label' => 'Valores', 'rules' => 'required|is_string|trim|min_length[10]'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),

	'servicios'
	=> array(
		array('field' => 'servicio', 'label' => 'Servicio', 'rules' => 'required|is_string|trim|max_length[150]|min_length[3]'),
		array('field' => 'descripcion', 'label' => 'Descripción', 'rules' => 'required|is_string|trim|min_length[3]'),
	),
	/**
	 * manzana
	 * */
	'manzana'
	=> array(
		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|xss_clean|max_length[5]'),
		array('field' => 'correo', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|xss_clean|valid_email'),
	),
	'add_producto'
	=> array(
		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[100]'),
		array('field' => 'precio', 'label' => 'Precio', 'rules' => 'required|numeric|trim'),
		array('field' => 'stock', 'label' => 'Stock', 'rules' => 'required|numeric|trim'),
	),
	
	'estante'
	=> array(
		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[45]'),
	),
	'add_editorial'
	=> array(
		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[100]'),
	),
	'add_categoria'
	=> array(
		array('field' => 'estante', 'label' => 'Estante', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		array('field' => 'categoria', 'label' => 'Categoria', 'rules' => 'required|is_string|trim|max_length[45]'),
	),
	'add_autor'
	=> array(
		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[80]'),
		array('field' => 'apellidos', 'label' => 'Apellidos', 'rules' => 'required|is_string|trim|max_length[80]'),
	),
	'add_libro'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'titulo', 'label' => 'Titulo', 'rules' => 'required|is_string|trim|max_length[200]'),
		array('field' => 'editorial_libro', 'label' => 'Editorial', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		array('field' => 'categoria_libro', 'label' => 'Categoria', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	'add_libro2'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'titulo', 'label' => 'Titulo', 'rules' => 'required|is_string|trim|max_length[200]'),
		array('field' => 'editorial_libro', 'label' => 'Editorial', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		array('field' => 'categoria_libro', 'label' => 'Categoria', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		array('field' => 'autor_libro', 'label' => 'Autor', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	
	'add_lector'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[80]'),
		array('field' => 'apellidos', 'label' => 'Apellidos', 'rules' => 'required|is_string|trim|max_length[80]'),
		array('field' => 'dni', 'label' => 'DNI', 'rules' => 'required|numeric|trim|max_length[8]|min_length[8]'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	
	
	'add_usuario'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[50]'),
		array('field' => 'apellidos', 'label' => 'Apellidos', 'rules' => 'required|is_string|trim|max_length[100]'),
		array('field' => 'dni', 'label' => 'DNI', 'rules' => 'required|numeric|trim|max_length[8]|min_length[8]'),
		array('field' => 'telefono', 'label' => 'Telefono', 'rules' => 'required|numeric|trim|max_length[12]'),
		array('field' => 'direccion', 'label' => 'Direccion', 'rules' => 'required|is_string|trim|max_length[255]'),
		array('field' => 'correo', 'label' => 'Correo Electrónico', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'password', 'label' => 'Password', 'rules' => 'required|is_string|trim|max_length[200]|min_length[8]'),
		array('field' => 'rol', 'label' => 'Rol de usuario', 'rules' => 'required|is_string|in_list[user,admin]'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	
	
	'add_prestamo'
	=> array(//dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar

		array('field' => 'lector_id', 'label' => 'Lector', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		//array('field' => 'ejemplar', 'label' => 'Ejemplar', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
		array('field' => 'fecha_maxima', 'label' => 'Fecha Entrega', 'rules' => 'required'),
		
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	
	'add_ejemplar'
	=> array(
		array('field' => 'libro_ejemplar', 'label' => 'Libro', 'rules' => 'required|trim|is_natural_no_zero'),
		array('field' => 'isbn', 'label' => 'ISBN', 'rules' => 'required|is_string|trim|max_length[20]'),
	),
		//éste es el final      
);
