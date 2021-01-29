
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-planeta',
  templateUrl: './planeta.component.html',
  styleUrls: ['./planeta.component.css']
})
export class PlanetaComponent implements OnInit {

  @Input() planeta: any;

  constructor() { }

  ngOnInit(): void {
  }

}
