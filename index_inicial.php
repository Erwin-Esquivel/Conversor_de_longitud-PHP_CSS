<?php
$valor = '';
$desde = '';
$hasta = '';
$resultado = '';

function convertirUnidad($valor, $unidad_desde, $unidad_hasta) {
    // Factores de conversión a metros
    $factores = [
        'Milimetro' => 0.001,
        'Centimetro' => 0.01,
        'Decimetro' => 0.1,
        'Metro' => 1,
        'Decametro' => 10,
        'Hectometro' => 100,
        'Kilometro' => 1000,
    ];

    if (!isset($factores[$unidad_desde]) || !isset($factores[$unidad_hasta])) {
        return "Unidad no soportada";
    }

    // Convertir a metros y luego a la unidad de destino
    $valor_en_metros = $valor * $factores[$unidad_desde];
    return $valor_en_metros / $factores[$unidad_hasta];
}

if (isset($_POST['convertir'])) {
    $valor = floatval($_POST['valor']); // Convertir a número flotante
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    if ($valor <= 0 || empty($desde) || empty($hasta)) {
        $resultado = "Por favor, completa todos los campos con valores válidos.";
    } else {
        $resultado = convertirUnidad($valor, $desde, $hasta);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbR5eZfGJwF4f4Jl5Jqg1" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Conversor de Longitud</title>
</head>
<body>
    <h1 class="text-center">Conversor de Longitud</h1>
    <div class="container">
       <form method="post">
            <div class="row mt-4">
                <div class="col-sm-4">
                    <label for="valor" class="form-label">Valor:</label>
                    <input type="number" name="valor" class="form-control" value="<?php echo $valor; ?>" min="0">
                </div>
                <div class="col-sm-4">
                    <label for="desde" class="form-label">Desde:</label>
                    <select class="form-select" name="desde">
                        <option value="">--- Selecciona una unidad ---</option>
                        <option value="Milimetro" <?php if ($desde == 'Milimetro') echo 'selected'; ?>>Milímetro</option>
                        <option value="Centimetro" <?php if ($desde == 'Centimetro') echo 'selected'; ?>>Centímetro</option>
                        <option value="Decimetro" <?php if ($desde == 'Decimetro') echo 'selected'; ?>>Decímetro</option>
                        <option value="Metro" <?php if ($desde == 'Metro') echo 'selected'; ?>>Metro</option>
                        <option value="Decametro" <?php if ($desde == 'Decametro') echo 'selected'; ?>>Decámetro</option>
                        <option value="Hectometro" <?php if ($desde == 'Hectometro') echo 'selected'; ?>>Hectómetro</option>
                        <option value="Kilometro" <?php if ($desde == 'Kilometro') echo 'selected'; ?>>Kilómetro</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="hasta" class="form-label">Hasta:</label>
                    <select class="form-select" name="hasta">
                        <option value="">--- Selecciona una unidad ---</option>
                        <option value="Milimetro" <?php if ($hasta == 'Milimetro') echo 'selected'; ?>>Milímetro</option>
                        <option value="Centimetro" <?php if ($hasta == 'Centimetro') echo 'selected'; ?>>Centímetro</option>
                        <option value="Decimetro" <?php if ($hasta == 'Decimetro') echo 'selected'; ?>>Decímetro</option>
                        <option value="Metro" <?php if ($hasta == 'Metro') echo 'selected'; ?>>Metro</option>
                        <option value="Decametro" <?php if ($hasta == 'Decametro') echo 'selected'; ?>>Decámetro</option>
                        <option value="Hectometro" <?php if ($hasta == 'Hectometro') echo 'selected'; ?>>Hectómetro</option>
                        <option value="Kilometro" <?php if ($hasta == 'Kilometro') echo 'selected'; ?>>Kilómetro</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <label for="resultado" class="form-label">Resultado:</label>
                    <input type="text" class="form-control" name="resultado" value="<?php echo $resultado; ?>" readonly>
                </div>
                <div class="col-sm-6 mt-4">
                    <button type="submit" name="convertir" class="btn btn-primary">Convertir</button>
                </div>
            </div>
       </form>
    </div>
</body>
</html>
