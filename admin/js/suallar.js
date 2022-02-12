function vadd() {
    let size0 = parseInt($("#size").val(), 10) + 1;
    var div1 = document.createElement("div");
    div1.className = "input-group";

    var div2 = document.createElement("div");
    div2.className = "input-group-text";
    div1.appendChild(div2);

    var input1 = document.createElement("input");
    input1.className = "form-check-input mt-0";
    input1.type = "radio";
    input1.name = "radio";
    input1.id = "radio";
    input1.style = "margin-left: -8px";
    div2.appendChild(input1);

    var input2 = document.createElement("input");
    input2.className = "form-control";
    input2.type = "text";
    input2.style = "position:relative";
    input2.id = "sinaqtest";
    var icon = document.createElement("i");

    icon.className = "fas fa-minus-circle";
    icon.style = "position:absolute; color:red; right:10px; top:10px";

    div1.appendChild(input2);
    div1.appendChild(icon);
    var element = document.getElementById("form-group");
    div1.style = "margin-top:20px";
    input1.value = size0;
    input2.name = "name" + size0;

    element.appendChild(div1);

    document.getElementById("size").value = size0;
}

function uadd() {
    let size1 = parseInt($("#sizee").val(), 10) + 1;
    var element = document.getElementById("input-group");

    var div1 = document.createElement("div");
    div1.className = "input-group mb-3 mt-3";

    var div2 = document.createElement("div");
    div2.className = "input-group-prepend";
    div1.appendChild(div2);

    var span = document.createElement("span");
    span.className = "input-group-text";
    span.textContent = "Sual / Variant";
    div2.appendChild(span);
    var i1 = document.createElement("input");
    var i2 = document.createElement("input");
    i1.type = "Text";
    i1.className = "form-control";
    i1.name = "sual" + size1;
    i1.id = "sinaquygunlug";

    i2.type = "Text";
    i2.className = "form-control";
    i2.name = "cavab" + size1;
    i2.id = "sinaquygunlug";

    div1.appendChild(i1);
    div1.appendChild(i2);

    element.appendChild(div1);

    document.getElementById("sizee").value = size1;
}

function fennadd() {
    let size2 = parseInt($("#size").val(), 10) + 1;
    var element = document.getElementById("accordion-body");

    var div2 = document.createElement("div");
    div2.className = "row mt-5";

    var div3 = document.createElement("div");
    div3.className = "col";

    var i1 = document.createElement("input");
    i1.className = "form-control";
    i1.placeholder = "Fənnin adı";
    i1.type = "text";
    i1.name = "fenn" + size2;
    div3.appendChild(i1);

    var div4 = document.createElement("div");
    div4.className = "col";

    var div5 = document.createElement("div");
    div5.className = "row mt-3";

    var t1 = document.createElement("textarea");
    t1.className = "form-control mr-2";
    t1.style = "margin-left:10px";
    t1.name = "movzu" + size2;

    div5.appendChild(t1);

    var i2 = document.createElement("input");
    i2.className = "form-control";
    i2.placeholder = "Sualların sayı";
    i2.type = "text";
    i2.name = "sual" + size2;
    div4.appendChild(i2);

    div2.appendChild(div3);
    div2.appendChild(div4);
    div2.appendChild(div5);

    element.appendChild(div2);
    document.getElementById("size").value = size2;
}