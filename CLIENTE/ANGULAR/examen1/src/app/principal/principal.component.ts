import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';
@Component({
  selector: 'app-principal',
  templateUrl: './principal.component.html',
  styleUrls: ['./principal.component.css']
})
export class PrincipalComponent implements OnInit {

  public listaFacturas: Array<any>;
  
  constructor(private peti: PAjaxService) { 
    this.listaFacturas = [];
  }

  ngOnInit(): void {
    this.peti.pedirFacturas().subscribe(datos => {
      this.listaFacturas = datos;
      console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

}
