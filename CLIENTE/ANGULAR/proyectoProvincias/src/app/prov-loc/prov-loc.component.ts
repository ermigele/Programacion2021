import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';
@Component({
  selector: 'app-prov-loc',
  templateUrl: './prov-loc.component.html',
  styleUrls: ['./prov-loc.component.css']
})
export class ProvLocComponent implements OnInit {

  public opcionesProv: Array<any>;
  public opSelProv: any;

  constructor(private peti: PAjaxService) {
    this.opcionesProv = [];
    this.opSelProv = null;
  }

  ngOnInit(): void {
    
    this.peti.pedirProvincias().subscribe(datos => {
      this.opcionesProv = datos;
      this.opcionesProv.unshift({ CODIGO: -1, NOMBRE: "Selecciona provincia"});
      this.opSelProv = datos[0];
      console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

  seleccionProv(opcion: string) {
    console.log("opcion: ", opcion);
  }

}
