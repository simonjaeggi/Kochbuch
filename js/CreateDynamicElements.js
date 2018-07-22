TextAreaCount = 1;
TextInputCount = 1
function createTextAreaZubereitung() {
  try {

    //Create an input type dynamically.
    var newTextarea = document.createElement("textarea");
    var name = "zubereitungsschritt_" + TextAreaCount;

    //Assign different attributes to the element.
    newTextarea.setAttribute("name", name);
    newTextarea.setAttribute("placeholder", "...");
    newTextarea.setAttribute("class", "Textarea");
    var Zubereitung = document.getElementById("Zubereitung");
    br = document.createElement('br');

    //Append the element in page (in div).
    Zubereitung.appendChild(br);
    Zubereitung.innerHTML += 'Zubereitungsschritt ' + TextAreaCount
    Zubereitung.appendChild(newTextarea);
    TextAreaCount++;
  }
  catch(err) {
    Zubereitung.innerHTML += "	Warning, you have an ERROR: " + err.message+  "  -_-";
  }
}

function createTextInputZutat() {
  try {

    //Create an input type dynamically.

    var newTextInputZutat = document.createElement("input");
    var newTextInputMenge = document.createElement("input");


    var nameZutat = "zutat_" + TextInputCount;
    var nameMenge = "menge_" + TextInputCount;

    //Assign different attributes to the element.


    newTextInputZutat.setAttribute("name", nameZutat);
    newTextInputZutat.setAttribute("placeholder", "Zutat " + TextInputCount);
    newTextInputZutat.setAttribute("class", "Input");

    newTextInputMenge.setAttribute("name", nameMenge);
    newTextInputMenge.setAttribute("placeholder", "zB in EL");
    newTextInputMenge.setAttribute("class", "Input");


    var Zutaten_Zutat = document.getElementById("Zutaten_Zutat");
    var Zutaten_Menge = document.getElementById("Zutaten_Menge");


    br = document.createElement('br');

    if (TextInputCount == 1) {
      Zutaten_Zutat.innerHTML += "Zutat";
      Zutaten_Menge.innerHTML += "Menge";


    }


    Zutaten_Zutat.appendChild(newTextInputZutat);
    Zutaten_Menge.appendChild(newTextInputMenge);


    TextInputCount++;
  }
  catch(err) {
    Zutaten.innerHTML += "	Warning, you have an ERROR: " + err.message+ " -_-";
  }
}
