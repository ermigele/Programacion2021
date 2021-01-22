import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';
@Component({
  selector: 'app-personaje',
  templateUrl: './personaje.component.html',
  styleUrls: ['./personaje.component.css']
})
export class PersonajeComponent implements OnInit {

  public personajes: Array<any>;

  constructor(private peti: PAjaxService) {
    this.personajes = [];
  }

  ngOnInit(): void {
    this.peti.pedirTodosPersonajes().subscribe(datos => {
      this.personajes = datos.results;
      console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

}
