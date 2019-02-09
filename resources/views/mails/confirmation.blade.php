<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <style>
        body{
            font-family: Sans-Serif;
            font-size: 12px;
            background: #fff!important;
        }
        table{
            width: 695px;
            margin: 0 auto;
        }
        thead{
            text-align: center;
        }
        tr{

        }
        td{
            height: 89px;
            background: url("https://www.gamerascent.com/img/mails/title.png");
            background-size: contain;
            background-repeat: no-repeat;
            border-bottom: 3px solid #7d110e ;
        }
        th{
            padding-left: 40px;
            text-align: left;
        }

        .button{
            padding: 10px;
            border: 2px solid #7d110e;
            color: #7d110e!important;
            cursor: pointer;
            background: #f1f1f1!important;
            margin: 10px 0;
        }
        .button:hover{
            color: #f1f1f1!important;
            background: #7d110e!important;
        }
        p{
            font-weight: 400;
        }
        .rs{
            width: 15px;
            height: 15px;
        }
        .social{
            margin: 0px auto;
            margin-top: 20px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
@php
    $img = 'http://www.gamerascent.com/img/mails/title.png';
    $vfc = trans('adminlte_lang::message.vfc');
    $hello =trans('adminlte_lang::message.vfc-hello');
    $text = trans('adminlte_lang::message.vfc-text');
    $click = trans('adminlte_lang::message.vfc-click');
@endphp
<table>
    <thead >
    <tr>
        <td>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>
            <h1>Bienvenido a Gamerascent,  {{$name}}</h1>
            <p>Te estábamos esperando, sabemos que te gusta competir. <a href="http://www.gamerascent.com">Gamerascent.com</a> fue creada para ti.<br>Estás en tu casa. ¡A competir!</p>
            <p>Equipo Gamerascent.</p>
            <div style="padding-top: 15px">
                <a  href="{{ url('/api/users/confirmation/' . $tokenconfirmed) }}" class="button">
                    Confirmar
                </a>
            </div>
        </th>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th style="text-align: center">
            <div class="social">
                <a href="https://www.youtube.com/channel/UCMh9j68rXyXGvyIogQMahVw"target="_blank">
                    <img class="rs" src="http://www.gamerascent.com/img/mails/y.png" alt="">
                </a>
                <a href="https://www.facebook.com/gamerascent" target="_blank">
                    <img class="rs" src="http://www.gamerascent.com/img/mails/f.png" alt="">
                </a>
                <a href="https://twitter.com/gamerascent" target="_blank">
                    <img class="rs" src="http://www.gamerascent.com/img/mails/t.png" alt="">
                </a>
                <a href="https://www.instagram.com/gamerascent" target="_blank">
                    <img class="rs" src="http://www.gamerascent.com/img/mails/i.png" alt="">
                </a>
            </div>
            <h6 style="margin-top: 5px"><a href="http://www.gamerascent.com" target="_blank">Gamerascent.com</a>. Todos los derechos reservados.</h6>
        </th>
    </tr>
    </tfoot>
</table>
</body>
</html>


