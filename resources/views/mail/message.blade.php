<!DOCTYPE html>
<html lang="es">
<body>

    <div>
        <h3>Información de Contacto</h3>
        <p><strong>Nombre:</strong> {{ $email['name'] }}</p>
        <p><strong>Organización:</strong> {{ $email['organization'] }}</p>
        <p><strong>Cargo:</strong> {{ $email['rolUser'] }}</p>
        <p><strong>Celular:</strong> {{ $email['phone'] }}</p>
        <p><strong>Correo:</strong> {{ $email['email'] }}</p>
    </div>
    <div>
        <h3>Mensaje</h3>
        <p>{{ $email['message'] }}</p>
    </div>

</body>
</html>