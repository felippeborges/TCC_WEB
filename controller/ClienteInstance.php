<?php

/**
 * Description of ClienteInstance
 *
 * @author felippe
 */
class ClienteInstance {

    //put your code here
    public function c_gravar_cliente() {
        
        $cliente = new ClienteBean();
        $cliente->setCli_nome($_POST["cli_nome"]);
        $cliente->setCli_fantasia($_POST["cli_fantasia"]);
        $cliente->setCli_endereco($_POST["cli_endereco"]);
        $cliente->setUsu_codigo($_POST["usu_codigo"]);
        $cliente->setCli_bairro($_POST["cli_bairro"]);
        $cliente->setCli_cep($_POST["cli_cep"]);
        $cliente->setCid_codigo($_POST["cid_codigo"]);
        $cliente->setCli_contato($_POST["cli_contato"]);
        $cliente->setCli_nascimento(Util::format_date_ANO_MES_DIA($_POST["cli_nascimento"]));  // 10/05/2015
        $cliente->setCli_cpfcnpj($_POST["cli_cpfcnpj"]);
        $cliente->setCli_rginscricaoest($_POST["cli_rginscricaoest"]);
        $cliente->setCli_email($_POST["cli_email"]);
        $cliente->setCli_chave(md5($_POST["cli_nome"]));
        return ClienteDao::getInstance()->m_gravar_cliente($cliente);
    }

    public function c_alterar_cliente_WEB() {       
        $cliente = new ClienteBean();
        
        $cliente->setCli_codigo($_POST["cli_codigo"]);
        $cliente->setCli_nome($_POST["cli_nome"]);
        $cliente->setCli_fantasia($_POST["cli_fantasia"]);
        $cliente->setCli_endereco($_POST["cli_endereco"]);
        $cliente->setUsu_codigo($_POST["usu_codigo"]);
        $cliente->setCli_bairro($_POST["cli_bairro"]);
        $cliente->setCli_cep($_POST["cli_cep"]);
        $cliente->setCid_codigo($_POST["cid_codigo"]);
        $cliente->setCid_nome($_POST["cid_nome"]);
        $cliente->setCli_contato($_POST["cli_contato"]);
        $cliente->setCli_nascimento(Util::format_date_ANO_MES_DIA($_POST["cli_nascimento"]));  // 10/05/2015
        $cliente->setCli_cpfcnpj($_POST["cli_cpfcnpj"]);
        $cliente->setCli_rginscricaoest($_POST["cli_rginscricaoest"]);
        $cliente->setCli_email($_POST["cli_email"]);
        $cliente->setCli_chave($_POST["cli_chave"]);
        
        return ClienteDao::getInstance()->m_alterar_cliente_WEB($cliente);
    }

    public function c_buscar_todos_os_cliente() {
        return ClienteDao::getInstance()->m_buscar_todos_os_cliente();
    }

    public function c_buscar_cliente_por_codigo($codigo) {
        return ClienteDao::getInstance()->m_buscar_cliente_por_codigo($codigo);
        
    }

    public function c_buscar_cliente_por_chave($cli_chave) {
        
    }

    public function c_buscar_cliente_por_nome($cli_nome) {
        
    }

    public function c_buscar_cliente_do_vendedor($usu_codigo) {
        
    }

    public function c_excluir_cliente($codigo) {
        return ClienteDao::getInstance()->m_excluir_cliente($_GET["cli_codigo"]);
    }

}
