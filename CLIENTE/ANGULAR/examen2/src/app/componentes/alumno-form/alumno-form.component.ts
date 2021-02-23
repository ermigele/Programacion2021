import { EstadocivilService } from './../../servicios/estadocivil.service';
import { AlumnoService } from './../../servicios/alumno.service';
import { Estadocivil } from './../../modelos/estadocivil';
import { Alumno } from './../../modelos/alumno';
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-alumno-form',
  templateUrl: './alumno-form.component.html',
  styleUrls: ['./alumno-form.component.css']
})
export class AlumnoFormComponent implements OnInit {

  public alumno: Alumno;
  public sexos: Array<Estadocivil>;
  public estadosCiviles: Array<Estadocivil>;

  constructor(private servicioAlumno: AlumnoService, private servicioEstado: EstadocivilService, private ruta: Router, private route: ActivatedRoute) {
    this.alumno = <Alumno>{};
    this.sexos = [];
    this.estadosCiviles = [];
  }

  ngOnInit(): void {
    this.servicioEstado.getEstadosCiviles().subscribe(datos => {
      console.log("Estados civiles: ", datos);
      this.estadosCiviles = datos;
    })

    this.servicioEstado.getSexos().subscribe(datos => {
      console.log("Sexos: ", datos);
      this.sexos = datos;
    })

    this.alumno.ID = this.route.snapshot.params["id"];

    if (this.alumno.ID != null) {
      this.servicioAlumno.getAlumnoID(this.alumno.ID).subscribe(datos => {
        console.log("Alumnito: ", datos);
        this.alumno = datos;
      })
    }
  }

  enviar(alumno: Alumno) {

    if (alumno.ID != null) {
      this.servicioAlumno.modificarAlumno(alumno).subscribe(datos => {
        console.log("Alumno: ", datos);
        this.ruta.navigate(["/alumnos"]);
      })
    } else {
      this.servicioAlumno.insertarAlumno(alumno).subscribe(datos => {
        console.log("nuevo Alumno: ", datos);
        this.ruta.navigate(["/alumnos"]);
      })
    }
  }
}
