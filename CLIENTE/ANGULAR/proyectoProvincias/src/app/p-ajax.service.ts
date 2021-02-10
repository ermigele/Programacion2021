import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import {Provincia} from './provincia';
import {Localidad} from './localidad';

@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url: string = "http://localhost/CLIENTE/AJAX/serviciosWeb/provinciaslocalidades/servidor.php";

  constructor(private http: HttpClient) {

  }

  pedirProvincias() {
    let dir = this.url + "?servicio=provincias";
    return this.http.get<Provincia[]>(dir);
  }

  pedirLocalidades(idProvincia) {
    let dir = this.url + "?servicio=localidades&codigop="+ idProvincia;
    return this.http.get<Localidad[]>(dir);
  }
}
