import { Estadocivil } from './../../modelos/estadocivil';
import { EstadocivilService } from './../../servicios/estadocivil.service';
import { AlumnoService } from './../../servicios/alumno.service';
import { Alumno } from './../../modelos/alumno';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-alumnos-listado',
  templateUrl: './alumnos-listado.component.html',
  styleUrls: ['./alumnos-listado.component.css']
})
export class AlumnosListadoComponent implements OnInit {

  public alumnos: Array<Alumno>;

  constructor(private servicioAlumno: AlumnoService, private servicioCivil: EstadocivilService) {
    this.alumnos = []
  }

  ngOnInit(): void {
    this.servicioAlumno.getAlumnos().subscribe(datos => {
      console.log("Alumnos: ", datos);
      this.alumnos = datos;
    })
  }

}
