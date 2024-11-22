//!---------------------!//
//! Funcionalidad Vista !//
//!---------------------!//

const dialogo = document.getElementById('modo');
const result = document.getElementById('resultado');
let elemnArras = null;

// Dialogo Inicial //
dialogo.showModal();  

// Este metodo se usa para elegir el modo de juego //
function selectMode(modo) {
  if (modo=='pve') {
    multijugador = false;
  }else if (modo=='pvp') {
    multijugador = true;
  }
  dialogo.close();
}

// Este metodo muestra el resultado de la partida [Victoria Cruz, Victoria Circulo, Empate] //
function mostrarResultado(tit){
  
  const ti = result.querySelector('h1');
  ti.innerHTML = tit;

  result.showModal();
}

// Esto simplemente es pa que no se pueda pulsar el escape en los dialogos //
function prevenirEscape(event) {
  if (event.key === 'Escape') {
    event.preventDefault(); 
  }
}

//! Metodos Para El Arrastre de las Fichas !//
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

// Metodo para alternar los turnos //
function cambiarBloqueo(cruz, circulo) {
  document.querySelectorAll('#cruz li img').forEach(elemento => {
    elemento.setAttribute('draggable', cruz);
  });
  document.querySelectorAll('#circ li img').forEach(elemento => {
    elemento.setAttribute('draggable', circulo);
  });
}

// Eventos //
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

// Se le pasa el resultado para mostrarlo //
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


// Comprueba si hay alguna dicha ganadora //
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

// Actualiza de forma Logica el tablero, sobre todo para el modo PvE //
function actualizarTablero(){
  tablero = Array.from(celdas).map(celda => 
    celda.src.split('/').pop().replace('.png', '')
  );
}

// Funcionalidad de los turnos //
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

// Directrices de la jugabilidad del BOT //
function botJugar() {
  if (botGanar()) {
    return null;
  } else if (botDefender()){
    return null;
  } else{
    botRandom();
  }
}

// El bot intenta ganar //
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

// El bot intenta defender //
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

// El bot mueve de forma aleatoria en una posición libre //
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

// Funcionalidad de mover para el bot //
function botMover(pos) {
  const fichCirculo = document.querySelectorAll('#circ li img');
  celdas[pos].src = 'img/circulo.png';
  fichCirculo[cantCircu].src = 'img/vacio.png';
  cantCircu++;
  siguienteTurno();
}