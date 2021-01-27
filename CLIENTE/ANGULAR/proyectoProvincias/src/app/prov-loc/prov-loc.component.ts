import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';
import {Provincia} from '../provincia';
import {Localidad} from '../localidad';

@Component({
  selector: 'app-prov-loc',
  templateUrl: './prov-loc.component.html',
  styleUrls: ['./prov-loc.component.css']
})
export class ProvLocComponent implements OnInit {

  //public opcionesProv: Provincia[]
  public opcionesProv: Array<Provincia>;
  public opSelProv: any;
  public opcionesLoc: Array<Localidad>;
  public opSelLoc: any;

  constructor(private peti: PAjaxService) {
    this.opcionesProv = [];
    this.opSelProv = null;
    this.opcionesLoc = [];
    this.opSelLoc = null;
  }

  ngOnInit(): void {

    this.peti.pedirProvincias().subscribe(datos => {
      this.opcionesProv = datos;
      this.opcionesProv.unshift({ CODIGO: -1, NOMBRE: "Selecciona provincia" });
      this.opSelProv = datos[0];
      console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

  seleccionProv() {
    console.log("opSelProv: ", this.opSelProv);
    this.peti.pedirLocalidades(this.opSelProv.CODIGO).subscribe(datos => {
      this.opcionesLoc = datos
      this.opSelLoc = datos[0];
    }, error => console.log("Error: ", error));
  }


  seleccionLoc() {
    console.log("localidad",this.opSelLoc );
  }

}
