import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

//  Hay que importar el módulo de rutas local (del módulo):
import { Modulo3RoutingModule } from './modulo3-routing.module';

import { Mod3compo1Component } from './mod3compo1/mod3compo1.component';
import { Mod3compo2Component } from './mod3compo2/mod3compo2.component';
import { Mod3compo3Component } from './mod3compo3/mod3compo3.component';


@NgModule({
  declarations: [Mod3compo1Component, Mod3compo2Component, Mod3compo3Component],
  imports: [
    CommonModule,
    Modulo3RoutingModule
  ]
})
export class Modulo3Module { }
