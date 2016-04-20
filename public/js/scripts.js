/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */
$(document).ready(function(){
    $('#dropdown').hover(
        function(){
            $('#show').stop(true, true).slideDown('medium');
        },
        function(){
        $('#show').stop(true, true).slideUp('medium');  
    });
});