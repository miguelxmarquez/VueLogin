// Codigo JavaScript Personalizado

import Axios from "axios";

var testing = new Vue({

    el: '#app_login',

    // Definicion del Modelo
    data: {
        
          email: '',
          password: ''
        
    },

    // Definicion de Metodos 
    methods: {

        ValidateLogin($event) {

            if ($event) {
                    Axios.post('loginVue', {  // URL Web Routes Laravel 


                    email: this.email,
                    password: this.password
                })
                .then(function (response) {
                   Swal('Has iniciado Sesion', 'Datos Correctos', 'success');

                })
                .catch(function (error) {
                    //console.log(error.response.data);
                    let er = error.response.data.errors;

                    let mensaje = "Error no identificado";

                    if (er.hasOwnProperty('email')) {
                        mensaje = er.email[0];
                    } else {
                        mensaje = er.password[0];
                    }

                    Swal('Error', mensaje, 'error');

                });
            }
            
        }
    }
});