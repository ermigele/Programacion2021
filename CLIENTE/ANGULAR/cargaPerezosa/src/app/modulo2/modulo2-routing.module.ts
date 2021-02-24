import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { Mod2compo1Component } from "../modulo2/mod2compo1/mod2compo1.component";
import { Mod2compo2Component } from "../modulo2/mod2compo2/mod2compo2.component";
import { Mod2compo3Component } from "../modulo2/mod2compo3/mod2compo3.component";

const routes: Routes = [
	{
    path: '',
    children: [
			{
				path: 'compo1',
				component: Mod2compo1Component
			},
      { path: 'compo2', component: Mod2compo2Component },
			{ path: 'compo3', component: Mod2compo3Component },
      
      { path: '**', redirectTo: 'compo1' }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class Modulo2RoutingModule { }
