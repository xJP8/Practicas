<a href="{{ url('Inicio') }}">Principal</a>
<br><br>
<a href="{{ url('Mueble') }}">Productos</a>
<br><br>
@if (session('user'))
    <a href="{{ url('Pieza/Listar') }}">Disponibilidad de piezas</a>
    <br><br>
    <a href="{{ url('Logout') }}">Cerrar sesión</a>
@else
    <a href="{{ url('UserLogin') }}">Acceso clientes</a>
@endif