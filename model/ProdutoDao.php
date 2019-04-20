<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoDao
 *
 * @author felippe
 */
class ProdutoDao {

    //put your code here
    private static $instance;

    function __construct() {
        
    }

    static public function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ProdutoDao ();
        return self::$instance;
    }

    public function m_gravar_produtos(ProdutoBean $produto) {
        try {
            $sql = "INSERT INTO produtos( prd_EAN13, prd_descricao, prd_unmedida, prd_custo, prd_quantidade, prd_preco, cat_codigo, for_codigo, prd_ativo) VALUES ( :prd_EAN13, :prd_descricao, :prd_unmedida, :prd_custo, :prd_quantidade, :prd_preco, :cat_codigo, :for_codigo, :prd_ativo)";

            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);

            $statement_sql->bindValue(":prd_EAN13", $produto->getPrd_EAN13());
            $statement_sql->bindValue(":prd_descricao", $produto->getPrd_descricao());
            $statement_sql->bindValue(":prd_unmedida", $produto->getPrd_unmedida());
            $statement_sql->bindValue(":prd_custo", $produto->getPrd_custo());
            $statement_sql->bindValue(":prd_quantidade", $produto->getPrd_quantidade());
            $statement_sql->bindValue(":prd_preco", $produto->getPrd_preco());
            $statement_sql->bindValue(":cat_codigo", $produto->getCat_codigo());
            $statement_sql->bindValue(":for_codigo", $produto->getFor_codigo());
            $statement_sql->bindValue(":prd_ativo", $produto->getPrd_ativo());

            return $statement_sql->execute();
        } catch (PDOException $e) {
            print "Erro em m_gravar_produtos" . $e->getMessage();
        }
    }

    public function m_buscar_todos_os_produtos() {
        try {
            $sql = "SELECT p.for_codigo,"
                    . "p.prd_unmedida,"
                    . "p.prd_codigo,"
                    . "p.prd_descricao,"
                    . "p.prd_EAN13,"
                    . "p.prd_custo,"
                    . "p.prd_preco,"
                    . "p.prd_ativo,"
                    . "p.prd_quantidade,"
                    . "c.cat_descricao from produtos o left outer join categorias c on c.cat_codigo = p.cat_codigo order by prd_descricao";

            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->execute();
            return $this->fetch_array($statement_sql);
        } catch (PDOException $e) {
            print "Erro em m_buscar_todos_os_produtos" . $e->getMessage();
        }
    }

    public function fetch_array($statement_sql) {

        $resultado = array();

        if ($statement_sql) {
            while ($linha = $statement_sql->fetch(PDO::FETCH_OBJ)) {

                $produto = new ProdutoBean();

                $produto->setPrd_codigo($linha->prd_codigo);
                $produto->setPrd_EAN13($linha->prd_EAN13);
                $produto->setPrd_descricao($linha->prd_descricao);
                $produto->setPrd_unmedida($linha->prd_unmedida);
                $produto->setPrd_custo($linha->prd_custo);
                $produto->setPrd_quantidade($linha->prd_quantidade);
                $produto->setPrd_preco($linha->prd_preco);
                $produto->setPrd_ativo($linha->prd_ativo);

                $produto->setFor_codigo($linha->for_codigo);
                $produto->setCat_descricao($linha->cat_descricao);

                $resultado[] = $produto;
            }
        }

        return $resultado;
    }

    private function m_popula_obejeto_produto($linha) {

        $produto = new ProdutoBean();

        $produto->setPrd_codigo($linha["prd_codigo"]);
        $produto->setPrd_descricao($linha["prd_descricao"]);
        $produto->setPrd_ativo($linha["prd_ativo"]);
        $produto->setPrd_EAN13($linha["prd_EAN13"]);
        $produto->setPrd_custo($linha["prd_custo"]);
        $produto->setPrd_unmedida($linha["prd_unmedida"]);
        $produto->setPrd_quantidade($linha["prd_quantidade"]);

        $produto->setCat_codigo($linha["cat_codigo"]);
        $produto->setCat_descricao($linha["cat_descricao"]);

        return $produto;
    }

    public function m_busca_produto_por_codigo(ProdutoBean $produto) {
        try {
            $sql = "SELECT p.prd_codigo,"
                    . "p.prd_descricao,"
                    . "p.prd_EAN13,"
                    . "p.prd_custo,"
                    . "p.prd_preco,"
                    . "p.prd_ativo,"
                    . "p.prd_quantidade,"
                    . "p.prd_unmedida,"
                    . "p.cat_codigo,"
                    . "c.cat_descricao from produtos p left outer join categorias c on c.cat_codigo = p.cat_codigo WHERE prd_codigo = :prd_codigo";

            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":prd_codigo", $produto->getPrd_codigo());
            $statement_sql->excute();
            return $this->m_popula_obejeto_produto($statement_sql->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            print "Erro emm_buscar_produto_por_codigo" . $e->getMessage();
        }
    }
    
    
    public function m_excluir_produto(ProdutoBean $produto){
        try {
            $sql = "DELETE FROM produtos WHERE prd_codigo = :prd_codigo";
            $statement_sql = ConexaoPDO::getInstance()->prepare($sql);
            $statement_sql->bindValue(":prd_codigo", $produto->getPrd_codigo());
            return $statement_sql->execute();
            
        } catch (PDOException $e) {
            print "Erro em m_excluir_produto".$e->getMessage();
        }
        }

}
