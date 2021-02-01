import { Persona } from './../persona';
import { PAjaxService } from '../p-ajax.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-listado',
  templateUrl: './listado.component.html',
  styleUrls: ['./listado.component.css']
})
export class ListadoComponent implements OnInit {

  public lista: Array<Persona>;

  constructor(private peti: PAjaxService) {
    this.peti.listar().subscribe(datos => {
      console.log("datos: ", datos);
      this.lista = datos;
    }, error => console.log("errores:", error));
  }

  ngOnInit(): void {
  }

  delete(id: number) {
    if (confirm("¿Estas seguro que desea borrar a esa persona?")) {
      this.peti.borrar(id).subscribe(datos => {
        console.log("Borrar: ",datos);
        this.lista = datos;
      },error => console.log("Error: ", error));
    }
  }
}
