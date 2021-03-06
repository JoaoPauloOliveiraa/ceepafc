
window.onload = function showButton(){
    document.getElementById("buttonconfirm").style.display="block"; 
}



function validator(){
   
    let name = document.getElementById("name").value;
    let down = document.getElementById("down").value;
    let up = document.getElementById("up").value;
    let nameError = document.getElementById("nameError");
    let downError = document.getElementById("downError");
    let upError = document.getElementById("upError");
    let showModal = document.getElementById("buttonconfirm");
    document.getElementById("buttonconfirm").style.display="block"
    
    
    if(nameError.style.display == "block"){
        nameError.style.display = "none";
        showModal.setAttribute('data-toggle', 'modal');
    }
    if(name == ""){
        nameError.style.display = "block";
        showModal.removeAttribute('data-toggle');
    }
    
    if(downError.style.display == "block"){
        downError.style.display = "none";
        showModal.setAttribute('data-toggle', 'modal');
    }
    
    if(down == ""){
        downError.style.display = "block";
        showModal.removeAttribute('data-toggle');
    }
    
    if(upError.style.display == "block"){
        upError.style.display = "none";
        showModal.setAttribute('data-toggle', 'modal');
    }
    
    if(up == ""){
            upError.style.display = "block";
            showModal.removeAttribute('data-toggle');
    }
    
    showTable();
    
    
 }

function showTable(){
    
    let name = document.getElementById("name").value;
    let down = document.getElementById("down").value;
    let up = document.getElementById("up").value;
    let downvelError = document.getElementById("downvelError");
    let upvelError = document.getElementById("upvelError");
    
   let downvel = document.getElementById("downvel").value;
    if(downvel == "M"){
        
        downvel = "\ MEGABITS por segundo";
    }
    else if(downvel == "K"){
        
        downvel = "\ KILOBITS por segundo";
        
    }else{
        downvelError.style.display="block";
    }
    
    let upvel = document.getElementById("upvel").value;
    
    if(upvel == "M"){
        
        upvel = "\ MEGABITS por segundo";
        
    }
    
     else if(upvel == "K"){
        
        upvel = "\ KILOBITS por segundo";
    
    }else{
        
        upvelError.style.display="block";    
    }
    
    document.getElementById("table").innerHTML="<table class='table table-bordered  table-hover'><tbody><tr><th style=''>Nome</th><td>"+ name +"</td></tr><tr><th style=''>Velocidade de Download</th><td>"+ down + downvel + "</td></tr><tr><th style=''>Velocidade de Upload </th><td>"+ up + upvel + "</td></tbody></table>";
}




window.onload = function showButtonEdit(){
    document.getElementById("buttonconfirmEdit").style.display="block"; 
}

function validatorEdit(){
   
    let downEdit = document.getElementById("downEdit").value;
    let upEdit = document.getElementById("upEdit").value;
    let downErrorEdit = document.getElementById("downErrorEdit");
    let upErrorEdit = document.getElementById("upErrorEdit");
    let showModalEdit = document.getElementById("buttonconfirmEdit");
    document.getElementById("buttonconfirmEdit").style.display="block"
    
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
        
    }
    
     else if(upvelEdit == "K"){
        
        upvelEdit = "\ KILOBITS por segundo";
    
    }else{
        
        upvelErrorEdit.style.display="block";    
    }
    
    document.getElementById("tableEdit").innerHTML="<table class='table table-bordered  table-hover'><tbody><tr><th style=''>Velocidade de Download</th><td>"+ downEdit + downvelEdit + "</td></tr><tr><th style=''>Velocidade de Upload </th><td>"+ upEdit + upvelEdit + "</td></tbody></table>";
}


