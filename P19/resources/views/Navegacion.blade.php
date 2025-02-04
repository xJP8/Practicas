<a href="{{ url('') }}">Principal</a>
<br><br>
<a href="{{ url('/mueble/1') }}">Productos</a>
<br><br>
@if (session('user'))
    <a href="{{ url('/pieza/listar') }}">Disponibilidad de piezas</a>
    <br><br>
    <a href="{{ url('/logout') }}">Cerrar sesión</a>
@else
    <a href="{{ url('/userlogin') }}">Acceso clientes</a>
@endif