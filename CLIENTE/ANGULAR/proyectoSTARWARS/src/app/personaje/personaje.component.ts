import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';
@Component({
  selector: 'app-personaje',
  templateUrl: './personaje.component.html',
  styleUrls: ['./personaje.component.css']
})
export class PersonajeComponent implements OnInit {

  public personajes: Array<any>;
  public datos: any;
  public datosPlaneta: Object = null;

  constructor(private peti: PAjaxService) {
    this.personajes = [];
    this.datos= null;
  }

  ngOnInit(): void {
    this.peti.pedirTodosPersonajes().subscribe(datos => {
      this.asignarDatos(datos)
    }, error => console.log("Error: ", error));
  }

  asignarDatos(datos: object) {
    this.datos = datos;
    this.personajes = this.datos.results;
  }

  pedirSiguiente() {
    this.peti.petiADir(this.datos.next).subscribe(
      datos => {
        console.log("datos: ", datos.next);
        this.asignarDatos(datos);
      });
  }

  pedirAnterior() {
    this.peti.petiADir(this.datos.previous).subscribe(
      datos => {
        console.log("datos: ", datos.previous);
        this.asignarDatos(datos);
      });
  }

  mostrarDatosPlaneta(dirPlaneta: string, evento) {
    evento.preventDefault();
    this.peti.petiADir(dirPlaneta).subscribe(
      datos => {
        this.asignarDatos(datos);
      });
  }
}
