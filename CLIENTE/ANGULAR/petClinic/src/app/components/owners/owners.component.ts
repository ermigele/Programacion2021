import { Owner } from './../../models/owner';
import { OwnersService } from './../../servicios/owners.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-owners',
  templateUrl: './owners.component.html',
  styleUrls: ['./owners.component.css']
})
export class OwnersComponent implements OnInit {

  public owners: Array<Owner>

  constructor(private servicioOwner: OwnersService) {

  }

  ngOnInit(): void {
    this.servicioOwner.getOwners().subscribe(datos => {
      console.log("Owners: ", datos);
      this.owners = datos;
    })
  }


  borrarList(id: number) {
    this.servicioOwner.delOwnerList(id).subscribe(datos => {
      this.owners = datos;
    })
  }

}
