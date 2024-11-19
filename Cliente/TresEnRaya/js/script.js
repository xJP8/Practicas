//!---------------------!//
//! Funcionalidad Vista !//
//!---------------------!//

const dialogo = document.getElementById('modo');
const result = document.getElementById('resultado');
let elemnArras = null;

dialogo.showModal();  

function selectMode(modo) {
  if (modo=='pve') {
    multijugador = false;
  }else if (modo=='pvp') {
    multijugador = true;
  }
  dialogo.close();
}

function mostrarResultado(tit){
  
  const ti = result.querySelector('h1');
  ti.innerHTML = tit;

  result.showModal();
}

function prevenirEscape(event) {
  if (event.key === 'Escape') {
    event.preventDefault(); 
  }
}

function iniciarArrastre(e) {
  elemnArras = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/plain', this.src);
}

function permitirSoltar(e) {
  if (e.preventDefault) {
    e.preventDefault();
  }
  e.dataTransfer.dropEffect = 'move';
  return false;
}

function manejarSoltar(e) {
  const origen = e.dataTransfer.getData('text/plain');
  
  if (e.stopPropagation) {
    e.stopPropagation();
  }
    
  if (this.tagName === 'TD' && this.querySelector('img').src.includes('vacio.png')) {
    const imagenEnCelda = this.querySelector('img');
    imagenEnCelda.src = origen;
    elemnArras.src = 'img/vacio.png';
    elemnArras.setAttribute('draggable', 'false');
    siguienteTurno();
  }

  return false;
}

function cambiarBloqueo(cruz, circulo) {
  document.querySelectorAll('#cruz li img').forEach(elemento => {
    elemento.setAttribute('draggable', cruz);
  });
  document.querySelectorAll('#circ li img').forEach(elemento => {
    elemento.setAttribute('draggable', circulo);
  });
}

document.querySelectorAll('ul li img').forEach(imagen => {
  imagen.addEventListener('dragstart', iniciarArrastre);
});

document.querySelectorAll('table td').forEach(celda => {
  celda.addEventListener('dragover', permitirSoltar);
  celda.addEventListener('drop', manejarSoltar);
});

//!---------------------------!//
//! Funcionalidad Controlador !//
//!---------------------------!//
function siguienteTurno() {
  actualizarTablero();
  if (!comprobarVictoria()) {
    cambiarTurno();
  }
}

function resultado(text){
  mostrarResultado(text);
}

//!----------------------!//
//! Funcionalidad Modelo !//
//!----------------------!//
const combinacionesGanadoras = [
  [0, 1, 2], [3, 4, 5], [6, 7, 8], // Filas
  [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columnas
  [0, 4, 8], [2, 4, 6]             // Diagonales
];

const celdas = document.querySelectorAll('.tablero td img');
let tablero = Array.from(celdas).map(celda => 
  celda.src.split('/').pop().replace('.png', '')
);

let turno = false; //* False ➡️ Cruz || True ➡️ Círculo
let multijugador = false;

function comprobarVictoria() {
  let celdasVacias = tablero.filter(celda => celda === 'vacio');

  for (let [a, b, c] of combinacionesGanadoras) {
    if (tablero[a] === tablero[b] && tablero[b] === tablero[c] && tablero[a] !== 'vacio') {
      resultado(`¡Victoria de ${tablero[a]}!`);
      return true;
    }
  }

  if (celdasVacias.length === 0) {
    resultado('¡Empate!');
    return true;
  }

  return false;
}

function actualizarTablero(){
  tablero = Array.from(celdas).map(celda => 
    celda.src.split('/').pop().replace('.png', '')
  );
}

function cambiarTurno() {
  turno = !turno;

  if (multijugador) {
    cambiarBloqueo(!turno, turno);
  } else {
    if (turno==true) {
      botJugar();
    }
  }
}


//! BOT !//
let cantCircu=0;

function botJugar() {
  if (botGanar()) {
    return null;
  } else if (botDefender()){
    return null;
  } else{
    botRandom();
  }
}

function botGanar() {
  for (let i = 0; i < 9; i++) {
    if (tablero[i] === 'vacio') {
      tablero[i] = 'circulo';
  
      for (let [a, b, c] of combinacionesGanadoras) {
        if (tablero[a] === tablero[b] && tablero[b] === tablero[c] && tablero[a] !== 'vacio' && tablero[a] === 'circulo') {
          botMover(i);
          return true;
        }
      }
  
      tablero[i] = 'vacio';
    }
  }

  return false;
}

function botDefender() {
  for (let i = 0; i < 9; i++) {
    if (tablero[i] === 'vacio') {
      tablero[i] = 'cruz';
  
      for (let [a, b, c] of combinacionesGanadoras) {
        if (tablero[a] === tablero[b] && tablero[b] === tablero[c] && tablero[a] !== 'vacio' && tablero[a] === 'cruz') {
          botMover(i);
          return true;
        }
      }
  
      tablero[i] = 'vacio';
    }
  }

  return false;
}

function botRandom(){
  let movimientosPosibles = [];
  let movimiento;
  let intentos=0;

  for (let i = 0; i < tablero.length; i++) {
    if (tablero[i] == 'vacio') {
      movimientosPosibles.push(i);
    }
  }

  do {
    movimiento = Math.floor(Math.random() * 9);
    intentos++;
  } while (!movimientosPosibles.includes(movimiento)&&intentos<9);

  botMover(movimiento);
}

function botMover(pos) {
  const fichCirculo = document.querySelectorAll('#circ li img');
  celdas[pos].src = 'img/circulo.png';
  fichCirculo[cantCircu].src = 'img/vacio.png';
  cantCircu++;
  siguienteTurno();
}