<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CidadeInstance
 *
 * @author felippe
 */
class CidadeInstance {
    //put your code here
    public function c_buscar_cidade_por_estado($cid_uf){
        return CidadeDao::getInstance()->m_buscar_cidade_por_estado($cid_uf);
    }
}
