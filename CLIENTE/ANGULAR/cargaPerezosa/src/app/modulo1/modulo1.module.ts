import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

//  Hay que importar el módulo de rutas local (del módulo):
import { Modulo1RoutingModule } from './modulo1-routing.module';


import { Mod1compo1Component } from './mod1compo1/mod1compo1.component';
import { Mod1compo2Component } from './mod1compo2/mod1compo2.component';
import { Mod1compo3Component } from './mod1compo3/mod1compo3.component';



@NgModule({
  declarations: [Mod1compo1Component, Mod1compo2Component, Mod1compo3Component],
  imports: [
    CommonModule,
		Modulo1RoutingModule
  ]
})
export class Modulo1Module { }
