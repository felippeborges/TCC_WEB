<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CidadeBean
 *
 * @author felippe
 */
class CidadeBean {
    
    private $cid_codigo;
    private $cid_nome;
    private $cid_uf; 
    
    function getCid_codigo() {
        return $this->cid_codigo;
    }

    function getCid_nome() {
        return $this->cid_nome;
    }

    function getCid_uf() {
        return $this->cid_uf;
    }

    function setCid_codigo($cid_codigo) {
        $this->cid_codigo = $cid_codigo;
    }

    function setCid_nome($cid_nome) {
        $this->cid_nome = $cid_nome;
    }

    function setCid_uf($cid_uf) {
        $this->cid_uf = $cid_uf;
    }


}
