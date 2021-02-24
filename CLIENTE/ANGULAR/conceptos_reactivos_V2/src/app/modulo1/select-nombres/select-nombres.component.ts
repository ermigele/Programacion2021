import { Component, OnInit } from '@angular/core';
import { Serviciio1Service } from "../serviciio1.service";
import { Observable } from '../../../../node_modules/rxjs';

@Component({
  selector: 'app-select-nombres',
  templateUrl: './select-nombres.component.html',
  styleUrls: ['./select-nombres.component.css']
})
export class SelectNombresComponent implements OnInit {

	private listaNombres$: Observable<string[]>;
	private listaNombres: string[];

  constructor(private servicio1: Serviciio1Service) {
		this.listaNombres = this.servicio1.obtenerInicial();
	} 

  ngOnInit() {
		this.listaNombres$ = this.servicio1.ObtenerNombres$();
		this.listaNombres$.subscribe(
			nombres =>{ 
				console.log(nombres);
				this.listaNombres = nombres
			},
			error => console.log(error)
		);
  }

}
