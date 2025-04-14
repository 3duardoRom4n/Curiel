<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curiel correo</title>
</head>

<body>
    <section id="contacto" class="contacto">
        <div class="contenedor" data-aos="desvanecimiento">
            <div class="fila">
                <div class="col-lg-7 mt-5 mt-lg-0 d-flex alinear-elementos-estirar">
                    <form action="{{ route('send_mail') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fila">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail">Su nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail">Su correo electrónico</label>
                                <input type="email" class="form-control" name="correo electrónico" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Asunto</label>
                            <input type="text" class="form-control" name="sub" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Mensaje</label>
                            <textarea class="form-control" name="mess" rows="10" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit">Enviar correo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>