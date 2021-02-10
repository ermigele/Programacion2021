import { Persona } from './persona';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url: string = "http://localhost/CLIENTE/AJAX/serviciosWeb/listaPersonas/servidor.php";

  constructor(private http: HttpClient) {

  }

  listar() {
    return this.http.post<Persona[]>(this.url, { servicio: "listar" });
  }

  anade(p: Persona) {
    let nuevo = JSON.parse(JSON.stringify(p));
    nuevo.servicio = "insertar";
    console.log("Nuevo (en el servicio): ", nuevo);

    return this.http.post<Array<Persona>>(this.url, nuevo);
  }

  selPersonaId(id: number) {
    let p = {
      servicio: "selPersonaID",
      id: id
    }
    return this.http.post<Persona>(this.url, p);
  }

  modificar(p: Persona) {
    let modificar = JSON.parse(JSON.stringify(p));
    modificar.servicio = "modificar";
    console.log("Modificar (en el servicio): ", modificar);

    return this.http.post<Persona>(this.url, modificar);
  }

  borrar(id: number){
    let p = {
      servicio: "borrar",
      id: id
    }
    return this.http.post<Array<Persona>>(this.url, p);
  }
}
