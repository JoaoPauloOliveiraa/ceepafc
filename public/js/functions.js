
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