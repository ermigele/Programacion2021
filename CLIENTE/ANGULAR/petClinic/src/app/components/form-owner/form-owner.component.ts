import { OwnersService } from './../../servicios/owners.service';
import { Owner } from './../../models/owner';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-form-owner',
  templateUrl: './form-owner.component.html',
  styleUrls: ['./form-owner.component.css']
})
export class FormOwnerComponent implements OnInit {

  public owner: Owner;

  constructor(private servicioOwner: OwnersService) {
    this.owner = <Owner>{};
  }

  ngOnInit(): void {
  }

  enviar(owner: Owner) {
    console.log(owner);
    this.servicioOwner.setOwner(owner).subscribe(datos => {
      console.log(datos);
    }, error => console.log("error", error));
  }

}
