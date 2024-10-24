function textobonito(idelemento, textos) {
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Function textobonito called");
    let indextxt = 0;
    let charadd = 0;
    let intervalo = 0;

    const location = document.getElementById(idelemento);

    console.log("Location found:", location);

    function escrever(texto) {
      charadd = 0;
      location.textContent = "";
      intervalo = setInterval(() => {
        if (charadd < texto.length) {
          location.textContent += texto[charadd];
          charadd++;
        } else {
          clearInterval(intervalo);
        }
      }, 50);
    }

    function trocartxt() {
      if (indextxt < textos.length) {
        clearInterval(intervalo);
        escrever(textos[indextxt]);
        indextxt++;
      } else {
        document.removeEventListener("click", trocartxt);
      }
    }

    trocartxt();
    document.addEventListener("click", trocartxt);
  });
}
