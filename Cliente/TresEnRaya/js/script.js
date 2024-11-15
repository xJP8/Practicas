//!---------------------!//
//! Funcionalidad Vista !//
//!---------------------!//
document.addEventListener('DOMContentLoaded', (event) => {
  let dragSrcEl = null;

  function handleDragStart(e) {
    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/plain', this.src);
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }
    e.dataTransfer.dropEffect = 'move';
    return false;
  }

  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation();
    }

    const src = e.dataTransfer.getData('text/plain');
      
    if (this.tagName === 'TD' && this.querySelector('img').src.includes('vacio.png')) {
      const imgInCell = this.querySelector('img');
      imgInCell.src = src;
      dragSrcEl.src = 'img/vacio.png'
      dragSrcEl.setAttribute('draggable', 'false');
      nextTurn();
    }

    return false;
  }

  function changeLock(cruz, circ){
    document.querySelectorAll('#cruz li img').forEach(element => {
      element.setAttribute('draggable', cruz);
    });
    document.querySelectorAll('#circ li img').forEach(element => {
      element.setAttribute('draggable', circ);
    });
  }

  document.querySelectorAll('ul li img').forEach(img => {
    img.addEventListener('dragstart', handleDragStart);
  });

  document.querySelectorAll('table td').forEach(cell => {
    cell.addEventListener('dragover', handleDragOver);
    cell.addEventListener('drop', handleDrop);
  });


  //!---------------------------!//
  //! Funcionalidad Controlador !//
  //!---------------------------!//
  function nextTurn(){
    checkWin()
    changeTurn();
  }


  //!----------------------!//
  //! Funcionalidad Modelo !//
  //!----------------------!//
  let turn = false; //* False ➡️ Cruz || True ➡️ Circulo
  let multiplayer = false; //TODO Hacer que cambie por un botón

  function checkWin(){
    let celdas = document.querySelectorAll('.tablero td');
    let tablero = [];

    for (let i = 0; i < 3; i++) {
      for (let j = 0; j < 3; j++) {
        tablero[i][j] = celdas[i+j];
        console.log(celdas[i+j]);
      }
    }    

  }

  function changeTurn(){
    turn = !turn;

    if(!multiplayer){

      changeLock(!turn, turn)

    }else{
      //TODO Juega la AI
    }
  }
});
