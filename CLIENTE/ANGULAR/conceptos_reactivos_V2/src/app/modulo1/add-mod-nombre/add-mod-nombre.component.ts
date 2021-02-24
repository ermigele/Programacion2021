import { Component, OnInit } from '@angular/core';

import { Serviciio1Service } from "../serviciio1.service";

@Component({
  selector: 'app-add-mod-nombre',
  templateUrl: './add-mod-nombre.component.html',
  styleUrls: ['./add-mod-nombre.component.css']
})
export class AddModNombreComponent implements OnInit {
	private nombre: string;

  constructor(private servicio1: Serviciio1Service) {
		this.nombre = "";
	 }

  ngOnInit() {
	}
	
	anadeModNombre(){
		this.servicio1.agregarNombre(this.nombre);
	}

}
