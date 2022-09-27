var exp = new Date(localStorage.getItem("expires_in"));
var current = new Date();

if (current.getTime() <= exp.getTime()) {

} else {
    // alert('Expired');
}