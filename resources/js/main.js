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
                   swal({
                    title: 'Has iniciado Sesion', 
                    text: 'Datos Correctos', 
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false

                   }); // Sweet Success

                }).then( select => {
                    if (select) {
                        location.reload(2000);
                    } else{                        
                        setTimeout(function(){
                            window.location.reload(1);
                         }, 2000);
                    } 
                })

                .catch(function (error) {

                    let er = error.response.data.errors;
                    let mensaje = 'Error no identificado';

                    if (er.hasOwnProperty('email')) {
                        mensaje = er.email[0];

                    } else if (er.hasOwnProperty('password')) {
                        mensaje = er.password[0];
                        
                    } else if (er.hasOwnProperty('login')) {
                        mensaje = er.login[0];
                    }

                    swal({
                        title: 'Error, los datos no coinciden', 
                        text: 'Intente más tarde', 
                        icon: 'error',
                        closeOnClickOutside: false,
                        closeOnEsc: false

                       }); // Sweet Error

                });
            }
            
        }
    }
});