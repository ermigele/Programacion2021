import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

//  Hay que importar el módulo de rutas local (del módulo):
import { Modulo2RoutingModule } from './modulo2-routing.module';

import { Mod2compo1Component } from './mod2compo1/mod2compo1.component';
import { Mod2compo2Component } from './mod2compo2/mod2compo2.component';
import { Mod2compo3Component } from './mod2compo3/mod2compo3.component';


@NgModule({
  declarations: [Mod2compo1Component, Mod2compo2Component, Mod2compo3Component],
  imports: [
    CommonModule,
    Modulo2RoutingModule
  ]
})
export class Modulo2Module { }
