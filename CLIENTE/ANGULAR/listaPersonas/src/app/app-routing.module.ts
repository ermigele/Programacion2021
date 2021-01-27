import { FormPersonaComponent } from './form-persona/form-persona.component';
import { ListadoComponent } from './listado/listado.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: "",
    component: ListadoComponent
  },
  {
    path: "persona-addMod/:id",
    component: FormPersonaComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
