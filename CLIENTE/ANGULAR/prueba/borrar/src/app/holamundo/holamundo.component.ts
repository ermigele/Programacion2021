import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-holamundo',
  templateUrl: './holamundo.component.html',
  styleUrls: ['./holamundo.component.css']
})
export class HolamundoComponent {

  titulo = "Nocilla"
  lista = new Array("leche", "cacao", "albellana", "azucar")

  cambiar() {
    this.titulo = "He cambiado el titulo";
  }
}
