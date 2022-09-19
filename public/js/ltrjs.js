
var i = 0;
var txt = 'Search for your religious / ideological question\n';
var speed = 30;

function typeWriter() {
    if (i < txt.length) {
        document.getElementById("demo").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
}
typeWriter();

var advance0=document.getElementById("advance");
function  clickandvance(){
    var advance1=document.getElementById("myButton");

    if(advance1.value=="YES"){
        advance0.innerHTML=`  <select>
                                    <option>All words
                                      </option>
                                    <option>The same phrase
                                      </option>
                                    <option>Every word
                                     </option>
                                </select>
                                <select class="mr-3">
                                    <option>Total topics
                                     </option>
                                    <option>Quran</option>
                                    <option>
                                   traditions</option>
                                    <option>history</option>
                                    <option>Sira Ahkam
                                      </option>
                                    <option>
                                      philosophy </option>
                                    <option>Speech
                                      </option>
                                    <option>
                                    tradition </option>
                                </select>
                                <select class="mr-3">
                                    <option>All the time
                                      </option>
                                      <option>

                                     yesterday</option>
                                    <option>last week
                                       </option>
                                    <option>last month
                                      </option>
                                    
                                </select>
                                 <hr>
                           <input type="checkbox">
                            text
                             <input type="checkbox">
                            Thematic classification
                            <input type="checkbox">
                             Keyword question

                           <input type="checkbox">
                            Questionnaire


                               `;



        advance1.value="NO";

    }
    else if(advance1.value=="NO"){
        advance0.innerHTML=` `;
        advance1.value="YES";

    }




}

