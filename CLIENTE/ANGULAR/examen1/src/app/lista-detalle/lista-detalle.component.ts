import { DetalleFactura } from './../detalle-factura';
import { Component, OnInit, NgModule } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { PAjaxService } from './../p-ajax.service';

@Component({
  selector: 'app-lista-detalle',
  templateUrl: './lista-detalle.component.html',
  styleUrls: ['./lista-detalle.component.css']
})
export class ListaDetalleComponent implements OnInit {

public id: number;
public num: number;
public listaDetalle: Array<DetalleFactura>;
public detalle: DetalleFactura;
public mostrar: boolean;
public accion: string;

  constructor(private peti: PAjaxService, private ruta: Router, private route: ActivatedRoute) {
    this.listaDetalle = [];
    this.detalle = <DetalleFactura>{};
    this.mostrar = false;
  }

  ngOnInit(): void {
    this.id = this.route.snapshot.params["id"];
    this.num = this.route.snapshot.params["num"];

    this.peti.pedirDetalle(this.id).subscribe(datos => {
    let importe =datos.CANTIDAD * datos.PRECIO;
    let iva =  importe * datos.TIPO_IVA / 100;
    this.listaDetalle = datos;
    console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

  mostrarDetalle(){
    if(this.mostrar)
    this.mostrar = false;
    else
    this.mostrar = true;
  }

  nuevoDetalle(){
    this.peti.anade(this.detalle, this.id).subscribe(datos => {
      this.listaDetalle = datos;
      }, error => console.log("Error: ", error));
      this.mostrar= false;
    }

    borrar(id: number) {
      if (confirm("¿Estas seguro que desea borrar a esa linea detalle?")) {
        this.peti.borra(id, this.id).subscribe(datos => {
          this.listaDetalle = datos;
        },error => console.log("Error: ", error));
      }
    }

    editar(id: number) {
    
      }


   modificarDetalle(){
   
   }

}
