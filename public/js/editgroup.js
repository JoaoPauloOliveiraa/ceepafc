window.onload = function showButtonEdit(){
    document.getElementById("buttonSaveEdit").style.display="block"; 
}

function validatorEdit(){
   
    let downEdit = document.getElementById("downEdit").value;
    let upEdit = document.getElementById("upEdit").value;
    let downErrorEdit = document.getElementById("downErrorEdit");
    let upErrorEdit = document.getElementById("upErrorEdit");
    let showModalEdit = document.getElementById("buttonconfirmEdit");
    
    if(downErrorEdit.style.display == "block"){
        downErrorEdit.style.display = "none";
        showModalEdit.setAttribute('data-toggle', 'modal');
    }
    
    if(downEdit == ""){
        downErrorEdit.style.display = "block";
        showModalEdit.removeAttribute('data-toggle');
    }
    
    if(upErrorEdit.style.display == "block"){
        upErrorEdit.style.display = "none";
        showModalEdit.setAttribute('data-toggle', 'modal');
    }
    
    if(upEdit == ""){
        upErrorEdit.style.display = "block";
        showModalEdit.removeAttribute('data-toggle');
    }
    
    showTableEdit();
    
}

function showTableEdit(){    
    let downEdit = document.getElementById("downEdit").value;
    let upEdit = document.getElementById("upEdit").value;
    let downvelErrorEdit = document.getElementById("downvelErrorEdit");
    let upvelErrorEdit = document.getElementById("upvelErrorEdit");
    
    let downvelEdit = document.getElementById("downvelEdit").value;
    if(downvelEdit == "M"){    
        downvelEdit = "\ MEGABITS por segundo";
    }
    else if(downvelEdit == "K"){
        downvelEdit = "\ KILOBITS por segundo";
    }else{
        downvelErrorEdit.style.display="block";
    }
    
    let upvelEdit = document.getElementById("upvelEdit").value;
    if(upvelEdit == "M"){
        upvelEdit = "\ MEGABITS por segundo";
    }else if(upvelEdit == "K"){   
        upvelEdit = "\ KILOBITS por segundo";
    }else{
        upvelErrorEdit.style.display="block";    
    }
    
    document.getElementById("tableEdit").innerHTML="<table class='table table-bordered  table-hover'><tbody><tr><th style=''>Velocidade de Download</th><td>"+ downEdit + downvelEdit + "</td></tr><tr><th style=''>Velocidade de Upload </th><td>"+ upEdit + upvelEdit + "</td></tbody></table>";
}
