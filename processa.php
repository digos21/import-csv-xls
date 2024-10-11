<?php
// recebe todos os dados da página index em relação ao csv ou xls
if (isset($_POST["file"]) != 0) {

    echo "arquivo pronto para o envio";
} else {
    echo "não existe arquivo para enviar ao banco!";
}

?>