import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-cosas',
  templateUrl: './cosas.component.html',
  styleUrls: ['./cosas.component.css']
})
export class CosasComponent implements OnInit {

  constructor() {}
  @Input() nombreCosa: string;

  ngOnInit(): void {
  }

}
