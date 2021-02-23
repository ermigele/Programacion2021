import { HttpClient } from '@angular/common/http';
import { Alumno } from './../modelos/alumno';
import { environment } from './../../environments/environment';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AlumnoService {

  private url = environment.API_URL;

  constructor(private http: HttpClient) { 
    
  }

  getAlumnos(){
    let pa = JSON.stringify({
      accion: "3"
    });

    return this.http.post<Alumno[]>(this.url, pa);
  }

  insertarAlumno(alumno: Alumno){
    let pa = JSON.stringify({
      accion: "0",
      NOMBRE: alumno.NOMBRE,
      APELLIDOS: alumno.APELLIDOS,
      SEXO: alumno.SEXO,
      FECHA_NACIMIENTO: alumno.FECHA_NACIMIENTO,
      ESTADO_CIVIL: alumno.ESTADO_CIVIL
    });

    return this.http.post<Alumno[]>(this.url, pa);
  }

  getAlumnoID(id: number){
    let pa = JSON.stringify({
      accion: "4",
      ID: id
    });

    return this.http.post<Alumno>(this.url, pa);
  }


  modificarAlumno(alumno: Alumno){
    let pa = JSON.stringify({
      accion: "1",
      NOMBRE: alumno.NOMBRE,
      APELLIDOS: alumno.APELLIDOS,
      SEXO: alumno.SEXO,
      FECHA_NACIMIENTO: alumno.FECHA_NACIMIENTO,
      ESTADO_CIVIL: alumno.ESTADO_CIVIL,
      ID: alumno.ID
    });

    return this.http.post<Alumno[]>(this.url, pa);
  }
}
