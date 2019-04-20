<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriasInstance
 *
 * @author felippe
 */
class CategoriasInstance {

    function __construct() {
        
    }

    public function c_gravarCategorias() {
        $categoria = new CategoriasBean();
        $categoria->setCat_descricao($_POST["cat_descricao"]);
        return CategoriasDao::getInstance()->m_gravarCategorias($categoria);
    }

    public function c_alterarCategorias() {
        $categoria = new CategoriasBean();
        $categoria->setCat_codigo($_POST["cat_codigo"]);
        $categoria->setCat_descricao($_POST["cat_descricao"]);
        return CategoriasDao::getInstance()->m_alterarCategorias($categoria);
    }

    public function c_excluirCategorias() {
        $categoria = new CategoriasBean();
        $categoria->setCat_codigo($_GET["cat_codigo"]);
        return CategoriasDao::getInstance()->m_excluirCategorias($categoria);
    }

    public function c_buscaTodasCategorias() {
        return CategoriasDao::getInstance()->m_buscaTodasCategorias();
    }

    public function c_buscaCategoriasPorCodigo() {
        $categoria = new CategoriasBean();
        $categoria->setCat_codigo($_GET["cat_codigo"]);
        return CategoriasDao::getInstance()->m_buscaCategoriasPorCodigo($categoria);
    }

}
