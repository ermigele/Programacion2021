import { OwnersService } from './../../servicios/owners.service';
import { Owner } from './../../models/owner';
import { Router, ActivatedRoute } from '@angular/router';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-detail-owner',
  templateUrl: './detail-owner.component.html',
  styleUrls: ['./detail-owner.component.css']
})
export class DetailOwnerComponent implements OnInit {

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

}
