<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos y fonts -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">    
    <link rel="stylesheet" href="main.css">
    <title>Control de usuarios</title>
</head>
<body>
    <header>
    <h1 class="text-center text-dark">
        <span class="badge badge-primary">Control de usuarios</span></h1>
    </header>
    



    <div id="appMobil">
        <div class="container">
            <div class="row">
                <div class="col">
                    <button @click="btnAlta" 
                            class="btn btn-primary" 
                            title="Nuevo">
                            <span class="material-symbols-outlined">add
                            </span></i></button>
                </div>
                <div class="col text-right">
                    <h5>Numero de usuarios: <span class="badge badge-primary">
                        {{totalUsuarios}}
                    </span></h5>
                </div>
            </div>
        </div>

    </div>

<!-- jQuery y Bootstrap  -->
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<!-- Axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- Sweetalert 2 -->
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Custom jscode -->
<script src="main.js"></script>
</body>
</html>