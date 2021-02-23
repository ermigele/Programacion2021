import { Estadocivil } from './../../modelos/estadocivil';
import { EstadocivilService } from './../../servicios/estadocivil.service';
import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-estadosciviles',
  templateUrl: './estadosciviles.component.html',
  styleUrls: ['./estadosciviles.component.css']
})
export class EstadoscivilesComponent implements OnInit {

  public estados: Array<Estadocivil>;

  constructor(private servicio: EstadocivilService) {
    this.estados = []
  }

  ngOnInit(): void {

    this.servicio.getEstadosCiviles().subscribe(datos => {
      console.log("Estados civiles: ", datos);
      this.estados = datos;
    })
  }

}
