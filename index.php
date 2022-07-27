<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos y fonts -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/normalize.css">
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
    

    <div id="appUsers">
        <div class="container">
            <div class="row">
                <div class="col">                    
                </div>            
            </div>
            <div class="row mt-5">
                <div class="col-lg-4">
                <form class="formgen" id="form1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="inputEmail" 
                        placeholder="Ingresa email" required> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Nombre(s)</label>
                        <input type="text" class="form-control" id="inputName" 
                        placeholder="Ingresa Nombre" required>                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSurn1">Apellidos</label>
                        <input type="text" class="form-control" id="inputSurn" 
                        placeholder="Ingresa Apellidos" required>                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFecnac1">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="inputFecnac" required>
                    </div>
                    
                    <button type="button" @click="btnAlta" class="btn btn-primary btn-block">Agregar Usuario</button>
                    </form>
                </div>
                <div class="col-lg-8">                
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr class="bg-primary text-light">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Edad</th>                            
                            <th>Email</th>                                                       
                            <th>Acciones</th>
                        </tr>
                      </thead>  
                      <tbody>
                      <tr v-for="user in users" :key="user.id">                                
                                <td>{{user.id}}</td>                                
                                <td>{{user.first_name}} {{user.last_name}}</td>
                                <td>{{calEdad(user.fec_nac)}}</td>
                                <td>{{user.email}}</td>                                                                
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning" 
                                                title="Editar" 
                                                @click="btnEditar(user.id, user.first_name, user.last_name, user.email, user.fecnac)">
                                                <span class="material-symbols-outlined">edit</span></button>    
                                        <button class="btn btn-danger" 
                                                title="Eliminar" 
                                                @click="btnBorrar(user.id)">
                                                <span class="material-symbols-outlined">delete</span></button>      
                                    </div>
                                </td>
                         </tr>    
                      </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- jQuery, Popper  y Bootstrap  -->
<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Vue.js -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<!-- Axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- Sweetalert 2 -->
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- Custom js code -->
<script src="main.js" type="module"></script>
</body>
</html>