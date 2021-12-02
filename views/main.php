
<div id="body">
<h1 >Flit/Фліт</h1>
<hr>
<p><b>FliT (Фліт)</b> — українсько-американський музичний гурт з Івано-Франківська, створений в 2001 році, основним напрямом в стилі є панк-рок. Але сам гурт називає свій музичний напрям «інтелігент-панк-роком».</p>
<hr style="border-color: tomato;">
<div>
    <table style="width: 100%; border-color: tomato;" border="3px">
        <caption style="font-size: 30px;" >Найпопулярніші пісні</caption>
        <tr>
            <td style=" width: 50%; height: auto;">
            <video style="width:  100%; height: 350px;" src="video/їжачок.mp4" preload="false" controls></video>
            </td>
            <td style=" width: 50%; height: auto;">
            <video style="width:  100%; height: 350px;" src="video/моя планета.mp4" preload="false" controls></video>
        </td>
        </tr>
    </table>
</div>
<script>
var i=0;
var imag=[];
var time=2000;
imag[0]="img/1.jpg";
imag[1]="img/2.jpg";
imag[2]="img/3.jpg";
imag[3]="img/4.jpg";
function chang(){
    document.slide.src=imag[i];
    if(i<imag.length-1){
        i++;
    } else i=0;
    setTimeout("chang()", time);
}
window.onload=chang;
</script>
<img name="slide" style="display: block; margin: auto;" width="50%" height="auto" src="" alt="Фото гурту">
</div>
