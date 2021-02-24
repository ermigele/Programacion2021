import { Injectable } from '@angular/core';
import { Subject, Observable } from '../../../node_modules/rxjs';

@Injectable({
  providedIn: 'root'
})
export class Serviciio1Service {
	private listaNombres: string[];

	private listaNombres$ = new Subject<string[]>();

  constructor() {
		this.listaNombres = [
			"Marco Elio", "David", "Alejandro", "Juan Carlos", "Miguel Angel"
		];
	 }

	 obtenerInicial(){
		 return this.listaNombres;
	 }

	 agregarNombre(nombre: string){
		this.listaNombres.push(nombre);
		this.listaNombres$.next(this.listaNombres);
	 }

	 ObtenerNombres$(): Observable<string[]> {
		return this.listaNombres$.asObservable();
	 }

}
