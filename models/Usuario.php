<?php 

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;

class Usuario extends ActiveRecord {
    // base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email','password', 'telefono', 'admin',
    'confirmado', 'token' ];

    public $id;
    public $nombre;
    public $apellido; // atributos
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []) { // argumentos 
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    // mensaje de validacion para la creacion de una cuenta 
    public function validarNuevaCuenta() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'el nombre del cliente es obligatorio';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'el apellido del cliente es obligatorio';
        }
        if (!$this->telefono) {
            self::$alertas['error'][] = 'el telefono del cliente es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'el email del cliente es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'el password del cliente es obligatorio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'el password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function validarLogin() {
        if (!$this->email) {
            self::$alertas['error'][] = 'el email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'el password es obligatorio';
        }
        return self::$alertas;
    }

    public function validarEmail() {
        if (!$this->email) {
            self::$alertas['error'][] = 'el email es obligatorio';
        }
        return self::$alertas;
    }
    public function validarPassword() {
        if (!$this->password) {
            self::$alertas['error'][] = 'el password es obligatorio';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'el password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // revisa si el usuario existe
    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'el usuario esta autenticado';
        }
        return $resultado;
    }
    
    public function hashpassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password, $this->password);

        if(!$this->confirmado) {
            self::$alertas['error'] []= 'Password incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }
}