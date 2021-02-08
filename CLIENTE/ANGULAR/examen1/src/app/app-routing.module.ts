import { ListaDetalleComponent } from './lista-detalle/lista-detalle.component';
import { PrincipalComponent } from './principal/principal.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: "",
    component: PrincipalComponent
  },{
    path:"lista-detalle/:id/:num",
    component: ListaDetalleComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
