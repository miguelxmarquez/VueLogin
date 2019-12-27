// Codigo JavaScript Personalizado

import Axios from "axios";

new Vue({

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
                    console.log(response);

                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
            }
            
        }
    }
});