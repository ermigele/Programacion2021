import { Estadocivil } from './../modelos/estadocivil';
import { environment } from './../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class EstadocivilService {

  private url = environment.API_URL;

  constructor(private http: HttpClient) { 
    
  }

  getEstadosCiviles(){
    let pe = JSON.stringify({
      accion: "9"
    });

    return this.http.post<Estadocivil[]>(this.url, pe);
  }

  getSexos(){
    let pe = JSON.stringify({
      accion: "5"
    });

    return this.http.post<Estadocivil[]>(this.url, pe);
  }
}
