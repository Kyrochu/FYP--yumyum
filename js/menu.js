// declaration of element
const searchInput = document.getElementById('searchBar');



// // function
// searchInput.addEventListener()
// console.log(searchInput)

(function ($) {
    "use strict";

    // search function
    $('#searchBar').on('keypress',function(e) {
        if(e.which == 13) {
            console.log($sql);
        }
    });
    
})(jQuery);

