import { FormsModule } from '@angular/forms';
import { FormOwnerComponent } from './components/form-owner/form-owner.component';
import {  HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { OwnersComponent } from './components/owners/owners.component';
import { DetailOwnerComponent } from './components/detail-owner/detail-owner.component';
import { PettypeListComponent } from './pettype-list/pettype-list.component';
import { PettypeAddComponent } from './pettype-add/pettype-add.component';
import { PetTypeListComponent } from './components/pet-type-list/pet-type-list.component';
import { PetTypeAddComponent } from './components/pet-type-add/pet-type-add.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    FormOwnerComponent,
    OwnersComponent,
    DetailOwnerComponent,
    PettypeListComponent,
    PettypeAddComponent,
    PetTypeListComponent,
    PetTypeAddComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
