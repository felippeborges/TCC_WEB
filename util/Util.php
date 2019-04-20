<?php

class Util {

    static public function format_date_ANO_MES_DIA($data_br) {

        list($dia, $mes, $ano) = explode('/', $data_br);
        $data_padrao_PHP = $ano . '-' . $mes . '-' . $dia;
        return $data_padrao_PHP;
    }

    Static public function format_date_DIA_MES_ANO($data_EUA) {
        list($ano, $mes, $dia) = explode('-', $data_EUA);
        $data_brasil = $dia . '/' . $mes . '/' . $ano;
        return $data_brasil;
    }

}

?>
