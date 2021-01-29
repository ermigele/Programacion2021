import { PAjaxService } from './../p-ajax.service';
import { Persona } from './../persona';
import { Component, OnInit, NgModule } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-form-persona',
  templateUrl: './form-persona.component.html',
  styleUrls: ['./form-persona.component.css']
})
export class FormPersonaComponent implements OnInit {

  public persona: Persona;
  constructor(private peti: PAjaxService, private ruta: Router, private route: ActivatedRoute) {
    this.persona = <Persona>{};
    /*  this.persona = <Persona>{
       this.persona = {
         ID: -1,
         DNI: '25474932G',
         NOMBRE: "Miguel Ángel",
         APELLIDOS: "Martin Martin"
       }; */

  }

  ngOnInit(): void {

  }

  addMod() {
    /*
       let nuevo = JSON.parse(JSON.stringify(this.persona));

       let p = {
         servicio: "insertar",
         dni: this.persona.DNI,
         nombre: this.persona.NOMBRE,
         apellidos: this.persona.APELLIDOS
       }; */

    this.peti.anade(this.persona).subscribe(datos => {
        console.log("Datos: ", datos);
      }, error => console.log("Error: ", error));



  }

}
