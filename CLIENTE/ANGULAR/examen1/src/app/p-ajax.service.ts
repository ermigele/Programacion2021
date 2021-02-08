import { DetalleFactura } from './detalle-factura';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
HttpClient
@Injectable({
  providedIn: 'root'
})
export class PAjaxService {

  private url: string = "http://localhost/CLIENTE/AJAX/serviciosWeb/examen/servidor.php";

  constructor(private http: HttpClient) {
  }

  pedirFacturas() {
    let f = JSON.stringify({
      servicio: "facturas"
    });

  return this.http.post<any>(this.url, f);
  }
  pedirDetalle(id: number) {
    let df = JSON.stringify({
      servicio: "detalle",
      id: id
    });
  return this.http.post<any>(this.url, df);
  }

  anade(d: DetalleFactura, id:number) {
    let nuevo = JSON.parse(JSON.stringify(d));
    nuevo.id_factura = id;
    console.log("nuevo", nuevo);
    let df = JSON.stringify({
      servicio: "anade",
      detalle: nuevo
    });
    console.log("DF", df);
  return this.http.post<any>(this.url, df);
  }

  borra(id:number, idFactura: number) {
    let df = JSON.stringify({
      servicio: "borra",
      id: id,
      id_factura: idFactura
    });
  return this.http.post<any>(this.url, df);
  }

  modifica(d: DetalleFactura, idFactura: number) {
    d.id_factura = idFactura;
    let df = JSON.stringify({
      servicio: "modifica",
      detalle: d
    });
  return this.http.post<any>(this.url, df);
  }

}
