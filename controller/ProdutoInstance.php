<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoInstance
 *
 * @author felippe
 */
class ProdutoInstance {

    //put your code here

    public function c_gravar_produtos() {
        $produto = new ProdutoBean();

        $produto->setPrd_EAN13($_POST["prd_EAN13"]);
        $produto->setPrd_descricao($_POST["prd_descricao"]);
        $produto->setPrd_unmedida($_POST["prd_unmedida"]);
        $produto->setPrd_custo($_POST["prd_custo"]);
        $produto->setPrd_quantidade($_POST["prd_quantidade"]);
        $produto->setPrd_preco($_POST["prd_preco"]);
        $produto->setPrd_ativo($_POST["prd_ativo"]);

        $produto->setCat_codigo($_POST["cat_codigo"]);
        $produto->setFor_codigo($_POST["for_codigo"]);

        return ProdutoDao::getInstance()->m_gravar_produtos($produto);
    }

    public function c_buscar_todos_os_produtos() {
        return ProdutoDao::getInstance()->m_buscar_todos_os_produtos();
    }

    public function c_buscar_produto_por_codigo() {
        $produto = new ProdutoBean();
        $produto->setPrd_codigo($_GET["prd_codigo"]);
        return ProdutoDao::getInstance()->m_busca_produto_por_codigo();
    }

    public function c_alterar_produto() {
        $produto = new ProdutoBean();
        $produto->setPrd_codigo($_POST["prd_codigo"]);
        $produto->setPrd_EAN13($_POST["prd_EAN13"]);
        $produto->setPrd_descricao($_POST["prd_descricao"]);
        $produto->setPrd_unmedida($_POST["prd_unmedida"]);
        $produto->setPrd_custo($_POST["prd_custo"]);
        $produto->setPrd_quantidade($_POST["prd_quantidade"]);
        $produto->setPrd_preco($_POST["prd_preco"]);
        $produto->setCat_codigo($_POST["cat_codigo"]);
        $produto->setFor_codigo($_POST["for_codigo"]);
        $produto->setPrd_ativo($_POST["prd_ativo"]);
        return ProdutoDao::getInstance()->m_alterar_produtos($produto);
    }

}
