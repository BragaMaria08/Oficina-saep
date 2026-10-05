<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Veículos</title>
    </head>
    <body>
        <h1>Editar Veículos</h1>

        <form action="<?= base_url('veiculo/atualizar/'.$veiculo['VEI_ID']) ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?= $veiculo['VEI_NOME'] ?>" required>
            <br><br>
            <label>Data de Fabricação:</label><br>
            <input type="date" id="data_fabricacao" name="data_fabricacao" value="<?= $veiculo['VEI_DATA_FABRICACAO'] ?>" required>
            <br><br>

            <label>Cliente:</label><br>
            <select id="cliente" name="cliente" required>
                <?php foreach($cliente as $cli): ?>
                    <option value="<?= $cli['CLI_ID'] ?>"
                        <?= $cli['CLI_ID'] == $veiculo['FK_CLI_ID'] ? 'selected' : '' ?>>
                        <?= $cli['CLI_NOME'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <input type="submit" id="editar_veiculo" name="editar_veiculo" value="Salvar Alterações">
        </form>

        <br>
        <a href="<?= base_url('veiculo') ?>"><button>Voltar</button></a>
    </body>
</html>