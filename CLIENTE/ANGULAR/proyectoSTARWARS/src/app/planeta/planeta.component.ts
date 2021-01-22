import { Component, OnInit } from '@angular/core';
import { PAjaxService } from '../p-ajax.service';

@Component({
  selector: 'app-planeta',
  templateUrl: './planeta.component.html',
  styleUrls: ['./planeta.component.css']
})
export class PlanetaComponent implements OnInit {

  private planeta: Array<any>;

  constructor(private peti: PAjaxService) {
    this.planeta = [];
  }

  ngOnInit(): void {
    this.peti.pedirTodosPlanetas().subscribe(datos => {
      this.planeta = datos;
      console.log("datos: ", datos);
    }, error => console.log("Error: ", error));
  }

}
