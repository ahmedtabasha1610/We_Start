let myButton = document.getElementById('click');
let text = document.getElementById('text')
let link = document.getElementById('link')

function loading(){
    'الحصول على الرابط';
    link.style.display='block'

}

myButton.onclick = function(e){
    setTimeout(loading,5000);



    text.style.display='block'
    text.style.textShadow='text-shadow: 2px 2px #ff0000'
    text.style.fontFamily='Cairo', sans-serif
}



