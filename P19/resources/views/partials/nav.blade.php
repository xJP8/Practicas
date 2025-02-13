<a href="{{ url('') }}">Principal</a>
<br><br>
<a href="{{ url('mueble/1') }}">Productos</a>
<br><br>
@if (session('user'))
    <a href="{{ url('pieza/listar') }}">Disponibilidad de piezas</a>
    <br><br>
    <a href="{{ url('user/logout') }}">Cerrar sesión</a>
@else
    <a href="{{ url('user/login') }}">Acceso clientes</a>
@endif