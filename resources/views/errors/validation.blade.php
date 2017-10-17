<div class="alert alert-danger">
    <strong>Ой!</strong> Виникли деякі проблеми з вашим входом.<br><br>
    <ul>
        @foreach ($errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
