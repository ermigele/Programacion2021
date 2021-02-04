import { PAjaxService } from './../p-ajax.service';
import { Persona } from './../persona';
import { Component, OnInit, NgModule } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IfStmt } from '@angular/compiler';

@Component({
  selector: 'app-form-persona',
  templateUrl: './form-persona.component.html',
  styleUrls: ['./form-persona.component.css']
})
export class FormPersonaComponent implements OnInit {

  public persona: Persona;
  public accion: string;

  constructor(private peti: PAjaxService, private ruta: Router, private route: ActivatedRoute) {
    this.persona = <Persona>{};
  }

  ngOnInit(): void {
    this.persona.id = this.route.snapshot.params["id"];

    if (this.persona.id != -1) {
      this.accion = "Editar";
      this.peti.selPersonaId(this.persona.id).subscribe(datos => {
        console.log("Datos: ", datos);
        this.persona = datos;
      },
        error => console.log("Error: ", error));
    } else {
      this.accion = "Añadir";
    }
  }

  addMod() {
    if (this.persona.id == -1) { //AÑADIMOS NUEVA PERSONA
      /* OTRA FORMA DE HACERLO
      let nuevo = JSON.parse(JSON.stringify(this.persona));
      let p = {
        servicio: "insertar",
        dni: this.persona.DNI,
        nombre: this.persona.NOMBRE,
        apellidos: this.persona.APELLIDOS  }*/
      this.peti.anade(this.persona).subscribe(datos => {
        console.log("Datos: ", datos);
        // Navegamos de vuelta al listado de personas
        this.ruta.navigate(['/']);
      }, error => console.log("Error: ", error));

    } else { // MODIFICAMOS PERSONA
      this.peti.modificar(this.persona).subscribe(datos => {
      }, error => console.log("Error al modificar", error));
    }
  }

}
