<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera vista</title>
</head>

<body>
    <h1> Mundo laravel - {!! "Hola mundo PHP $nombre $apellido" !!} </h1>

    <ul>

        @isset($posts3)
            isset 
        @endisset

        @empty($posts3)
            empty
        @endempty

        @forelse ($posts as $post )

            <?php //dd($loop)
            ?>
            <?php //var_dump($loop)
            ?>

            <li>
                @if ($loop->first)
                    Primero :

                @elseif ($loop->last)
                    Ultimo :

                @else
                    Medio:
                @endif

                {{ $post }}
            </li>
        @empty
            <li>Vacío</li>
        @endforelse
    </ul>

</body>

</html>
