import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-primer-componente',
  templateUrl: './primer-componente.component.html',
  styleUrls: ['./primer-componente.component.css']
})
export class PrimerComponenteComponent implements OnInit {

  titulo: String;

  constructor() {
    this.titulo = "Esto es un titulo";
  }

  ngOnInit(): void {
  }

}
