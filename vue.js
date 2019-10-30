var app = new Vue({
    el: '.vue',
    data: {
        mensaje: 'Aprende esta de lujo',
        src: 'https://vuejs.org/images/logo.png'
    },
    methods: {
        mostrarMensaje: function(){
            return this.mensaje;
        }
    }
})