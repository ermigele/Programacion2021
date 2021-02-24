import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddModNombreComponent } from './add-mod-nombre.component';

describe('AddModNombreComponent', () => {
  let component: AddModNombreComponent;
  let fixture: ComponentFixture<AddModNombreComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddModNombreComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddModNombreComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
