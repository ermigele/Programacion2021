import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url: string = "http://localhost/CLIENTE/AJAX/serviciosWeb/provinciaslocalidades/servidor.php";

  constructor(private http: HttpClient) {

  }

  pedirProvincias() {
    let dir = this.url + "?servicio=provincias";
    return this.http.get<any>(dir);
  }
}
