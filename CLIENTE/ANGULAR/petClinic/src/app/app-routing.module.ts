import { FormOwnerComponent } from './components/form-owner/form-owner.component';
import { DetailOwnerComponent } from './components/detail-owner/detail-owner.component';
import { OwnersComponent } from './components/owners/owners.component';
import { HomeComponent } from './components/home/home.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: "",
    component: HomeComponent
  },
  {
    path: "owners",
    component: OwnersComponent
  },
  {
    path: "owners-add/:id",
    component: FormOwnerComponent
  },{
    path:"detail-owner/:id",
    component: DetailOwnerComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
