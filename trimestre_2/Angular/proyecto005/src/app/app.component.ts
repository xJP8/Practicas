import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { NumAleatorioComponent } from "./num-aleatorio/num-aleatorio.component";

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, NumAleatorioComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
}