<?php
// 1. "Base de datos" interna
$abogados_db = [
    "1010" => [
        "nombre" => "Dr. Miguel Tovar",
        "foto" => "alberto.jpg",
        "correo" => "miguel_tovar@gr-asociados-mentis.com",
        "telefono" => "+19497345982",
        "descripcion" => "Especialista en Derecho de Inmigración con más de 15 años de experiencia en procesos de residencia y ciudadanía."
    ],
    "2020" => [
        "nombre" => "Dr. Justin Harvey",
        "foto" => "justin.jpg",
        "correo" => "harveyj.davidson@gr-asociados-mentis.com",
        "telefono" => "+12135557652",
        "descripcion" => "Especialista en Derecho de Inmigración con más de 20 años de experiencia en procesos de residencia y ciudadanía."
    ]
];

// 2. Lógica de búsqueda
$codigo = $_POST['codigo_abogado'] ?? '';
$abogado = $abogados_db[$codigo] ?? null;

// 3. Si no existe el abogado, mostramos un error simple y salimos
if (!$abogado) {
    echo "<body style='background:#253342; color:white; font-family:sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; flex-direction:column;'>";
    echo "<h2>Código de abogado no válido</h2>";
    echo "<a href='consulta.html' style='color:#5E9188;'>Intentar de nuevo</a>";
    echo "</body>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>Perfil del Abogado - G&R</title>
    <link rel="icon" type="image/png" href="imagenes/icono.png">
</head>
<body class="bg-[#253342] min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden border-t-8 border-[#5E9188]">
        <div class="h-64 overflow-hidden">
            <img src="imagenes/<?php echo $abogado['foto']; ?>" 
                 class="w-full h-full object-cover" alt="Foto profesional">
        </div>

        <div class="p-8">
            <h2 class="text-2xl font-bold text-[#232226] mb-1"><?php echo $abogado['nombre']; ?></h2>
            <span class="text-[#5E9188] font-semibold text-sm uppercase tracking-wider">Abogado Asociado</span>
            
            <hr class="my-6 border-gray-100">

            <div class="space-y-4 text-gray-600">
                <p class="flex items-center gap-3">
                    <i class="fas fa-envelope text-[#5E9188]"></i> <?php echo $abogado['correo']; ?>
                </p>
                <p class="flex items-center gap-3">
                    <i class="fas fa-phone text-[#5E9188]"></i> <?php echo $abogado['telefono']; ?>
                </p>
                <p class="text-sm leading-relaxed italic">
                    "<?php echo $abogado['descripcion']; ?>"
                </p>
            </div>

            <a href="https://wa.me/<?php echo str_replace('+', '', $abogado['telefono']); ?>?text=Hola, deseo consultar con el profesional <?php echo urlencode($abogado['nombre']); ?>" 
               class="mt-8 w-full bg-[#5E9188] hover:bg-[#3E5954] text-white font-bold py-4 rounded-xl flex items-center justify-center gap-3 transition-all transform hover:-translate-y-1">
                <i class="fab fa-whatsapp text-xl"></i> Contactar ahora
            </a>
            
            <a href="index.html" class="block text-center mt-4 text-sm text-gray-400 hover:text-[#5E9188]">Volver al inicio</a>
        </div>
    </div>
</body>
</html>