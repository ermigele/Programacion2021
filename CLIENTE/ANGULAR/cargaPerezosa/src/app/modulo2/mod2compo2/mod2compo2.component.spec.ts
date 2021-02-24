import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod2compo2Component } from './mod2compo2.component';

describe('Mod2compo2Component', () => {
  let component: Mod2compo2Component;
  let fixture: ComponentFixture<Mod2compo2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod2compo2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod2compo2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
