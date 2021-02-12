import { environment } from './../../environments/environment';
import { Owner } from './../models/owner';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class OwnersService {

  private url = environment.API_URL;

  constructor(private http: HttpClient) {

  }

  getOwners() {
    let pa = JSON.stringify({
      accion: "ListarOwners"
    });

    return this.http.post<Owner[]>(this.url, pa);
  }

  getOwnerID(id: number) {
    let pa = JSON.stringify({
      accion: "ObtenerOwnerId",
      id: id
    });

    return this.http.post<Owner>(this.url, pa)
  }

  setOwner(owner: Owner) {
    let pa = JSON.stringify({
      accion: "AnadeOwner",
      owner: owner
    });

    return this.http.post<Owner>(this.url, pa)
  }

  delOwner(id: number) {
    let pa = JSON.stringify({
      accion: "BorraOwner",
      id: id,
      listado: "NO"
    });

    return this.http.post<Owner>(this.url, pa)
  }

  delOwnerList(id: number) {
    let pa = JSON.stringify({
      accion: "BorraOwner",
      id: id,
      listado: "OK"
    });

    return this.http.post<Owner[]>(this.url, pa)
  }


}
