//первый диалог
let dialog = document.getElementById('dialog1');
let a = 1;

function vievDiv(){
    if(a == 1){
        dialog.show();
        a = 2;
    }
    else{
        dialog.close();
        a = 1;
    }
}

function goVh(){
    window.location.href = 'Register/vh.php';
}


//второй диалог
let dialog2 = document.getElementById('dialog2');
let b = 1;

function vievDiv2(){
    if(b == 1){
        dialog2.show();
        b = 2;
    }
    else{
        dialog2.close();
        b = 1;
    }
}