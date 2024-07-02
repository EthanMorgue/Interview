<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview</title>
    <!-- Styles Section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>

    <div class="content">
        <h1 class="text-center text-white">
            Interview
        </h1>

        <div class="custom-card" style="min-heigth:250px !important">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-white">
                        Analizador Lexico
                    </h6>
                    <form id="form-lexico" action="">
                        <label class="text-white pl-2" for="">
                            Cadena
                        </label>
                        <div>
                            <input class="form-control" placeholder="Cadena deCoordenadas" maxlength="250" id="lex_value" type="text" >
                        </div>
                        <div class="text-right col-md-12">
                            <button class="btn btn-primary" onclick="send(1)" type="button">
                                Enviar
                            </button>
                        </div>
                    </form>
                    <h6 class="text-white">
                        Capicua
                    </h6>
                    <form id="form-capicua" action="">
                        <label class="text-white pl-2" for="">
                            Numero
                        </label>
                        <div>
                            <input class="form-control" id="capicua_value" min="10" max="9999" value="10" type="number">
                        </div>
                        <div class="text-right col-md-12">
                            <button class="btn btn-primary" onclick="send(2)" type="button">
                                Enviar
                            </button>
                        </div>

                    </form>
                </div>
                <div id="result" class="col-md-6">
                    <h2 style="margin-top:15%" class="text-white text-center">
                        Resultado!!
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="public/js/app.js"></script>
</body>
</html>