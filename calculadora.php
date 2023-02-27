<?php
$valor_principal = $_POST['valor_principal'];
$taxa_juros = $_POST['taxa_juros'] / 100;
$prazo = $_POST['prazo'];
$periodo = $_POST['periodo'];
$tipo_calculo = $_POST['tipo_calculo'];
$contribuicao_mensal = $_POST['contribuicao_mensal'];
$imposto_renda = $_POST['imposto_renda'];

if ($periodo == "meses") {
    $prazo = $prazo / 12;
}

if ($tipo_calculo == "simples") {
    $valor_bruto = $valor_principal + ($valor_principal * $taxa_juros * $prazo);
    $valor_total = $valor_bruto;

    for ($i = 1; $i <= $prazo; $i++) {
        $valor_total += $contribuicao_mensal;
    }

    $rendimento_bruto = $valor_bruto - $valor_principal;
    $rendimento_liquido = $rendimento_bruto - ($rendimento_bruto * ($imposto_renda / 100));
    $valor_imposto = $rendimento_bruto - $rendimento_liquido;
    $valor_liquido = $valor_principal + $rendimento_liquido;

} else {
    $valor_bruto = $valor_principal * pow((1 + $taxa_juros), $prazo);
    $rendimento_bruto = $valor_bruto - $valor_principal;
    $valor_total = $valor_bruto;

    for ($i = 1; $i <= $prazo; $i++) {
        $valor_total += $contribuicao_mensal * pow((1 + $taxa_juros), $i);
    }

    $rendimento_liquido = $rendimento_bruto - ($rendimento_bruto * ($imposto_renda / 100));
    $valor_imposto = $rendimento_bruto - $rendimento_liquido;
    $valor_liquido = $valor_principal + $rendimento_liquido;
}
?>
<style>
    @keyframes slide-in {
    from {
      transform: translateX(-100%);
    }
    to {
      transform: translateX(0);
    }
  }

    table {
        margin: 0 auto; /* centraliza a tabela */
        border-collapse: collapse;
        border: 1px solid #ddd;
        font-size: 1.2em;
        font-family: Arial, sans-serif;
        width: 80%; /* define a largura da tabela */
        transition: background-color 0.5s, color 0.5s;
        animation: slide-in 1s forwards;
    }

    th, td {
        padding: 12px;
        text-align: left;
        transition: background-color 0.5s, color 0.5s;
        animation: slide-in 1.5s forwards;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('table').hide().slideDown(1000); // anima a tabela com um slide
    });
</script>

<table>
    <tr>
        <th>Descrição</th>
        <th>Valor</th>
    </tr>
    <tr>
        <td>Valor Principal:</td>
        <td>R$ <?php echo number_format($valor_principal, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Taxa de Juros:</td>
        <td><?php echo number_format($taxa_juros * 100, 2, ',', '.'); ?>%</td>
    </tr>
    <tr>
        <td>Prazo:</td>
        <td><?php echo $prazo; ?> anos</td>
    </tr>
    <tr>
        <td>Tipo de Período:</td>
        <td><?php echo ucfirst($periodo); ?></td>
    </tr>
    <tr>
        <td>Tipo de Cálculo:</td>
        <td><?php echo ucfirst($tipo_calculo); ?></td>
    </tr>
    <tr>
        <td>Contribuição Mensal:</td>
        <td>R$ <?php echo number_format($contribuicao_mensal, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Imposto de Renda:</td>
        <td><?php echo $imposto_renda; ?>%</td>
    </tr>
    <tr>
        <td>Valor Bruto:</td>
        <td>R$ <?php echo number_format($valor_bruto, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Valor Total:</td>
        <td>R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Rendimento Bruto:</td>
        <td>R$ <?php echo number_format($rendimento_bruto, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Valor do Imposto de Renda:</td>
        <td>R$ <?php echo number_format($valor_imposto, 2, ',', '.'); ?></td>
    </tr>
    <tr>
        <td>Valor Líquido:</td>
        <td>R$ <?php echo number_format($valor_liquido, 2, ',', '.'); ?></
