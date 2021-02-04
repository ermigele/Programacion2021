import { Owner } from './../models/owner';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class OwnersService {

  private url: string = "http://localhost/CLIENTE/AJAX/serviciosWeb/petclinic/servicios.php";

  constructor(private http: HttpClient) {

  }

  getOwners() {
    let pa = JSON.stringify({
      accion: "ListarOwners"
    });

    return this.http.post<Owner[]>(this.url, pa);
  }

  getOwnersID(){
    let pa = JSON.stringify({
      accion: "ObtenerOwnerId"
    });
    
    return this.http.post<Owner[]>(this.url, pa)
  }
}
