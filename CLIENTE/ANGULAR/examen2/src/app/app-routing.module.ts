import { AlumnoFormComponent } from './componentes/alumno-form/alumno-form.component';
import { EstadoscivilesComponent } from './componentes/estadosciviles/estadosciviles.component';
import { AlumnosListadoComponent } from './componentes/alumnos-listado/alumnos-listado.component';
import { InicioComponent } from './componentes/inicio/inicio.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: "",
    component: InicioComponent
  },{
    path: "alumnos",
    component: AlumnosListadoComponent
  },{
    path: "estadosciviles",
    component: EstadoscivilesComponent
  },{
    path: "alumno-add",
    component: AlumnoFormComponent
  },{
    path:"alumno-add/:id",
    component: AlumnoFormComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
