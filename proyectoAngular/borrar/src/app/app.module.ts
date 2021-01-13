import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PrimerComponenteComponent } from './primer-componente/primer-componente.component';
import { HolamundoComponent } from './holamundo/holamundo.component';
import { CosasComponent } from './cosas/cosas.component';
import { from } from 'rxjs';


@NgModule({
  declarations: [
    AppComponent,
    PrimerComponenteComponent,
    HolamundoComponent,
    CosasComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
