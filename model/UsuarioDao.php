<?php

class UsuarioDao {

    private static $instance;

    function __construct() {
        
    }

    static public function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UsuarioDao ();
        return self::$instance;
    }

    
    public function m_buscar_registro_por_usuario_senha(UsuarioBean $usuario) {
        try {
            $sql = "select * from usuarios where usu_usuario = :usu_usuario and usu_senha = :usu_senha and usu_liberado = 'S'";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindvalue(":usu_usuario", $usuario->getUsu_usuario());
            $statement_sql->bindvalue(":usu_senha", $usuario->getUsu_senha());
            $statement_sql->execute();
            return $this->m_popula_objeto_usuario($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print " Erro em m_buscar_registro_por_usuario_senha" . $e->getMessage();
        }
    }
}

