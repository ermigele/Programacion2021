import { PetTypeService } from './../../servicios/pet-type.service';
import { PetType } from './../../models/pet-type';
import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-pet-type-add',
  templateUrl: './pet-type-add.component.html',
  styleUrls: ['./pet-type-add.component.css']
})
export class PetTypeAddComponent implements OnInit {

  public type: PetType;

  @Output() onNuevo = new EventEmitter<PetType>();

  constructor(private servicioPetType: PetTypeService) {
    this.type = <PetType>{};
  }

  ngOnInit(): void {
    this.type.id = null;

    this.servicioPetType.addPetType(type).subscribe(nuevoTipo => {
      console.log(nuevoTipo);

      this.type = nuevoTipo;
      this.onNuevo.emit(this.type);
    },
      error => console.log(error));
  }



}
