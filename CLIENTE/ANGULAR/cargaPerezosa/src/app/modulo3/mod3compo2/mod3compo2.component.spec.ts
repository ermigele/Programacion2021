import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod3compo2Component } from './mod3compo2.component';

describe('Mod3compo2Component', () => {
  let component: Mod3compo2Component;
  let fixture: ComponentFixture<Mod3compo2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod3compo2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod3compo2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
