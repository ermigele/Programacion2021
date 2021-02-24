import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';



import { Mod3compo1Component } from "../modulo3/mod3compo1/mod3compo1.component";
import { Mod3compo2Component } from "../modulo3/mod3compo2/mod3compo2.component";
import { Mod3compo3Component } from "../modulo3/mod3compo3/mod3compo3.component";

const routes: Routes = [
	{
    path: '',
    children: [
			{
				path: 'compo1',
				component: Mod3compo1Component
			},
      { path: 'compo2', component: Mod3compo2Component },
			{ path: 'compo3', component: Mod3compo3Component },
      
      { path: '**', redirectTo: 'compo1' }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class Modulo3RoutingModule { }
