import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-g-hobbit',
  templateUrl: './g-hobbit.component.html',
  styleUrls: ['./g-hobbit.component.css']
})
export class GHobbitComponent implements OnInit {

  public lista: string[];
  public gHobbit: string;
  private accion: { id: number, nombre: string, indice: number };

  constructor() {
    this.lista = ["Bilbo Bolsón", "Sam Gamyi", "Frodo Bolsón", "Pippin Tuc", "Merry Brandigamo", "Rosita Coto"];
    this.gHobbit = "";
    this.accion = { id: 1, nombre: "Añadir", indice: -1 };
  }
  ngOnInit(): void {
  }

  public anyadirHobbit() {
    if (this.gHobbit.length > 1){
      if(this.accion.id == 1)
      this.lista.push(this.gHobbit);
      else
      this.lista[this.accion.id] = this.gHobbit;
    }
  }

  public eliminar(pos: number) {
    console.log("Un enano de mierda menos");
    this.lista.splice(pos,1);
  }

  public editar(hobbit: string, pos:number) {
    this.gHobbit = hobbit;
   this.accion.id = 2;
   this.accion.nombre = "Editar";
   this.accion.indice = pos;
  }
}
