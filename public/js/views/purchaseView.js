/**
 * Script that will handle enabling/disabling buttons
 * based on stock availability 
 */

console.log("hello world");

s_stock = parseInt(document.getElementById("s_stock").value);
m_stock = parseInt(document.getElementById("m_stock").value);
l_stock = parseInt(document.getElementById("l_stock").value);
xl_stock = parseInt(document.getElementById("xl_stock").value);


if(s_stock == 0){
    var button = document.getElementById("s_button");
    button.disabled = true;
    button.innerText = "Out of stock in S size";
}   

if(m_stock == 0){
    var button = document.getElementById("m_button");
    button.disabled = true;
    button.innerText = "Out of stock in M size";
}

if(l_stock == 0){
    var button = document.getElementById("l_button");
    button.disabled = true;
    button.innerText = "Out of stock in L size";
}

if(xl_stock == 0){
    var button = document.getElementById("xl_button");
    button.disabled = true;
    button.innerText = "Out of stock in XL size";
}

