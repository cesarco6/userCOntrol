
const appUsers = new Vue({
    el: "#appUsers",
    data: {
        users: [],
        id:null,
        first_name:"",
        last_name:"",
        email:"",
        fec_nac:""
        
    },
    methods: {       
        // Botones 
        btnAlta: function(){        
          const formulario = document.getElementById('form1')[0]   
          const nuser = []
          const {value: formValues} = Swal.fire({
            title: 'Usuario Nuevo',
            html:
            '',              
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Guardar',          
            confirmButtonColor:'#1cc88a',          
            cancelButtonColor:'#3085d6',  
            preConfirm: () => {            
                return [
                  this.id = this.nextId(),            
                  this.first_name = document.getElementById('inputName').value,
                  this.last_name = document.getElementById('inputSurn').value,
                  this.email = document.getElementById('inputEmail').value,
                  this.fec_nac = document.getElementById('inputFecnac').value             
                ]
              }
            })            
             if(this.first_name == "" || this.last_name == "" || this.email == "" || this.fec_nac == ""){
              Swal.fire({
                type: 'info',
                title: 'Datos incompletos',                                    
              }) 
            }
            else{          
              formulario.reset
              nuser = preConfirm()
              console.log(first)
              window.localStorage.setItem("id:"+ JSON.stringify(nuser.id), JSON.stringify(nuser))
              //this.altaUser();          
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                });
                Toast.fire({
                  type: 'success',
                  title: '¡Usuario Agregado!'
                }) 
                return false               
            }                              
        },
        btnEditar: function(id, first_name, last_name, email, fec_nac){
          Swal.fire({
            title: 'EDITAR',
            html:
            '<div class="form-group"><div class="row"><label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="inputName" value="'+first_name+'" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Apellido</label><div class="col-sm-7"><input id="inputSurn" value="'+last_name+'" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">CorreoE</label><div class="col-sm-7"><input id="inputEmail" value="'+email+'" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Fecha de Nacimiento</label><div class="col-sm-7"><input id="inputFecnac" value="'+fec_nac+'" type="date" class="form-control"></div></div></div>', 
            focusConfirm: false,
            showCancelButton: true,                         
            }).then((result) => {
              if (result.value) {                                             
                first_name = document.getElementById('inputName').value,
                last_name = document.getElementById('inputSurn').value,
                email = document.getElementById('inputEmail').value,
                fec_nac = document.getElementById('inputFecnac').value,
                
                this.editaUser(id,first_name,last_name, email, fec_nac);
                Swal.fire(
                  '¡Actualizado!',
                  'El usuario ha sido actualizado.',
                  'success'
                )                  
              }
            });            
        },
        btnBorrar: function(id){
          Swal.fire({
            title: '¿Está seguro de borrar el registro: '+id+" ?",         
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor:'#d33',
            cancelButtonColor:'#3085d6',
            confirmButtonText: 'Borrar'
          }).then((result) => {
            if (result.value) {            
              this.borraUser(id);             
              //y mostramos un msj sobre la eliminación  
              Swal.fire(
                '¡Eliminado!',
                'El registro ha sido borrado.',
                'success'
              )
            }
          })  
        },
   
        // Procedimientos
                
        // calcula la edad derivado de una fecha
        calEdad: function(fecnac){
          let hoy = new Date()
          let fechaNacimiento = new Date(fecnac)
          let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
          let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
          if (
            diferenciaMeses < 0 ||
            (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
          ) {
            edad--
          }
          return edad
        },
        // calcula el siguiente id consecutivo incremental dentro del localstorage
        nextId: function() {
            let cantels = localStorage.length
            let compara = 0
            let mayor = 0
            for (let i = 0; i < cantels; i++) {                    
                    let ind = parseInt(localStorage.key(i).substring(3))
                if (ind > compara) compara = ind
            }    
                if (compara > cantels){ 
                  compara += 1
                  mayor = compara
                }else { 
                  cantels += 1
                  mayor = cantels
                }  
            return mayor
        },
        //Procesimiento listar
        listarUsers: function() {
            let users = []        
            const keys = Object.keys(localStorage);
              for (let key of keys) {
                if (key.substring(0,2).localeCompare("id:")){
                  users.push(JSON.parse(localStorage.getItem(key)))
                  //console.log(`${key} -> ${localStorage.getItem(key)}`)
                }                             
              }              
            users.sort()
            //console.log(users)
            this. users = users       
            //console.log(this.users)
        }            
    },
    created: function(){
      this.listarUsers()
    },
    computed: {},
    
});

 //carga los datos del endpoint
 async function cargaDatos() {
    const endpoint1 = "https://reqres.in/api/users?page=1"
    let response = await axios.get(endpoint1);
    let  results = response.data.data
    //console.log(results)    
      let users = results.map((user) => {      
        return {       
          id: user.id,
          first_name: user.first_name,
          last_name: user.last_name,
          email: user.email,
          fec_nac: '2000/01/01',        
        };
      })
      //users.sort()
      users.map((user) => {
        window.localStorage.setItem("id:"+ JSON.stringify(user.id), JSON.stringify(user));
      })
      //console.log(users)
}

cargaDatos()