function validatesignin() {
    let x = document.forms["signin"]["mail"].value;
    let y = document.forms["signin"]["sifre"].value;
    if (x == "" || y == "") {
        document.getElementById("mail").style.borderColor = "red";
        document.getElementById("mail").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sifre").style.borderColor = "red";
        document.getElementById("sifre").placeholder = "Məlumatlarınızı daxil edin.";
        return false;
    }
}

function validateregister() {
    let a = document.forms["regform"]["ad"].value;
    let s = document.forms["regform"]["soyad"].value;
    let m = document.forms["regform"]["mail"].value;
    let sf = document.forms["regform"]["sifre"].value;
    let n = document.forms["regform"]["nomre"].value;

    if (a == "" || s == "" || m == "" || sf == "" || n == "") {
        document.getElementById("mail").style.borderColor = "red";
        document.getElementById("mail").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sifre").style.borderColor = "red";
        document.getElementById("sifre").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("ad").style.borderColor = "red";
        document.getElementById("ad").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("soyad").style.borderColor = "red";
        document.getElementById("soyad").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("nomre").style.borderColor = "red";
        document.getElementById("nomre").placeholder = "Məlumatlarınızı daxil edin.";
        return false;
    }
}

function logadminv() {
    let x = document.forms["logadminv"]["loginmail"].value;
    let y = document.forms["logadminv"]["loginpass"].value;
    if (x == "" || y == "") {
        document.getElementById("loginmail").style.borderColor = "red";
        document.getElementById("loginmail").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("loginpass").style.borderColor = "red";
        document.getElementById("loginpass").placeholder = "Məlumatlarınızı daxil edin.";
        return false;
    }
}

function sinaqv() {
    let f0 = document.forms["sinaqform"]["fenn0"].value;
    let sira = document.forms["sinaqform"]["sira"].value;
    let gb = document.forms["sinaqform"]["girisbali"].value;
    let cb = document.forms["sinaqform"]["cixisbali"].value;
    let bslq = document.forms["sinaqform"]["basliq"].value;
    let radio = document.forms["sinaqform"]["radio"].value;
    let st = document.forms["sinaqform"]["sinaqtest"].value;

    if (f0 == "Fənn" || sira == "" || gb == "" || cb == "" || bslq == "" || radio == "" || st == "") {
        document.getElementById("fenn0").style.borderColor = "red";
        document.getElementById("fenn0").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sira").style.borderColor = "red";
        document.getElementById("sira").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("girisbali").style.borderColor = "red";
        document.getElementById("girisbali").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("cixisbali").style.borderColor = "red";
        document.getElementById("cixisbali").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("basliq").style.borderColor = "red";
        document.getElementById("basliq").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("radio").style.borderColor = "red";
        document.getElementById("radio").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sinaqtest").style.borderColor = "red";
        document.getElementById("sinaqtest").placeholder = "Məlumatlarınızı daxil edin.";
        return false;
    }
}

function sekilv() {
    let f00 = document.forms["sekilform"]["fenn0"].value;
    let sira0 = document.forms["sekilform"]["sira"].value;
    let gb0 = document.forms["sekilform"]["girisbali"].value;
    let cb0 = document.forms["sekilform"]["cixisbali"].value;
    let bslq0 = document.forms["sekilform"]["basliq"].value;
    let skl = document.forms["sekilform"]["sekil"].value;

    if (f00 == "Fənn" || sira0 == "" || gb0 == "" || c0b == "" || bslq0 == "" || skl == "") {

        document.getElementById("fenn0").style.borderColor = "red";
        document.getElementById("fenn0").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sira").style.borderColor = "red";
        document.getElementById("sira").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("girisbali").style.borderColor = "red";
        document.getElementById("girisbali").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("cixisbali").style.borderColor = "red";
        document.getElementById("cixisbali").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("basliq").style.borderColor = "red";
        document.getElementById("basliq").placeholder = "Məlumatlarınızı daxil edin.";
        document.getElementById("sekil").style.borderColor = "red";
        document.getElementById("sekil").placeholder = "Məlumatlarınızı daxil edin.";
        return false;
    }
}