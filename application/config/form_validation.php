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
		array('field' => 'direccion', 'label' => 'Dirección', 'rules' => 'required|is_string|trim|max_length[200]|min_length[10]'),
		array('field' => 'telefono', 'label' => 'Telefono de contacto', 'rules' => 'required|numeric|trim|max_length[15]|min_length[6]'),
		array('field' => 'correo', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'presentacion', 'label' => 'Presentación', 'rules' => 'required|is_string|trim'),
	//array('field' => 'rut','label' => 'RUT','rules' => 'required|is_string|xss_clean|trim|esRut'),
	),
	/**
	 * elefante
	 * */
	'store_customer'
	=> array(
		array('field' => 'cliente', 'label' => 'Cliente', 'rules' => 'required|is_string|trim|max_length[200]|min_length[5]'),
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
	'login'
	=> array(
		array('field' => 'email', 'label' => 'Correo ', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'password', 'label' => 'Contraseña', 'rules' => 'required|is_string|trim'),
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

		array('field' => 'nombre', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|max_length[80]'),
		array('field' => 'apellidos', 'label' => 'Apellidos', 'rules' => 'required|is_string|trim|max_length[80]'),
		array('field' => 'dni', 'label' => 'DNI', 'rules' => 'required|numeric|trim|max_length[8]|min_length[8]'),
		array('field' => 'telefono', 'label' => 'Telefono', 'rules' => 'required|numeric|trim|max_length[10]'),
		array('field' => 'domicilio', 'label' => 'Direccion', 'rules' => 'required|is_string|trim|max_length[100]'),
		array('field' => 'email', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
		array('field' => 'password', 'label' => 'Password', 'rules' => 'required|is_string|trim|max_length[200]'),
		array('field' => 'tipo', 'label' => 'Tipo', 'rules' => 'required|numeric|trim|is_natural_no_zero'),
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
