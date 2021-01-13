import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CosasComponent } from './cosas.component';

describe('CosasComponent', () => {
  let component: CosasComponent;
  let fixture: ComponentFixture<CosasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CosasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CosasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
