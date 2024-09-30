
       
function login() {
    var username = document.getElementById("adminUsername").value;
    var password = document.getElementById("adminPassword").value;

    var Username = "admin";
    var Password = "admin";

    
    document.getElementById("success-alert").style.display = "none";
    document.getElementById("error-alert").style.display = "none";

    if (username === Username && password === Password) {
        
        document.getElementById("success-alert").style.display = "block";

        
        setTimeout(function() {
            window.location.href = "admindashboard.php";
        }, 5000);

    } else {
       
        document.getElementById("error-alert").style.display = "block";
    }

    
    return false;
}

