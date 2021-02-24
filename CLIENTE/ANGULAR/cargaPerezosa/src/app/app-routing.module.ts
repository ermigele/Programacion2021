import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';


const routes: Routes = [
	//  MODULO 1:
	{
    path: 'modulo1',
    loadChildren: () => import('./modulo1/modulo1.module').then(m => m.Modulo1Module)
  },
	

	//  MODULO 2:
	{
    path: 'modulo2',
    loadChildren: () => import('./modulo2/modulo2.module').then(m => m.Modulo2Module)
  },


		//  MODULO 3;
	{
    path: 'modulo3',
    loadChildren: () => import('./modulo3/modulo3.module').then(m => m.Modulo3Module)
  }, 
	
	//  Ruta por defecto:
	{
    path: '**',
    redirectTo: 'modulo1'
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
