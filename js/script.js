$(document).ready(function() {
    
    var str = document.getElementById('title').innerHTML;
    var res = str.replace(/_/g, '&nbsp');
    document.getElementById('title').innerHTML = res;
    
});