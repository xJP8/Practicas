import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-num-aleatorio',
  imports: [],
  templateUrl: './num-aleatorio.component.html',
  styleUrl: './num-aleatorio.component.css'
})
export class NumAleatorioComponent {

  @Input() minimo: number = 1;
  @Input() maximo: number = 50;
  numero: number = 1;

  aleatorio(tipo: boolean, parImpar: string) {
    if (parImpar === "p") {
      this.numero = Math.floor(Math.random() * (this.maximo - this.minimo + 1) + this.minimo);
      if (this.numero % 2 != 0) {
        this.numero++;
      }
    } else if (parImpar === "i") {
      this.numero = Math.floor(Math.random() * (this.maximo - this.minimo + 1) + this.minimo);
      if (this.numero % 2 == 0 && this.numero != this.maximo) {
        this.numero++;
      } else if (this.numero % 2 == 0 && this.numero == this.maximo) {
        this.numero--;
      }
    }

    if (!tipo) {
      this.numero *= -1;
    }
  }
}
