import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod1compo2Component } from './mod1compo2.component';

describe('Mod1compo2Component', () => {
  let component: Mod1compo2Component;
  let fixture: ComponentFixture<Mod1compo2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod1compo2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod1compo2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
