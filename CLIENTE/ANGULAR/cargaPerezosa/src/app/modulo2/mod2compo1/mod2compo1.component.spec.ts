import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Mod2compo1Component } from './mod2compo1.component';

describe('Mod2compo1Component', () => {
  let component: Mod2compo1Component;
  let fixture: ComponentFixture<Mod2compo1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Mod2compo1Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Mod2compo1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
