import { OwnersService } from './../../servicios/owners.service';
import { Owner } from './../../models/owner';
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-form-owner',
  templateUrl: './form-owner.component.html',
  styleUrls: ['./form-owner.component.css']
})
export class FormOwnerComponent implements OnInit {

  public owner: Owner;

  constructor(private servicioOwner: OwnersService, private ruta: Router, private route: ActivatedRoute) {
    this.owner = <Owner>{};
  }

  ngOnInit(): void {
    this.owner.id = this.route.snapshot.params["id"];

    this.servicioOwner.getOwnerID(this.owner.id).subscribe(datos => {
      this.owner = datos;
    });
  }

  enviar(owner: Owner) {
    console.log(owner);

    if (this.owner.id == null) {
      this.servicioOwner.setOwner(owner).subscribe(datos => {
        console.log(datos);
        this.ruta.navigate(["/owners"]);
      }, error => console.log("error", error));
    } else {
      this.servicioOwner.updateOwner(owner).subscribe(datos => {
        console.log(datos);
        this.ruta.navigate(["/owners"]);
      }, error => console.log("error", error));
    }

  }
}
