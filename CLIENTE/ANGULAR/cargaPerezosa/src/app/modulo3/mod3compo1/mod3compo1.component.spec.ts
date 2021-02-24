import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod3compo1Component } from './mod3compo1.component';

describe('Mod3compo1Component', () => {
  let component: Mod3compo1Component;
  let fixture: ComponentFixture<Mod3compo1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod3compo1Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod3compo1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
