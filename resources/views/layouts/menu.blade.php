

<li class="{{ Request::is('noticias*') ? 'active' : '' }}">
    <a href="{!! route('noticias.index') !!}"><i class="fa fa-edit"></i><span>Noticias</span></a>
</li>

<li class="{{ Request::is('novedades*') ? 'active' : '' }}">
    <a href="{!! route('novedades.index') !!}"><i class="fa fa-edit"></i><span>Novedades</span></a>
</li>

<li class="{{ Request::is('mensajes*') ? 'active' : '' }}">
    <a href="{!! route('mensajes.index') !!}"><i class="fa fa-edit"></i><span>Mensajes</span></a>
</li>

