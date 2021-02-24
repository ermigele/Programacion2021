import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { Mod1compo1Component } from "../modulo1/mod1compo1/mod1compo1.component";
import { Mod1compo2Component } from "../modulo1/mod1compo2/mod1compo2.component";
import { Mod1compo3Component } from "../modulo1/mod1compo3/mod1compo3.component";

const routes: Routes = [

	{
    path: '',
    children: [
			{
				path: 'compo1',
				component: Mod1compo1Component
			},
      { path: 'compo2', component: Mod1compo2Component },
			{ path: 'compo3', component: Mod1compo3Component },
      
      { path: '**', redirectTo: 'compo1' }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class Modulo1RoutingModule { }
