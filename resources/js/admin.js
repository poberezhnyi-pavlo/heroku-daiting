jQuery(document).ready(function() {
    //add active class to menu item
    let currentUrl = window.location.href;
    let element = $("a[href='"+currentUrl+"']").addClass('active');
});
