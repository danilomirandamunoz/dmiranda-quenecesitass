/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.  
            
            $('.footer-inner').html("Copyright &copy; Todos los Derechos Reservados. Administraci&oacute;n Plataforma Qu&eacute; Necesitas.");
                      
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };
    
    
    
    

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();