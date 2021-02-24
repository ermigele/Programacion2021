import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from "@angular/forms";
import { Componente1Component } from './componente1/componente1.component';
import { AddModNombreComponent } from './add-mod-nombre/add-mod-nombre.component';
import { SelectNombresComponent } from './select-nombres/select-nombres.component';
import { TableNombresComponent } from './table-nombres/table-nombres.component';


@NgModule({
  imports: [
		CommonModule,
		FormsModule
  ],
	declarations: [Componente1Component, AddModNombreComponent, SelectNombresComponent, TableNombresComponent],
	//  Hay que exportar el módulo para poder utilizar sus componentes
	exports: [Componente1Component]
})
export class Modulo1Module { }
